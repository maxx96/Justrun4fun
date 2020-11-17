@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <section class="event-details">

    <div class="container">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Strona główna</a></li>
          <li class="breadcrumb-item"><a href="{{ url('wydarzenia') }}">Wydarzenia</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{$event->title}}</li>
        </ol>
      </nav>

      <header>
        @if(Session::has('comment_message'))
          {{session('comment_message')}}
        @endif

        <h2>{{$event->title}}</h2>
        <hr>
      </header>

      @if(Auth::check() && $isParticipate && $event->is_active==0 && !$isGiveOpinion)
      <div class="alert alert-dark" role="alert">

        <!-- Formularz dodawania opinii -->
              <h4>Brałeś udział? Wyraź opinię</h4>

              {!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\EventOpinionsController@store']) !!}
              <input type="hidden" name="event_id" value="{{$event->id}}">
              <label for="atmosphere_rating">Atmosfera</label>
              <input type="range" class="custom-range" min="0" max="10" name="atmosphere_rating">
              <label for="road_rating">Trasa</label>
              <input type="range" class="custom-range" min="0" max="10" name="road_rating">
              <label for="road_rating">Organizacja</label>
              <input type="range" class="custom-range" min="0" max="10" name="organization_rating">
              <label for="overall_rating">Ocena ogólna</label>
              <input type="range" class="custom-range" min="0" max="10" name="overall_rating">
               <div class="form-group">
                      {!! Form::label('body', 'Treść:') !!}
                      {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3])!!}
                </div>
                  <div class="form-group">
                     {!! Form::submit('Prześlij opinię', ['class'=>'btn btn-primary']) !!}
                  </div>
                {!! Form::close() !!}
                @include('includes/error-form')

      </div>

      @endif

        <div class="row">
          <div class="col-md-6">
            <img class="card-img-top" src="{{ asset($event->photo->file) }}"></img>
          </div>
          <div class="col-md-6">
            @if(Auth::check() && ($user->is_active==1) && ($event->is_active==1))
              <a href="{{ route('eventRegistration', [$event->id]) }}">
                <div class="row">
                  @if($isParticipate)
                    <div class="btn btn-primary w-100 btn-danger">
                      <b>Zrezygnuj z udziału</b>
                    </div>
                  @else
                  <div class="btn btn-primary w-100 btn-success">
                    <b>Zapisz się</b>
                  </div>
                  @endif
                </div>
              </a>
              <br>
            @endif
            <table class="table table-striped">
              <tr>
                <td>
                  Status wydarzenia:
                </td>
                <td>
                  @if($event->is_active==0)
                  <span class="event-status-archive">archiwalne</span>
                  @else
                  <span class="event-status-active">aktywne</span>
                  @endif
                </td>
              </tr>
              <tr>
                <td>
                  Data:
                </td>
                <td>
                  <strong>{{ $event->event_date }}</strong>
                </td>
              </tr>
              <tr>
                <td>
                  Miejsce:
                </td>
                <td>
                  <strong>{{ $event->place }}</strong>
                </td>
              </tr>
              <tr>
                <td>
                  Kategoria:
                </td>
                <td>
                  <strong>{{ $event->category->name }}</strong>
                </td>
              </tr>
            </table>
            <ul class="list-group">
              @if(!empty($event->web_page))
                <a href="{{ $event->web_page }}" target="_blank">
                  <li class="list-group-item">
                    <img src="/images/icons/web_page.png" height="20px"></img>
                    <strong>Przejdź do strony wydarzenia</strong>
                  </li>
                </a>
              <br>
              @endif
              @if(!empty($event->fanpage))
              <a href="{{ $event->fanpage }}" target="_blank">
                <li class="list-group-item">
                  <img src="/images/icons/facebook.png" height="20px"></img>
                  <strong>Pokaż wydarzenie na Facebooku</strong>
                </li>
              </a>
              <br>
              @endif
              @if(!empty($event->sign_up))
              <a href="{{ $event->sign_up }}" target="_blank">
                <li class="list-group-item">
                  <img src="/images/icons/sign_up.png" height="20px"></img>
                  <strong>Przejdź do strony z zapisami</strong>
                </li>
              </a>
              @endif
            </ul>
          </div>
        </div>
        <p> {!!$event->body!!} </p>
    </div>

  </section>

</div>

@stop
