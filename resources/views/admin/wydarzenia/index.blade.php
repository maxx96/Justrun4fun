@extends('layouts/admin')

@section('content')

<h2>Lista wydarzeń</h2>
<hr>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Zdjęcie</th>
        <th>Nazwa</th>
        <th>Ocena atmosfery</th>
        <th>Ocena trasy</th>
        <th>Ocena organizacji</th>
        <th>Ocena ogólna</th>
        <th>Ilość opinii</th>
        <th></th><th></th><th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($events as $event)
      <tr>
        <td>{{$event->id}}</td>
        <td><img height="75" width="100%" src="{{ asset($event->photo->file) }}" alt=""></td>
        <td><a href="{{ url('wydarzenia', [$event->slug]) }}">{{$event->title}}</a></td>
        <td>{{ number_format($event->opinions()->avg('atmosphere_rating'), 1) }} / 10.0
        </td>
        <td>{{ number_format($event->opinions()->avg('road_rating'), 1) }} / 10.0
        </td>
        <td>{{ number_format($event->opinions()->avg('organization_rating'), 1) }} / 10.0
        </td>
        <td>{{ number_format($event->opinions()->avg('overall_rating'), 1) }} / 10.0
        </td>
        <td>{{ $event->opinions()->count() }}</td>
        <td>
          @if($event->is_active == 1)
            {!! Form::open(['method'=>'PATCH', 'action'=> ['App\Http\Controllers\AdminEventsController@update', $event->id]]) !!}
              <input type="hidden" name="is_active" value="0">
                <div class="form-group">
                  {!! Form::submit('Archiwizuj', ['class'=>'btn btn-danger']) !!}
                </div>
            {!! Form::close() !!}
          @else
            {!! Form::open(['method'=>'PATCH', 'action'=> ['App\Http\Controllers\AdminEventsController@update', $event->id]]) !!}
              <input type="hidden" name="is_active" value="1">
                <div class="form-group">
                  {!! Form::submit('Aktywuj', ['class'=>'btn btn-success']) !!}
                </div>
            {!! Form::close() !!}
          @endif
        </td>
        <td><a class="btn btn-secondary" href="../admin/opinie/{{$event->id}}" role="button">Opinie</a></td>
        <td><a class="btn btn-info" href="../admin/wydarzenia/{{$event->id}}/edit" role="button">Zarządzaj</a></td>
      </tr>
    </tbody>
        @endforeach
  </table>
</div>

@stop
