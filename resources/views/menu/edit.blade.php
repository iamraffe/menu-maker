@extends('layout')



@section('content')
        <pre>@{{ $data | json }}</pre>
{{--         <input type="text" v-model="relatedText" @click='handleIt'> --}}
        <div id="loading">
            <div class="container">
                 <div class="progress">
                  <div class="progress-bar progress-bar-striped active progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                    Loading...
                  </div>
                </div>
            </div>

        </div>
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" v-mode-selector="($data)">
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h3 id="myModalLabel">@{{ modalTitle }}</h3>
            </div>
            <div class="modal-body">
{{--             <form v-form name="myform" @submit.prevent="onSubmit">
                <label>
                    <span>Name *</span>
                    <input v-model="model.name" v-form-ctrl required name="name" />
                </label>

                <div>
                    <span>Rich text *</span>
                    <span v-form-ctrl="model.html" name="html" required>
                        <tinymce id="inline-editor" :model.sync="model.html"></tinymce>
                    </span>
                </div>

                <button type="submit">Submit</button>
            </form> --}}
              <form v-form name="myform" class="form-horizontal" role="form" @submit.prevent="handleIt">
                <input type="hidden" name="id" v-model="item.id">
                <input type="hidden" name="menu" v-model="item.menu">
                <input type="hidden" name="category" v-model="item.category">
{{--                 <tinymce id="inline-editor" v-model="item.relatedText"></tinymce> --}}
                <textarea name="content" v-model="item.relatedText"></textarea>
                <button type="submit" class="btn btn-info item-action">@{{ formButton }}</button>
              </form>
            </div>

{{--             <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Discard</button>
            </div> --}}
        </div>
        <div class="wrapper">
             <div class="left-column column">
                <img src="/img/logo.png" alt="Logo" class="logo">
                @foreach($categories as $category)
                    @if($category->position < 4)
                        <div class="menu-section">
                            <h2 class="category" data-id="{{ $category->getObjectId() }}">
                                {!!$category->name!!}
                                <a href="#myModal" role="button" class="open-modal" data-parent="{{ $category->getObjectId() }}" data-id="{{ $category->getObjectId() }}" data-position="{{ $category->position }}" data-action="edit-category" class="btn btn-link" data-toggle="modal">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <a href="#myModal" role="button" class="open-modal" data-category="{{ $category->getObjectId() }}" data-position="{{ count($items) }}" data-action="add" data-menu="{{ $menu->getObjectId() }}"  class="btn btn-link" data-toggle="modal">
                                    <span class="fa fa-plus"></span>
                                </a>
                            </h2>
                            <div class="menu-contents item-container">
                                @foreach($items as $item)
                                    @if($item->category->objectId == $category->objectId)
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
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="right-column column">
                @foreach($categories as $category)
                    @if($category->position > 3)
                        <div class="menu-section">
                            <h2 class="category" data-id="{{ $category->getObjectId() }}">
                                {!!$category->name!!}
                                <a href="#myModal" role="button" class="open-modal" data-parent="{{ $category->getObjectId() }}" data-id="{{ $category->getObjectId() }}" data-position="{{ $category->position }}" data-action="edit-category" class="btn btn-link" data-toggle="modal">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <a href="#myModal" role="button" class="open-modal" data-category="{{ $category->getObjectId() }}" data-position="{{ count($items) }}" data-action="add" data-menu="{{ $menu->getObjectId() }}" class="btn btn-link" data-toggle="modal">
                                    <span class="fa fa-plus"></span>
                                </a>
                            </h2>
                            <div class="menu-contents item-container">
                                @foreach($items as $item)
                                    @if($item->category->objectId == $category->objectId)
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
                        </div>
                    @endif
                @endforeach
            </div>           
        </div>

@stop 

@section('scripts')
    <script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.6/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.1.16/vue-resource.min.js"></script>
    <script type="text/javascript">
