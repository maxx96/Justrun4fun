<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sat Jan 30 2021 15:56:29 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="6012dfb42ada036d35de40d0" data-wf-site="600c61116aae5f5691a390c2">

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
            ! function (o, c) {
                var n = c.documentElement,
                    t = " w-mod-";
                n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n
                    .className += t + "touch")
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
                    <a href="{{ route('index') }}" aria-current="page" class="menu-logo w-nav-brand w--current"><img
                            src="{{ asset('images/logo.svg') }}" loading="lazy" alt="" class="menu-logo-image"></a>
                    <nav role="navigation" class="nav-menu w-nav-menu">
                        <div class="menu-logo-mobile"><img src="{{ asset('images/logo.svg') }}" loading="lazy" alt=""
                                class="logo-mobile-image"></div>
                        <a href="{{ route('wydarzenia') }}" class="nav-link w-nav-link w--current">Wydarzenia</a>
                        <a href="{{ route('ranking') }}" class="nav-link w-nav-link">Ranking</a>
                        <a href="{{ route('fundacje') }}" class="nav-link w-nav-link">Fundacje</a>
                        <div data-hover="" data-delay="0" class="dropdown w-dropdown">
                            <div class="nav-link w-dropdown-toggle">
                                <div class="icon-arrow w-icon-dropdown-toggle"></div>
                                <div class="nav-link-submenu">Pomoc</div>
                            </div>
                            <nav class="dropdown-list w-dropdown-list">
                                <div class="submenu">
                                    <a href="{{ route('faq') }}" class="submenu-block w-inline-block"><img
                                            src="{{ asset('images/faq-icon.svg') }}" loading="lazy" alt="" class="submenu-icon">
                                        <div class="submenu-text-block">
                                            <h4 class="submenu-heading">FAQ</h4>
                                            <div class="submenu-text">Pytania i odpowiedzi<br>‍</div>
                                        </div>
                                    </a>
                                    <a href="https://www.facebook.com/" target="_blank"
                                        class="submenu-block w-inline-block"><img src="{{ asset('images/chat-icon.svg') }}"
                                            loading="lazy" alt="" class="submenu-icon">
                                        <div class="submenu-text-block">
                                            <h4 class="submenu-heading">Czat</h4>
                                            <div class="submenu-text">Skontaktuj się z nami przez Messanger</div>
                                        </div>
                                    </a>
                                </div>
                            </nav>
                        </div>
                    </nav>

                    @if (Route::has('login'))
                    @auth

                    <form method="POST" action="{{ route('logout') }}">

                        <div class="button-nav-div">
                            @csrf
                            <a href="{{ route('logout') }}" class="submit-button navbar-button w-button" onclick="event.preventDefault();
                      this.closest('form').submit();">Wyloguj</a>
                    </form>
                    <a href="{{ route('profil.index') }}" aria-current="page"
                        class="submit-button navbar-button w-button w--current">Mój profil</a>

                </div>
                @else
                <a href="{{ route('login') }}" class="submit-button navbar-button w-button">Zaloguj</a>
                @endif
                @endif

            </div>
            <div class="menu-button w-nav-button"></div>
        </div>
    </div>
    </div>

  <div class="section section-height-100">
    <div class="content w-container">
      <h2 class="section-header">Wydarzenia</h2>
      <div class="separator"><img src="images/divider.svg" loading="lazy" alt="" class="separator-image"></div>
      <div class="event-div">
        <div class="event-search">

          <form class="ml-auto" method="get" action="{{route('filterSearch')}}">
            @csrf
            <div class="w-layout-grid grid-event-search">

                <div class="w-form">
                    
                   <input type="text" class="event-search-textbox w-input" maxlength="256" name="title" data-name="title" placeholder="Szukaj po nazwie..." 
                    id="title" value="{{Request()->title}}">

                      <input class="event-search-textbox w-input" type="text" id="place" name="place" placeholder="Szukaj po mieście..." 
                      maxlength="256" name="place" data-name="place" value="{{Request()->place}}">

                    <select id="category" name="category" data-name="category" class="event-search-textbox w-input event-search-mobile">
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

                      <input class="event-search-textbox w-input" name="from_date" type="date" placeholder="Szukaj po dacie od" value={{Request()->from_date}}>

                      <input class="event-search-textbox w-input" name="to_date" type="date" placeholder="Szukaj po dacie do" value={{Request()->to_date}}>
                    
                  <input type="submit" value="Filtruj wydarzenia" data-wait="Please wait..." class="button-submit-outside button-event w-button">
                  </div>
            </div>
          </form>
        </div>

        @if(count($events) > 0)
          <div class="event-list">
            <div class="w-layout-grid grid-event-list">
              @foreach($events as $key => $event)
                <a id="w-node-a903487a5e14-83de40d1" href="{{ url('wydarzenia', [$event->slug]) }}" class="event-list-link-block w-inline-block">
                  <div class="event-list-div-image"><img src="{{$event->photo->file}}" loading="lazy" alt="" class="event-image"></div>
                  <div class="event-date-div">
                    <div class="event-date-text">{{$event->event_date}}</div>
                  </div>
                  <div class="event-title-div">
                    <div class="event-title-text">{{$event->title}}</div>
                  </div>
                  <div class="event-category-div event-category-list">
                    <div class="event-category">
                      <div class="event-category-text">{{$event->category->name}}</div>
                    </div>
                  </div>
                </a>
              @endforeach
            </div>
            @include('includes/pagination', ['pagination' => $events])
          </div>
        @else
        <div>
          <div class="text-block-header-events">Brak wydarzeń</div>
        </div>
        @endif

      </div>
    </div>
  </div>

  @if(!Auth::check())
  <div class="section-cta">
    <div class="cta-block">
        <div class="cta-text">Sprawdź nasz serwis w akcji i</div>
        <a href="{{ route('login') }}" class="cta-button w-button">dołącz teraz</a>
    </div>
