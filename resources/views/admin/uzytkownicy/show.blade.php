@extends('layouts/admin')

@section('content')

<h2>Profil - {{$user->email}}</h2>
<hr>

<div class="row">
  <div class="col-lg-2">
    <img src="{{$user->photo ? $user->photo->file : '/images/no_image.png'}}" alt="" class="img-responsive img-rounded" width=100%><br><br>
    <a class="btn btn-primary btn-lg btn-block" href="../uzytkownicy/{{$user->id}}/edit" role="button">Edytuj profil</a><br><br>
  </div>
  <div class="col-lg-5 col-md-12">
    <table class="table table-striped profile-data">
        <tr>
          <th>E-mail:</th>
          <td>{{$user->email}}</td>
        </tr>
        <tr>
          <th>Imię:</th>
          <td>
            @if(isset($user->firstname))
              {{$user->firstname}}
            @else
              brak
            @endif
          </td>
        </tr>
        <tr>
          <th>Nazwisko:</th>
          <td>
            @if(isset($user->surname))
              {{$user->surname}}
            @else
              brak
            @endif
          </td>
        </tr>
        <tr>
          <th>Data urodzenia:</th>
          <td>
            @if(isset($user->date_of_birth))
              {{$user->date_of_birth}}
            @else
              brak
            @endif
          </td>
        </tr>
    </table>
  </div>
  <div class="col-lg-5 col-md-12">
    <table class="table table-striped profile-data">
      <tr>
        <th>Płeć:</th>
        <td>
          @if(isset($user->sex))
            {{$user->sex}}
          @else
            brak
          @endif
        </td>
      </tr>
      <tr>
        <th>Miasto:</th>
        <td>
          @if(isset($user->city))
            {{$user->city}}
          @else
            brak
          @endif
        </td>
      </tr>
      <tr>
        <th>Kraj:</th>
        <td>
          @if(isset($user->country))
            {{$user->country}}
          @else
            brak
          @endif
        </td>
      </tr>
      <tr>
        <th>Klub sportowy:</th>
        <td>
          @if(isset($user->club))
            {{$user->club}}
          @else
            brak
          @endif
        </td>
      </tr>
      @if(isset($user->total_points))
        <tr>
          <th>Punkty rankingowe:</th>
          <td>
              {{$user->total_points}}
          </td>
        </tr>
      @endif
    </table>
  </div>
</div>

@if($user->is_active==1)
  <h2>Starty - {{$user->email}}</h2>
  <hr>
  <div class="my_events">
      <div class="row">
        <div class="col-md-4 list-group-item list-group-item-action">
          Aktualne
        </div>
        <div class="col-md-4 list-group-item list-group-item-action list-group-item-warning">
          W trakcie weryfikacji
        </div>
        <div class="col-md-4 list-group-item list-group-item-action list-group-item-success">
          Poprawnie zweryfikowane
        </div>
      </div>

      <div class="row">
          @foreach($data as $row)
            @if ($row->is_active==1)
              <a href="{{ url('wydarzenia', [$row->slug]) }}" class="list-group-item list-group-item-action">
                <div class="row">
                  <div class="col-md-3">
                    {{ $row->event_date }}
                  </div>
                  <div class="col-md-3">
                    <strong>{{ $row->title }}</strong>
                  </div>
                  <div class="col-md-3">
                    {{ $row->place }}
                  </div>
                  <div class="col-md-3">
                  </div>
                </div>
              </a>
            @endif

            @if ($row->is_active==0)
              @if ($row->verification=="Zaakceptowane")
                <a href="{{ url('wydarzenia', [$row->slug]) }}" class="list-group-item list-group-item-action list-group-item-success">
              @else
                <a href="{{ url('wydarzenia', [$row->slug]) }}" class="list-group-item list-group-item-action list-group-item-warning">
              @endif
              <div class="row">
                <div class="col-md-3">
                  {{ $row->event_date }}
                </div>
                <div class="col-md-3">
                  <strong>{{ $row->title }}</strong>
                </div>
                <div class="col-md-3">
                  {{ $row->place }}
                </div>
                <div class="col-md-3">
                  Ilość punktów: <strong>{{ $row->points }}</strong>
                </div>
              </div>
              </a>
            @endif

          @endforeach
      </div>
  </div>

@endif

@stop
