@extends('basic-layout')

@section('content')
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
</div>
@stop

@section('script')

@stop