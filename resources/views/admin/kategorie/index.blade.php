@extends('layouts/admin')

@section('content')

<h2>Kategorie</h2>
<hr>

<div class="row">

  <div class="col-sm-6">

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nazwa</th>
          <th>Ilość punktów</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @if($categories)
        @foreach($categories as $category)
          <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->points}}</td>
            <td><a class="btn btn-primary" href="../admin/kategorie/{{$category->id}}/edit" role="button">Zarządzaj</a></td>
          </tr>
        @endforeach
      </tbody>
        @endif
    </table>

  </div>

  <div class="col-sm-6">

    <h5>Dodaj nową kategorię</h5>
    {!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\AdminCategoriesController@store']) !!}
      <div class="form-group">
        {!! Form::label('name', 'Nazwa:') !!}
        {!! Form::text('name', null, ['class'=>'form-control'])!!}
      </div>
      <div class="form-group">
        {!! Form::label('points', 'Ilość punktów:') !!}
        {!! Form::text('points', null, ['class'=>'form-control'])!!}
      </div>
      <div class="form-group" onclick="return confirm('Czy utworzyć nową kategorię?')">
        {!! Form::submit('Utwórz kategorię', ['class'=>'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}

  </div>

</div>

@stop
