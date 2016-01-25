@extends('layout')

@section('content')
        <div id="loading">
            <div class="container">
                 <div class="progress">
                  <div class="progress-bar progress-bar-striped active progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                    Loading...
                  </div>
                </div>
            </div>

        </div>
    <div class="wrapper-landscape {{ $group->name }}" style="position: relative;">
         <div class="left-column column">
            <div class="column-container">
                
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <img class="logo-cover" src="{{ $group->logo }}" alt="Bufalina Logo">
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
                <h2 class="category" data-id="{{$category->getObjectId()}}" style="visibility:hidden; height: 0px;">
                {{--{!! $category->name !!}--}}
                </h2>
                <div class="separator"></div>
                @foreach($items as $item)
                    @if(null !== $item->category && $item->category->objectId == $category->objectId)
                      <div class="item-container menu-text">
                        <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-category="{{ $category->getObjectId() }}" data-action="edit" data-type="html" data-toggle="modal">
                            <span class="ion ion-ios-compose-outline"></span>
                        </a>
                        {!! $item->relatedText !!}
                      </div>
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
                <h2 class="category" data-id="{{$category->getObjectId()}}">
                    {!! $category->name !!}
                    <a href="#myModal" role="button" class="open-modal" data-parent="{{ $category->getObjectId() }}" data-id="{{ $category->getObjectId() }}" data-action="edit-category" class="btn btn-link" data-toggle="modal">
                        <span class="ion ion-ios-compose-outline"></span>
                    </a>
                </h2>
                <div class="separator"></div>
                @foreach($items as $item)
                    @if(null !== $item->category && $item->category->objectId == $category->objectId)
                      <div class="item-container menu-text">
                        <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-position="{{ $item->position }}" data-category="{{ $category->getObjectId() }}" data-action="edit" data-type="html" data-toggle="modal">
                            <span class="ion ion-ios-compose-outline"></span>
                        </a>
                        {!! $item->relatedText !!}
                      </div>
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
                        <h2 class="subcategory" data-id="{{ $subcategory->getObjectId() }}">
                          <a href="#myModal" role="button" class="open-modal" data-category="{{ $category->getObjectId() }}" data-subcategory="{{ $subcategory->getObjectId() }}" data-action="add" data-menu="{{ $menu->getObjectId() }}"  class="btn btn-link" data-toggle="modal">
                              <span class="ion ion-ios-plus-outline"></span>
                          </a>
                          {{$subcategory->name}}
                          <a href="#myModal" role="button" class="open-modal" data-id="{{ $subcategory->getObjectId() }}" data-action="edit-subcategory" class="btn btn-link" data-toggle="modal">
                              <span class="ion ion-ios-compose-outline"></span>
                          </a>
                        </h2>
                        <div class="menu-contents item-container">
                          @foreach($items as $item)
                              @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                  <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                      <button class="btn btn-link">
                                          <span class="ion ion-ios-shuffle"></span>
                                      </button>
                                      <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                          <span class="ion ion-ios-close-outline"></span>
                                      </button>
                                      {!! $item->relatedText !!}
                                      <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-type="text" data-action="edit" data-toggle="modal">
                                          <span class="ion ion-ios-compose-outline"></span>
                                      </a>
                                  </p>
                              @endif 
                          @endforeach
                        </div>
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
                <h2 class="category" data-id="{{$category->getObjectId()}}">
                    {!! $category->name !!}
                    <a href="#myModal" role="button" class="open-modal" data-parent="{{ $category->getObjectId() }}" data-id="{{ $category->getObjectId() }}" data-action="edit-category" class="btn btn-link" data-toggle="modal">
                        <span class="ion ion-ios-compose-outline"></span>
                    </a>
                </h2>
                <div class="separator"></div>
                @foreach($items as $item)
                    @if(null !== $item->category && $item->category->objectId == $category->objectId)
                      <div class="item-container menu-text">
                        <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-position="{{ $item->position }}" data-category="{{ $category->getObjectId() }}" data-action="edit" data-type="html" data-toggle="modal">
                            <span class="ion ion-ios-compose-outline"></span>
                        </a>
                        {!! $item->relatedText !!}
                      </div>
                    @endif 
                @endforeach                   
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <img class="category-logo" src="{{ $group->logo }}" alt="Logo" class="logo" style="visibility: hidden; ">
                <h2  class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="separator"></div>
                <h2 class="subcategory" data-id="{{$category->getObjectId()}}">{!! $category->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position < 2 && $subcategory->category->objectId == $category->objectId)
                        <h2 class="subcategory" data-id="{{ $subcategory->getObjectId() }}">
                          <a href="#myModal" role="button" class="open-modal" data-category="{{ $category->getObjectId() }}" data-subcategory="{{ $subcategory->getObjectId() }}" data-action="add" data-menu="{{ $menu->getObjectId() }}"  class="btn btn-link" data-toggle="modal">
                              <span class="ion ion-ios-plus-outline"></span>
                          </a>
                          {{$subcategory->name}}
                          <a href="#myModal" role="button" class="open-modal" data-id="{{ $subcategory->getObjectId() }}" data-action="edit-subcategory" class="btn btn-link" data-toggle="modal">
                              <span class="ion ion-ios-compose-outline"></span>
                          </a>
                        </h2>
                        <div class="menu-contents item-container">
                          @foreach($items as $item)
                              @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                  <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                      <button class="btn btn-link">
                                          <span class="ion ion-ios-shuffle"></span>
                                      </button>
                                      <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                          <span class="ion ion-ios-close-outline"></span>
                                      </button>
                                      {!! $item->relatedText !!}
                                      <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-type="text" data-action="edit" data-toggle="modal">
                                          <span class="ion ion-ios-compose-outline"></span>
                                      </a>
                                  </p>
                              @endif 
                          @endforeach
                        </div>
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
                <h2 class="subcategory" data-id="{{$category->getObjectId()}}">{!! $category->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position > 1 && $subcategory->category->objectId == $category->objectId)
                        <h2 class="subcategory" data-id="{{ $subcategory->getObjectId() }}">
                          <a href="#myModal" role="button" class="open-modal" data-category="{{ $category->getObjectId() }}" data-subcategory="{{ $subcategory->getObjectId() }}" data-action="add" data-menu="{{ $menu->getObjectId() }}"  class="btn btn-link" data-toggle="modal">
                              <span class="ion ion-ios-plus-outline"></span>
                          </a>
                          {{$subcategory->name}}
                          <a href="#myModal" role="button" class="open-modal" data-id="{{ $subcategory->getObjectId() }}" data-action="edit-subcategory" class="btn btn-link" data-toggle="modal">
                              <span class="ion ion-ios-compose-outline"></span>
                          </a>
                        </h2>
                        <div class="menu-contents item-container">
                          @foreach($items as $item)
                              @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                  <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                      <button class="btn btn-link">
                                          <span class="ion ion-ios-shuffle"></span>
                                      </button>
                                      <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                          <span class="ion ion-ios-close-outline"></span>
                                      </button>
                                      {!! $item->relatedText !!}
                                      <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-type="text" data-action="edit" data-toggle="modal">
                                          <span class="ion ion-ios-compose-outline"></span>
                                      </a>
                                  </p>
                              @endif 
                          @endforeach
                        </div>
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
                <h2 class="category" data-id="{{$category->getObjectId()}}">
                    {!! $category->name !!}
                    <a href="#myModal" role="button" class="open-modal" data-parent="{{ $category->getObjectId() }}" data-id="{{ $category->getObjectId() }}" data-action="edit-category" class="btn btn-link" data-toggle="modal">
                        <span class="ion ion-ios-compose-outline"></span>
                    </a>
                </h2>
                <div class="separator"></div>
                @foreach($items as $item)
                    @if(null !== $item->category && $item->category->objectId == $category->objectId)
                      <div class="item-container menu-text">
                        <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-position="{{ $item->position }}" data-category="{{ $category->getObjectId() }}" data-action="edit" data-type="html" data-toggle="modal">
                            <span class="ion ion-ios-compose-outline"></span>
                        </a>
                        {!! $item->relatedText !!}
                      </div>
                    @endif 
                @endforeach                   
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <img class="category-logo" src="{{ $group->logo }}" alt="Logo" class="logo" style="visibility: hidden; ">
                <h2  class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="separator"></div>
                <h2 class="subcategory" data-id="{{$category->getObjectId()}}">{!! $category->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position < 2 && $subcategory->category->objectId == $category->objectId)
                        <h2 class="subcategory" style="padding-top:0; font-size: 14px; padding-bottom: 12.5px;" data-id="{{$subcategory->getObjectId()}}">
                          <a href="#myModal" role="button" class="open-modal" data-category="{{ $category->getObjectId() }}" data-subcategory="{{ $subcategory->getObjectId() }}" data-action="add" data-menu="{{ $menu->getObjectId() }}"  class="btn btn-link" data-toggle="modal">
                            <span class="ion ion-ios-plus-outline"></span>
                          </a>
                          {{$subcategory->name}}
                          <a href="#myModal" role="button" class="open-modal" data-id="{{ $subcategory->getObjectId() }}" data-action="edit-subcategory" class="btn btn-link" data-toggle="modal">
                              <span class="ion ion-ios-compose-outline"></span>
                          </a>
                        </h2>
                        <div class="menu-contents item-container">
                          @foreach($items as $item)
                              @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                  <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                      <button class="btn btn-link">
                                          <span class="ion ion-ios-shuffle"></span>
                                      </button>
                                      <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                          <span class="ion ion-ios-close-outline"></span>
                                      </button>
                                      {!! $item->relatedText !!}
                                      <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-type="text" data-action="edit" data-toggle="modal">
                                          <span class="ion ion-ios-compose-outline"></span>
                                      </a>
                                  </p>
                              @endif 
                          @endforeach
                        </div>
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
                <h2 class="subcategory" data-id="{{$category->getObjectId()}}">{!! $category->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position > 1 && $subcategory->position < 4 &&$subcategory->category->objectId == $category->objectId)
                        <h2 class="subcategory" style="padding-top:0; font-size: 14px; padding-bottom: 12.5px;" data-id="{{$subcategory->getObjectId()}}">
                          <a href="#myModal" role="button" class="open-modal" data-category="{{ $category->getObjectId() }}" data-subcategory="{{ $subcategory->getObjectId() }}" data-action="add" data-menu="{{ $menu->getObjectId() }}"  class="btn btn-link" data-toggle="modal">
                            <span class="ion ion-ios-plus-outline"></span>
                          </a>
                          {{$subcategory->name}}
                          <a href="#myModal" role="button" class="open-modal" data-id="{{ $subcategory->getObjectId() }}" data-action="edit-subcategory" class="btn btn-link" data-toggle="modal">
                              <span class="ion ion-ios-compose-outline"></span>
                          </a>
                        </h2>
                        <div class="menu-contents item-container">
                          @foreach($items as $item)
                              @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                  <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                      <button class="btn btn-link">
                                          <span class="ion ion-ios-shuffle"></span>
                                      </button>
                                      <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                          <span class="ion ion-ios-close-outline"></span>
                                      </button>
                                      {!! $item->relatedText !!}
                                      <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-type="text" data-action="edit" data-toggle="modal">
                                          <span class="ion ion-ios-compose-outline"></span>
                                      </a>
                                  </p>
                              @endif 
                          @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <img class="category-logo" src="{{ $group->logo }}" alt="Logo" class="logo" style="visibility: hidden;">
                <h2 class="by-the-bottle" style="visibility: hidden;">BY THE BOTTLE</h2>
                <h2 class="subcategory" data-id="{{$category->getObjectId()}}">{!! $category->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position > 3 && $subcategory->category->objectId == $category->objectId)
                        <h2 class="subcategory" style="padding-top:0; font-size: 14px; padding-bottom: 12.5px;" data-id="{{$subcategory->getObjectId()}}">
                          <a href="#myModal" role="button" class="open-modal" data-category="{{ $category->getObjectId() }}" data-subcategory="{{ $subcategory->getObjectId() }}" data-action="add" data-menu="{{ $menu->getObjectId() }}"  class="btn btn-link" data-toggle="modal">
                            <span class="ion ion-ios-plus-outline"></span>
                          </a>
                          {{$subcategory->name}}
                          <a href="#myModal" role="button" class="open-modal" data-id="{{ $subcategory->getObjectId() }}" data-action="edit-subcategory" class="btn btn-link" data-toggle="modal">
                              <span class="ion ion-ios-compose-outline"></span>
                          </a>
                        </h2>
                        <div class="menu-contents item-container">
                          @foreach($items as $item)
                              @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                  <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                      <button class="btn btn-link">
                                          <span class="ion ion-ios-shuffle"></span>
                                      </button>
                                      <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                          <span class="ion ion-ios-close-outline"></span>
                                      </button>
                                      {!! $item->relatedText !!}
                                      <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-type="text" data-action="edit" data-toggle="modal">
                                          <span class="ion ion-ios-compose-outline"></span>
                                      </a>
                                  </p>
                              @endif 
                          @endforeach
                        </div>
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
                        <h2 class="subcategory" data-id="{{$subcategory->getObjectId()}}">
                          <a href="#myModal" role="button" class="open-modal" data-category="{{ $category->getObjectId() }}" data-subcategory="{{ $subcategory->getObjectId() }}" data-action="add" data-menu="{{ $menu->getObjectId() }}"  class="btn btn-link" data-toggle="modal">
                              <span class="ion ion-ios-plus-outline"></span>
                          </a>
                          {{$subcategory->name}}
                          <a href="#myModal" role="button" class="open-modal" data-id="{{ $subcategory->getObjectId() }}" data-action="edit-subcategory" class="btn btn-link" data-toggle="modal">
                              <span class="ion ion-ios-compose-outline"></span>
                          </a>
                        </h2>
                        <div class="menu-contents item-container">
                          @foreach($items as $item)
                              @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                  <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                      <button class="btn btn-link">
                                          <span class="ion ion-ios-shuffle"></span>
                                      </button>
                                      <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                          <span class="ion ion-ios-close-outline"></span>
                                      </button>
                                      {!! $item->relatedText !!}
                                      <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-type="text" data-action="edit" data-toggle="modal">
                                          <span class="ion ion-ios-compose-outline"></span>
                                      </a>
                                  </p>
                              @endif 
                          @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <h2 class="by-the-bottle" style="visibility: hidden; margin-top: 1.917cm;">BY THE BOTTLE</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position > 5 && $subcategory->category->objectId == $category->objectId)
                        <h2 class="subcategory" data-id="{{$subcategory->getObjectId()}}">
                          <a href="#myModal" role="button" class="open-modal" data-category="{{ $category->getObjectId() }}" data-subcategory="{{ $subcategory->getObjectId() }}" data-action="add" data-menu="{{ $menu->getObjectId() }}"  class="btn btn-link" data-toggle="modal">
                              <span class="ion ion-ios-plus-outline"></span>
                          </a>
                          {{$subcategory->name}}
                          <a href="#myModal" role="button" class="open-modal" data-id="{{ $subcategory->getObjectId() }}" data-action="edit-subcategory" class="btn btn-link" data-toggle="modal">
                              <span class="ion ion-ios-compose-outline"></span>
                          </a>
                        </h2>
                        <div class="menu-contents item-container">
                          @foreach($items as $item)
                              @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                  <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                      <button class="btn btn-link">
                                          <span class="ion ion-ios-shuffle"></span>
                                      </button>
                                      <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                          <span class="ion ion-ios-close-outline"></span>
                                      </button>
                                      {!! $item->relatedText !!}
                                      <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-position="{{ $item->position }}" data-type="text" data-action="edit" data-toggle="modal">
                                          <span class="ion ion-ios-compose-outline"></span>
                                      </a>
                                  </p>
                              @endif 
                          @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        </div>        
    </div> 
