@extends('layouts/admin')

@section('content')

<h2>Fundacje</h2>
<hr>

<div class="row">

  <div class="col-sm-6">

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nazwa</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @if($foundations)
        @foreach($foundations as $foundation)
          <tr>
            <td>{{$foundation->id}}</td>
            <td>{{$foundation->name}}</td>
            <td><a class="btn btn-primary" href="../admin/fundacje/{{$foundation->id}}/edit" role="button">Zarządzaj</a></td>
          </tr>
        @endforeach
      </tbody>
        @endif
    </table>

  </div>

  <div class="col-sm-6">

    <h5>Dodaj nową fundację</h5> 
    {!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\FoundationController@store']) !!}
      <div class="form-group">
        {!! Form::label('name', 'Nazwa:') !!}
        {!! Form::text('name', null, ['class'=>'form-control'])!!}
      </div>
      <div class="form-group" onclick="return confirm('Czy utworzyć nową fundację?')">
        {!! Form::submit('Utwórz fundację', ['class'=>'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}

  </div>

</div>

@stop
