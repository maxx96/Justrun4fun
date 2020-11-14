@extends('layouts/admin')

@section('content')

<h2><a href="/wydarzenia/{{$event->slug}}">Opinie - {{$event->title}}</a></h2>
<hr>

@if(count($data) > 0)

  <table class="table">

    <thead>
      <tr>
        <th>ID</th>
        <th>Autor</th>
        <th>Treść opinii</th>
        <th>Ocena atmosfery</th>
        <th>Ocena trasy</th>
        <th>Ocena organizacji</th>
        <th>Ocena ogólna</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $row)
      <tr>
        <td>{{$row->id}}</td>
        <td>{{$row->author}}</td>
        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Pokaż treść</button>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Treść opinii użytkownika {{$row->author}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$row->body}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
      </div>
    </div>
  </div>
</div>
        </td>
        <td>{{$row->atmosphere_rating}} / 10</td>
        <td>{{$row->road_rating}} / 10</td>
        <td>{{$row->organization_rating}} / 10</td>
        <td>{{$row->overall_rating}} / 10</td>
        @if($row->verification == "Brak")
        <td>
          {!! Form::open(['method'=>'PATCH', 'action'=> ['App\Http\Controllers\EventOpinionsController@updateVerification', $row->id_event_users]]) !!}
            <input type="hidden" name="verification" value="Zaakceptowane">
              <div class="form-group">
                {!! Form::submit('Akceptuj', ['class'=>'btn btn-success']) !!}
              </div>
          {!! Form::close() !!}
        </td>
        <td>
          {!! Form::open(['method'=>'PATCH', 'action'=> ['App\Http\Controllers\EventOpinionsController@updateVerification', $row->id_event_users]]) !!}
            <input type="hidden" name="verification" value="Odrzucone">
              <div class="form-group">
                {!! Form::submit('Odrzuć', ['class'=>'btn btn-danger']) !!}
              </div>
          {!! Form::close() !!}
        </td>
        @elseif($row->verification == "Zaakceptowane")
        <td>
          {!! Form::open(['method'=>'PATCH', 'action'=> ['App\Http\Controllers\EventOpinionsController@updateVerification', $row->id_event_users]]) !!}
            <input type="hidden" name="verification" value="Odrzucone">
              <div class="form-group">
                {!! Form::submit('Odrzuć', ['class'=>'btn btn-danger']) !!}
              </div>
          {!! Form::close() !!}
        </td>
        @elseif($row->verification == "Odrzucone")
        <td>
          {!! Form::open(['method'=>'PATCH', 'action'=> ['App\Http\Controllers\EventOpinionsController@updateVerification', $row->id_event_users]]) !!}
            <input type="hidden" name="verification" value="Zaakceptowane">
              <div class="form-group">
                {!! Form::submit('Akceptuj', ['class'=>'btn btn-success']) !!}
              </div>
          {!! Form::close() !!}
        </td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
@else
  <br>
  <h4 class="text-center">Brak opinii dla wybranego wydarzenia</h4>
@endif

@stop
