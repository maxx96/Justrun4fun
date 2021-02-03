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
        <link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">
        <link href="{{ asset('images/webclip.png') }}" rel="apple-touch-icon">
    </head>
    <body>
      <div class="section-navbar">
          <div data-collapse="small" data-animation="over-left" data-duration="400" role="banner" class="navbar w-nav">
              <div class="content w-container">
                  <div class="menu">
                      <a href="{{ route('index') }}" aria-current="page" class="menu-logo w-nav-brand w--current"><img
                              src="{{ asset('images/Group-532.png') }}" loading="lazy" alt="" class="menu-logo-image"></a>
                      <nav role="navigation" class="nav-menu w-nav-menu">
                          <div class="menu-logo-mobile"><img src="{{ asset('images/Group-532.png') }}" loading="lazy" alt=""
                                  class="logo-mobile-image"></div>
                          <a href="{{ route('wydarzenia') }}" class="nav-link w-nav-link">Wydarzenia</a>
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
                                              src="{{ asset('images/ikona-faq.png') }}" loading="lazy" alt="" class="submenu-icon">
                                          <div class="submenu-text-block">
                                              <h4 class="submenu-heading">FAQ</h4>
                                              <div class="submenu-text">Pytania i odpowiedzi<br>‍</div>
                                          </div>
                                      </a>
                                      <a href="https://www.facebook.com/" target="_blank"
                                          class="submenu-block w-inline-block"><img src="{{ asset('images/ikona-czat.png') }}"
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
      <div class="section">
        <div class="content w-container">
          <h2 class="section-header">{{ $event->title }}</h2>
          <div class="separator"><img src="{{ asset('images/Line-11.png') }}" loading="lazy" alt="" class="separator-image"></div>
            <div class="div-block">
              @if(Session::has('comment_message'))
              {{session('comment_message')}}
              @endif
              @if(Auth::check() && $isParticipate && $event->is_active==0 && !$isGiveOpinion)
              <div class="w-form">
                <form id="wf-form-opinions-form" name="wf-form-opinions-form" data-name="opinions-form" class="form-opinions">
                {!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\EventOpinionsController@store']) !!}
                  <div class="form-opinions-text">Chętnie poznamy Twoje zdanie na temat wydarzenia, w którym uczestniczyłeś :)</div>
                  <div class="form-opinions-rules">* wypełnienie ankiety jest wymagane do przyznania punktów rankingowych dla użytkownika.</div>
                  <div class="w-embed">
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                    <label for="atmosphere_rating" class="form-label">Atmosfera</label>
                    <input type="range" class="custom-range form-range" min="0" max="10" name="atmosphere_rating">
                    <label for="road_rating" class="form-label">Trasa</label>
                    <input type="range" class="custom-range form-range" min="0" max="10" name="road_rating">
                    <label for="organization_rating" class="form-label">Organizacja</label>
                    <input type="range" class="custom-range form-range" min="0" max="10" name="organization_rating">
                    <label for="overall_rating" class="form-label">Ocena ogólna</label>
                    <input type="range" class="custom-range form-range" min="0" max="10" name="overall_rating">
                  </div>
                  {!! Form::label('body', 'Treść:', ['class'=>'form-profile-field-label']) !!}
                  {!! Form::textarea('body', null, ['class'=>'form-opinions-textarea w-input','rows'=>3])!!}
                    {!! Form::submit('Prześlij opinię', ['class'=>'button-submit-outside w-button']) !!}
                    {!! Form::close() !!}
                    @include('includes/error-form')
                </form>
              </div>
              @endif

            </div>
          <div class="event-info">
            <div class="event-details-image-div">
              <img src="{{ asset($event->photo->file) }}" loading="lazy" alt="" class="event-details-image">
            </div>
            <div class="event-details-div">
              @if(Auth::check() && ($user->is_active==1) && ($event->is_active==1))
                @if(!$isParticipate)
                <a href="{{ route('eventRegistration', [$event->id]) }}" class="button-event-join w-inline-block">
                  <div class="button-event-join-text">Biorę Udział!</div>
                </a>
                @else
                <a href="{{ route('eventRegistration', [$event->id]) }}" class="button-event-delete w-inline-block">
                  <div class="button-event-delete-text">Usuń wydarzenie z mojej listy startów</div>
                </a>
                @endif
              @endif

              <div class="event-details">
                <div class="event-details-info">
                  <div class="w-layout-grid grid-event-details">
                    <div class="button-link-outside category-maraton">
                      <div class="category-text kategoria">{{ $event->category->name }}</div>
                    </div>
                    <div class="button-link-outside time-and-place">
                      <div class="date-event-text">{{ $event->event_date }}</div>
                    </div>
                    <div class="button-link-outside time-and-place">
                      <div class="date-event-text">{{ $event->place }}</div>
                    </div>
                  </div>
                </div>
                <div class="event-details-second">
                  <div class="w-layout-grid grid-event-details">
                    @if(!empty($event->web_page))
                    <a href="{{ $event->web_page }}" target="_blank" class="button-link-outside w-inline-block">
                      <div class="date-event-text">Strona wydarzenia</div>
                    </a>
                    @endif
                    @if(!empty($event->fanpage))
                    <a href="{{ $event->fanpage }}" target="_blank" class="button-link-outside w-inline-block">
                      <div class="date-event-text">Fan page</div>
                    </a>
                    @endif
                    @if(!empty($event->sign_up))
                      <a href="{{ $event->sign_up }}" target="_blank" class="button-link-outside w-inline-block">
                      <div class="date-event-text">Zapisy</div>
                    </a>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="shapes-div"><img src="{{ asset('images/Group-366.png') }}" loading="lazy" alt="" class="shapes-image"></div>
          </div>
          <div class="participation-info">
            <div class="text-block-header">Biorąc udział w wydarzeniu:</div>
            <div class="list-div">
              <div class="list-div-icon"><img src="{{ asset('images/check-svgrepo-com.png') }}" loading="lazy" alt="" class="list-icon"></div>
              <div class="list-div-text">
                <div class="list-text">przekazujesz 5 zł na Fundacja DOM</div>
              </div>
            </div>
            <div class="list-div">
              <div class="list-div-icon"><img src="{{ asset('images/check-svgrepo-com.png') }}" loading="lazy" alt="" class="list-icon"></div>
              <div class="list-div-text">
                <div class="list-text">otrzymujesz {{ $event->category->points}} pkt do rankingu i walczysz o wspaniałe nagrody</div>
              </div>
            </div>
            <div class="list-div">
              <div class="list-div-icon"><img src="{{ asset('images/check-svgrepo-com.png') }}" loading="lazy" alt="" class="list-icon"></div>
              <div class="list-div-text">
                <div class="list-text">masz wpływ na organizację przyszłych zawodów</div>
              </div>
            </div>
          </div>
          <div class="participants-opinions">
            <div class="text-block-header">Opinie uczestników o wydarzeniu</div>
            <div class="w-layout-grid grid-participants-opinions">
              <div class="opinions-div">
                <div class="opinions-text">Malownicza trasa :) dds dsdssds fdsfdfdsfdsfdfdsdadd fdsfdffd fdsffdfddfsdffd dfdssssssssff fdjhjdjk dahs dsaj dssaddasds a adsdsdsa asd sad </div>
                <div class="opinions-participant-name">Jan Kowalski, uczestnik 41. PZU Maraton Warszawski</div>
              </div>
              <div class="opinions-div">
                <div class="opinions-text">Malownicza trasa :)</div>
                <div class="opinions-participant-name">Jan Kowalski, uczestnik 41. PZU Maraton Warszawski</div>
              </div>
              <div class="opinions-div">
                <div class="opinions-text">Malownicza trasa :)</div>
                <div class="opinions-participant-name">Jan Kowalski, uczestnik 41. PZU Maraton Warszawski</div>
              </div>
            </div>
          </div>
        </div>
      </div>

  @if (!Auth::check())
  <div class="section-cta">
    <div class="cta-block">
      <div class="cta-text">Sprawdź nasz serwis w akcji i</div>
      <a href="{{ route('login') }}" class="button-cta w-button">dołącz teraz</a>
    </div>
  </div>
  @endif

  <div class="section-footer">
    <div class="content w-container">
        <div class="footer-content">
            <div class="footer-first"><img src="{{ asset('images/Component-15-–-12x.png') }}" alt="" class="footer-image">
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
                <div class="footer-copyright-text">© 2021 justrun4.fun</div>
            </div>
            <div class="footer-social-media">
                <a href="https://www.facebook.com/" target="_blank" class="w-inline-block"><img
                        src="images/SM-logos.png" loading="lazy" alt="" class="icon-facebook"></a>
                <a href="https://www.linkedin.com/" target="_blank" class="w-inline-block"><img
                        src="images/logo-circle-facebook.png" loading="lazy" alt="" class="icon-linkedin"></a>
            </div>
        </div>
    </div>
</div>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=600c61116aae5f5691a390c2" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{ asset('js/webflow.js') }}" type="text/javascript"></script>

<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>