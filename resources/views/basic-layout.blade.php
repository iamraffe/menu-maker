<!DOCTYPE html>
<html>
    <head>
        <title>Menu Maker</title>
        <link rel="icon" type="image/png" href="/img/favicon.png">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <link href="{{ elixir('css/all.css') }}" rel="stylesheet" media="all">
    </head>
    <body>
      <div id="no-nav-container" class="container-fluid">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h1>Bufalina</h1>
            <a href="{{ url('/') }}"><img src="/img/bufalina-logo.png" alt="Bufalina Logo" class="logo animated fadeIn"></a>
          </div> 
        </div>
        @yield('content')
      </div>
      <script src="/js/all.js"></script>
      @yield('scripts')
      @include('partials._flash')
    </body>
</html>