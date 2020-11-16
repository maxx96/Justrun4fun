@extends('layouts.app')

@section('content')

<div class="container-fluid">

  <section class="ranking">

    <div class="container">

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Strona główna</a></li>
          <li class="breadcrumb-item active" aria-current="page">Ranking</li>
        </ol>
      </nav>

      <h2>Ranking użytkowników</h2>
      <hr>

      <table class="table">
        <thead>
          <tr>
            <th>Miejsce</th>
            <th></th>
            <th>Użytkownik</th>
            <th>Punkty</th>
          </tr>
        </thead>
        <tbody>
          @php ($i = 1)
          @if($users)
            @foreach($users as $user)
                <tr>
                  <td class="place">
                    @if($i==1)
                      <div>
                        <img src="{{asset('images/podium/1_place.png')}}" alt="" height="40px">
                      </div>
                      @elseif($i==2)
                      <div>
                        <img src="{{asset('images/podium/2_place.png')}}" alt="" height="40px">
                      </div>
                      @elseif($i==3)
                      <div>
                        <img src="{{asset('images/podium/3_place.png')}}" alt="" height="40px">
                      </div>
                      @else
                        {{ $i }}
                    @endif
                  </td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->total_points}}</td>
                </tr>
                @php ($i++)
            @endforeach
          @endif
        </tbody>
      </table>

    </div>

  </section>

</div>

@stop
