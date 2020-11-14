<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinion;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OpinionsRequest;

class EventOpinionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OpinionsRequest $request)
    {
        $user = Auth::user();
        $data = [
          'event_id' => $request->event_id,
          'author' => $user->email,
          'atmosphere_rating' => $request->atmosphere_rating,
          'road_rating' => $request->road_rating,
          'organization_rating' => $request->organization_rating,
          'overall_rating' => $request->overall_rating,
          'body' => $request->body
      ];
        Opinion::create($data);
        $request->session()->flash('comment_message', 'Twoja opinia została przesłana i zostanie zweryfikowana w ciągu 24h!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $data = EventUser::join('users', 'event_users.user_id', '=', 'users.id')
        ->join('events', 'event_users.event_id', '=', 'events.id')
        ->join('opinions', 'events.id', '=', 'opinions.event_id')
        ->select('opinions.*', 'events.title', 'users.email', 'event_users.verification', 'event_users.id as id_event_users')
        ->where('events.id', '=', $id)
        ->get();
        return view('admin/opinie/show', compact('data', 'event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        Opinion::findOrFail($id)->update($request->all());
        return redirect()->back();
    }

    public function updateVerification(Request $request, $id)
    {
        EventUser::find($id)->update($request->all());
        $event_user = EventUser::find($id);
        $event = Event::find($event_user->event_id);
        $user = User::find($event_user->user_id);
        $category = Category::where('id', '=', $event->category_id)->first();
        if ($event_user->verification == "Zaakceptowane") {
          $user->total_points = $user->total_points + $category->points;
        }
        elseif ($event_user->verification == "Odrzucone") {
          $user->total_points = $user->total_points - $category->points;
        }
        $user->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
