<!DOCTYPE html>
<html lang="{{{ LanguageHelper::getCurrent()['locale'] }}}">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>@yield('title') - SBShare</title>
    <meta name="keywords" content="starbound,координаты,база,планеты">
    <meta name="description" content="Русская база координат Stardound, обмен координатами">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- jQuery & jQuery UI -->
    <!--script src="http://code.jquery.com/jquery-1.11.0.min.js"></script-->
    <script src="/js/jquery-1.11.0.min.js"></script>
    <!--script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script-->
    <script src="/js/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>

    <!-- Bootstrap -->
    <!--script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script-->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap-dialog.min.js"></script>
    <!--link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"-->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <!--script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script-->
    <script src="/js/html5shiv.js"></script>
    <!--script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script-->
    <script src="/js/respond.min.js"></script>
    <script src="/js/mysite.js"></script>
    <!--[endif]-->

    <!-- User styles -->
    <link rel="stylesheet" href="/css/style.css">

    <link rel="icon" type="image/png" href="/img/favicon.png">

    @yield('headExtra')
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">SBShare.ru</a>
        </div>


        <div class="navbar-collapse collapse">
            @if (Auth::check())
                <ul class="nav navbar-nav">
                    <!-- NAVIGATION ITEMS -->
                    <li><a href="/planets/create">@lang('planet.title_add')</a></li>
                </ul>
            @endif

            <div class="navbar-form navbar-right dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                        aria-expanded="true">
                    <i class="flags flag-{{ LanguageHelper::getCurrent()['locale'] }}"></i>
                    {{{LanguageHelper::getCurrent()['name']}}}
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    @foreach(LanguageHelper::all() as $language)
                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                   href="{{ URL::route('language', ['locale' => $language['locale']]) }}">
                                <i class="flags flag-{{ $language['locale'] }}"></i>
                                <span>{{{ $language['name'] }}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>


            @if (!Auth::check())
                <form class="navbar-form navbar-right" role="form" action="{{ action('UsersController@postLogin') }}"
                      method="post">

                    <a href="/users/login" class="btn btn-success">@lang('action.login')</a>
                    <a href="/users/register" class="btn btn-success">@lang('action.register')</a>
                </form>
            @else


                <form class="navbar-form navbar-right" role="form" action="/users/logout">
                    <button class="btn btn-success">@lang('action.logout')</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><strong>{{ Auth::user()->username }}</strong></a></li>
                </ul>
            @endif

        </div>
        <!--/.navbar-collapse -->
    </div>

</div>



@yield('content')

<div id="footer">
    <div class="container">
        <div class="col-md-4">
            &copy; 2015 SBShare
        </div>
    </div>
</div>
</body>
</html>
