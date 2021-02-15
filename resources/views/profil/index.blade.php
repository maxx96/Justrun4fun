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
                        <div class="menu-logo-mobile"><img src="{{ asset('images/Group-532.png') }}" loading="lazy"
                                alt="" class="logo-mobile-image"></div>
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
                                            src="{{ asset('images/ikona-faq.png') }}" loading="lazy" alt=""
                                            class="submenu-icon">
                                        <div class="submenu-text-block">
                                            <h4 class="submenu-heading">FAQ</h4>
                                            <div class="submenu-text">Pytania i odpowiedzi<br>‍</div>
                                        </div>
                                    </a>
                                    <a href="https://www.facebook.com/" target="_blank"
                                        class="submenu-block w-inline-block"><img
                                            src="{{ asset('images/ikona-czat.png') }}" loading="lazy" alt=""
                                            class="submenu-icon">
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
            <h2 class="section-header">Mój profil</h2>
            <div class="separator"><img src="{{ asset('images/Line-11.png') }}" loading="lazy" alt="" class="separator-image"></div>
            @if(Session::has('update_users'))
            <div class="success-block">
              <div class="text-block-info">
                {{session('update_users')}}
              </div>
            </div>
            @endif
            @if($user->is_active==0)
            <div class="warning-block">
                <div class="text-block-info"><strong>Uwaga!</strong> Nie jesteś brany pod uwagę w rankingu, ponieważ
                    posiadasz niepełne dane na swoim profilu. Uzupełnij je. W przeciwnym wypadku administrator nie
                    zweryfikuje zawodów, w których brałeś udział.</div>
            </div>
            @endif
            <div class="profil-info">
                <div class="profil-details-div">
                    <div class="profil-image" style=" background: url('{{$user->photo->file}}'); background-size: cover; background-repeat: no-repeat; background-position: center">
                    </div>

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
                    <div class="profil-info-other">Jeszcze nie wybrano żadnej fundacji</div>
                    @elseif($collection <= 0) <div class="profil-info-other">Wspierasz: <strong
                            class="profil-info-bold-text">{{$user->foundation->name}}</strong></div>
                <div class="profil-info-other">Jeszcze nic nie zebrano :(</div>
                @else
                <div class="profil-info-other">Wspierasz: <strong
                        class="profil-info-bold-text">{{$user->foundation->name}}</strong></div>
                <div class="profil-info-other">Ilość punktów: <strong
                        class="profil-info-bold-text">{{$user->total_points}}</strong></div>
                <div class="profil-info-other">Dzięki Tobie uzbierano już: <strong
                        class="profil-info-bold-text">{{$collection}}</strong></div>
                @endif
            </div>
            <div>
                <a href="{{ route('profil.edit', $user->id)}}" class="button-edit-profile w-button">Edytuj profil</a>
            </div>
        </div>
        <h2 class="section-header">Moje starty</h2>
        <div class="separator"><img src="{{ asset('images/Line-11.png') }}" loading="lazy" alt="" class="separator-image"></div>
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
                        @elseif($row->verification=="W trakcie")
                        <div class="my-event">
                            <div class="my-event-name">
                                <div class="my-event-text">{{ $row->title }}</div>
                            </div>
                            <div class="my-event-date">
                                <div class="my-event-text">{{ $row->event_date }}</div>
                            </div>
                            <div class="my-event-details">
                                <a href="{{ url('wydarzenia', [$row->slug]) }}" class="button-details-event w-button">Oczekuje na
                                    weryfikację</a>
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
                    <div class="footer-copyright-text">© {{ date('Y') }} justrun4.fun</div>
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
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=600c61116aae5f5691a390c2"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/webflow.js') }}" type="text/javascript"></script>

    <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>

</html>