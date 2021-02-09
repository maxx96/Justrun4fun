<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ChangePasswordController extends Controller
{
    protected function validator($data){
        return Validator::make($data, [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => [
                'required',
                'string', 
                'min:8',             // must be at least 8 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit 
            ],
            'new_confirm_password' => ['same:new_password'],
        ],
        [
            'current_password.required' => 'Aktualne hasło jest wymagane.',
            'new_password.required' => 'Nowe hasło jest wymagane.',
            'new_password.min' => 'Nowe hasło musi mieć co najmniej 8 znaków.',
            'new_password.regex' => 'Nowe hasło musi mieć małe i duże znaki oraz cyfry.',
            'new_confirm_password.same' => 'Pole potwierdzające hasło nie jest zgodne z nowym hasłem.',
        ]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profil/change-password');
    } 

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect('/');
    }
}