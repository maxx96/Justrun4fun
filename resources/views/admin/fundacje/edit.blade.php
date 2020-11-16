@extends('layouts/admin')

@section('content')

<h2>Edytuj fundację</h2>
<hr>

    {!! Form::model($foundation, ['method'=>'PATCH', 'action'=> ['App\Http\Controllers\FoundationController@update', $foundation->id]]) !!}
      <div class="form-group">
        {!! Form::label('name', 'Nazwa:') !!}
        {!! Form::text('name', null, ['class'=>'form-control'])!!}
      </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group" onclick="return confirm('Czy zapisać zmiany?')">
          {!! Form::submit('Zapisz zmiany', ['class'=>'btn btn-primary col-md-12']) !!}
        </div>
    {!! Form::close() !!}
      </div>
      <div class="col-md-6">
        {!! Form::open(['method'=>'DELETE', 'action'=> ['App\Http\Controllers\FoundationController@destroy', $foundation->id]]) !!}
          <div class="form-group" onclick="return confirm('Czy na pewno usunąć wybraną fundację?')">
            {!! Form::submit('Usuń fundację', ['class'=>'btn btn-danger col-md-12']) !!}
          </div>
        {!! Form::close() !!}
      </div>
    </div>


@stop
