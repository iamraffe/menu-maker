@extends('basic-layout')

@section('content')
<div class="container register-page">
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
          <div class="signup-flow">
            <form class="register" data-step="0" action role="form" novalidate>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <fieldset class="form-wrapper" data-step="0">
                <h3>Create a new group</h3>
                <div class="form-group">
                  <label class="control-label" for="email">Sign up with your <strong>e-mail address</strong></label>
                  <div class="input-group">
                      <span class="input-group-addon"><i class="ion ion-ios-email-outline"></i></span>
                      <input type="email" class="form-control" name="email" value="" placeholder="you@yourdomain.com">
                  </div>
                  {{-- <p class="help-block">you@yourdomain.com</p>   --}}
                </div>
                <div class="form-group">
                  <div class="form-group">
                    <button type="submit" class="btn btn-default">Next <i class="ion ion-ios-arrow-thin-right"></i></button>
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-wrapper hide" data-step="1">
                <h3>Name your group</h3>
                <div class="form-group">
                  <label class="control-label" for="email">Group name</label>
                  <div class="input-group">
                      <span class="input-group-addon"><i class="ion ion-ios-email-outline"></i></span>
                      <input type="email" class="form-control" name="email" value="" placeholder="Ex. Menu Styler">
                  </div>
                  {{-- <p class="help-block">you@yourdomain.com</p>   --}}
                </div>
                <div class="form-group">
                  <div class="form-group">
                    <button type="submit" class="btn btn-default">Next <i class="ion ion-ios-arrow-thin-right"></i></button>
                  </div>
                </div>
              </fieldset>
            </form>  
            <p id="progress-bullets">
              <span class="bullet first active">•</span>
              <span class="bullet second">•</span>
              <span class="bullet third">•</span>
              <span class="bullet fourth">•</span>
            </p>      
          </div>
        </div>
      </div>
</div>
@stop

@section('scripts')
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
  });
  $('form').validate({
      rules: {
          email: {
              minlength: 3,
              maxlength: 255,
              required: true,
              email: true
          }
      },
      highlight: function (element) {
          $(element).closest('.form-group').addClass('has-error');
      },
      unhighlight: function (element) {
          $(element).closest('.form-group').removeClass('has-error');
      },
      errorElement: 'span',
      errorClass: 'help-block',
      errorPlacement: function (error, element) {
          if (element.parent('.input-group').length) {
              error.insertAfter(element.parent());
          } else {
              error.insertAfter(element);
          }
      },
      submitHandler: function (form) {
          submitForm(form);
          return false;
      }
  });
  function updateBullets(step){
    $('span.bullet').removeClass('active');
    $('span.bullet').eq(parseInt(step)+1).addClass('active');
  }
  function submitForm(form){
    var step = $(form).data('step');
    // console.log(form.serialize());
    $.ajax({
      url: '/group/create/step/'+step,
      method: 'POST',
      encode          : true,
      async: true,
      data: $('form').serialize(),
      success: function(response){
        updateBullets(step);
        $('fieldset[data-step='+step+'],fieldset[data-step='+(parseInt(step)+1)+']').toggleClass('hide');
        console.log('email is good');
      },
      error: function(response){

      }
    });
  };
</script>
@stop