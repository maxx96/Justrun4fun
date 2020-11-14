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
             'name' => 'required',
             'role_id' => 'required',
             'is_active' => 'required'
         ];

         return $rules;
     }
}
