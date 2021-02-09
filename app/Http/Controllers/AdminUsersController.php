<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\User;
use App\Models\EventUser;
use App\Models\Role;
use App\Models\AgeCategory;
use App\Models\Foundation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminUsersController extends Controller
{
    protected function validator($data){
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => [
                'required',
                'string', 
                'min:8',             // must be at least 8 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit 
            ],
            'role_id' => 'required',
        ],
        [
            'email.required' => 'E-mail jest wymagany.',
            'email.email' => 'E-mail musi być mailem.',
            'email.max' => 'E-mail może mieć maksymalnie 50 znaków.',
            'email.unique' => 'E-mail musi być unikalny.',
            'password.required' => 'Hasło jest wymagane.',
            'password.min' => 'Hasło musi mieć co najmniej 8 znaków.',
            'password.regex' => 'Hasło musi mieć małe i duże znaki oraz cyfry.',
            'role_id.required' => 'Rola jest wymagana.',
        ]);
    }

    protected function validatorUpdate($data){
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:50'],
        ],
        [
            'email.required' => 'E-mail jest wymagany.',
            'email.email' => 'E-mail musi być mailem.',
            'email.max' => 'E-mail może mieć maksymalnie 50 znaków.',
        ]);
    }

    public function index()
    {
        $users = User::all();
        return view('admin/uzytkownicy/index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        $age_categories = AgeCategory::pluck('name', 'id')->all();
        $foundations = Foundation::pluck('name', 'id')->all();
        return view('admin/uzytkownicy/create', compact('roles','age_categories','foundations'));
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        if (trim($request->password) == '') {
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        User::create($input);
        Session::flash('message', "Utworzono pomyślnie nowego użytkownika $request->email.");
        return redirect('/admin/uzytkownicy');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $data = EventUser::join('users', 'event_users.user_id', '=', 'users.id')
      	->join('events', 'event_users.event_id', '=', 'events.id')
      	->join('categories', 'events.category_id', '=', 'categories.id')
      	->select('events.event_date', 'events.title', 'events.is_active', 'events.slug', 'events.place', 'users.email', 'categories.points', 'event_users.verification')
        ->where('users.id', '=', $id)
        ->orderBy('events.event_date', 'asc')
      	->get();
        $collection = $user->total_points/100;
        $upcomingEvents = $data->where('is_active', '=', 1);
        $finishedEvents = $data->where('is_active', '=', 0);
        return view('admin/uzytkownicy/show', compact('user', 'collection', 'upcomingEvents', 'finishedEvents'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        $foundations = Foundation::pluck('name', 'id')->all();
        $age_categories = AgeCategory::pluck('name', 'id')->all();
        return view('admin/uzytkownicy/edit', compact('user', 'roles', 'age_categories', 'foundations'));
    }

    public function update(Request $request, $id)
    {
        $this->validatorUpdate($request->all())->validate();
        $user = User::findOrFail($id);
        if (trim($request->password) == '') {
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        if(empty($request->firstname && $request->surname && $request->city && $user->foundation_id && $user->age_category_id)){
            $user->is_active = 0;
            $user->save();
          }
          else{
            $user->is_active = 1;
            $user->save();
          }
        $user->update($input);
        Session::flash('message', "Dane użytkownika $user->email zostały zaktualizowane.");
        return redirect('/admin/uzytkownicy');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        unlink(public_path() . $user->photo->file);
        $user->delete();
        Session::flash('message', "Użytkownik został usunięty.");
        return redirect('admin/uzytkownicy');
    }
}