<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Panel administracyjny</title>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
  </head>

  <body>
    <header>
      <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="collapse navbar-collapse" id="mainmenu">

          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('admin/') }}">Panel główny</a>
            </li>
            <li class="nav-item dropdown">
                  <a class="dropdown-item" href="{{ url('admin/uzytkownicy/') }}">Lista użytkowników</a>
                  <a class="dropdown-item" href="{{ url('admin/uzytkownicy/create') }}">Dodaj nowego</a>
            </li>
                  <a class="dropdown-item" href="{{ url('admin/wydarzenia') }}">Lista wydarzeń</a>
                  <a class="dropdown-item" href="{{ url('admin/wydarzenia/create') }}">Dodaj nowe</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('admin/kategorie') }}">Kategorie</a>
            </li>
          </ul>

          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/logout">Wyloguj</a>
            </li>
          </ul>

        </div>
      </nav>
    </header>

    <div class="admin-page">
    <div class="container-fluid">
      <div class="container">
        @yield('content')
      </div>
    </div>
  </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>CKEDITOR.replace('article-ckeditor');</script>

  </body>
</html>
