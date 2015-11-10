<!DOCTYPE html>
<html>
    <head>
        <title>Menu Maker</title>
        <link rel="icon" type="image/png" href="/img/favicon.png">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        @yield('css')
        <link  href="{{ elixir('css/all.css') }}" rel="stylesheet" media="all">

    </head>
    <body>
        <header role="banner">
            <img  id="logo-main" src="/img/bufalina-logo.png" alt="Logo" class="logo">
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
                <li class="{{ \Request::is('/') ? 'active' : '' }}"><a href="{{ url('/admin/menus') }}"><span class="ion ion-ionic"></span> Home</a></li>
                <li class="{{ \Request::is('admin/menus/'.str_slug($menu->name).'/edit') ? 'active' : '' }}"><a href="{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}"><span class="ion ion-ios-color-wand-outline"></span> Edit</a></li>
                <li><a href="{{ url('admin/pdf/'.str_slug($menu->name)) }}" target="_blank"><span class="ion ion-ios-eye-outline"></span> Preview</a></a></li> 
                <li><a href="{{ url('admin/menus/'.str_slug($menu->name).'/save') }}" ><span class="ion ion-ios-reload"></span> Save</a></li>
                <li><a href="{{ url('admin/pdf/'.str_slug($menu->name).'/download') }}" ><span class="ion ion-ios-cloud-download-outline"></span> Download</a></li>
                <li class="{{ \Request::is('admin/menus/'.str_slug($menu->name).'/archive') ? 'active' : '' }}"><a href="{{ url('admin/menus/'.str_slug($menu->name).'/archive') }}"><span class="ion ion-ios-filing-outline"></span> Archive</a></li>
{{--                 <li><a href="#">Link</a></li>--}}
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        </header><!-- header role="banner" -->

        @yield('content')
        <script src="/js/all.js"></script>
        @yield('scripts')
        @include('partials._flash')
    </body>
</html>