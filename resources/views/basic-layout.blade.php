<!DOCTYPE html>
<html>
    <head>
        <title>Menu Maker</title>
        <link rel="icon" type="image/png" href="/img/favicon.png">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link href="/css/all.css" rel="stylesheet" media="all">
    </head>
    <body>
      <div id="no-nav-container" class="container-fluid">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h1>Bufalina</h1>
            <img src="/img/bufalina-logo.png" alt="Bufalina Logo" class="bufalina-logo animated fadeIn">
          </div> 
        </div>
        @yield('content')
      </div>
      <script src="/js/all.js"></script>
      @yield('scripts')
    </body>
</html>