/*
VUE WAY
 */
  Vue.directive('mode-selector', {
    twoWay: true,
    priority: 1000,
      
    bind: function (data) {
      var vm = this.vm;
      var self = this;
      var el = $(this.el);
    },
    update: function (data) {
      var el = $(this.el);
      el.on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var modal = this;
        var category = button.data('category');
        var id = button.data('id');
        var menu = button.data('menu');
        data.item.menu = menu;
        data.item.category = category;
        data.item.id = id;
        data.formButton = "Add Item";
        data.modalTitle = "ADD ITEM";
      });
    }
  })

  Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
    new Vue({
        el: "body",
    
        data:
        {
          items: [],
          item:{
            id: '',
            relatedText: '',
            menu: '',
            category: ''
          },
          modalTitle: '',
          formButton: ''
        },

        methods:
        {
            handleIt: function()
            {
              this.items.push(this.item);
              console.log(this.items);
            }
        },

        ready : function()
        {
            // this.fetchV1IntermediaryUsers();
            // this.fetchV2IntermediaryUsers();
            tinymce.init({
                selector:   "textarea",
                body_class: "tinymce-body",
                content_css: "/css/all.css",
                width:      '100%',
                height:     50,
                statusbar:  false,
                menubar:    false,
                toolbar:    "bold",
            });

            // var that = this;

            // $('#myModal').on('show.bs.modal', function (event) {
            //   var button = $(event.relatedTarget);
            //   var modal = $(this)
            //   var category = button.data('category');
            //   var id = button.data('id');
            //   var menu = button.data('menu');

            //   if(button.data('action') === 'add'){
            //     // modal.find('h3').text('ADD ITEM');
            //     that.modalTitle = "ADD ITEM";
            //     // tinyMCE.activeEditor.setContent('');
            //     that.item.id = id;
            //     that.item.menu = menu;
            //     that.item.category = category; 
            //     that.item.relatedText = 'test';
            //     that.formButton = "Add Item";
            //     // modal.find('button.item-action').addClass('add-item').text('Add Item');
            //   }
            //   else if(button.data('action') !== 'edit-category'){
            //     button.parent().find('button').addClass('hide');
            //     modal.find('h3').text('EDIT ITEM');
            //     tinyMCE.activeEditor.setContent(button.parent().html());
            //     modal.find('button.item-action').addClass('update-item').text('Update Item');
            //   }
            //   else{
            //     modal.find('h3').text('EDIT CATEGORY');
            //     tinyMCE.activeEditor.setContent(button.parent().html());
            //     button.parent().find('button').addClass('hide');
            //     modal.find('button.item-action').addClass('update-category').text('Update Category');
            //   }
            //   modal.find('.modal-body input[name=menu]').val(menu);
            //   modal.find('.modal-body input[name=category]').val(category);
            //   modal.find('.modal-body input[name="id"]').val(id);
            // });
            // $('#myModal').on('hide.bs.modal', function (event) {
            //     $('button').removeClass('hide add-item update-item');

            // });
        },
        // directives: {
        //   'mode-selector': {
        //     twoWay: true,
        //     priority: 1000,

        //     params: ['options'],

        //     bind: function(){
        //       var vm = this.vm;
        //       var el = $(this.el);
        //       // console.log(vm);
        //       // console.log(el);
        //       // console.log(value);
        //       $(this.el).on('change', function () {
        //         set(this.value)
        //       });
        //       console.log(this.params.options);
        //       el.on('show.bs.modal', function(event){
        //         console.log(this.params.options);

        //         // var button = $(event.relatedTarget);
        //         // var modal = this;
        //         // var category = button.data('category');
        //         // var id = button.data('id');
        //         // var menu = button.data('menu');
        //         // console.log([category,id, menu]);
        //         // item.menu = menu;
        //         // formButton = "Add Item";
        //       });
        //     },
        //     update: function (value) {
        //       $(this.el).val(value).trigger('change')
        //     },
        //   }

        // }
        // components: {
        //     'tinymce': {
        //         props: ['id','model'],
        //         template:
        //             '<div>\
        //                 <div class="tiny-mce-toolbar">\
        //                     <div id="@{{id}}-toolbar"></div>\
        //                 </div>\
        //                 <div class="tiny-mce" id="@{{id}}"></div>\
        //             </div>',                    
        //         watch: {
        //             model: function (value) {
        //                 if(this._currentState === value) {
        //                     return;
        //                 }
        //                 vm.TinyMCE_editor.setContent(value || '');
        //             }
        //         },                     
        //         ready: function () {
                    
        //             // get access to the internal v-form-ctrl object
        //             console.log(this.$el.parentElement._vueFormCtrl);
                    
        //             var vm = this;
        //             var options = {
        //                 setup (editor) {
                            
        //                     vm.TinyMCE_editor = editor;
        //                     vm.TinyMCE_isFirstChange = true;
                    
        //                     editor.on('init', function () {
        //                        vm.TinyMCE_editor.setContent(vm.model || '');
        //                     });
        
        //                     editor.on('SetContent', function () {
        //                         if(vm.TinyMCE_isFirstChange) {
        //                             vm.TinyMCE_isFirstChange = false;
        //                             return;
        //                         }
        //                         vm.model = vm._currentState = editor.getContent()
        //                     });
        
        //                     editor.on('blur', function () {
        //                         vm.model = vm._currentState = editor.getContent();
        //                     });
        //                 },
        //                 mode: 'exact',
        //                 inline: false,
        //                 toolbar_items_size: 'small',
        //                 menubar: false,
        //                 elements: this.id,
        //                 fixed_toolbar_container: '#' + this.id + '-toolbar',
        //                 body_class: "tinymce-body",
        //                 content_css: "/css/all.css",
        //                 width:      '100%',
        //                 height:     50,
        //                 statusbar:  false,
        //                 menubar:    false,
        //                 toolbar:    "bold",
        //             };
        
        //             this.$nextTick(() => {
        //                 tinymce.init(options);
        //             });
                    
        //         }
        //     }
        // }
    });



