@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_user'))
  <p class="bg-danger">{{session('deleted_user')}}</p>
@endif

<h2>Lista użytkowników</h2>
<hr>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Zdjęcie</th>
      <th>E-mail</th>
      <th>Rola</th>
      <th>Ranking</th>
      <th>Utworzony</th>
      <th>Edytowany</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @if($users)
      @foreach($users as $user)
    <tr>
      <td>{{$user->id}}</td>
      <td><img height="50" src="{{ $user->photo ? asset($user->photo->file) : asset('../public/images/no_image.png') }}" alt=""></td> <!--warunek sprawdzający czy użytkownik posiada zdjęcie -->
      <td>{{$user->email}}</td>
      <td>{{$user->role->name}}</td>
      <td>{{$user->is_active == 1 ? 'Aktywny' : 'Nieaktywny'}}</td>
      <td>{{$user->created_at->diffForHumans()}}</td>
      <td>{{$user->updated_at->diffForHumans()}}</td>
      <td><a class="btn btn-success" href="{{ url('admin/uzytkownicy', [$user->id]) }}" role="button">Profil</a></td>
    </tr>
  </tbody>
      @endforeach
    @endif
</table>

@stop
