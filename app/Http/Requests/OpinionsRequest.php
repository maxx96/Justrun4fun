<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpinionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
          'atmosphere_rating'=>'required',
          'road_rating'=>'required',
          'organization_rating'=>'required',
          'overall_rating'=>'required',
          'body'=>'required'
      ];
    }

    public function messages()
    {
        return [
            'atmosphere_rating.required' => 'Ocena atmosfery jest wymagana',
            'road_rating.required' => 'Ocena trasy jest wymagana',
            'organization_rating.required' => 'Ocena organizacji jest wymagana',
            'overall_rating.required' => 'Ogólna ocena jest wymagana',
            'body.required'  => 'Treść opinii jest wymagana'
        ];
    }
}