/*
OLD WAY
 */
        // $.ajaxSetup({
        //   headers: {
        //     'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        //   }
        // });
        // // $(window).load(function() {
        // //     $(".ui-state-default").each(function(index){
        // //         var size = $(this).text().trim().length;
        // //         // console.log(size)
        // //         if(size < 76){
        // //             $(this).addClass('force-one-line');
        // //         }
        // //         else if(size < 90){
        // //             var i = 60;
        // //             // console.log($(this).text().trim());
        // //             // console.log($(this).html());
        // //             while ($(this).text().trim().slice(i-1, i) != ' '){
        // //                 i--;
        // //             }

        // //             // console.log(i);
                    
        // //             // $(this).html([$(this).text().trim().slice(0, i), '<br>', $(this).text().trim().slice(i)].join(''));
        // //         }
        // //     });

        // // });

        // // $(document).ready(function(){
        // //     $(".relatedText").lettering();     
        // // });

        // $(document).on('click', '.item-action.add-item', function(e){
        //     e.preventDefault();
        //     var data = {
        //       menu: $(this).parent().siblings('.modal-body').children('input[name=menu]').val(),
        //       category: $(this).parent().siblings('.modal-body').children('input[name=category]').val(),
        //       relatedText: $($.parseHTML(tinymce.get('content').getContent())).html()
        //     };
        //     $.ajax({
        //       url: "{{ url('/admin/items/') }}",
        //       data: data,
        //       type        : 'POST',
        //       encode          : true,
        //       async: true,
        //       beforeSend: function(){
        //         $('#loading').show().fadeIn('fast');
        //         $('#myModal').modal('hide');
        //       },
        //       success: function(response){
        //         $('#loading').hide();
        //         window.location.href = "{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}";
        //       },
        //       error: function(xhr, textStatus, thrownError) {
        //           alert('Se ha producido un error. Por favor, inténtelo más tarde..');
        //       },
        //     });

        // });
        // $('button.delete-item').on('click', function(e){
        //     e.preventDefault();
        //     var param = $(this).attr("data-id");
        //     var answer = confirm('Are you sure you want to delete this item?');
        //     if (answer)
        //     {
        //         $.ajax({
        //             type        : 'POST',
        //             url         : "{{ url('admin/items/') }}"+"/"+param,
        //             data : {_method : 'DELETE'},
        //             encode          : true,
        //             beforeSend: function(){
        //               $('#loading').show().fadeIn('fast');
        //             },
        //             error: function(xhr, textStatus, thrownError) {
        //                 alert('Se ha producido un error. Por favor, inténtelo más tarde..');
        //             },
        //             success: function(response) {
        //                 $('#loading').hide();
        //                 window.location.href = "{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}";
        //             }
        //         });
        //     }
        // });
        // $('#myModal').on('show.bs.modal', function (event) {
        //   var button = $(event.relatedTarget);
        //   var modal = $(this)
        //   var category = button.data('category');
        //   // var position = button.data('position');
        //   var id = button.data('id');
        //   var menu = button.data('menu');

        //   if(button.data('action') === 'add'){
        //     modal.find('h3').text('ADD ITEM');
        //     tinyMCE.activeEditor.setContent('');
        //     modal.find('button.item-action').addClass('add-item').text('Add Item');
        //   }
        //   else if(button.data('action') !== 'edit-category'){
        //     button.parent().find('button').addClass('hide');
        //     modal.find('h3').text('EDIT ITEM');
        //     tinyMCE.activeEditor.setContent(button.parent().html());
        //     modal.find('button.item-action').addClass('update-item').text('Update Item');
        //   }
        //   else{
        //     modal.find('h3').text('EDIT CATEGORY');
        //     tinyMCE.activeEditor.setContent(button.parent().html());
        //     button.parent().find('button').addClass('hide');
        //     modal.find('button.item-action').addClass('update-category').text('Update Category');
        //   }
        //   modal.find('.modal-body input[name=menu]').val(menu);
        //   modal.find('.modal-body input[name=category]').val(category);
        //   modal.find('.modal-body input[name="id"]').val(id);
        //   // modal.find('.modal-body input[name="position"]').val(position);
        // });
        // $('#myModal').on('hide.bs.modal', function (event) {
        //     $('button').removeClass('hide add-item update-item');

        // });
        // $(document).on('click', '.update-item', function(e){
        //     e.preventDefault();

        //     var data = {
        //         objectId: $(this).parent().siblings('.modal-body').children('input[name=id]').val(),
        //         category: $(this).parent().siblings('.modal-body').children('input[name=category]').val(),
        //         relatedText: $($.parseHTML(tinymce.get('content').getContent())).children('button').remove().end().html(),
        //         _method: 'PUT'
        //     };

        //     $.ajax({
        //       url: "{{ url('/admin/items/') }}"+"/"+data["objectId"],
        //       data: data,
        //       type        : 'POST',
        //       encode          : true,
        //       async: true,
        //       beforeSend: function(){
        //         $('#loading').show().fadeIn('fast');
        //         $('#myModal').modal('hide');
        //       },
        //       success: function(response){
        //         $('#loading').hide();
        //         $('#myModal').modal('hide');
        //         window.location.href = "{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}";
        //       },
        //       error: function(xhr, textStatus, thrownError) {
        //           alert('Se ha producido un error. Por favor, inténtelo más tarde..');
        //       },
        //     });
        // });
        // $(document).on('click', '.update-category', function(e){
        //     e.preventDefault();

        //     var data = {
        //         objectId: $(this).parent().siblings('.modal-body').children('input[name=id]').val(),
        //         name: $($.parseHTML(tinymce.get('content').getContent())).children('button').remove().end().html(),
        //         _method: 'PUT'
        //     };
            
        //     $.ajax({
        //       url: "{{ url('/admin/categories/') }}"+"/"+data["objectId"],
        //       data: data,
        //       type        : 'POST',
        //       encode          : true,
        //       async: true,
        //       beforeSend: function(){
        //         $('#loading').show().fadeIn('fast');
        //         $('#myModal').modal('hide');
        //       },
        //       success: function(response){
        //         $('#loading').hide();
        //         $('#myModal').modal('hide');
        //         window.location.href = "{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}";
        //       },
        //       error: function(xhr, textStatus, thrownError) {
        //           alert('Se ha producido un error. Por favor, inténtelo más tarde..');
        //       },
        //     });
        // });



        // $(function() {
        //     $( ".menu-contents" ).sortable({ 
        //         placeholder: "ui-sortable-placeholder",
        //         activate: function(e,ui){
        //             $(this).addClass('draggin');
        //         },
        //         axis: "y",
        //         update: function (event, ui) {
        //             var order = $(this).sortable('toArray');

        //             var data = {
        //               order: $(this).sortable('toArray'),
        //               _method: 'PUT'
        //             }

        //             $.ajax({
        //               url: "{{ url('admin/items/positions') }}",
        //               data: data,
        //               type        : 'POST',
        //               encode          : true,
        //               async: true,
        //               beforeSend: function(){
        //                 $('#loading').show().fadeIn('fast');
        //               },
        //               success: function(response){
        //                 $('#loading').hide();
        //                 window.location.href = "{{ url('admin/menus/'.str_slug($menu->name).'/edit') }}";
        //               },
        //               error: function(xhr, textStatus, thrownError) {
        //                   alert('Se ha producido un error. Por favor, inténtelo más tarde..');
        //               },
        //             });
        //         }
        //     });
        // });
    </script>
@stop
 