<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventsCreateRequest;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Event;
use App\Models\User;
use App\Models\Opinion;
use App\Models\EventUser;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class AdminEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(10);
        return view('admin/wydarzenia/index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        return view('admin/wydarzenia/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(eventsCreateRequest $request)
    {
        $input = $request->all();
        $user = Auth::user();
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $event = Event::create($input);
        return redirect('/admin/wydarzenia');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        return view('admin/wydarzenia/edit', compact('event', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        Event::findOrFail($id)->update($input);
        return redirect('admin/wydarzenia');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        unlink(public_path() . $event->photo->file);
        $event->delete();
        return redirect('admin/wydarzenia');
    }

        // Wyświetlanie wydarzenia
        public function event($slug)
        {
            $event = Event::where('slug', '=', $slug)->first();
            $opinions = $event->opinions()->get();
            $user = null;
            $isParticipate = false;
            $isGiveOpinion = false;
            if (Auth::check()) {
                $user = Auth::user();
                $participate = EventUser::where('event_id', '=', $event->id)->where('user_id', '=', $user->id)->first();
                $isParticipate = !($participate === null);
                $giveOpinion = Opinion::where('event_id', '=', $event->id)->where('author', '=', $user->name)->first();
                $isGiveOpinion = !($giveOpinion === null);
            }
            return view('wydarzenia', compact('event', 'opinions', 'user'))->with('isParticipate', $isParticipate)->with('isGiveOpinion', $isGiveOpinion);
        }
}
