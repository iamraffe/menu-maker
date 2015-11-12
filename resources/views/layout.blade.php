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
        @include('partials._modal')
        <header role="banner">
            <a href="{{ url('admin/menus') }}"><img id="logo-main" src="/img/bufalina-logo.png" alt="Logo" class="logo animated fadeIn"></a>
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
                <li class="dropdown">
                  <a class="dropdown-toggle {{ \Request::is('admin/users/') ? 'active' : '' }}" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <span class="ion ion-ios-at-outline"></span>
                    You
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">{{-- 
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Account</li> --}}
                    <li>
                        <a href="#user" href="{{ url('admin/users/'.\Auth::user()->objectId) }}" data-toggle="modal" data-tab="profile">
                            <span class="ion ion-ios-person-outline"></span>
                            My profile
                        </a>
                    </li>
                    <li>
                        <a href="#user" href="{{ url('admin/users/'.\Auth::user()->objectId) }}" data-toggle="modal" data-tab="settings">
                            <span class="ion ion-ios-settings"></span>
                            Preferences
                        </a>
                    </li>
{{--                     <li class="dropdown-header">Group</li>
                    <li><a href="#">Group members</a></li> --}}
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{ url('auth/logout') }}">
                            <span class="ion ion-log-out"></span>
                            Logout
                        </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        </header><!-- header role="banner" -->

        @yield('content')
        <script src="/js/all.js"></script>
        @yield('scripts')
        @include('partials._flash')
        <script>
            $('nav.navbar').affix({
                offset: 140,
            }); 
        </script>
        <script type="text/javascript">
            $.ajaxSetup({
              headers: {
                'X-CSRF-Token': $('meta[name="_token"]').attr('content')
              }
            });

            function cleanTabs(){
              $('a[data-toggle="tab"]').parent().removeClass('active');
              $('.tab-pane').removeClass('active');
              $('#edit-user-info, #collapseExample').collapse('hide');
            }

            function getProfileInfo(user){
              cleanTabs();
              $('.tab-pane#profile').addClass('active');
              $('a[data-toggle="tab"][href=#profile]').parent().addClass('active');
              $.ajax({
                url: "{{ url('admin/users/') }}"+"/"+user,
                type: 'GET',
                encode          : true,
                async: true,
                beforeSend: function(){
                },
                success: function(response){
                  $('.tab-pane#profile').html(response);
                },
                error: function(xhr, textStatus, thrownError) {
                  swal({
                      title: 'ERROR',
                      text: 'There was an error with your request. If this error persists please contact your webmaster.',
                      type: 'error',
                      timer: 2500,
                      showConfirmButton: false
                  });
                },
              });      
            }

            function getAccountSettings(user){
              cleanTabs();
              $('.tab-pane#settings').addClass('active');
              $('a[data-toggle="tab"][href=#settings]').parent().addClass('active');
            }
            $('#myCollapsible').on('hidden.bs.collapse', function () {
              console.log($(this));
            })
            $('a[data-toggle="tab"][href=#profile]').on('show.bs.tab', function (e) {
              getProfileInfo('{{ \Auth::user()->objectId }}');
            })
            $('#user').on('show.bs.modal', function (event) {
                var user = '{{ \Auth::user()->objectId }}';
                var button = $(event.relatedTarget);
                var tab = button.data('tab');
                (tab === 'profile') ? getProfileInfo(user) : getAccountSettings(user);
            });
            $('#user').on('hide.bs.modal', function (event) {
                // $('button').removeClass('hide add-item update-item');

            });

            function updatePassword(new_password){
              $.ajax({
                url: "{{ url('admin/users/'.\Auth::user()->objectId) }}",
                type: 'POST',
                data: {_method: 'PUT', password: new_password},
                encode          : true,
                async: true,
                beforeSend: function(){
                  $('div.request-pending').toggleClass('hide');
                },
                success: function(response){
                  $('div.request-pending').toggleClass('hide');
                  swal({
                      title: '',
                      text: 'Password changed succesfully',
                      type: 'success',
                      timer: 1500,
                      showConfirmButton: false
                  });
                  $('input[name=new_password').val('');
                  $('input[name=confirmation_password').val('');
                  $('#collapseExample').collapse('hide');
                  window.location.href="{{ url('auth/logout') }}";
                },
                error: function(xhr, textStatus, thrownError) {
                  swal({
                      title: 'ERROR',
                      text: 'There was an error with your request. If this error persists please contact your webmaster.',
                      type: 'error',
                      timer: 2500,
                      showConfirmButton: false
                  });
                },
              }); 
            }
            $(document).on('submit', 'form#change-password', function(e){
              e.preventDefault();
              var new_password = $('input[name=new_password').val();
              var confirmation_password =  $('input[name=confirmation_password').val();
              if(new_password === confirmation_password){
                updatePassword(new_password);
              }
              else{
                swal({
                    title: 'Passwords do not match',
                    text: '',
                    type: 'error',
                    timer: 2500,
                    showConfirmButton: false
                });
              }
            });
            $(document).on('submit', 'form#edit-user', function(e){
              e.preventDefault();
              var user = '{{ \Auth::user()->objectId }}';
              $.ajax({
                url: "{{ url('admin/users/') }}"+"/"+user,
                type: 'POST',
                data: {_method: 'PUT', name: $('input[name=name]').val()},
                encode          : true,
                async: true,
                beforeSend: function(){
                  $('div.request-pending').toggleClass('hide');
                },
                success: function(response){
                  $('div.request-pending').toggleClass('hide');
                  swal({
                      title: '',
                      text: 'Profile updated',
                      type: 'success',
                      timer: 1500,
                      showConfirmButton: false
                  });
                  $('#edit-user-info').collapse('hide');
                  getProfileInfo(user);
                },
                error: function(xhr, textStatus, thrownError) {
                  swal({
                      title: 'ERROR',
                      text: 'There was an error with your request. If this error persists please contact your webmaster.',
                      type: 'error',
                      timer: 2500,
                      showConfirmButton: false
                  });
                },
              }); 
            });
        </script>
    </body>
</html>