<!DOCTYPE html>
<html data-wf-page="6013ca16cfbaea78ee924207" data-wf-site="600c61116aae5f5691a390c2">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
  <link href="{{ asset('css/webflow.css') }}" rel="stylesheet">
  <link href="{{ asset('css/justrun4fun.webflow.css') }}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script type="text/javascript">
      WebFont.load({
        google: {
          families: ["Poppins:200italic,300,regular,500,600,700:latin,latin-ext"]
        }
      });
    </script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">
      ! function(o, c) {
        var n = c.documentElement,
          t = " w-mod-";
        n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
      }(window, document);
    </script>
  <link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">
  <link href="{{ asset('images/webclip.png') }}" rel="apple-touch-icon">
</head>
<body>
  <div class="section-navbar">
    <div data-collapse="small" data-animation="over-left" data-duration="400" role="banner" class="navbar w-nav">
      <div class="content w-container">
        <div class="menu">
          <a href="{{ route('index') }}" class="menu-logo w-nav-brand"><img src="{{ asset('images/Group-532.png') }}" loading="lazy" alt="" class="menu-logo-image"></a>
          <nav role="navigation" class="nav-menu w-nav-menu">
            <div class="menu-logo-mobile"><img src="{{ asset('images/Group-532.png') }}" loading="lazy" alt="" class="logo-mobile-image"></div>
            <a href="{{ route('admin.index') }}" aria-current="page" class="nav-link w-nav-link">Panel główny</a>
            <div data-hover="" data-delay="0" class="dropdown w-dropdown">
              <div class="nav-link w-dropdown-toggle">
                <div class="icon-arrow w-icon-dropdown-toggle"></div>
                <div class="nav-link-submenu">Użytkownicy</div>
              </div>
              <nav class="dropdown-list w-dropdown-list">
                <div class="submenu">
                  <a href="{{ route('uzytkownicy.index') }}" class="submenu-block w-inline-block">
                    <div class="submenu-text-block">
                      <h4 class="submenu-heading">Lista użytkowników</h4>
                    </div>
                  </a>
                  <a href="{{ route('uzytkownicy.create') }}" class="submenu-block w-inline-block">
                    <div class="submenu-text-block">
                      <h4 class="submenu-heading">Dodaj nowego</h4>
                    </div>
                  </a>
                </div>
              </nav>
            </div>
            <div data-hover="" data-delay="0" class="dropdown w-dropdown">
              <div class="nav-link w-dropdown-toggle">
                <div class="icon-arrow w-icon-dropdown-toggle"></div>
                <div class="nav-link-submenu">Wydarzenia</div>
              </div>
              <nav class="dropdown-list w-dropdown-list">
                <div class="submenu">
                  <a href="{{ route('wydarzenia.index') }}" class="submenu-block w-inline-block">
                    <div class="submenu-text-block">
                      <h4 class="submenu-heading">Lista wydarzeń</h4>
                    </div>
                  </a>
                  <a href="{{ route('wydarzenia.create') }}" class="submenu-block w-inline-block">
                    <div class="submenu-text-block">
                      <h4 class="submenu-heading">Dodaj nowe</h4>
                    </div>
                  </a>
                </div>
              </nav>
            </div>
            <a href="{{ route('kategorie.index') }}" class="nav-link w-nav-link">Kategorie</a>
            <a href="{{ route('fundacje.index') }}" class="nav-link w-nav-link w--current">Fundacje</a>
          </nav>
          <div class="menu-button w-nav-button"></div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="section">
    <div class="content w-container">
      <h2 class="section-header">Fundacje</h2>
      <div class="separator"><img src="{{ asset('images/Line-11.png') }}" loading="lazy" alt="" class="separator-image"></div>
      @if($foundations)
        <div class="list-user-div">
          <div>
            <div class="w-layout-grid grid-foundation-header">
              <div>ID</div>
              <div>Nazwa</div>
            </div>
          </div>
        @foreach($foundations as $foundation)
          <div>
            <div class="w-layout-grid grid-foundation-content">
              <div class="list-event-text">{{$foundation->id}}</div>
              <div class="list-event-text">{{$foundation->name}}<br></div>
              <a href="../admin/fundacje/{{$foundation->id}}/edit" class="list-user-text list-user-text-link">Zarządzaj</a>
            </div>
          </div>
          @endforeach
        </div>
      @endif

      <h2 class="section-header">Dodaj fundację</h2>
      <div class="separator"><img src="{{ asset('images/Line-11.png') }}" loading="lazy" alt="" class="separator-image"></div>
      <div class="w-form">
        @csrf
        {!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\FoundationController@store']) !!}
          <form id="email-form" name="email-form" data-name="Email Form">
            <div>
              {!! Form::label('nazwa', 'Nazwa:', ['class'=>'form-profile-field-label']) !!}
              {!! Form::text('name', null, ['class'=>'form-profile-text-field w-input'])!!}
              {!! Form::submit('Utwórz fundację', ['class'=>'submit-button w-button']) !!}
            </div>
          </form>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=600c61116aae5f5691a390c2" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/webflow.js') }}" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>
