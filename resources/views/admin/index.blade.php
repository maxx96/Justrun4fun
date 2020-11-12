@extends('layouts/admin')

@section('content')

<h2>Witaj w panelu administracyjnym</h2>
<hr>

<div class="admin-index">
  <h5>Zarządzaj użytkownikami</h5>
  <div class="row separator">
    <div class="col-md-12">
      <a class="btn btn-secondary btn-block" href="/admin/uzytkownicy" role="button">Przejdź do listy użytkowników</a>
    </div>
  </div>
  <div class="row separator">
    <div class="col-md-12">
      <a class="btn btn-secondary btn-block" href="/admin/uzytkownicy/create" role="button">Dodaj użytkownika</a>
    </div>
  </div>
</div>

<div class="admin-index">
  <h5>Zarządzaj wydarzeniami</h5>
  <div class="row separator">
    <div class="col-md-12">
      <a class="btn btn-secondary btn-block" href="/admin/wydarzenia" role="button">Przejdź do listy wydarzeń</a>
    </div>
  </div>
  <div class="row separator">
    <div class="col-md-12">
      <a class="btn btn-secondary btn-block" href="/admin/wydarzenia/create" role="button">Dodaj nowe wydarzenie</a>
    </div>
  </div>
</div>

<div class="admin-index">
  <h5>Zarządzaj kategoriami</h5>
  <div class="row separator">
    <div class="col-md-12">
      <a class="btn btn-secondary btn-block" href="/admin/kategorie" role="button">Przejdź do listy kategorii</a>
    </div>
  </div>
</div>

@stop