@endif
@endforeach
@stop

@section('scripts')
<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script type="text/javascript">
/*
SET AJAX HEADERS
 */
$.ajaxSetup({
  headers: {
    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
  }
});

/*
MODAL CONFIG & INIT VALUES
 */
$('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var modal = $(this)
  var category = button.data('category');
  var subcategory = button.data('subcategory');
  // var position = button.data('position');
  var id = button.data('id');
  var type = button.data('type');
  var menu = button.data('menu');

  if(button.data('action') === 'add'){
    modal.find('h3').text('ADD ITEM');
    tinyMCE.activeEditor.setContent('');
    modal.find('button.item-action').removeClass().addClass('btn btn-info item-action add-item').text('Add Item');
  }
  else if(button.data('action') === 'edit'){
    button.parent().find('button').addClass('hide');
    modal.find('h3').text('EDIT ITEM');
    tinyMCE.activeEditor.setContent(button.parent().html());
    modal.find('button.item-action').removeClass().addClass('btn btn-info item-action update-item').text('Update Item');
  }
  else if(button.data('action') === 'edit-category'){
    modal.find('h3').text('EDIT CATEGORY');
    tinyMCE.activeEditor.setContent(button.parent().html());
    // button.parent().find('button').addClass('hide');
    modal.find('button.item-action').removeClass().addClass('btn btn-info item-action update-category').text('Update Category');
  }
  else if(button.data('action') === 'edit-subcategory'){
    modal.find('h3').text('EDIT SUBCATEGORY');
    tinyMCE.activeEditor.setContent(button.parent().html());
    // button.parent().find('button').addClass('hide');
    modal.find('button.item-action').removeClass().addClass('btn btn-info item-action update-subcategory').text('Update Subcategory');
  }
  modal.find('.modal-body input[name=menu]').val(menu);
  modal.find('.modal-body input[name=type]').val(type);
  modal.find('.modal-body input[name=category]').val(category);
  modal.find('.modal-body input[name=subcategory]').val(subcategory);
  modal.find('.modal-body input[name=id]').val(id);
  // modal.find('.modal-body input[name="position"]').val(position);
});
$('#myModal').on('hide.bs.modal', function (event) {
  $('button').removeClass('hide add-item update-item');
});

