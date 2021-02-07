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
      <h2 class="section-header">Edycja profilu</h2>
      <div class="separator"><img src="{{ asset('images/Line-11.png') }}" loading="lazy" alt="" class="separator-image"></div>
      <div class="edit-profile-div">
        <div class="form-edit-profile">
          {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['App\Http\Controllers\UserController@update', $user->id], 'files'=>true]) !!}
          @csrf
          <div class="w-form">
                @include('includes/error-form')
              <div>
                {!! Form::label('email', 'E-mail*', ['class'=>'form-profile-field-label']) !!}
                {!! Form::email('email', null, ['class'=>'form-profile-text-field w-input'])!!}
              </div>
              <div>
                {!! Form::label('firstname', 'Imię*', ['class'=>'form-profile-field-label']) !!}
                {!! Form::text('firstname', null, ['class'=>'form-profile-text-field w-input'])!!} 
              </div>
              <div>
                {!! Form::label('surname', 'Nazwisko*', ['class'=>'form-profile-field-label']) !!}
                {!! Form::text('surname', null, ['class'=>'form-profile-text-field w-input'])!!} 
              </div>
              <div>
                {!! Form::label('city', 'Miasto*', ['class'=>'form-profile-field-label']) !!}
                {!! Form::text('city', null, ['class'=>'form-profile-text-field w-input'])!!} 
              </div>
              <div>
                {!! Form::label('age_category_id', 'Kategoria wiekowa*', ['class'=>'form-profile-field-label']) !!}
                {!! Form::select('age_category_id', [''=>'Wybierz kategorię wiekową'] + $age_categories, null, ['class'=>'form-profile-select-field w-select'])!!}   
              </div>
              <div>
                <div class="edit-profile-foundation">
                  {!! Form::label('foundation_id', 'Fundacja*', ['class'=>'form-profile-field-label']) !!}
                  <a href="{{ route('fundacje') }}" target="_blank" class="form-profile-text-foundation">Przeczytaj o fundacjach &gt;</a>
                </div>
                {!! Form::select('foundation_id', [''=>'Wybierz fundację'] + $foundations, null, ['class'=>'form-profile-select-field w-select'])!!} 
              </div>
              <div>
              <div>
                {!! Form::label('photo_id', 'Zdjęcie', ['class'=>'form-profile-field-label']) !!}
                {!! Form::file('photo_id', null, ['class'=>'form-profile-text-field w-input'])!!}
              </div>
              <br>
                <div class="form-edit-profile-rules">* pola wymagane, aby być ujętym w rankingu użytkowników. Twoje dane <span class="form-edit-profile-bold-text">nie będą nigdzie udostępniane</span>. Służą jedynie do weryfikacji wydarzeń sportowych.</div>
              </div>
              <div class="manage-profile-div" onclick="return confirm('Czy zatwierdzić zmiany?')">
                {!! Form::submit('Zapisz zmiany', ['class'=>'submit-button w-button']) !!}
              </div>
          </div>
          {!! Form::close() !!}
      
        </div>
    </div>
        <div class="manage-profile-div">
            <a href="{{ route('changePassword') }}" class="submit-button w-button">Zmień hasło</a>
                {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\UserController@destroy', $user->id]]) !!}
                @csrf
                {!! Form::submit('Usuń konto', ['class'=>'submit-button w-button']) !!}
                {!! Form::close() !!}
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