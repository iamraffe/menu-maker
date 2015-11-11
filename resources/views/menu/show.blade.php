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
    $('#user').on('show.bs.modal', function (event) {
        var user = '{{ \Auth::user()->objectId }}';
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
    });
    $('#user').on('hide.bs.modal', function (event) {
        // $('button').removeClass('hide add-item update-item');

    });

</script>
@stop