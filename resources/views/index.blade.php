<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sat Jan 30 2021 15:56:29 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="6012dfb42ada036d35de40d0" data-wf-site="600c61116aae5f5691a390c2">

<head>
    <meta charset="utf-8">
    <title>justrun4fun</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link href="css/webflow.css" rel="stylesheet" type="text/css">
    <link href="css/justrun4fun.webflow.css" rel="stylesheet" type="text/css">
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
    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="images/webclip.png" rel="apple-touch-icon">
</head>

<body>
    <div class="section-navbar">
        <div data-collapse="small" data-animation="over-left" data-duration="400" role="banner" class="navbar w-nav">
            <div class="content w-container">
                <div class="menu">
                    <a href="{{ route('index') }}" aria-current="page" class="menu-logo w-nav-brand w--current"><img
                            src="images/Group-532.png" loading="lazy" alt="" class="menu-logo-image"></a>
                    <nav role="navigation" class="nav-menu w-nav-menu">
                        <div class="menu-logo-mobile"><img src="images/Group-532.png" loading="lazy" alt=""
                                class="logo-mobile-image"></div>
                        <a href="wydarzenia.html" class="nav-link w-nav-link">Wydarzenia</a>
                        <a href="ranking.html" class="nav-link w-nav-link">Ranking</a>
                        <a href="fundacje.html" class="nav-link w-nav-link">Fundacje</a>
                        <div data-hover="" data-delay="0" class="dropdown w-dropdown">
                            <div class="nav-link w-dropdown-toggle">
                                <div class="icon-arrow w-icon-dropdown-toggle"></div>
                                <div class="nav-link-submenu">Pomoc</div>
                            </div>
                            <nav class="dropdown-list w-dropdown-list">
                                <div class="submenu">
                                    <a href="faq.html" class="submenu-block w-inline-block"><img
                                            src="images/ikona-faq.png" loading="lazy" alt="" class="submenu-icon">
                                        <div class="submenu-text-block">
                                            <h4 class="submenu-heading">FAQ</h4>
                                            <div class="submenu-text">Pytania i odpowiedzi<br>‍</div>
                                        </div>
                                    </a>
                                    <a href="https://www.facebook.com/" target="_blank"
                                        class="submenu-block w-inline-block"><img src="images/ikona-czat.png"
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
                    <a href="profil.html" aria-current="page"
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

    <div class="section-hero">
        <div class="content hero w-container">
            <div class="hero-block">
                <h1 class="hero-heading">Motywacja, zabawa <br>i pomaganie w jednym</h1>
                <div class="hero-text-block">Sprawdź sam i osiągnij wyższy poziom swoich celów biegowych.</div>
                <a href="{{ route('login') }}" class="button-big w-button">Dołącz do naszej społeczności</a>
            </div>
            <div class="hero-image-block"><img src="images/undraw_finish_line_katerina_limpitsouni_xy20.png"
                    loading="lazy" sizes="(max-width: 991px) 100vw, (max-width: 1439px) 38vw, 484.234375px"
                    srcset="images/undraw_finish_line_katerina_limpitsouni_xy20-p-500.png 500w, images/undraw_finish_line_katerina_limpitsouni_xy20.png 535w"
                    alt="" class="hero-image"></div>
        </div>
    </div>
    <div>
        <div class="content w-container">
            <div class="target-hero">Utrzymuj z nami swoją <strong class="target-hero-bold">motywację sportową</strong>
                i jednocześnie <strong class="target-hero-bold">wspomagaj potrzebujących</strong>, a to nie wszystko!
            </div>
            <div class="separator"><img src="images/Line-11.png" loading="lazy" alt="" class="separator-image"></div>
            <div class="w-layout-grid grid-target">
                <div id="w-node-b922e9023a6a-35de40d0" class="grid-one-target">
                    <div class="target-block-image"><img src="images/Component-10-–-1.png" loading="lazy" alt=""
                            class="target-image"></div>
                    <div class="target-block-text">
                        <h4 class="target-heading">Realizuj cele</h4>
                        <div class="target-text">Zdobywaj nagrody za systematyczne osiąganie kolejnych celów</div>
                    </div>
                </div>
                <div id="w-node-8997504ef119-35de40d0" class="grid-one-target">
                    <div class="target-block-image"><img src="images/Component-11-–-1.png" loading="lazy" alt=""
                            class="target-image"></div>
                    <div class="target-block-text">
                        <h4 class="target-heading">Pomagaj organizatorom</h4>
                        <div class="target-text">Twoja opinia pozwala organizatorom udoskonalać kolejne edycje zawodów
                        </div>
                    </div>
                </div>
                <div id="w-node-e0fc3773da55-35de40d0" class="grid-one-target">
                    <div class="target-block-image"><img src="images/Component-12-–-1.png" loading="lazy" alt=""
                            class="target-image"></div>
                    <div class="target-block-text">
                        <h4 class="target-heading">Wspieraj fundacje</h4>
                        <div class="target-text">Każda twoja ocena biegu wspiera konkretną fundację</div>
                    </div>
                </div>
                <div id="w-node-1f27fb092fb3-35de40d0" class="grid-one-target">
                    <div class="target-block-image"><img src="images/Component-15-–-1.png" loading="lazy" alt=""
                            class="target-image"></div>
                    <div class="target-block-text">
                        <h4 class="target-heading">Rywalizuj z innymi</h4>
                        <div class="target-text">Dołącz do rankingu użytkowników i walcz o atrakcyjne nagrody</div>
                    </div>
                </div>
                <div id="w-node-7701654863b3-35de40d0" class="grid-one-target">
                    <div class="target-block-image"><img src="images/Component-14-–-1.png" loading="lazy" alt=""
                            class="target-image"></div>
                    <div class="target-block-text">
                        <h4 class="target-heading">Wykonuj wyzwania</h4>
                        <div class="target-text">Bierz udział w ciekawych wyzwaniach i zbieraj punkty</div>
                    </div>
                </div>
                <div id="w-node-9d186e5a32ef-35de40d0" class="grid-one-target">
                    <div class="target-block-image"><img src="images/Component-13-–-1.png" loading="lazy" alt=""
                            class="target-image"></div>
                    <div class="target-block-text">
                        <h4 class="target-heading">Ćwicz, ćwicz</h4>
                        <div class="target-text">Bądź zdyscyplinowany i startuj w zawodach biegowych</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="content w-container">
            <h2 class="section-header">Jak to działa?</h2>
            <div class="separator"><img src="images/Line-11.png" loading="lazy" alt="" class="separator-image"></div>
            <div class="w-layout-grid grid-how-working">
                <div class="how-working-div"><img src="images/ramka1.png" loading="lazy" alt=""
                        class="how-working-image">
                    <div class="how-working-block">
                        <div>
                            <h4 class="how-working-div-heading">Wybierz fundację</h4>
                        </div>
                        <div class="how-working-block-text">
                            <div class="how-working-text">Wybierz jedną spośród czterech fundacji i zbieraj dla niej
                                środki.</div>
                        </div>
                    </div>
                </div>
                <div class="how-working-div"><img src="images/ramka2.png" loading="lazy" alt=""
                        class="how-working-image">
                    <div class="how-working-block">
                        <div>
                            <h4 class="how-working-div-heading">Weź udział w biegu</h4>
                        </div>
                        <div class="how-working-block-text">
                            <div class="how-working-text">Dołącz do wydarzenia i weź w nim rzeczywisty udział.</div>
                        </div>
                    </div>
                </div>
                <div class="how-working-div"><img src="images/ramka3.png" loading="lazy" alt=""
                        class="how-working-image">
                    <div class="how-working-block">
                        <div>
                            <h4 class="how-working-div-heading">Wyraź opinię</h4>
                        </div>
                        <div class="how-working-block-text">
                            <div class="how-working-text">Oceń wydarzenie, w którym brałeś udział na naszej stronie.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="how-working-div"><img src="images/ramka4.png" loading="lazy" alt=""
                        class="how-working-image">
                    <div class="how-working-block">
                        <div>
                            <h4 class="how-working-div-heading">Wspomagaj</h4>
                        </div>
                        <div class="how-working-block-text">
                            <div class="how-working-text">Każda Twoja opinia wspomaga wybraną fundację.</div>
                        </div>
                    </div>
                </div>
                <div class="how-working-div"><img src="images/ramka5.png" loading="lazy" alt=""
                        class="how-working-image">
                    <div class="how-working-block">
                        <div>
                            <h4 class="how-working-div-heading">Kontroluj</h4>
                        </div>
                        <div class="how-working-block-text">
                            <div class="how-working-text">Zarządzaj listą startów z poziomu swojego profilu.</div>
                        </div>
                    </div>
                </div>
                <div class="how-working-div"><img src="images/ramka6.png" loading="lazy" alt=""
                        class="how-working-image">
                    <div class="how-working-block">
                        <div>
                            <h4 class="how-working-div-heading">Wygrywaj</h4>
                        </div>
                        <div class="how-working-block-text">
                            <div class="how-working-text">Zbieraj punkty dzięki ocenianiu wydarzeń i walcz o wspaniałe
                                nagrody.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-cta">
        <div class="cta-block">
            <div class="cta-text">Sprawdź nasz serwis w akcji i</div>
            <a href="{{ route('login') }}" class="button-cta w-button">dołącz teraz</a>
        </div>
    </div>
    <div>
        <div class="content w-container">
            <h2 class="section-header">Biegamy dla</h2>
            <div class="separator"><img src="images/Line-11.png" loading="lazy" alt="" class="separator-image"></div>
            <div class="w-layout-grid grid-foundation">
                <div id="w-node-e617a850cf5a-35de40d0" data-w-id="ca9809f8-de1a-068e-6ed6-e617a850cf5a"
                    class="foundation-div"><img src="images/logo_rnr.png" loading="lazy" alt=""></div>
                <div id="w-node-af7de7e64096-35de40d0" class="foundation-div"><img src="images/fdds_1.png"
                        loading="lazy" alt=""></div>
                <div id="w-node-9943a015031b-35de40d0" class="foundation-div"><img src="images/DOM-logo-mod2.png"
                        loading="lazy" alt=""></div>
                <div id="w-node-95b87edfc4cd-35de40d0" class="foundation-div"><img src="images/logo.png" loading="lazy"
                        alt=""></div>
            </div>
            <div class="button-big-div">
                <a href="fundacje.html" class="button-big w-button">Pokaż więcej o fundacjach</a>
            </div>
        </div>
    </div>
    @if(!$events -> isEmpty())
    <div>
        <div class="content w-container">
            <h2 class="section-header">Polecane wydarzenia</h2>
            <div class="separator"><img src="images/Line-11.png" loading="lazy" alt="" class="separator-image"></div>
            <div class="w-layout-grid grid-featured-events">
                @foreach($events as $event)
                <a href="{{ url('wydarzenia', [$event->slug]) }}" class="featured-event-link-block w-inline-block">
                    <div class="featured-events-div"><img src="{{$event->photo->file}}" loading="lazy" alt=""
                            class="event-image"></div>
                    <div class="event-date-div">
                        <div class="event-date-text">{{$event->event_date}}</div>
                    </div>
                    <div class="event-title-div">
                        <div class="event-title-text">{{$event->title}}</div>
                    </div>
                    <div class="event-category-div featured-event">
                        <div class="event-category">
                            <div class="event-category-text">{{$event->category->name}}</div>
                        </div>
                    </div>
                </a>
                @endforeach

            </div>
            <div class="button-big-div">
                <a href="wydarzenia.html" class="button-big w-button">Pokaż wszystkie wydarzenia</a>
            </div>
        </div>
    </div>
    @endif

    <div>
        <div class="content w-container">
            <h2 class="section-header">Zaufali nam</h2>
            <div class="separator"><img src="images/Line-11.png" loading="lazy" alt="" class="separator-image"></div>
            <div class="w-layout-grid grid-partners">
                <div id="w-node-d210b884e163-35de40d0" class="partner-div"><img src="images/abf7b32_logo-fundacja.png"
                        loading="lazy" alt=""></div>
                <div id="w-node-75dc3d9c4a73-35de40d0" class="partner-div"><img src="images/logo-38--pko-wm-1.png"
                        loading="lazy" alt=""></div>
                <div id="w-node-0ab33c18c99d-35de40d0" class="partner-div"><img src="images/Image-2.png" loading="lazy"
                        alt=""></div>
                <div id="w-node-6bf61f54ff91-35de40d0" class="partner-div"><img src="images/Image-1.png" loading="lazy"
                        alt=""></div>
                <div id="w-node-74a6e87a23bb-35de40d0" class="partner-div"><img src="images/gpmlog91.png" loading="lazy"
                        alt=""></div>
            </div>
        </div>
    </div>
    <div class="section-cta">
        <div class="cta-block">
            <div class="cta-text">Sprawdź nasz serwis w akcji i</div>
            <a href="{{ route('login') }}" class="button-cta w-button">dołącz teraz</a>
        </div>
    </div>
    <div class="section-footer">
        <div class="content w-container">
            <div class="footer-content">
                <div class="footer-first"><img src="images/Component-15-–-12x.png" alt="" class="footer-image">
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
                            <a href="fundacje.html" class="footer-link">O fundacjach</a>
                        </li>
                        <li>
                            <a href="regulamin.html" class="footer-link">Regulamin</a>
                        </li>
                        <li>
                            <a href="polityka-prywatnosci.html" class="footer-link">Polityka prywatności</a>
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
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=600c61116aae5f5691a390c2"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>
    <script src="js/webflow.js" type="text/javascript"></script>
    <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>

</html>