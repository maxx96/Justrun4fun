<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\EventUser;
use App\Models\Photo;
use App\Models\User;
use App\Models\Event;
use App\Models\Category;
use App\Models\Foundation;
use App\Models\AgeCategory;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;

class UserController extends Controller
{
    protected function validator($data){
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'firstname' => 'max:20',
            'surname' => 'max:20',
            'city' => 'max:30',
        ],
        [
            'email.required' => 'E-mail jest wymagany.',
            'email.email' => 'E-mail musi być mailem.',
            'email.max' => 'E-mail może mieć maksymalnie 50 znaków.',
            'email.unique' => 'E-mail musi być unikalny.',
            'firstname.max' => 'Imię może mieć maksymalnie 20 znaków.',
            'surname.max' => 'Nazwisko może mieć maksymalnie 20 znaków.',
            'city.max' => 'Miasto może mieć maksymalnie 30 znaków.',
        ]);
    }

    public function index()
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        $data = DB::table('event_users')->join('users', 'event_users.user_id', '=', 'users.id')
            ->join('events', 'event_users.event_id', '=', 'events.id')
            ->join('categories', 'events.category_id', '=', 'categories.id')
            ->join('foundations', 'users.foundation_id', '=', 'foundations.id')
            ->join('age_categories', 'users.age_category_id', '=', 'age_categories.id')
            ->select('events.event_date', 'events.title', 'events.is_active', 'events.slug', 'events.place', 'foundations.name', 'age_categories.name', 'categories.points', 'event_users.verification')
            ->where('users.id', '=', $id)
            ->orderBy('events.event_date', 'asc')
            ->get();
        $upcomingEvents = $data->where('is_active', '=', 1);
        $finishedEvents = $data->where('is_active', '=', 0);
        $collection = $user->total_points/100;
        return view('profil/index', compact('user', 'collection', 'upcomingEvents', 'finishedEvents'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(User $user) 
    {
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $foundations = Foundation::pluck('name', 'id')->all();
        $age_categories = AgeCategory::pluck('name', 'id')->all();
        return view('profil/edit', compact('user', 'foundations', 'age_categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $user = Auth::user();
        $input = $request->all();
        if ($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        if(!empty($request->firstname && $request->surname && $request->city && $user->foundation_id && $user->age_category_id)){
            $user->is_active=1;
        }
        else{
            $user->is_active=0;
        }
        $user->save();
        $user->update($input);
        Session::flash('message', "Dane profilowe zostały zaktualizowane pomyślnie.");
        return redirect('profil');
    }

    public function destroy(User $user)
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        if ($user->photo->file != '/images/no_image.svg'){
            Storage::delete('public'.$user->photo->file);
        }
        $user->delete();
        return redirect('/');
    }

    public function eventRegistration($id)
    {
        $user_id = Auth::id();
        $participate = EventUser::where('event_id', '=', $id)->where('user_id', '=', $user_id)->first();
        $isParticipate = false;
        if ($participate === null) {
            $participate = new EventUser;
            $participate->event_id = $id;
            $participate->user_id = $user_id;
            $participate->save();
            $isParticipate = true;
        }
        else {
            $participate->delete();
        }
        return redirect()->back()->with('isParticipate', $isParticipate);
    }
}