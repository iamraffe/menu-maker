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
        <h2>Reset your password for your Menu Styler account</h2>
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
        <form class="form-horizontal" role="form" method="POST" action="https://www.parse.com/apps/menu-maker--2/request_password_reset">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="username" value="{{ $username }}">
          <input type="hidden" name="token" value="{{ $token }}">
          <input name='utf-8' type='hidden' value='âœ“' />
         <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="ion ion-ios-locked-outline"></i></span>
                <input type="password" class="form-control" name="new_password" value="" placeholder="New password...">                                        
            </div>  
         </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary pull-right">
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
