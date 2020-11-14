@extends('layouts.admin')

@section('content')

<h2>Utwórz użytkownika</h2>
<hr>

{!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\AdminUsersController@store','files'=>true]) !!}
  <div class="form-group">
    {!! Form::label('email', 'E-mail:') !!}
    {!! Form::email('email', null, ['class'=>'form-control'])!!}
  </div>
  <div class="form-group">
    {!! Form::label('role_id', 'Rola:') !!}
    {!! Form::select('role_id', [''=>'Wybierz rolę'] + $roles , null, ['class'=>'form-control'])!!}
  </div>
  <div class="form-group">
    {!! Form::label('is_active', 'Status:') !!}
    {!! Form::select('is_active', array(1 => 'Aktywny', 0=> 'Nieaktywny'), null, ['class'=>'form-control'])!!}
  </div>
  <div class="form-group">
    {!! Form::label('photo_id', 'Zdjęcie:') !!}<br>
    {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
  </div>
  <div class="form-group">
    {!! Form::label('password', 'Hasło:') !!}
    {!! Form::password('password', ['class'=>'form-control'])!!}
  </div>
  <div class="form-group" onclick="return confirm('Czy utworzyć nowego użytkownika?')">
    {!! Form::submit('Utwórz', ['class'=>'btn btn-primary']) !!}
  </div>
{!! Form::close() !!}

@include('includes/error-form')

@stop
