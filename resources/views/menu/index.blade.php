@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <header id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000" data-pause="false">
      <!-- Indicators -->
      <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <a href="https://biegambolubie.com.pl/" target="_blank">
              <img class="d-block w-100" src="/images/slider/slajd1.jpg" alt="First slide">
            </a>
          </div>
          <div class="carousel-item">
            <a href="https://ideepharm.pl/produkty/wyroby-medyczne/podologic-sport/" target="_blank">
              <img class="d-block w-100" src="/images/slider/slajd2.jpg" alt="Second slide">
            </a>
          </div>
          <div class="carousel-item">
            <a href="https://www.strefanadruku.pl/koszulki-biegowe-z-nadrukiem/" target="_blank">
            <img class="d-block w-100" src="/images/slider/slajd3.jpg" alt="Trzecie slide">
          </a>
          </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="sr-only">Next</span>
      </a>
  </header>

  <section class="events">

    <div class="container">

      @if(!$events -> isEmpty())
        <h2>Polecane wydarzenia</h2>
        <hr>
          <div class="row">
            @foreach($events as $event)
          <div class="col-lg-4">
            <div class="recommended-events">
            <a href="{{ url('wydarzenia', [$event->slug]) }}" >
            <img src="{{$event->photo->file}}">
              <div class="recommended-events-description">
                <h5>{{$event->title}}</h5>
                <div class="row">
                  <div class="col-md-1 icons">
                    <img src="{{asset('images/icons/calendar.png')}}" alt="">
                  </div>
                  <div class="col-md-5 info">
                    {{$event->event_date}}
                  </div>
                  <div class="col-md-1 icons">
                    <img src="{{asset('images/icons/list.png')}}" alt="">
                  </div>
                  <div class="col-md-5 info">
                    {{$event->category->name}}
                  </div>
                </div>
              </div>
            </a>
          </div>
          </div>
          @endforeach
        </div>
      @endif

    </div>

  </section>

  <section class="cta">

    <div class="row">

      <div class="col-xl-6 left-cta">
        <h3><strong>Jesteś biegaczem?</strong></h3>
        <p>Sprawdź się i dołącz do rywalizacji o wspaniałe nagrody</p>
        <a class="btn btn-outline-dark" href="/ranking"><strong>Pokaż szczegóły</strong></a>
        <img src="{{asset('images/icons/cta/trophy.png')}}" alt="">
      </div>

      <div class="col-xl-6 right-cta">
          <div class="right-top-cta" height="250px">
            <h3><strong>Szukasz zawodów?</strong></h3>
            <p>Przejrzyj nasze aktualne wydarzenia w regionie</p>
            <a class="btn btn-outline-dark" href="/wydarzenia"><strong>Pokaż szczegóły</strong></a>
            <img src="{{asset('images/icons/cta/all_events.png')}}" alt="">
          </div>
          <div class="right-bottom-cta" height="250px">
            <h3><strong>Masz pytania?</strong></h3>
            <p>Sprawdź, jak działa strona lub napisz do nas</p>
            <a class="btn btn-outline-dark" href="/faq"><strong>Pokaż szczegóły</strong></a>
            <img src="{{asset('images/icons/cta/go-to.png')}}" alt="">
          </div>
      </div>

    </div>

  </section>

  <section class="statistic">

    <div class="container">

      <h2>Statystyki</h2>
      <hr>
      <div class="row">

        <div class="col-lg-4 one_statistic">
          <img src="{{asset('images/icons/statistic/users.png')}}" alt="">
          <h4>{{$count_users}}</h4>
          <p>biegaczy</p>
        </div>
        <div class="col-lg-4 one_statistic">
          <img src="{{asset('images/icons/statistic/active_events.png')}}" alt="">
          <h4>{{$count_events}}</h4>
          <p>wydarzeń</p>
        </div>
        <div class="col-lg-4 one_statistic">
          <img src="{{asset('images/icons/statistic/partners.png')}}" alt="">
          <h4>4</h4>
          <p>partnerów</p>
        </div>

      </div>

    </div>

  </section>

  <section class="partners">

    <div class="container">

      <h2>Partnerzy</h2>
      <hr>
      <div class="row">
        <div class="card col-md-3">
          <div class="partner_logos">
            <a href="https://azs.po.opole.pl/" target="_blank">
              <img src="{{asset('images/partners/azs.png')}}" alt="">
            </a>
          </div>
        </div>
        <div class="card col-md-3">
          <div class="partner_logos">
            <a href="http://mosir.opole.pl/" target="_blank">
              <img src="{{asset('images/partners/mosir.png')}}" alt="">
            </a>
          </div>
        </div>
        <div class="card col-md-3">
          <div class="partner_logos">
            <a href="https://www.parkrun.pl/opole/" target="_blank">
              <img src="{{asset('images/partners/parkrun.png')}}" alt="">
            </a>
          </div>
        </div>
        <div class="card col-md-3">
          <div class="partner_logos">
            <a href="http://tkkf.opole.pl/" target="_blank">
              <img src="{{asset('images/partners/krzewienie-kultury-fizycznej.png')}}" alt="">
            </a>
          </div>
        </div>
      </div>

    </div>

  </section>

</div>

@stop
