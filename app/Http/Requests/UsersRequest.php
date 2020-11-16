<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
      $rules = [
          'name' => 'required',
          'email' => 'required',
      ];

      if ($this->method() == 'POST'){
         $rules['password'] = 'required';
      }

      return $rules;
    }
}
