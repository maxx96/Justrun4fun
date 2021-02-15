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
        return view('/index', compact('events'));
      }
  
    public function events(){
        $events = Event::where('is_active', 1)->orderBy('event_date', 'asc')->paginate(15);
        $categories = Category::all();
        return view('menu/wydarzenia', compact('events','categories'));
    }

    public function filterSearch(Request $request)
    {
        $name_part = $request->get('title');
        $place_part = $request->get('place');
        /* Filtracja na podstawie nazwy i miejsca */
        $events = Event::where('title', 'like', '%'.$name_part.'%');
        if($request->filled('place'))
        {
            $events->where(function($query) use ($place_part) {
                $query->where('place', 'like', '%'.$place_part.'%');
            });
        }
        /* Dolny zakres dat */
        if ($request->filled('from_date')) {
            $from = $request->get('from_date');
            $events = $events->where('event_date', '>=', date($from).' 00:00:00');
        }
        /* Górny zakres dat */
        if ($request->filled('to_date')) {
            $to = $request->get('to_date');
            $events = $events->where('event_date', '<=', date($to).' 23:59:59');
        }
        if ($request->filled('category')) {
            $category = $request->get('category');
            $events = $events->where('category_id', '=', $category);
        }
        $events->where('event_date', '>=', Carbon::today());
        $events = $events->orderBy('event_date', 'asc')->paginate(15);
        $events->appends(request()->query())->links();
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
