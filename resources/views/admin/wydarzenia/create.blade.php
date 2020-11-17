@extends('layouts.admin')

@section('content')

<h2>Utwórz wydarzenie</h2>
<hr>

{{ Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\AdminEventsController@store','files'=>true]) }}
@csrf
  <div class="form-group">
    {{ Form::label('title', 'Nazwa:') }}*
    {{ Form::text('title', '', ['class'=>'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::label('place', 'Miejsce:') }}*
    {{ Form::text('place', '', ['class'=>'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::label('event_date', 'Data:') }}*
    {{ Form::date('event_date', '', ['class' => 'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::label('category_id', 'Kategoria:') }}*
    {{ Form::select('category_id', [''=>'Wybierz kategorię'] + $categories, '', ['class'=>'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::label('photo_id', 'Zdjęcie:') }}*<br>
    {{ Form::file('photo_id', null, ['class'=>'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::label('web_page', 'Strona www:') }}
    {{ Form::text('web_page', '', ['class'=>'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::label('sign_up', 'Link do zapisów:') }}
    {{ Form::text('sign_up', '', ['class'=>'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::label('fanpage', 'Link do Facebooka:') }}
    {{ Form::text('fanpage', '', ['class'=>'form-control']) }}
  </div>
  <div class="row">
    <div class="col-md-12">
      *pola wymagane<br><br>
    </div>
  </div>
  <div class="form-group" onclick="return confirm('Czy utworzyć nowe wydarzenie?')">
    {{ Form::submit('Utwórz', ['class'=>'btn btn-primary']) }}
  </div>
{{ Form::close() }}

@include('includes/error-form')

@stop
