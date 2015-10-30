<!DOCTYPE html>
<html>
    <head>
        <title>Menu Maker</title>
        <link rel="icon" type="image/png" href="/img/favicon.png">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link href="css/all.css" rel="stylesheet" media="all">
    </head>
    <body>
        <header role="banner">
            <img  id="logo-main" src="img/logo.png" alt="Logo" class="logo">
        <nav id="navbar-primary" class="navbar navbar-default" role="navigation">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-primary-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-primary-collapse">
              <ul class="nav navbar-nav">
                <li class="{{ \Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}"><span class="ion ion-ionic"></span> Home</a></li>
                <li class="{{ \Request::is('edit') ? 'active' : '' }}"><a href="{{ url('/edit') }}"><span class="ion ion-ios-color-wand-outline"></span> Edit</a></li>
                <li><a href="{{ url('/create') }}" target="_blank"><span class="ion ion-ios-eye-outline"></span> Preview</a></a></li> 
                <li class="{{ \Request::is('save') ? 'active' : '' }}"><a href="{{ url('/save') }}" ><span class="ion ion-ios-reload"></span> Save</a></li>
                <li class="{{ \Request::is('download') ? 'active' : '' }}"><a href="{{ url('/download') }}" ><span class="ion ion-ios-cloud-download-outline"></span> Download</a></li>
{{--                 <li><a href="#">Link</a></li>--}}
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        </header><!-- header role="banner" -->

        @yield('content')
        <script src="js/all.js"></script>
        @yield('scripts')
        @include('partials._flash')
    </body>
</html>