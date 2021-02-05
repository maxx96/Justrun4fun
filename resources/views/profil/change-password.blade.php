<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sat Jan 30 2021 15:56:29 GMT+0000 (Coordinated Universal Time)  -->
<html lang="pl" data-wf-page="6012dfb42ada036d35de40d0" data-wf-site="600c61116aae5f5691a390c2">
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
      <h2 class="section-header">Zmień hasło</h2>
      <div class="separator"><img src="images/Line-11.png" loading="lazy" alt="" class="separator-image"></div>

<div class="login-div">
    <div class="w-form">

    <form method="POST" action="{{ route('change.password') }}" class="form-login">
        @csrf 
        @include('includes/error-form')
        
        <div class="password-div">
            <x-jet-label for="password" class="form-login-text" value="{{ __('Aktualne hasło') }}" />
        </div>
            <x-jet-input type="password" class="form-login-text-field w-input" maxlength="256" name="current_password"
            placeholder="" id="password" autocomplete="current-password" />

        <div class="password-div">
                <x-jet-label for="password" class="form-login-text" value="{{ __('Nowe hasło') }}" />
            </div>
                <x-jet-input type="password" class="form-login-text-field w-input" maxlength="256" name="new_password"
                placeholder="" id="new_password" autocomplete="current-password" />

        <div class="password-div">
            <x-jet-label for="password" class="form-login-text" value="{{ __('Potwierdź nowe hasło') }}" />
        </div>
            <x-jet-input type="password" class="form-login-text-field w-input" maxlength="256" name="new_confirm_password"
            placeholder="" id="new_confirm_password" autocomplete="current-password" />
        <input type="submit" value="Zmień hasło" data-wait="Please wait..."
        class="button-submit-outside w-button">
    </form>

</div>
</div>