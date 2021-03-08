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
use DB;

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
        $eventusers = EventUser::where('event_id', '=', $request->event_id)->where('user_id', '=', $user->id)->first();
        $eventusers->verification='W trakcie';
        $eventusers->save();
        Session::flash('message', 'Twoja opinia została przesłana i zostanie zweryfikowana w ciągu 24 godzin.');
        return redirect()->back();
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        $data = DB::table('event_users')
            ->join('users', 'event_users.user_id', '=', 'users.id')
            ->join('events', 'event_users.event_id', '=', 'events.id')
            ->join('opinions', 'event_users.event_id', '=', 'opinions.event_id')
            ->select('opinions.*', 'events.title', 'users.email', 'event_users.verification', 'event_users.id as id_event_users')
            ->where('event_users.event_id', $id)
            ->where(function ($query) {
             $query->where('verification', 'W trakcie')
            ->orWhere('verification', 'Zaakceptowane')
            ->orWhere('verification', 'Odrzucone');
        })
        ->get();
        $result = json_decode($data, true);
        $uniqueArray = [];
        $usedValues = [
            'id' => [],
            'id_event_users' => [],
        ];
        foreach ($result as $element) {
            if (!in_array($element['id'], $usedValues['id']) && !in_array($element['id_event_users'], $usedValues['id_event_users'])) {
                $uniqueArray[] = $element;
                $usedValues['id'][] = $element['id'];
                $usedValues['id_event_users'][] = $element['id_event_users'];
            }
        }
        $data = array_values($uniqueArray);
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