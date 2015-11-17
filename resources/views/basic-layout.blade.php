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
            @if(isset($group->logo) && strcmp($group->logo, '') != 0)
              <a href="{{ url('/') }}"><img src="{{ $group->logo }}" alt="{{ $group->name }} Logo" class="bufalina-logo animated fadeIn"></a>
              <h1 class="hide">{{ $group->name }}</h1>
            @elseif(isset($group->name) && strcmp($group->name, '') != 0)
              <h1>{{ $group->name }}</h1>
            @else
              <h1>Menu Styler</h1>
            @endif
            
          </div> 
        </div>
        @yield('content')
      </div>
      <script src="/js/all.js"></script>
      @yield('scripts')
      @include('partials._flash')
    </body>
</html>