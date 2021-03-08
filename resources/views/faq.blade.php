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

  <div class="section">
    <div class="content w-container">
      <h2 class="section-header">Pytania i odpowiedzi</h2>
      <div class="separator"><img src="images/divider.svg" loading="lazy" alt="" class="separator-image"></div>
      <div class="text-block-header">Konto</div>
      <div class="faq-div w-row">
        <div class="w-col w-col-6">
          <div data-w-id="37236ec5-22c9-38cd-89c2-2a75a652ea81" class="faq-item">
            <div class="faq-item-question">
              <div class="faq-item-question-text">Czy korzystanie z justrun4.fun jest darmowe?</div>
              <div class="faq-icon w-icon-dropdown-toggle"></div>
            </div>
            <div class="faq-item-answer">
              <p class="faq-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
            </div>
          </div>
          <div class="faq-item">
            <div class="faq-item-question">
              <div class="faq-item-question-text">Czy można całkowicie usunąć konto?</div>
              <div class="faq-icon w-icon-dropdown-toggle"></div>
            </div>
            <div class="faq-item-answer">
              <p class="faq-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
            </div>
          </div>
        </div>
        <div class="w-col w-col-6">
          <div class="faq-item">
            <div class="faq-item-question">
              <div class="faq-item-question-text">Jak uzupełnić dane profilowe?</div>
              <div class="faq-icon w-icon-dropdown-toggle"></div>
            </div>
            <div class="faq-item-answer">
              <p class="faq-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
            </div>
          </div>
          <div class="faq-item">
            <div class="faq-item-question">
              <div class="faq-item-question-text">Jak zmienić e-mail konta?</div>
              <div class="faq-icon w-icon-dropdown-toggle"></div>
            </div>
            <div class="faq-item-answer">
              <p class="faq-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="text-block-header">Wydarzenia</div>
      <div class="faq-div w-row">
        <div class="w-col w-col-6">
          <div class="faq-item">
            <div class="faq-item-question">
              <div class="faq-item-question-text">Jak dołączyć do wydarzenia?</div>
              <div class="faq-icon w-icon-dropdown-toggle"></div>
            </div>
            <div class="faq-item-answer">
              <p class="faq-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
            </div>
          </div>
          <div class="faq-item">
            <div class="faq-item-question">
              <div class="faq-item-question-text">Jak są weryfikowane wydarzenia?</div>
              <div class="faq-icon w-icon-dropdown-toggle"></div>
            </div>
            <div class="faq-item-answer">
              <p class="faq-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
            </div>
          </div>
        </div>
        <div class="w-col w-col-6">
          <div class="faq-item">
            <div class="faq-item-question">
              <div class="faq-item-question-text">Jak zrezygnować z wydarzenia?</div>
              <div class="faq-icon w-icon-dropdown-toggle"></div>
            </div>
            <div class="faq-item-answer">
              <p class="faq-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
            </div>
          </div>
          <div class="faq-item">
            <div class="faq-item-question">
              <div class="faq-item-question-text">Jak dodać opinię do wydarzenia?</div>
              <div class="faq-icon w-icon-dropdown-toggle"></div>
            </div>
            <div class="faq-item-answer">
              <p class="faq-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="text-block-header">Fundacje</div>
      <div class="faq-div w-row">
        <div class="w-col w-col-6">
          <div class="faq-item">
            <div class="faq-item-question">
              <div class="faq-item-question-text">Jak wybrać lub zmienić fundację?</div>
              <div class="faq-icon w-icon-dropdown-toggle"></div>
            </div>
            <div class="faq-item-answer">
              <p class="faq-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
            </div>
          </div>
          <div class="faq-item">
            <div class="faq-item-question">
              <div class="faq-item-question-text">Jak mogę wspierać wybraną fundację?</div>
              <div class="faq-icon w-icon-dropdown-toggle"></div>
            </div>
            <div class="faq-item-answer">
              <p class="faq-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
            </div>
          </div>
        </div>
        <div class="w-col w-col-6">
          <div class="faq-item">
            <div class="faq-item-question">
              <div class="faq-item-question-text">Gdzie znajdę opis wszystkich fundacji?</div>
              <div class="faq-icon w-icon-dropdown-toggle"></div>
            </div>
            <div class="faq-item-answer">
              <p class="faq-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="text-block-header">Punkty i nagrody</div>
      <div class="faq-div w-row">
        <div class="w-col w-col-6">
          <div class="faq-item">
            <div class="faq-item-question">
              <div class="faq-item-question-text">Za co przyznawane są punkty do rankingu?</div>
              <div class="faq-icon w-icon-dropdown-toggle"></div>
            </div>
            <div class="faq-item-answer">
              <p class="faq-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
            </div>
          </div>
          <div class="faq-item">
            <div class="faq-item-question">
              <div class="faq-item-question-text">Jak są przyznawane punkty?</div>
              <div class="faq-icon w-icon-dropdown-toggle"></div>
            </div>
            <div class="faq-item-answer">
              <p class="faq-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
            </div>
          </div>
        </div>
        <div class="w-col w-col-6">
          <div class="faq-item">
            <div class="faq-item-question">
              <div class="faq-item-question-text">Jak otrzymać nagrodę?</div>
              <div class="faq-icon w-icon-dropdown-toggle"></div>
            </div>
            <div class="faq-item-answer">
              <p class="faq-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section-footer">
    <div class="content w-container">
        <div class="footer-content">
            <div class="footer-first"><img src="{{ asset('images/logo-footer.svg') }}" alt="" class="footer-image">
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
<script src="{{ asset('js/webflow.js') }}" type="text/javascript"></script>

<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>

</html>