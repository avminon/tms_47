<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ trans('common.main.page_title') }}</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
</head>
<body id="app-layout">
    @if (!Auth::guest())
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">{{ trans('common.main.toggleNav') }}</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ trans('common.main.framgia') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/home') }}">{{ trans('common.main.home') }}</a></li>
                        @if (Auth::user()->isSupervisor())
                            <li>{{ link_to_route('supervisor.courses.index', trans('common.main.courses')) }}</li>
                            <li>{{ link_to_route('supervisor.subjects.index', trans('common.main.subjects')) }}</li>
                            <li>{{ link_to_route('supervisor.users.index', trans('common.main.users')) }}</li>
                        @else
                            <li>{{ link_to_route('trainee.courses.index', trans('common.main.courses')) }}</li>
                        @endif
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-user fa-fw"></i><span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('supervisor/users/') }}">
                                        <i class="fa fa-user fa-fw"></i>{{ Auth::user()->name }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}">
                                        <i class="fa fa-sign-out fa-fw"></i>{{ trans('common.main.logout') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @else
        <div class="jumbotron"><h1>{{ trans('message.header') }}</h1></div>
    @endif
    <div class="container">
        <div class="panel-body">
            @if(isset($errors) and $errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            @if(session()->has('flash_message'))
                <div class="alert alert-success  alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>{{ trans('message.success') }}</strong> {{ session()->get('flash_message') }}
                </div>
            @endif
            @if(session()->has('flash_error'))
                <div class="alert alert-success  alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>{{ trans('message.error') }}</strong> {{ session()->get('flash_error') }}
                </div>
            @endif
        </div>
    </div>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
