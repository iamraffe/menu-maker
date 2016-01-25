@extends('basic-layout')

@section('content')
<div class="container login-page">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <ul class="nav nav-tabs">
            <li class="active col-xs-6 text-center"><a href="#login" data-toggle="tab" aria-expanded="true">login</a></li>
            <li class="col-xs-6 text-center"><a href="#register" data-toggle="tab" aria-expanded="false">register</a></li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="login">
                <form id="login-form" action="{{ url('/auth/login') }}" method="post"class="form-horizontal animated fadeIn">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <div class="form-group">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="ion ion-ios-person-outline"></i></span>
                          <input type="text" class="form-control" name="username" value="" placeholder="Username">
                      </div>
                   </div>
                   <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="ion ion-ios-locked-outline"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="col-sm-10 col-sm-offset-1">
                        <a href="{{ url('password/email') }}" class="btn btn-link pull-right">Forgot password? <span class="ion ion-ios-help-outline"></span></a>
                      </div>
                    </div>
                   </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-default pull-right">Log in <i class="ion ion-ios-arrow-thin-right"></i></button>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="register">
              <form id="register-form" action="{{ url('/auth/register') }}" method="POST" role="form">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="ion ion-ios-person-outline"></i></span>
                      <input type="text" class="form-control" name="username" value="" placeholder="Username">
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="ion ion-ios-email-outline"></i></span>
                      <input type="text" class="form-control" name="email" value="" placeholder="E-mail" aria-describedby="basic-addon2">
                      {{-- <span class="input-group-addon" id="basic-addon2">@bufalinapizza.com</span> --}}
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="ion ion-ios-locked-outline"></i></span>
                      <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                      <span class="input-group-addon"><i class="ion ion-ios-locked-outline"></i></span>
                      <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-group">
                    <button type="submit" class="btn btn-default pull-right">Register <i class="ion ion-ios-arrow-thin-right"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
{{--       <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <a href="#" class="active" id="login-form-link">Login</a>
              </div>
              <div class="col-xs-6">
                <a href="#" id="register-form-link">Register</a>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="login-form" action="{{ url('/auth/login') }}" method="post"class="form-horizontal animated fadeIn">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <div class="form-group">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="ion ion-ios-person-outline"></i></span>
                          <input type="text" class="form-control" name="username" value="" placeholder="Username">
                      </div>
                   </div>
                   <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="ion ion-ios-locked-outline"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="col-sm-10 col-sm-offset-1">
                        <a href="{{ url('password/email') }}" class="btn btn-link pull-right">Forgot password? <span class="ion ion-ios-help-outline"></span></a>
                      </div>
                    </div>
                   </div>
                    <div class="form-group">
                      <button type="submit" href="#" class="btn btn-default pull-right">Log in <i class="ion ion-ios-arrow-thin-right"></i></button>
                    </div>
                </form>
                <form id="register-form" action="http://phpoll.com/register/process" method="post" role="form" style="display: none;">
                  <div class="form-group">
                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
{{-- <div class="col-md-6 col-md-offset-3">
  @if (count($errors) > 0)
      <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  <form action="{{ url('/auth/login') }}" method="post"class="form-horizontal animated fadeIn">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
     <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="ion ion-ios-person-outline"></i></span>
            <input type="text" class="form-control" name="username" value="" placeholder="Username">
        </div>
     </div>
     <div class="form-group">
      <div class="input-group">
          <span class="input-group-addon"><i class="ion ion-ios-locked-outline"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
      <div class="form-group">
        <div class="col-sm-10 col-sm-offset-1">
          <a href="{{ url('password/email') }}" class="btn btn-link pull-right">Forgot password? <span class="ion ion-ios-help-outline"></span></a>
        </div>
      </div>
     </div>
      <div class="form-group">
        <button type="submit" href="#" class="btn btn-default pull-right">Log in <i class="ion ion-ios-arrow-thin-right"></i></button>
      </div>
  </form>
</div> --}}
@stop

@section('scripts')
<script>
$(function() {

    $('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
    $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  $('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
    $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

});

</script>
@stop
