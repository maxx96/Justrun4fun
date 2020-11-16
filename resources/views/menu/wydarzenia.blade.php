<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wydarzenia') }}
        </h2>
    </x-slot>

<div class="container-fluid">

  <section class="events">

    <div class="container">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Strona główna</a></li>
        <li class="breadcrumb-item active" aria-current="page">Wydarzenia</li>
      </ol>
    </nav>

    <h2>Wydarzenia</h2>
    <hr>

    <div class="card text-white bg-light mb-3">
      <div class="card-body p-2 px-4">
        <form class="ml-auto" method="get" action="{{ url('wyszukaj') }}">
          <div class="form-row">

            <!-- Nazwa wydarzenia -->
            <div class="input-group col-lg-4 p-1">
              <input class="form-control" type="text" name="title" placeholder="Nazwa wydarzenia" value="{{Request()->title}}">
            </div>

            <!-- Miejsce wydarzenia -->
            <div class="input-group col-lg-4 p-1">
              <input class="form-control" type="text" name="place" placeholder="Miejsce wydarzenia" value="{{Request()->place}}">
            </div>

            <!-- Kategorie -->
            <div class="input-group col-lg-4 p-1">
              <select name="category" class="form-control">
                <option value>Kategoria wydarzenia</option>
                @foreach($categories as $category)
                  @if ($category->id == Request()->category)
                  {
                    <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                  }
                  @else
                  {
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  }
                  @endif
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-row">
            <!-- Początek zakresu dat -->
            <div class="input-group col-lg-4 p-1">
              <div class="input-group-prepend">
                <div class="input-group-text">Od</div>
              </div>
              <input class="form-control" name="from_date" type="date" value={{Request()->from_date}}>
            </div>

            <!-- Koniec zakresu dat -->
            <div class="input-group col-lg-4 p-1">
              <div class="input-group-prepend">
                <div class="input-group-text">Do</div>
              </div>
              <input class="form-control" name="to_date" type="date" value={{Request()->to_date}}>
            </div>

            <!-- Przycisk -->
            <div class="input-group col-lg-4 p-1">
              <button class="form-control btn btn-info" type="submit">Filtruj wydarzenia</button>
            </div>

          </div>
        </form>
      </div>
    </div>

    @if(count($events) > 0)

      @foreach($events as $key => $event)
        @if($key%3 == 0)
          <div class="row">
        @endif
        <div class="col-md-4">
          <div class="recommended-events">
          <a href="{{ url('wydarzenia', [$event->slug]) }}" >
          <img src="{{$event->photo->file}}">
            <div class="recommended-events-description">
              <h5>{{$event->title}}</h5>
              <div class="row">
                <div class="col-lg-1 icons">
                  <img src="{{asset('images/icons/calendar.png')}}" alt="">
                </div>
                <div class="col-lg-5 info">
                  {{$event->event_date}}
                </div>
                <div class="col-lg-1 icons">
                  <img src="{{asset('images/icons/list.png')}}" alt="">
                </div>
                <div class="col-lg-5 info">
                  {{$event->category->name}}
                </div>
              </div>
            </div>
          </a>
        </div>
        </div>
        @if($key%3 == 2)
          </div>
        @endif
      @endforeach

    @else

      <br>
      <h3 class="text-center">Brak wydarzeń</h3>

    @endif

    </div>

  </section>

</div>

</x-app-layout>