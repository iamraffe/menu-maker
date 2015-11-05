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
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <h3 id="myModalLabel"></h3>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id">
                <input type="hidden" name="category">
                <input type="hidden" name="position">
                <textarea name="content"></textarea>
            </div>

            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Discard</button>
                <button class="btn btn-info item-action"></button>
            </div>
        </div>
    <div class="wrapper-landscape" style="position: relative;">
         <div class="left-column column">
            <div class="column-container">
                
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <img class="logo-cover" src="/img/bufalina-logo-greyscale.png" alt="Bufalina Logo">
            </div>
        </div>  
    </div>
@foreach($categories as $category)
@if($category->position == 1)
    <div class="wrapper-landscape">
         <div class="left-column column">
            <div class="column-container">
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container text-container">
                <img class="logo-intro" src="/img/bufalina-logo-simple-greyscale.png" alt="Logo" class="logo">
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
    <div class="wrapper-landscape">
         <div class="left-column column">
            <div class="column-container text-container">
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="margin-top: 3.513cm;">
                <h2 class="category">
                    {!! $category->name !!}
                    <a href="#myModal" role="button" class="open-modal" data-parent="{{ $category->getObjectId() }}" data-id="{{ $category->getObjectId() }}" data-position="{{ $category->position }}" data-action="edit-category" class="btn btn-link" data-toggle="modal">
                        <span class="fa fa-pencil"></span>
                    </a>
                </h2>
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
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="visibility: hidden; margin-top: 3.513cm;">
                <h2  class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="separator"></div>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->category->objectId == $category->objectId)
                        <h2  class="subcategory">{{$subcategory->name}}</h2>
                        <div class="menu-contents item-container">
                          @foreach($items as $item)
                              @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                  <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                      <button class="btn btn-link">
                                          <span class="fa fa-arrows-v"></span>
                                      </button>
                                      <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                          <span class="fa fa-times"></span>
                                      </button>
                                      {!! $item->relatedText !!}
                                      <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-position="{{ $item->position }}" data-category="{{ $category->getObjectId() }}" data-toggle="modal">
                                          <span class="fa fa-pencil"></span>
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
    <div class="wrapper-landscape">
        <div class="left-column column">
            <div class="column-container text-container">
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="">
                <h2 class="category">
                    {!! $category->name !!}
                    <a href="#myModal" role="button" class="open-modal" data-parent="{{ $category->getObjectId() }}" data-id="{{ $category->getObjectId() }}" data-position="{{ $category->position }}" data-action="edit-category" class="btn btn-link" data-toggle="modal">
                        <span class="fa fa-pencil"></span>
                    </a>
                </h2>
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
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="visibility: hidden; ">
                <h2  class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="separator"></div>
                <h2 class="subcategory">{!! $category->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position < 2 && $subcategory->category->objectId == $category->objectId)
                        <h2  class="subcategory">{{$subcategory->name}}</h2>
                        <div class="menu-contents item-container">
                          @foreach($items as $item)
                              @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                  <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                      <button class="btn btn-link">
                                          <span class="fa fa-arrows-v"></span>
                                      </button>
                                      <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                          <span class="fa fa-times"></span>
                                      </button>
                                      {!! $item->relatedText !!}
                                      <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-position="{{ $item->position }}" data-category="{{ $category->getObjectId() }}" data-toggle="modal">
                                          <span class="fa fa-pencil"></span>
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
    <div class="wrapper-landscape">
        <div class="left-column column">
            <div class="column-container">
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="visibility: hidden; margin-top: 3.513cm;">
                <h2 class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="separator"></div>
                <h2 class="subcategory">{!! $category->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position > 1 && $subcategory->category->objectId == $category->objectId)
                        <h2  class="subcategory">{{$subcategory->name}}</h2>
                        <div class="menu-contents item-container">
                          @foreach($items as $item)
                              @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                  <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                      <button class="btn btn-link">
                                          <span class="fa fa-arrows-v"></span>
                                      </button>
                                      <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                          <span class="fa fa-times"></span>
                                      </button>
                                      {!! $item->relatedText !!}
                                      <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-position="{{ $item->position }}" data-category="{{ $category->getObjectId() }}" data-toggle="modal">
                                          <span class="fa fa-pencil"></span>
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
    <div class="wrapper-landscape">
        <div class="left-column column">
            <div class="column-container text-container">
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="">
                <h2 class="category">
                    {!! $category->name !!}
                    <a href="#myModal" role="button" class="open-modal" data-parent="{{ $category->getObjectId() }}" data-id="{{ $category->getObjectId() }}" data-position="{{ $category->position }}" data-action="edit-category" class="btn btn-link" data-toggle="modal">
                        <span class="fa fa-pencil"></span>
                    </a>
                </h2>
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
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="visibility: hidden; ">
                <h2  class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="separator"></div>
                <h2 class="subcategory">{!! $category->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position < 2 && $subcategory->category->objectId == $category->objectId)
                        <h2  class="subcategory" style="padding-top:0; font-size: 14px; padding-bottom: 12.5px;">{{$subcategory->name}}</h2>
                        <div class="menu-contents item-container">
                          @foreach($items as $item)
                              @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                  <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                      <button class="btn btn-link">
                                          <span class="fa fa-arrows-v"></span>
                                      </button>
                                      <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                          <span class="fa fa-times"></span>
                                      </button>
                                      {!! $item->relatedText !!}
                                      <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-position="{{ $item->position }}" data-category="{{ $category->getObjectId() }}" data-toggle="modal">
                                          <span class="fa fa-pencil"></span>
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
    <div class="wrapper-landscape">
         <div class="left-column column">
            <div class="column-container">
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="visibility: hidden;">
                <h2 class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="big-separator"></div>
                <h2 class="subcategory">{!! $category->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position > 1 && $subcategory->position < 4 &&$subcategory->category->objectId == $category->objectId)
                        <h2  class="subcategory" style="padding-top:0; font-size: 14px; padding-bottom: 12.5px;">{{$subcategory->name}}</h2>
                        <div class="menu-contents item-container">
                          @foreach($items as $item)
                              @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                  <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                      <button class="btn btn-link">
                                          <span class="fa fa-arrows-v"></span>
                                      </button>
                                      <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                          <span class="fa fa-times"></span>
                                      </button>
                                      {!! $item->relatedText !!}
                                      <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-position="{{ $item->position }}" data-category="{{ $category->getObjectId() }}" data-toggle="modal">
                                          <span class="fa fa-pencil"></span>
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
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="visibility: hidden;">
                <h2 class="by-the-bottle" style="visibility: hidden;">BY THE BOTTLE</h2>
                <h2 class="subcategory">{!! $category->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position > 3 && $subcategory->category->objectId == $category->objectId)
                        <h2  class="subcategory" style="padding-top:0; font-size: 14px; padding-bottom: 12.5px;">{{$subcategory->name}}</h2>
                        <div class="menu-contents item-container">
                          @foreach($items as $item)
                              @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                  <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                      <button class="btn btn-link">
                                          <span class="fa fa-arrows-v"></span>
                                      </button>
                                      <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                          <span class="fa fa-times"></span>
                                      </button>
                                      {!! $item->relatedText !!}
                                      <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-position="{{ $item->position }}" data-category="{{ $category->getObjectId() }}" data-toggle="modal">
                                          <span class="fa fa-pencil"></span>
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
    <div class="wrapper-landscape">
         <div class="left-column column">
            <div class="column-container">
                <h2 class="by-the-bottle" style="margin-top: 1.917cm;">{{ $category->name }}</h2>
                <div class="big-separator" style="top: 40px;"></div>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position < 6 && $subcategory->category->objectId == $category->objectId)
                        <h2 class="subcategory">{{$subcategory->name}}</h2>
                        <div class="menu-contents item-container">
                          @foreach($items as $item)
                              @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                  <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                      <button class="btn btn-link">
                                          <span class="fa fa-arrows-v"></span>
                                      </button>
                                      <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                          <span class="fa fa-times"></span>
                                      </button>
                                      {!! $item->relatedText !!}
                                      <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-position="{{ $item->position }}" data-category="{{ $category->getObjectId() }}" data-toggle="modal">
                                          <span class="fa fa-pencil"></span>
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
                        <h2 class="subcategory">{{$subcategory->name}}</h2>
                        <div class="menu-contents item-container">
                          @foreach($items as $item)
                              @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                  <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                      <button class="btn btn-link">
                                          <span class="fa fa-arrows-v"></span>
                                      </button>
                                      <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                          <span class="fa fa-times"></span>
                                      </button>
                                      {!! $item->relatedText !!}
                                      <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-position="{{ $item->position }}" data-category="{{ $category->getObjectId() }}" data-toggle="modal">
                                          <span class="fa fa-pencil"></span>
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
TYNYMCE INIT
 */
