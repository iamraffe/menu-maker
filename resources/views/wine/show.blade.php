@extends('layout')

@section('content')
    <div class="wrapper-landscape {{ $group->name }} {{ $group->name }}" style="position: relative;">
         <div class="left-column column">
            <div class="column-container">

            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                {{-- <img class="logo-cover" src="/img/bufalina-logo-greyscale.png" alt="Bufalina Logo"> --}}
                <img class="logo-cover" src="{{ $group->logo }}" alt="{{ $group->name }}">
            </div>
        </div>
    </div>
@foreach($categories as $category)
@if($category->position == 1)
    <div class="wrapper-landscape {{ $group->name }}">
         <div class="left-column column">
            <div class="column-container">
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container text-container">
                <img class="logo-intro" src="{{ $group->logo }}" alt="Logo" class="logo">
                <div class="separator"></div>
                @foreach($items as $item)
                    @if(null !== $item->category && $item->category->objectId == $category->objectId)
                        {!! $item->relatedText !!}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif
@if($category->position == 2)
    <div class="wrapper-landscape {{ $group->name }}">
         <div class="left-column column">
            <div class="column-container text-container">
                <img class="category-logo" src="{{ $group->logo }}" alt="Logo" class="logo" style="margin-top: 3.513cm;">
                <h2 class="category">{!! $category->name !!}</h2>
                <div class="separator"></div>
                @foreach($items as $item)
                    @if(null !== $item->category && $item->category->objectId == $category->objectId)
                        {!! $item->relatedText !!}
                    @endif
                @endforeach
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <img class="category-logo" src="{{ $group->logo }}" alt="Logo" class="logo" style="visibility: hidden; margin-top: 3.513cm;">
                <h2  class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="separator"></div>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->category->objectId == $category->objectId)
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
    </div>
@endif
@if($category->position == 3)
    <div class="wrapper-landscape {{ $group->name }}">
        <div class="left-column column">
            <div class="column-container text-container">
                <img class="category-logo" src="{{ $group->logo }}" alt="Logo" class="logo" style="">
                <h2 class="category">{!! $category->name !!}</h2>
                <div class="separator"></div>
                @foreach($items as $item)
                    @if(null !== $item->category && $item->category->objectId == $category->objectId)
                        {!! $item->relatedText !!}
                    @endif
                @endforeach
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <img class="category-logo" src="{{ $group->logo }}" alt="Logo" class="logo" style="visibility: hidden; ">
                <h2  class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="separator"></div>
                <h2 class="subcategory">{!! $category->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position < 2 && $subcategory->category->objectId == $category->objectId)
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
    </div>
    <div class="wrapper-landscape {{ $group->name }}">
        <div class="left-column column">
            <div class="column-container">
                <img class="category-logo" src="{{ $group->logo }}" alt="Logo" class="logo" style="visibility: hidden; margin-top: 3.513cm;">
                <h2 class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="separator"></div>
                <h2 class="subcategory">{!! $category->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position > 1 && $subcategory->category->objectId == $category->objectId)
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

            </div>
        </div>
    </div>
@endif
@if($category->position == 4)
    <div class="wrapper-landscape {{ $group->name }}">
        <div class="left-column column">
            <div class="column-container text-container">
                <img class="category-logo" src="{{ $group->logo }}" alt="Logo" class="logo" style="">
                <h2 class="category">{!! $category->name !!}</h2>
                <div class="separator"></div>
                @foreach($items as $item)
                    @if(null !== $item->category && $item->category->objectId == $category->objectId)
                        {!! $item->relatedText !!}
                    @endif
                @endforeach
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <img class="category-logo" src="{{ $group->logo }}" alt="Logo" class="logo" style="visibility: hidden; ">
                <h2  class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="separator"></div>
                <h2 class="subcategory">{!! $category->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position < 2 && $subcategory->category->objectId == $category->objectId)
                        <h2  class="subcategory" style="padding-top:0; font-size: 14px; padding-bottom: 12.5px;">{{$subcategory->name}}</h2>
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
    <div class="wrapper-landscape {{ $group->name }}">
         <div class="left-column column">
            <div class="column-container">
                <img class="category-logo" src="{{ $group->logo }}" alt="Logo" class="logo" style="visibility: hidden;">
                <h2 class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="big-separator"></div>
                <h2 class="subcategory">{!! $category->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position > 1 && $subcategory->position < 4 &&$subcategory->category->objectId == $category->objectId)
                        <h2  class="subcategory" style="padding-top:0; font-size: 14px; padding-bottom: 12.5px;">{{$subcategory->name}}</h2>
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
                <img class="category-logo" src="{{ $group->logo }}" alt="Logo" class="logo" style="visibility: hidden;">
                <h2 class="by-the-bottle" style="visibility: hidden;">BY THE BOTTLE</h2>
                <h2 class="subcategory">{!! $category->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position > 3 && $subcategory->category->objectId == $category->objectId)
                        <h2  class="subcategory" style="padding-top:0; font-size: 14px; padding-bottom: 12.5px;">{{$subcategory->name}}</h2>
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
@endif
@if($category->position == 5)
    <div class="wrapper-landscape {{ $group->name }}">
         <div class="left-column column">
            <div class="column-container">
                <h2 class="by-the-bottle" style="margin-top: 1.917cm;">{{ $category->name }}</h2>
                <div class="big-separator" style="top: 40px;"></div>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position < 6 && $subcategory->category->objectId == $category->objectId)
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
                    @if($subcategory->position > 5 && $subcategory->category->objectId == $category->objectId)
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
@endif
@endforeach
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
