@extends('layouts.admin')

@section('content')

<h2>Edytuj wydarzenie</h2>
<hr>

<div class="row">

  <div class="col-lg-3">
    <img src="{{$event->photo->file}}" alt="" class="img-responsive" width=100%>
  </div>

  <div class="col-lg-9">

    <div class="row">
      @include('includes/error-form')
    </div>

    {!! Form::open(['action' => ['App\Http\Controllers\AdminEventsController@update', $event->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
      {!! Form::label('title', 'Nazwa:') !!}
      {!! Form::text('title', $event->title, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
      {!! Form::label('place', 'Miejsce:') !!}
      {!! Form::text('place', $event->place, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
      {{Form::label('event_date', 'Data:')}}
      {{Form::date('event_date', $event->event_date, ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
      {!! Form::label('category_id', 'Kategoria:') !!}
      {!! Form::select('category_id', [''=>'Wybierz kategorię'] + $categories, null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
      {!! Form::label('photo_id', 'Zdjęcie:') !!}<br>
      {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
      {!! Form::label('web_page', 'Strona www:') !!}
      {!! Form::text('web_page', $event->web_page, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
      {!! Form::label('sign_up', 'Link do zapisów:') !!}
      {!! Form::text('sign_up', $event->sign_up, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
      {!! Form::label('fanpage', 'Link do Facebooka:') !!}
      {!! Form::text('fanpage', $event->fanpage, ['class'=>'form-control'])!!}
    </div>
    <div class="row">
      <div class="form-group col-md-6" onclick="return confirm('Czy zatwierdzić zmiany?')">
        {!! Form::submit('Zapisz zmiany', ['class'=>'btn btn-primary col-md-12']) !!}
      </div>
      {!! Form::close() !!}
        <div class="form-group col-md-6" onclick="return confirm('Czy na pewno chcesz usunąć wydarzenie?')">
          {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminEventsController@destroy', $event->id]]) !!}
                {!! Form::submit('Usuń', ['class'=>'btn btn-danger col-md-12']) !!}
          {!! Form::close() !!}
        </div>
    </div>
  </div>

</div>

@stop
