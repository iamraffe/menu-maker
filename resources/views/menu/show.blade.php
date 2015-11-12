@extends('layout')

@section('css')
@stop

@section('content')
    <div class="wrapper">
        @include('partials._columns', compact('categories', 'items'))           
    </div>
@stop

@section('scripts')
<script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
      }
    });

    function cleanTabs(){
      $('a[data-toggle="tab"]').parent().removeClass('active');
      $('.tab-pane').removeClass('active');
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
</script>
@stop