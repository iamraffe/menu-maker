@extends('basic-layout')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Reset password
            </h1>
        </div>
    </div>
    <!-- /.row -->
    </div>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <h2>Forgot your password?</h2>
        <p>Enter your email address below and we'll send you instructions on how to change your password.</p>
        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>Whoops!</strong> Por favor, revise los siguientes errores:<br><br>
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form class="form-horizontal" role="form" method="POST" action="{{ 'https://www.parse.com/'.$id.'/request_password_reset' }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="username" value="{{ $username }}">
          <input type="hidden" name="token" value="{{ $token }}">
          <input name='utf-8' type='hidden' value='âœ“' />
         <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="ion ion-ios-email-outline"></i></span>
                <input type="password" class="form-control" name="new_password" value="" placeholder="E-mail">                                        
            </div>  
         </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary">
                Reset
                <i class="ion ion-ios-reload"></i>
              </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
