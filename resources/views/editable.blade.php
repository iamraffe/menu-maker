<!DOCTYPE html>
<html>
    <head>
        <title>Menu Maker</title>
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
{{--         <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" /> --}}
        <script src="https://code.jquery.com/jquery-2.1.4.js"></script>


        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
        <script src="http://tinymce.cachefly.net/4.2/tinymce.min.js"></script>
        <link href="css/all.css" rel="stylesheet" media="all">
    </head>
    <body>
{{-- <a href="#myModal" role="button" id="open" class="btn btn-link" data-toggle="modal"><span class="fa fa-edit"></span></a> --}}

        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <h3 id="myModalLabel">EDIT ITEM</h3>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id">
{{--                 <input type="hidden" name="category"> --}}
                <textarea name="content"></textarea>
            </div>

            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Discard Changes</button>
                <button class="btn btn-info update-item">Update Item</button>
            </div>
        </div>
        <div id="popover-content" class="hide">
            <div class="col-xs-12">
              <form class="form-horizontal add-item" role="form">
                <input type="hidden" name="parent">
                <input type="hidden" name="position">
{{--                     <div class="form-group">
                  <select class="form-control">
                    <option>NA</option>
                    <option>RU</option>
                    <option>EU</option>
                    <option>SEA</option>
                  </select> 
                </div> --}}
                <div class="form-group">
                  <input type="text" placeholder="Item text..." name="relatedText" class="form-control" >
                </div>
                <div class="form-group">
                  <button class="btn btn-primary">Add Item</button>
                </div>
              </form>
            </div>
        </div>
        <div class="wrapper">
             <div class="left-column column">
                <img src="img/logo.png" alt="Logo" class="logo">
                @foreach($categories as $position => $category)
                    @if($position < 4)
                        <div class="menu-section">
                            <h2 class="category" data-id="{{ $category['object']->getObjectId() }}">
                                {!!$category['object']->relatedText!!}
                                <a href="#myModal" role="button" class="open-modal" data-id="{{ $category['object']->getObjectId() }}" class="btn btn-link" data-toggle="modal">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <a data-toggle="popover" data-title="ADD ITEM" data-container="body" data-html="true" href="#" data-parent="{{ $category['object']->getObjectId() }}" data-position="{{ count($category['items']) }}"  data-placement="right" >
                                    <span class="fa fa-plus"></span>
                                </a>
{{--                                 <a href="#myOhterModal" role="button" class="open-modal" data-id="{{ $category['object']->getObjectId() }}" class="btn btn-link" data-toggle="modal">
                                    <span class="fa fa-plus"></span>
                                </a> --}}
                            </h2>
                            @foreach($category['items'] as $item)
                                <p>
                                    <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                        <span class="fa fa-times"></span>
                                    </button>
                                    {!! $item->relatedText !!}
                                    <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-category="{{ $item->category }}" data-toggle="modal">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                </p>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="right-column column">
                @foreach($categories as $position => $category)
                    @if($position > 3)
                        <div class="menu-section">
                            <h2 class="category">{!!$category['object']->relatedText!!}</h2>
                            @foreach($category['items'] as $item)
                                <p>
                                    <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                        <span class="fa fa-times"></span>
                                    </button>
                                    {!! $item->relatedText !!}
                                    <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-category="{{ $item->category }}" data-toggle="modal">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                </p>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>           
        </div>

        <script type="text/javascript">
        $.ajaxSetup({
          headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
          }
        });
        $(document).on('submit', 'form.add-item', function(e){
            e.preventDefault();
            var formData = $(this).serializeArray();
            $.ajax({
              url: "{{ url('store') }}",
              data: formData,
              type        : 'POST',
              encode          : true,
              async: true,
              beforeSend: function(){
                $('#loading').show().fadeIn('fast');
              },
              success: function(response){
                //$('#loading').hide();
                window.location.href = "{{ url('edit') }}";
              },
              error: function(xhr, textStatus, thrownError) {
                  alert('Se ha producido un error. Por favor, inténtelo más tarde..');
              },
            });

        });
        $('button.delete-item').on('click', function(e){
            e.preventDefault();
            var param = $(this).attr("data-id");
            var answer = confirm('Are you sure you want to delete this item?');
            if (answer)
            {
                $.ajax({
                    type        : 'POST',
                    url         : "{{ url('/delete') }}"+"/"+param,
                    data : {_method : 'DELETE'},
                    encode          : true,
                    error: function(xhr, textStatus, thrownError) {
                        alert('Se ha producido un error. Por favor, inténtelo más tarde..');
                    },
                    success: function(response) {
                        window.location.href = "{{ url('edit') }}";
                    }
                });
            }
        });
        $('#myModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          button.parent().find('button').addClass('hide');
          var id = button.data('id');
          // var category = button.data('category');
          tinyMCE.activeEditor.setContent(button.parent().html());
          var modal = $(this)
          modal.find('.modal-body input[name="id"]').val(id);
          // modal.find('.modal-body input[name="category"]').val(category);
        })
        $('#myModal').on('hide.bs.modal', function (event) {
            $('button').removeClass('hide');
        })
        $('.update-item').on('click', function(e){
            e.preventDefault();
           
            var data = {
                objectId: $(this).parent().siblings('.modal-body').children('input[name="id"]').val(),
                relatedText: $($.parseHTML(tinymce.get('content').getContent())).children('button').remove().end().html()
                // category: $(this).parent().siblings('.modal-body').children('input[name="category"]').val()
            };
            $.ajax({
              url: "{{ url('update') }}",
              data: data,
              type        : 'POST',
              encode          : true,
              async: true,
              beforeSend: function(){
                $('#loading').show().fadeIn('fast');
              },
              success: function(response){
                //$('#loading').hide();
                $('#myModal').modal('hide');
                window.location.href = "{{ url('edit') }}";
              },
              error: function(xhr, textStatus, thrownError) {
                  alert('Se ha producido un error. Por favor, inténtelo más tarde..');
              },
            });
        });
        tinymce.init({
            selector:   "textarea",
            content_css: "css/all.css",
            width:      '100%',
            height:     50,
            statusbar:  false,
            menubar:    false,
            toolbar:    "bold",

        });
        $("[data-toggle=popover]").popover({
            html: true, 
            content: function() {
                    var parent = $(this).attr('data-parent');
                    var position = parseInt($(this).attr('data-position')) + 1;
                    $('#popover-content form.add-item input[name=parent]').val(parent);
                    $('#popover-content form.add-item input[name=position]').val(position);
                    return $('#popover-content').html();
                }
        });

        // $("[data-toggle=popover]").on('show.bs.popover', function () {
        //     console.log($(this).attr('data-id'));
        // })

        // tinymce.init({
        //     selector: "h2.editable",
        //     inline: true,
        //     toolbar: false,
        //     menubar: false,
        //     plugins: "save",
        //     toolbar: "save",
        //     save_enablewhendirty: true,
        //     save_onsavecallback: function() {
        //                         // USE THIS IN YOUR AJAX CALL
        //                 console.log(tinyMCE.get('h2').getContent());
        //         }
        // });

        // Prevent bootstrap dialog from blocking focusin
        $(document).on('focusin', function(e) {
            if ($(e.target).closest(".mce-window").length) {
                e.stopImmediatePropagation();
            }
        });


        </script>
    </body>
</html>
