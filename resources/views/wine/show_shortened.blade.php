@extends('layout')

@section('content')
    <div class="wrapper-landscape" style="position: relative;">
        <div class="left-column column">
            <div class="column-container">

            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <img class="logo-cover" src="{{ $group->menu_logo }}" alt="Bufalina Logo">
            </div>
        </div>
    </div>
<!-- CATEGORY START -->
<!-- cat 5 -->
    <div class="wrapper-landscape">
        <div class="left-column column">
            <div class="column-container">
                <h2 class="by-the-bottle" style="margin-top: 1.917cm;">{{ $categories[4]->name }}</h2>
                <div class="separator" style="top: 40px;"></div>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position < 6 && $subcategory->category->objectId == $categories[4]->objectId)
                        <h2 class="subcategory">{{$subcategory->name}}</h2>
                        @foreach($items as $item)
                            @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                <p class="ui-state-default">
                                    {!! $item->relatedText !!}
                                </p>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <h2 class="by-the-bottle" style="visibility: hidden; margin-top: 1.917cm;">BY THE BOTTLE</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position > 5 && $subcategory->category->objectId == $categories[4]->objectId)
                        <h2 class="subcategory">{{$subcategory->name}}</h2>
                        @foreach($items as $item)
                            @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                <p class="ui-state-default">
                                    {!! $item->relatedText !!}
                                </p>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
    </div>
<!-- end -->
<!-- cat 2 -->
    <div class="wrapper-landscape">
        <div class="left-column column">
            <div class="column-container">
                <h2 class="by-the-bottle" style="margin-top: 1.917cm;">BY THE BOTTLE</h2>
                <div class="big-separator" style="top: 40px;"></div>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->category->objectId == $categories[1]->objectId)
                        <h2  class="subcategory">{{$subcategory->name}}</h2>
                        @foreach($items as $item)
                            @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                <p class="ui-state-default">
                                    {!! $item->relatedText !!}
                                </p>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <h2 class="by-the-bottle" style="visibility: hidden; margin-top: 1.917cm;">BY THE BOTTLE</h2>
                <h2 class="subcategory">{!! $categories[2]->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->category->objectId == $categories[2]->objectId)
                        <h2  class="subcategory">{{$subcategory->name}}</h2>
                        @foreach($items as $item)
                            @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId && $item->position < 6)
                                <p class="ui-state-default">
                                    {!! $item->relatedText !!}
                                </p>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
    </div>
<!-- end -->
<!-- cat 4 -->
    <div class="wrapper-landscape">
        <div class="left-column column">
            <div class="column-container">
                <h2 class="by-the-bottle" style="margin-top: 1.917cm;">BY THE BOTTLE</h2>
                <div class="big-separator" style="top: 40px;"></div>
                <h2 class="subcategory">{!! $categories[3]->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position < 3 && $subcategory->category->objectId == $categories[3]->objectId)
                        <h2  class="subcategory">{{$subcategory->name}}</h2>
                        @foreach($items as $item)
                            @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId && $item->position < 20)
                                <p class="ui-state-default">
                                    {!! $item->relatedText !!}
                                </p>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <h2 class="by-the-bottle" style="visibility: hidden; margin-top: 1.917cm;">BY THE BOTTLE</h2>
                <h2 class="subcategory" style="visibility: hidden;">{!! $categories[3]->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position > 2 && $subcategory->position < 5 && $subcategory->category->objectId == $categories[3]->objectId)
                        <h2  class="subcategory">{{$subcategory->name}}</h2>
                        @foreach($items as $item)
                            @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId && $item->position < 12)
                                <p class="ui-state-default">
                                    {!! $item->relatedText !!}
                                </p>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
    </div>
<!-- end -->



<!-- CATEGORY END -->
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
@stop