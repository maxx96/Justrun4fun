<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Event;
use App\Models\User;
use App\Models\Opinion;
use App\Models\EventUser;
use App\Models\Category;
use App\Models\PublicOpinion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use Carbon\Carbon;

class AdminEventsController extends Controller
{
    protected function validator($data){
        $after_date = Carbon::today()->toDateString();

        return Validator::make($data, [
            'title'=>'required|max:100',
            'place'=>'required|max:40',
            'event_date'=>'required|date|after:' . $after_date,
            'category_id'=>'required',
            'photo_id'=>'required',
        ],
        [
            'title.required' => 'Nazwa wydarzenia jest wymagana.',
            'title.max' => 'Nazwa wydarzenia może mieć maksymalnie 100 znaków.',
            'place.required' => 'Miejsce jest wymagane.',
            'place.max' => 'Miejsce może mieć maksymalnie 40 znaków.',
            'event_date.required' => 'Data jest wymagana.',
            'event_date.after' => 'Data nie może być przeszła.',
            'category_id.required' => 'Kategoria jest wymagana.',
            'photo_id.required'  => 'Zdjęcie jest wymagane.',
        ]);
    }

    public function index()
    {
        $events = Event::paginate(10);
        return view('admin/wydarzenia/index', compact('events'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        return view('admin/wydarzenia/create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $input = $request->all();
        $user = Auth::user();
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $event = Event::create($input);
        Session::flash('message', "Wydarzenie $request->title została dodana.");
        return redirect('/admin/wydarzenia');
    }
  
    public function show($id)
    {
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        return view('admin/wydarzenia/edit', compact('event', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $input = $request->all();
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        Event::findOrFail($id)->update($input);
        Session::flash('message', "Dane wydarzenia zostały zaktualizowane pomyślnie.");
        return redirect('admin/wydarzenia');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $image = $event->photo->file;
        $path = str_replace('\\','/', public_path() . '/' . $image);
        if(file_exists($path)) {
            unlink($path);
            $photo = Photo::findOrFail($event->photo_id);
            $photo->delete();
        }
        $event->delete();
        Session::flash('message', "Wydarzenie zostało usunięte.");
        return redirect('admin/wydarzenia');
    }

    // Wyświetlanie wydarzenia
    public function event($slug)
    {
        $event = Event::where('slug', '=', $slug)->first();
        $references = PublicOpinion::where('event_id', '=', $event->id)->get();
        $opinions = $event->opinions()->get();
        $user = null;
        $isParticipate = false;
        $isGiveOpinion = false;
        if (Auth::check()) {
            $user = Auth::user();
            $participate = EventUser::where('event_id', '=', $event->id)->where('user_id', '=', $user->id)->first();
            $isParticipate = !($participate === null);
            $giveOpinion = Opinion::where('event_id', '=', $event->id)->where('author', '=', $user->email)->first();
            $isGiveOpinion = !($giveOpinion === null);
        }
        return view('wydarzenia', compact('event', 'opinions', 'user', 'references'))->with('isParticipate', $isParticipate)->with('isGiveOpinion', $isGiveOpinion);
    }
}
