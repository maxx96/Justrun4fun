@extends('layouts.admin')
@section('content')

<h2>Edytuj użytkownika</h2>
<hr>

<div class="row">

  <div class="col-sm-3">
    <img src="{{$user->photo ? $user->photo->file : '/no_image.png'}}" alt="" class="img-responsive img-rounded" width=100%>
  </div>

  <div class="col-sm-9">

    {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['App\Http\Controllers\AdminUsersController@update', $user->id], 'files'=>true]) !!}
      <div class="form-group">
        {!! Form::label('name', 'Nazwa użytkownika:') !!}
        {!! Form::text('name', null, ['class'=>'form-control'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('role_id', 'Rola:') !!}
        {!! Form::select('role_id', $roles , null, ['class'=>'form-control'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active', array(1 => 'Aktywny', 0=> 'Nieaktywny'), null, ['class'=>'form-control'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('photo_id', 'Zdjęcie:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
      </div>
      <div class="form-group" onclick="return confirm('Czy zapisać zmiany?')">
        {!! Form::submit('Zapisz zmiany', ['class'=>'btn btn-primary col-sm-6']) !!}
      </div>
    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminUsersController@destroy', $user->id]]) !!}
      <div class="form-group" onclick="return confirm('Czy na pewno usunąć wybranego użytkownika?')">
        {!! Form::submit('Usuń użytkownika', ['class'=>'btn btn-danger col-sm-6']) !!}
      </div>
    {!! Form::close() !!}

  </div>

</div>

<div class="row">
  @include('includes/error-form')
</div>

@stop
