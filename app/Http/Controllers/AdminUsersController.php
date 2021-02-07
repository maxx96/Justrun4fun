<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminUsersRequest;
use App\Models\Photo;
use App\Models\User;
use App\Models\EventUser;
use App\Models\Role;
use App\Models\AgeCategory;
use App\Models\Foundation;
use Illuminate\Support\Facades\Auth;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin/uzytkownicy/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        $age_categories = AgeCategory::pluck('name', 'id')->all();
        $foundations = Foundation::pluck('name', 'id')->all();
        return view('admin/uzytkownicy/create', compact('roles','age_categories','foundations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        return redirect('/admin/uzytkownicy'); //przekierowanie do danej trasy po wykonaniu funkcji
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
      return view('admin/uzytkownicy/show', compact('user', 'data', 'collection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        $age_categories = AgeCategory::pluck('name', 'id')->all();
        return view('admin/uzytkownicy/edit', compact('user', 'roles', 'age_categories'));
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
        return redirect('/admin/uzytkownicy');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        unlink(public_path() . $user->photo->file);
        $user->delete();
        Session::flash('deleted_user', 'Użytkownik został usunięty!');
        return redirect('admin/uzytkownicy');
    }
}