</div>
  @endif

  <div class="section-footer">
    <div class="content w-container">
        <div class="footer-content">
            <div class="footer-first"><img src="images/logo-footer.svg" alt="" class="footer-image">
                <div class="footer-first-block">
                    <div class="footer-first-heading">Dlaczego justrun4.fun?</div>
                    <div class="footer-first-text">Dbamy o motywację biegaczy oraz łączymy przyjemne z pożytecznym.
                    </div>
                </div>
            </div>
            <div class="footer-second">
                <h2 class="footer-second-heading">justrun4.fun</h2>
                <ul role="list" class="w-list-unstyled">
                    <li>
                        <a href="{{ route('fundacje') }}" class="footer-link">O fundacjach</a>
                    </li>
                    <li>
                        <a href="{{ route('regulation') }}" class="footer-link">Regulamin</a>
                    </li>
                    <li>
                        <a href="{{ route('privacyPolicy') }}" class="footer-link">Polityka prywatności</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="footer-second-heading">Kontakt</h2>
                <ul role="list" class="w-list-unstyled">
                    <li>
                        <a href="https://www.facebook.com/" target="_blank" class="footer-link">Czat na
                            Messangerze</a>
                    </li>
                    <li>
                        <a href="mailto:obsluga@justrun4.fun?subject=Zg%C5%82oszenie%20z%20justrun4.fun"
                            class="footer-link">obsluga@justrun4.fun</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer-copyright">
            <div>
              <div class="footer-copyright-text">© {{ date('Y') }} justrun4.fun</div>
            </div>
            <div class="footer-social-media">
                <a href="https://www.facebook.com/" target="_blank" class="w-inline-block"><img
                        src="{{ asset('images/facebook-icon.svg') }}" loading="lazy" alt="" class="icon-facebook"></a>
                <a href="https://www.linkedin.com/" target="_blank" class="w-inline-block"><img
                        src="{{ asset('images/linkedin-icon.svg') }}" loading="lazy" alt="" class="icon-linkedin"></a>
            </div>
        </div>
    </div>
</div>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=600c61116aae5f5691a390c2"
    type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
</script>
<script src="js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>

</html>