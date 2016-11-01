@extends('layout')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/1.2.8/css/froala_editor.min.css">
@stop

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

        <div class="wrapper {{ $group->name }}">
             <div class="left-column column">
                {{-- <img src="/img/logo.png" alt="Logo" class="logo"> --}}
                <img src="{{ $group->menu_logo }}" alt="Logo" class="logo">
                @foreach($categories as $category)
                    @if($category->position < 4)
                        <div class="menu-section">
                            <h2 class="category" data-id="{{ $category->getObjectId() }}">
                                <a href="#myModal" role="button" class="open-modal" data-category="{{ $category->getObjectId() }}" data-position="{{ count($items) }}" data-action="add" data-menu="{{ $menu->getObjectId() }}"  class="btn btn-link" data-toggle="modal">
                                    <span class="ion ion-ios-plus-outline"></span>
                                </a>
                                {!!$category->name!!}
                                <a href="#myModal" role="button" class="open-modal" data-parent="{{ $category->getObjectId() }}" data-id="{{ $category->getObjectId() }}" data-position="{{ $category->position }}" data-action="edit-category" class="btn btn-link" data-toggle="modal">
                                    <span class="ion ion-ios-compose-outline"></span>
                                </a>
                            </h2>
                            <div class="menu-contents item-container">
                                @foreach($items as $item)
                                    @if($item->category->objectId == $category->objectId)
                                        <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                            <button class="btn btn-link">
                                                <span class="ion ion-ios-shuffle"></span>
                                            </button>
                                            <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                                <span class="ion ion-ios-close-outline"></span>
                                            </button>
                                            {!! $item->relatedText !!}
                                            <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-toggle="modal">
                                                <span class="ion ion-ios-compose-outline"></span>
                                            </a>
                                        </p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="right-column column">
                @foreach($categories as $category)
                    @if($category->position > 3)
                        <div class="menu-section">
                            <h2 class="category" data-id="{{ $category->getObjectId() }}">
                                <a href="#myModal" role="button" class="open-modal" data-category="{{ $category->getObjectId() }}" data-position="{{ count($items) }}" data-action="add" data-menu="{{ $menu->getObjectId() }}" class="btn btn-link" data-toggle="modal">
                                    <span class="ion ion-ios-plus-outline"></span>
                                </a>
                                {!!$category->name!!}
                                <a href="#myModal" role="button" class="open-modal" data-parent="{{ $category->getObjectId() }}" data-id="{{ $category->getObjectId() }}" data-position="{{ $category->position }}" data-action="edit-category" class="btn btn-link" data-toggle="modal">
                                    <span class="ion ion-ios-compose-outline"></span>
                                </a>
                            </h2>
                            <div class="menu-contents item-container">
                                @foreach($items as $item)
                                    @if($item->category->objectId == $category->objectId)
                                        <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                            <button class="btn btn-link">
                                                <span class="ion ion-ios-shuffle"></span>
                                            </button>
                                            <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                                <span class="ion ion-ios-close-outline"></span>
                                            </button>
                                            {!! $item->relatedText !!}
                                            <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-toggle="modal">
                                                <span class="ion ion-ios-compose-outline"></span>
                                            </a>
                                        </p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>           
        </div>
@stop 

@section('scripts')
    <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
          headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
          }
        });
        // $(window).load(function() {
        //     $(".ui-state-default").each(function(index){
        //         var size = $(this).text().trim().length;
        //         // console.log(size)
        //         if(size < 76){
        //             $(this).addClass('force-one-line');
        //         }
        //         else if(size < 90){
        //             var i = 60;
        //             // console.log($(this).text().trim());
        //             // console.log($(this).html());
        //             while ($(this).text().trim().slice(i-1, i) != ' '){
        //                 i--;
        //             }

        //             // console.log(i);
                    
        //             // $(this).html([$(this).text().trim().slice(0, i), '<br>', $(this).text().trim().slice(i)].join(''));
        //         }
        //     });

        // });

        // $(document).ready(function(){
        //     $(".relatedText").lettering();     
        // });

        $(document).on('click', '.item-action.add-item', function(e){
            e.preventDefault();
            var data = {
              menu: $(this).parent().siblings('.modal-body').children('input[name=menu]').val(),
              category: $(this).parent().siblings('.modal-body').children('input[name=category]').val(),
              relatedText: $($.parseHTML(tinymce.get('content').getContent())).html()
            };
            // console.log(data);
            // console.log($('h2.category[data-id='+data["category"]+']').siblings('.item-container').append(response));

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
                $('h2.category[data-id='+data["category"]+']').siblings('.item-container').append(response);
                // window.location.href = "{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}";
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
                        type: 'error',
                        timer: 2500,
                        showConfirmButton: false
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
        $('#myModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          var modal = $(this)
          var category = button.data('category');
          // var position = button.data('position');
          var id = button.data('id');
          var menu = button.data('menu');

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
          else{
            modal.find('h3').text('EDIT CATEGORY');
            tinyMCE.activeEditor.setContent(button.parent().html());
            button.parent().find('button').addClass('hide');
            modal.find('button.item-action').addClass('update-category').text('Update Category');
          }
          modal.find('.modal-body input[name=menu]').val(menu);
          modal.find('.modal-body input[name=category]').val(category);
          modal.find('.modal-body input[name="id"]').val(id);
          // modal.find('.modal-body input[name="position"]').val(position);
        });
        $('#myModal').on('hide.bs.modal', function (event) {
            $('button').removeClass('hide add-item update-item update-category update-subcategory');

        });
        $(document).on('click', '.update-item', function(e){
            e.preventDefault();

            var data = {
                objectId: $(this).parent().siblings('.modal-body').children('input[name=id]').val(),
                category: $(this).parent().siblings('.modal-body').children('input[name=category]').val(),
                relatedText: $($.parseHTML(tinymce.get('content').getContent())).children('button').remove().end().html(),
                _method: 'PUT'
            };

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
                // window.location.href = "{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}";
                var template = '<button class="btn btn-link"><span class="ion ion-ios-shuffle"></span></button> <button class="delete-item btn btn-link" data-id="'+data['objectId']+'"><span class="ion ion-ios-close-outline"></span></button>'+data['relatedText']+' <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="'+data['objectId']+'" data-toggle="modal"><span class="ion ion-ios-compose-outline"></span></a>';

                $('p#'+data["objectId"]).html(template);
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
                // window.location.href = "{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}";
                var template = '<a href="#myModal" role="button" class="open-modal" data-category="'+data["objectId"]+'" data-action="add" data-menu="{{ $menu->getObjectId() }}"  class="btn btn-link" data-toggle="modal"><span class="ion ion-ios-plus-outline"></span></a> ' + data["name"]+' <a href="#myModal" role="button" class="open-modal" data-parent="'+data["objectId"]+'" data-id="'+data["objectId"]+'" data-action="edit-category" class="btn btn-link" data-toggle="modal"><span class="ion ion-ios-compose-outline"></span></a> ';

                $('h2[data-id='+data["objectId"]+']').html(template);
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
                            type: 'error',
                            timer: 2500,
                            showConfirmButton: false
                        });
                      },
                    });
                }
            });
        });
    </script>
@stop
 