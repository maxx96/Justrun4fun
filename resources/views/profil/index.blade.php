@extends('layouts.app')

@section('content')

<section class="profil">

  <div class="container">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Strona główna</a></li>
      <li class="breadcrumb-item active" aria-current="page">Mój profil</li>
    </ol>
  </nav>

  @if($user->is_active==0)
    <div class="alert alert-warning" role="alert">
      <u>UWAGA!</u> Nie jesteś brany pod uwagę w rankingu, ponieważ posiadasz niepełne dane na swoim profilu. Uzupełnij je!<br>
      W przeciwnym wypadku administrator nie zweryfikuje zawodów, w których brałeś udział.
    </div>
  @endif

    <h2>Mój profil</h2>
    <hr>

    <div class="row">
      <div class="col-lg-2">
        <img src="{{$user->photo->file}}" alt="" width=100% class="rounded-circle"><br><br>
        <a class="btn btn-primary btn-lg btn-block" href="../public/profil/{{$user->id}}/edit" role="button">Edytuj profil</a><br><br>
      </div>
      <div class="col-lg-5 col-md-12">
        <table class="table table-striped profile-data">
            <tr>
            @if(!isset($user->foundation->name))
              <th>Jeszcze nie wybrałeś żadnej fundacji</th>
            @elseif($collection <= 0)
            <th>Twoja fundacja to {{$user->foundation->name}}</th>
            <th>Jeszcze nic nie zebrałeś</th>
            @else
            <th>Twoja fundacja to {{$user->foundation->name}}</th>
              <th>Zebrałeś już:</th>
              <td>{{$collection}} zł</td>
            @endif
            </tr>
            <tr>
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
      <div class="col-lg-5">
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

    @if(isset($user->total_points))
      <h2>Moje starty</h2>
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

  </div>

</section>

</div>

@stop