tinymce.init({
    selector:   "textarea",
    body_class: "tinymce-body",
    content_css: "/css/all.css",
    // skin_url: "/js/skins/lightgray",
    width:      '100%',
    height:     50,
    statusbar:  false,
    menubar:    false,
    toolbar:    "bold",
});
// Prevent bootstrap dialog from blocking focusin
$(document).on('focusin', function(e) {
    if ($(e.target).closest(".mce-window").length) {
        e.stopImmediatePropagation();
    }
});
/*
MODAL CONFIG & INIT VALUES
 */
$('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var modal = $(this)
  var category = button.data('category');
  // var position = button.data('position');
  var id = button.data('id');

  if(button.data('action') === 'add'){
    modal.find('h3').text('ADD ITEM');
    tinyMCE.activeEditor.setContent('');
    modal.find('button.item-action').addClass('add-item').text('Add Item');
  }
  else if(button.data('action') !== 'edit-category'){
    button.parent().find('button').addClass('hide');
    modal.find('h3').text('EDIT ITEM');
    tinyMCE.activeEditor.setContent(button.parent().html());
    modal.find('button.item-action').addClass('update-item').text('Update Item');
  }
  else if(button.data('action') === 'edit-category'){
    modal.find('h3').text('EDIT CATEGORY');
    tinyMCE.activeEditor.setContent(button.parent().html());
    button.parent().find('button').addClass('hide');
    modal.find('button.item-action').addClass('update-category').text('Update Category');
  }
  modal.find('.modal-body input[name=category]').val(category);
  modal.find('.modal-body input[name="id"]').val(id);
  // modal.find('.modal-body input[name="position"]').val(position);
});
$('#myModal').on('hide.bs.modal', function (event) {
  $('button').removeClass('hide add-item update-item');
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
        window.location.href = "{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}";
      },
      error: function(xhr, textStatus, thrownError) {
          alert('Se ha producido un error. Por favor, inténtelo más tarde..');
      },
    });
});

/*
UPDATE ITEM
 */
$(document).on('click', '.update-item', function(e){
    e.preventDefault();

    var data = {
        objectId: $(this).parent().siblings('.modal-body').children('input[name=id]').val(),
        category: $(this).parent().siblings('.modal-body').children('input[name=category]').val(),
        relatedText: $($.parseHTML(tinymce.get('content').getContent())).children('button').remove().end().html(),
        _method: 'PUT'
    };
    console.log(data);
    console.log("here comes the ajax call");

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
        window.location.href = "{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}";
      },
      error: function(xhr, textStatus, thrownError) {
          alert('Se ha producido un error. Por favor, inténtelo más tarde..');
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
                window.location.href = "{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}";
              },
              error: function(xhr, textStatus, thrownError) {
                  alert('Se ha producido un error. Por favor, inténtelo más tarde..');
              },
            });
        }
    });
});
</script>
@stop