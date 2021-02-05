<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Requests;
use App\Models\Event;
use App\Models\User;
use App\Models\EventUser;
use App\Models\Photo;
use App\Models\Category;


class PagesController extends Controller
{
    public function index(){
        $events = Event::where('is_active', 1)->orderBy('event_date', 'asc')->limit(3)->get();
        $count_events = Event::select('count')->count();
        $count_users = User::select('count')->count();
        return view('/index', compact('events','count_events','count_users'));
      }
  
    public function events(){
        $events = Event::where('is_active', 1)->orderBy('event_date', 'asc')->get();
        $categories = Category::all();
        return view('menu/wydarzenia', compact('events','categories'));
    }
  
    public function ranking(){
      $users = User::where('is_active', 1)->orderBy('total_points', 'desc')->get();
      if(Auth::check()){
        $id = Auth::id();
        $userAuth = User::findOrFail($id);
        if($userAuth->is_active == 0)
          $userAuth = null;
      }
      else
      $userAuth = null;
      return view('menu/ranking', compact('users', 'userAuth'));
    }
}