/*
TYNYMCE INIT
 */
tinymce.init({
    selector:   "textarea",
    body_class: "tinymce-body",
    content_css: "/css/all.css",
    skin_url: "/skins/light",
    width:      '100%',
    height:     50,
    statusbar:  false,
    menubar:    false,
    toolbar:    "bold | BR",
    theme: "modern",
    skin: 'light',
    setup: function(editor) {
        editor.addButton('BR', {
            text: 'Insert Breakline',
            icon: false,
            onclick: function() {
                editor.insertContent('<br>');
                editor.selection.select(editor.getBody(), true);
                editor.selection.collapse(false);
            }
        });
    }
});
// Prevent bootstrap dialog from blocking focusin
$(document).on('focusin', function(e) {
    if ($(e.target).closest(".mce-window").length) {
        e.stopImmediatePropagation();
    }
});

/*
ADD ITEM
 */
$(document).on('click', '.item-action.add-item', function(e){

    e.preventDefault();

    var data = {
        menu: $(this).parent().siblings('.modal-body').children('input[name=menu]').val(),
        category: $(this).parent().siblings('.modal-body').children('input[name=category]').val(),
        subcategory: $(this).parent().siblings('.modal-body').children('input[name=subcategory]').val(),
        relatedText: $($.parseHTML(tinymce.get('content').getContent())).html()

    };

    $.ajax({
      url: "{{ url('/admin/items/') }}",
      data: data,
      type        : 'POST',
      encode          : true,
      async: true,
      beforeSend: function(){
        $('#loading').show().fadeIn('fast');
        $('#myModal').modal('hide');
      },
      success: function(response){
        $('#loading').hide();
        console.log(response);
        $('*[data-id='+data["subcategory"]+']').next('.menu-contents').append(response);
        // window.location.href = "{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}";
      },
      error: function(xhr, textStatus, thrownError) {
          swal({
              title: 'ERROR',
              text: 'There was an error with your request. If this error persists please contact your webmaster.',
              type: "error",
              showConfirmButton: true
          });
      },
    });

});

