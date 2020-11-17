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
            'title'=>'required',
            'place'=>'required',
            'event_date'=>'required|date|after:' . $after_date,
            'category_id'=>'required',
            'photo_id'=>'required',
        ];
    }
}
