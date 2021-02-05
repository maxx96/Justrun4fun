<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sat Jan 30 2021 15:56:29 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="6013f8e24c8fde32dc34da4c" data-wf-site="600c61116aae5f5691a390c2">

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
                    <a href="{{ route('index') }}" class="menu-logo w-nav-brand"><img
                            src="{{ asset('images/Group-532.png') }}" loading="lazy" alt="" class="menu-logo-image"></a>
                    <nav role="navigation" class="nav-menu w-nav-menu">
                        <div class="menu-logo-mobile"><img src="{{ asset('images/Group-532.png') }}" loading="lazy"
                                alt="" class="logo-mobile-image"></div>
                        <a href="{{ route('admin.index') }}" aria-current="page"
                            class="nav-link w-nav-link w--current">Panel główny</a>
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

            <h2>Edytuj użytkownika</h2>
            <hr>

            <div class="row">

                <div class="col-sm-3">
                    <img src="{{$user->photo ? $user->photo->file : '/no_image.svg'}}" alt=""
                        class="img-responsive img-rounded" width=100%>
                </div>

                <div class="col-sm-9">

                    {!! Form::model($user, ['method'=>'PATCH', 'action'=>
                    ['App\Http\Controllers\AdminUsersController@update', $user->id], 'files'=>true]) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Nazwa użytkownika:') !!}
                        {!! Form::text('name', null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('role_id', 'Rola:') !!}
                        {!! Form::select('role_id', $roles , null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('is_active', 'Status:') !!}
                        {!! Form::select('is_active', array(1 => 'Aktywny', 0=> 'Nieaktywny'), null,
                        ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('photo_id', 'Zdjęcie:') !!}
                        {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group" onclick="return confirm('Czy zapisać zmiany?')">
                        {!! Form::submit('Zapisz zmiany', ['class'=>'btn btn-primary col-sm-6']) !!}
                    </div>
                    {!! Form::close() !!}

                    {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminUsersController@destroy',
                    $user->id]]) !!}
                    <div class="form-group" onclick="return confirm('Czy na pewno usunąć wybranego użytkownika?')">
                        {!! Form::submit('Usuń użytkownika', ['class'=>'btn btn-danger col-sm-6']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>

            </div>

            <div class="row">
                @include('includes/error-form')
            </div>

        </div>
      </div>
        <script
            src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=600c61116aae5f5691a390c2"
            type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
        <script src="{{ asset('js/webflow.js') }}" type="text/javascript"></script>
        <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>

</html>

@include('includes/error-form')
