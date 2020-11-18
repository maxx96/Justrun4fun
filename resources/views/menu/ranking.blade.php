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
                        1
                      </div>
                      @elseif($i==2)
                      <div>
                        2
                      </div>
                      @elseif($i==3)
                      <div>
                        3
                      </div>
                      @else
                        {{ $i }}
                    @endif
                  </td>
                    @php ($front_email = substr($user->email, 0, 3))
                    @php ($end_email = substr($user->email, strpos($user->email, "@"))) 
                    @php ($user->email = $front_email . "..." . $end_email)
                  <td>{{$user->email}}</td>
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
