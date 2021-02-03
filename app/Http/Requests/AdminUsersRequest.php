<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class AdminUsersRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

     public function rules()
     {
         $rules = [
             'email' => 'required',
             'role_id' => 'required',
             'is_active' => 'required',
             'password' => 'required',
         ];

         return $rules;
     }
}