/*
UPDATE CATEGORY
 */
$(document).on('click', '.update-category', function(e){
    e.preventDefault();

    var data = {
        objectId: $(this).parent().siblings('.modal-body').children('input[name=id]').val(),
        name: $($.parseHTML(tinymce.get('content').getContent())).children('button').remove().end().html(),
        _method: 'PUT'
    };
    
    $.ajax({
      url: "{{ url('/admin/categories/') }}"+"/"+data["objectId"],
      data: data,
      type        : 'POST',
      encode          : true,
      async: true,
      beforeSend: function(){
        $('#loading').show().fadeIn('fast');
        $('#myModal').modal('hide');
      },
      success: function(response){
        $('#loading').hide();
        $('#myModal').modal('hide');
        var html = data["name"]+' <a href="#myModal" role="button" class="open-modal" data-id="'+data["objectId"]+'" data-action="edit-category" class="btn btn-link" data-toggle="modal"><span class="ion ion-ios-compose-outline"></span></a>';
         $('h2[data-id='+data["objectId"]+']').html(html);
        // window.location.href = "{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}";
      },
      error: function(xhr, textStatus, thrownError) {
          swal({
              title: 'ERROR',
              text: 'There was an error with your request. If this error persists please contact your webmaster.',
              type: "error",
              showConfirmButton: true
          });
      },
    });
});

