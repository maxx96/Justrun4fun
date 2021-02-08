<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class EventsCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
      $after_date = Carbon::today()->toDateString();
        return [
            'title'=>'required|max:100',
            'place'=>'required|max:40',
            'event_date'=>'required|date|after:' . $after_date,
            'category_id'=>'required',
            'photo_id'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Nazwa jest wymagana',
            'place.required' => 'Miejsce jest wymagane',
            'event_date.required' => 'Data jest wymagana',
            'category_id.required' => 'Kategoria jest wymagana',
            'photo_id.required'  => 'Zdjęcie jest wymagane'
        ];
    }
}
