<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class UsersRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
      $before_date = Carbon::today()->toDateString();
        return [
            'email' => 'required',
            'date_of_birth'=>'nullable|date|before:' . $before_date,
        ];
    }
}