/*
UPDATE SUBCATEGORY
 */
$(document).on('click', '.update-subcategory', function(e){
    e.preventDefault();

    var data = {
        category: $(this).parent().siblings('.modal-body').children('input[name=category]').val(),
        objectId: $(this).parent().siblings('.modal-body').children('input[name=id]').val(),
        name: $($.parseHTML(tinymce.get('content').getContent())).children('button').remove().end().html(),
        _method: 'PUT'
    };
    
    $.ajax({
      url: "{{ url('/admin/subcategories/') }}"+"/"+data["objectId"],
      data: data,
      type        : 'POST',
      encode          : true,
      async: true,
      beforeSend: function(){
        $('#loading').show().fadeIn('fast');
        $('#myModal').modal('hide');
      },
      success: function(response){
        $('#loading').hide();
        $('#myModal').modal('hide');
        var html = '<a href="#myModal" role="button" class="open-modal" data-category="'+data["category"]+'" data-subcategory="'+data["objectId"]+'" data-action="add" data-menu="{{ $menu->getObjectId() }}"  class="btn btn-link" data-toggle="modal"><span class="ion ion-ios-plus-outline"></span></a> '+data["name"]+' <a href="#myModal" role="button" class="open-modal" data-id="'+data["objectId"]+'" data-action="edit-subcategory" class="btn btn-link" data-toggle="modal"><span class="ion ion-ios-compose-outline"></span></a>';
        $('h2[data-id='+data["objectId"]+']').html(html);
        // window.location.href = "{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}";
      },
      error: function(xhr, textStatus, thrownError) {
          swal({
              title: 'ERROR',
              text: 'There was an error with your request. If this error persists please contact your webmaster.',
              type: "error",
              showConfirmButton: true
          });
      },
    });
});
function getStats(id) {
    var body = tinymce.get(id).getBody(), text = tinymce.trim(body.innerText || body.textContent);

    return {
        chars: text.length,
        words: text.split(/[\w\u2019\'-]+/).length
    };
}
/*
UPDATE ITEM
 */
$(document).on('click', '.update-item', function(e){
    e.preventDefault();
    console.log("click")
    var type = $(this).parent().siblings('.modal-body').children('input[name=type]').val();
    var chars_num = getStats('content').chars;
    if (chars_num > 1000) {
        swal({
            title: 'ERROR',
            text: "The text is too large. This section can only house 1000 characters. You are trying to enter "+chars_num+".",
            type: "error",
            showConfirmButton: true
        });
        return;
    }
    var data = {
        objectId: $(this).parent().siblings('.modal-body').children('input[name=id]').val(),
        category: $(this).parent().siblings('.modal-body').children('input[name=category]').val(),
        relatedText: type === 'html' ? tinymce.activeEditor.getContent() : $($.parseHTML(tinymce.get('content').getContent())).children('button').remove().end().html(),
        _method: 'PUT'
    };
    var html = '<a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="'+data["objectId"]+'" data-category="'+data["category"]+'" data-action="edit" data-type="html" data-toggle="modal"><span class="ion ion-ios-compose-outline"></span></a>'+data["relatedText"];

    $.ajax({
      url: "{{ url('/admin/items/') }}"+"/"+data["objectId"],
      data: data,
      type        : 'POST',
      encode          : true,
      async: true,
      beforeSend: function(){
        $('#loading').show().fadeIn('fast');
        $('#myModal').modal('hide');
      },
      success: function(response){
        $('#loading').hide();
        $('#myModal').modal('hide');
        var text = '<button class="btn btn-link"><span class="ion ion-ios-shuffle"></span></button> <button class="delete-item btn btn-link" data-id="'+data['objectId']+'"><span class="ion ion-ios-close-outline"></span></button>'+data['relatedText']+' <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="'+data['objectId']+'" data-action="edit" data-type="text" data-toggle="modal"><span class="ion ion-ios-compose-outline"></span></a>';
        if(type === 'text'){
          $('p#'+data["objectId"]).html(text);
        }
        else{
          $('h2.category[data-id='+data["category"]+']').siblings('.menu-text').html(html);
        }
        // window.location.href = "{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}";
      },
      error: function(xhr, textStatus, thrownError) {
          swal({
              title: 'ERROR',
              text: 'There was an error with your request. If this error persists please contact your webmaster.',
              type: "error",
              showConfirmButton: true
          });
      },
    });
});
/*
UPDATE ITEM POSITIONS
 */
$(function() {
    $( ".menu-contents" ).sortable({ 
        placeholder: "ui-sortable-placeholder",
        activate: function(e,ui){
            $(this).addClass('draggin');
        },
        axis: "y",
        update: function (event, ui) {
            var order = $(this).sortable('toArray');

            var data = {
              order: $(this).sortable('toArray'),
              _method: 'PUT'
            }

            $.ajax({
              url: "{{ url('admin/items/positions') }}",
              data: data,
              type        : 'POST',
              encode          : true,
              async: true,
              beforeSend: function(){
                $('#loading').show().fadeIn('fast');
              },
              success: function(response){
                $('#loading').hide();
                // window.location.href = "{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}";
              },
              error: function(xhr, textStatus, thrownError) {
                  swal({
                      title: 'ERROR',
                      text: 'There was an error with your request. If this error persists please contact your webmaster.',
                      type: "error",
                      showConfirmButton: true
                  });
              },
            });
        }
    });
});
/*
DELETE ITEM
 */
$(document).on('click', 'button.delete-item', function(e){
    e.preventDefault();
    var param = $(this).attr("data-id");
    swal({
      title: "Are you sure you want to delete this item?",
      text: "You will not be able to undo this action!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: true 
    }, function(){
      $.ajax({
          type        : 'POST',
          url         : "{{ url('admin/items/') }}"+"/"+param,
          data : {_method : 'DELETE'},
          encode          : true,
          beforeSend: function(){
            $('#loading').show().fadeIn('fast');
          },
          error: function(xhr, textStatus, thrownError) {
              swal({
                  title: 'ERROR',
                  text: 'There was an error with your request. If this error persists please contact your webmaster.',
                  type: "error",
                  showConfirmButton: true
              });
          },
          success: function(response) {
              $('#loading').hide();
              $('p#'+param).remove();
              // window.location.href = "{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}";
          }
      });
    });
});
</script>
@stop