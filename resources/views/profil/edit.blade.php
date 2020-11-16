@extends('layouts.app')

@section('content')

    <section class="container-fluid">

  <section class="profil">

    <div class="container">

      <h2>Edytuj swój profil</h2>
      <hr>

      <div class="row">

        <div class="col-md-3">
          <div class="row">
            <img src="{{$user->photo ? $user->photo->file : '/images/no_image.png'}}" alt="" class="img-responsive img-rounded" width=100%>
          </div>
          <div class="row">
            <div class="form-group col-md-12">
              {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['App\Http\Controllers\UserController@update', $user->id], 'files'=>true]) !!}
                {!! Form::label('password', 'Zmień hasło:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>
          </div>
        </div>

        <div class="col-md-9">
            <div class="row">
              @include('includes/error-form')
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                {!! Form::label('name', 'Nazwa użytkownika:*') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
              </div>
              <div class="form-group col-md-6">
                {!! Form::label('email', 'E-mail:*') !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                {!! Form::label('firstname', 'Imię:*') !!}
                {!! Form::text('firstname', null, ['class'=>'form-control']) !!}
              </div>
              <div class="form-group col-md-6">
                {!! Form::label('surname', 'Nazwisko:*') !!}
                {!! Form::text('surname', null, ['class'=>'form-control']) !!}
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                {!! Form::label('city', 'Miasto:*') !!}
                {!! Form::text('city', null, ['class'=>'form-control']) !!}
              </div>
              <div class="form-group col-md-6">
                {!! Form::label('country', 'Kraj:*') !!}
                {!! Form::text('country', null, ['class'=>'form-control']) !!}
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                {!! Form::label('sex', 'Płeć:*') !!}<br>
                {!! Form::radio('sex', 'Mężczyzna') !!} Mężczyzna
                {!! Form::radio('sex', 'Kobieta') !!} Kobieta
              </div>
              <div class="form-group col-md-6">
                {!! Form::label('photo_id', 'Zdjęcie profilowe:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                {!! Form::label('date_of_birth', 'Data urodzenia:*') !!}
                {!! Form::date('date_of_birth', $user->date_of_birth, ['class'=>'form-control']) !!}
              </div>
              <div class="form-group col-md-6">
                {!! Form::label('club', 'Klub:') !!}
                {!! Form::text('club', null, ['class'=>'form-control']) !!}
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                *pola wymagane do rankingu<br><br>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6" onclick="return confirm('Czy zatwierdzić zmiany?')">
                {!! Form::submit('Zapisz zmiany', ['class'=>'btn btn-success col-md-12']) !!}
              </div>

          {!! Form::close() !!}
              <div class="form-group col-md-6" onclick="return confirm('Czy na pewno chcesz usunąć konto?')">
          {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\UserController@destroy', $user->id]]) !!}
                {!! Form::submit('Usuń konto', ['class'=>'btn btn-secondary col-md-12']) !!}
          {!! Form::close() !!}
              </div>
            </div>
        </div>
      </div>

    </div>

  </section>

  </div>

@stop
