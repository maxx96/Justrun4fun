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
      <h2 class="section-header">Regulamin</h2>
      <div class="separator"><img src="images/Line-11.png" loading="lazy" alt="" class="separator-image"></div>
      <div class="regulations-div">
        <div class="regulations-text">1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consequat sem sed ipsum aliquam, vitae sollicitudin ligula ultricies. Nullam in viverra purus. Quisque nec venenatis arcu. Donec viverra porta neque vitae tempor. Morbi ipsum ante, tincidunt eu purus sed, molestie tristique diam. Quisque tincidunt, tellus sed tincidunt posuere, arcu ipsum ornare nulla, in laoreet nisl nibh eget lectus. Aenean metus lacus, convallis non nunc eu, hendrerit sagittis nunc. Donec sit amet nisl ac tellus rhoncus mattis. Nam nec blandit diam.Pellentesque aliquam, mi vel tempus rhoncus, risus neque maximus lorem, dictum ultricies orci neque non urna. Phasellus urna tellus, placerat at condimentum non, sollicitudin in nulla. Etiam nisi <br>sapien, ullamcorper a gravida sed, luctus ac libero. Sed tincidunt iaculis mi, vel placerat nisi egestas a. Nunc tempus ac sem porttitor porta. Praesent quis nulla elit. In dui ex, interdum scelerisque scelerisque eget, finibus ac felis. <br><br>2. Fusce vitae ornare tellus, ut tincidunt arcu. Vivamus fringilla justo felis, ac feugiat purus aliquam nec. Ut sem justo, tincidunt in pulvinar sit amet, semper eu est. Sed condimentum suscipit orci, eu sodales orci facilisis mattis. Quisque sapien odio, tincidunt quis turpis in, faucibus imperdiet dolor. Ut sed viverra massa. In in nulla lacus.Morbi ut porta lacus. Maecenas eu nisl sit amet nibh maximus facilisis. Nunc nec bibendum odio, id ultrices mauris. Vivamus diam erat, egestas id efficitur eu, pulvinar vitae augue. Suspendisse consequat orci in purus lacinia facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis tincidunt in est in molestie. Sed molestie arcu sed massa consectetur bibendum. In pretium suscipit velit, vel aliquet metus volutpat viverra. Nulla eget felis ut odio porttitor suscipit eu vitae dui. Proin malesuada et mauris ac tincidunt. Mauris at nibh quis nisi sagittis dapibus.Sed vehicula erat tortor, vitae posuere dui elementum a. Aenean elit lorem, posuere id lectus vel, pellentesque pharetra nibh. Quisque et rhoncus ex. <br><br>3. Suspendisse dictum lacus metus, et maximus ligula luctus vehicula. Etiam tortor tortor, sagittis vel lacinia sed, sodales in enim. Donec lobortis urna libero, et lacinia arcu tempus ac. Donec rutrum mi non tincidunt dapibus. Nullam arcu tellus, semper sed lorem eu, malesuada molestie erat. Proin ullamcorper urna eu mi aliquet, nec pellentesque urna vestibulum. Praesent id turpis molestie, condimentum ex et, feugiat magna. Quisque placerat, nulla sit amet interdum lacinia, magna est pulvinar justo, sit amet eleifend tellus nibh at turpis. Etiam vel consectetur felis.Donec venenatis magna quis erat consectetur, in auctor velit dictum. Integer tristique tempus lacus, sit amet pulvinar elit fringilla sit amet. Aenean eget augue molestie dui tempus molestie. Integer vestibulum enim vitae purus fringilla pretium sed eget erat. Sed odio risus, dignissim et dui quis, interdum lacinia magna. In eleifend, nunc eu consequat tristique, enim dolor vulputate nisl, egestas dignissim elit turpis quis eros. Donec luctus ipsum tincidunt ex ultrices, a dignissim metus varius. Aliquam facilisis fermentum nunc, eget mollis metus tincidunt nec. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.Vestibulum cursus hendrerit diam eu vehicula. In venenatis quis justo quis blandit. Nam semper sapien erat, ut posuere risus pharetra sit amet. Fusce quam augue, suscipit in dui tempor, vehicula euismod odio. Quisque vehicula nulla non enim elementum, eget fermentum elit cursus. Suspendisse fringilla consectetur diam, nec vulputate dolor posuere ut. Suspendisse elementum mi sit amet odio scelerisque vestibulum. Suspendisse volutpat, neque a venenatis suscipit, arcu est pellentesque velit, at mattis enim quam ut magna. Sed consectetur convallis ex, ut dapibus elit tempor in. Vestibulum sed ex justo. Nunc tempor posuere enim non scelerisque.Mauris dapibus sodales pulvinar. Aenean viverra nunc ipsum, et auctor purus tempus sit amet. Nulla facilisi. Vestibulum feugiat massa justo, eu maximus tortor elementum et. Quisque eget tellus et erat vehicula ultrices id id justo. Praesent sed volutpat lorem. Integer erat est, porttitor ut porta sit amet, mollis nec orci. Maecenas fringilla nibh est, ac luctus ligula congue at. Integer vel auctor tellus. In vitae lorem pharetra, imperdiet urna id, pharetra ipsum. Vivamus quis lectus tortor. In hac habitasse platea dictumst.Fusce vel lectus non mauris scelerisque luctus. Sed dolor sapien, laoreet eu tellus sed, sollicitudin ullamcorper orci. Sed maximus ornare faucibus. Ut euismod ante nec odio faucibus, at lobortis orci placerat. In hac habitasse platea dictumst. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut blandit luctus elit, sed porta quam consequat ut. Curabitur luctus tortor vitae purus faucibus pulvinar. Nullam viverra lacus sit amet urna varius, sed mollis ex interdum. Duis tempus eu nulla finibus porttitor.Nulla et lobortis ante. Pellentesque eu tellus lobortis, molestie lacus ac, tincidunt dui. Donec vel tristique nunc. In faucibus turpis eu viverra condimentum. Quisque varius elit aliquet, tincidunt leo vitae, venenatis massa. Proin ac tellus at felis eleifend congue vitae a neque. In hac habitasse platea dictumst.Etiam auctor condimentum lectus sed condimentum. Sed auctor condimentum tincidunt. Sed vel venenatis dolor. Quisque et lacus at nisi vulputate maximus in nec ipsum. Suspendisse ultricies consequat consequat. Duis nec ligula ac dolor dapibus faucibus. Nunc odio dolor, sodales quis diam non, interdum bibendum enim.</div>
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