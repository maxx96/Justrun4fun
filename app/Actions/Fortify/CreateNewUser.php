<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $attributes = [

        ];

        $rules = [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ];

        $messages = [
            'password' => 'Hasło',
            'email' => 'E-mail',
        ];

        Validator::make($input, $rules, $attributes, $messages)->validate();

        return User::create([
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
