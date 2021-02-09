<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinion;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;

class EventOpinionsController extends Controller
{
    protected function validator($data){
        return Validator::make($data, [
            'atmosphere_rating'=>'required',
            'road_rating'=>'required',
            'organization_rating'=>'required',
            'overall_rating'=>'required',
            'body'=>'required',
        ],
        [
            'atmosphere_rating.required' => 'Ocena atmosfery jest wymagana.',
            'road_rating.required' => 'Ocena trasy jest wymagana.',
            'organization_rating.required' => 'Ocena organizacji jest wymagana.',
            'overall_rating.required' => 'Ogólna ocena jest wymagana.',
            'body.required'  => 'Treść opinii jest wymagana.',
        ]);
    }

    public function index()
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
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
        Session::flash('message', 'Twoja opinia została przesłana i zostanie zweryfikowana w ciągu 24 godzin.');
        return redirect()->back();
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        $data = EventUser::join('users', 'event_users.user_id', '=', 'users.id')
        ->join('events', 'event_users.event_id', '=', 'events.id')
        ->join('opinions', 'events.id', '=', 'opinions.event_id')
        ->select('opinions.*', 'events.title', 'users.email', 'event_users.verification', 'event_users.id as id_event_users')
        ->where('events.id', '=', $id)
        ->paginate(10);
        return view('admin/opinie/show', compact('data', 'event'));
    }

    public function edit($id)
    {
    }

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
        elseif (($event_user->verification == "Odrzucone") && ($user->total_points <= 0)) {
            $user->total_points = 0;
        }
        elseif ($event_user->verification == "Odrzucone") {
          $user->total_points = $user->total_points - $category->points;
        }
        $user->update($request->all());
        $user->save();
        Session::flash('message', "Dokonano weryfikacji opinii $user->email.");
        return redirect()->back();
    }

    public function destroy($id)
    {
    }
}
