<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\EventUser;
use App\Models\Photo;
use App\Models\User;
use App\Models\Event;
use App\Models\Category;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = Auth::id();
      $user = User::findOrFail($id);
      $data = DB::table('event_users')->join('users', 'event_users.user_id', '=', 'users.id')
      	->join('events', 'event_users.event_id', '=', 'events.id')
      	->join('categories', 'events.category_id', '=', 'categories.id')
      	->select('events.event_date', 'events.title', 'events.is_active', 'events.slug', 'events.place', 'users.email', 'categories.points', 'event_users.verification')
        ->where('users.id', '=', $id)
        ->orderBy('events.event_date', 'asc')
      	->get();
      return view('profil/index', compact('user', 'data'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) 
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('profil/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, User $user)
    {
        $user = Auth::user();
      $input = $request->all();
      if (trim($request->password) == '') {
          $input = $request->except('password');
      } else {
          $input['password'] = bcrypt($request->password);
      }
      if ($file = $request->file('photo_id')) {
        $name = time() . $file->getClientOriginalName();
        $file->move('images', $name);
        $photo = Photo::create(['file'=>$name]);
        $input['photo_id'] = $photo->id;
      }
      if(empty($request->firstname && $request->surname && $request->date_of_birth && $request->sex && $request->city && $request->country)){
        $user->is_active = 0;
        $user->save();
      }
      User::findOrFail($id)->update($input);
      return redirect('profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $id = Auth::id();
      $user = User::findOrFail($id);
      if ($user->photo->file != '/images/no_image.png')
      {
          Storage::delete('public'.$user->photo->file);
      }
      $user->delete();
      return redirect('/');
    }

    public function eventRegistration($id)
    {
      $user_id = Auth::id();
      $participate = EventUser::where('event_id', '=', $id)->
          where('user_id', '=', $user_id)->first();
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

    public function rankingRegistration($id)
    {
      $user_id = Auth::id();
      $user = User::findOrFail($id);
      if($user->firstname && $user->surname && $user->date_of_birth && $user->sex && $user->city && $user->country)
      {
        $user->is_active = 1;
        $user->total_points = 0;
        $user->save();
      }
      return redirect()->back();
    }
}
