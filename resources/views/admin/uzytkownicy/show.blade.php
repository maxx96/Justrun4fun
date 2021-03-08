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
  <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon" type="image/x-icon">
  <link href="{{ asset('images/webclip.png') }}" rel="apple-touch-icon">
</head>
<body>
  <div class="section-navbar">
    <div data-collapse="small" data-animation="over-left" data-duration="400" role="banner" class="navbar w-nav">
      <div class="content w-container">
        <div class="menu">
          <a href="{{ route('index') }}" class="menu-logo w-nav-brand"><img src="{{ asset('images/logo.svg') }}" loading="lazy" alt="" class="menu-logo-image"></a>
          <nav role="navigation" class="nav-menu w-nav-menu">
            <div class="menu-logo-mobile"><img src="{{ asset('images/logo.svg') }}" loading="lazy" alt="" class="logo-mobile-image"></div>
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
            <a href="{{ route('fundacje.index') }}" class="nav-link w-nav-link">Fundacje</a>
          </nav>
          <div class="menu-button w-nav-button"></div>
        </div>
      </div>
    </div>
  </div>

    <div class="section">
        <div class="content w-container">

            <h2 class="section-header">Profil {{$user->email}}</h2>
            <div class="separator"><img src="{{ asset('images/divider.svg') }}" loading="lazy" alt="" class="separator-image"></div>

            @if($user->is_active==0)
            <div class="warning-block">
                <div class="text-block-info">Użytkownik nie jest brany pod uwagę w rankingu.</div>
            </div>
            @endif

            <div class="profil-info">
              <div class="profil-details-div">

                    <div class="profil-info-details">
                        <div class="profil-name">
                            @if(isset($user->firstname))
                            {{$user->firstname}}
                            @endif
                            @if(isset($user->surname))
                            {{$user->surname}}
                            @endif
                        </div>
                        <div class="profil-info-other profil-email-mobile">{{$user->email}}</div>
                        <div class="profil-info-other">
                            @if(isset($user->city))
                            {{$user->city}}
                            @endif
                            @if(isset($user->city) && isset($user->age_category->name))
                            •
                            @endif
                            @if(isset($user->age_category->name))
                            {{$user->age_category->name}}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="profil-info-foundation">
                    @if(!isset($user->foundation->name))
                    <div class="profil-info-other">Jeszcze nie wybrał żadnej fundacji</div>
                    @elseif($collection <= 0) <div class="profil-info-other">Wspiera: <strong
                            class="profil-info-bold-text">{{$user->foundation->name}}</strong></div>
                <div class="profil-info-other">Jeszcze nic nie zebrał</div>
                @else
                <div class="profil-info-other">Wspiera: <strong
                        class="profil-info-bold-text">{{$user->foundation->name}}</strong></div>
                <div class="profil-info-other">Ilość punktów: <strong
                        class="profil-info-bold-text">{{$user->total_points}}</strong></div>
                <div class="profil-info-other">Uzbierał już: <strong
                        class="profil-info-bold-text">{{$collection}}</strong></div>
                @endif
            </div>

            <div>
              <a href="{{ route('uzytkownicy.edit', $user->id)}}" class="button-edit-profile w-button">Edytuj profil</a>
            </div>
        </div>

        <h2 class="section-header">Starty użytkownika</h2>
        <div class="separator"><img src="{{ asset('images/divider.svg') }}" loading="lazy" alt="" class="separator-image"></div>
        <div class="my-events-div">
          <h3 class="my-events-heading">Nadchodzące wydarzenia</h3>
          @if(!$upcomingEvents->isEmpty())
              @foreach($upcomingEvents as $row)
                  <div class="my-event">
                      <div class="my-event-name">
                          <div class="my-event-text">{{ $row->title }}</div>
                      </div>
                      <div class="my-event-date">
                          <div class="my-event-text">{{ $row->event_date }}</div>
                      </div>
                      <div class="my-event-details">
                          <a href="{{ url('wydarzenia', [$row->slug]) }}" class="button-details-event w-button">Szczegóły</a>
                      </div>
                  </div>
              @endforeach
          @else
              <div>
                  <div class="text-block-header">Brak nadchodzących wydarzeń</div>
              </div>
          @endif
      </div>

      <div class="my-events-div">
          <h3 class="my-events-heading">Ukończone wydarzenia</h3>
          @if(!$finishedEvents->isEmpty())
              @foreach($finishedEvents as $row)
                      @if ($row->verification=="Zaakceptowane")
                      <div class="my-event">
                          <div class="my-event-name">
                              <div class="my-event-text">{{ $row->title }}</div>
                          </div>
                          <div class="my-event-date">
                              <div class="my-event-text">{{ $row->event_date }}</div>
                          </div>
                          <div class="my-event-details">
                              <div class="my-event-text">+ {{ $row->points }} pkt</div>
                          </div>
                      </div>
                      @else
                      <div class="my-event">
                          <div class="my-event-name">
                              <div class="my-event-text">{{ $row->title }}</div>
                          </div>
                          <div class="my-event-date">
                              <div class="my-event-text">{{ $row->event_date }}</div>
                          </div>
                          <div class="my-event-details">
                              <a href="{{ url('wydarzenia', [$row->slug]) }}" class="button-details-event w-button">Oczekuje na
                                  opinię</a>
                          </div>
                      </div>
                      @endif
              @endforeach
          @else
          <div>
              <div class="text-block-header">Brak ukończonych wydarzeń</div>
          </div>
      @endif
      </div>
    </div>
    </div>


    </div>
    </div>
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=600c61116aae5f5691a390c2"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/webflow.js') }}" type="text/javascript"></script>
    <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>

</html>