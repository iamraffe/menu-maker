@extends('layout')

@section('content')
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <h3 id="myModalLabel"></h3>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id">
                <input type="hidden" name="parent">
                <textarea name="content"></textarea>
            </div>

            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Discard</button>
                <button class="btn btn-info item-action"></button>
            </div>
        </div>
        <div class="wrapper">
             <div class="left-column column">
                @foreach($categories as $position => $category)
                    @if($position < 4)
                        <div class="menu-section">
                            <h2 class="category" data-id="{{ $category['object']->getObjectId() }}">
                                {!!$category['object']->relatedText!!}
                                <a href="#myModal" role="button" class="open-modal" data-parent="{{ $category['object']->getObjectId() }}" data-id="{{ $category['object']->getObjectId() }}" data-position="{{ $category['object']->position }}" data-action="edit" class="btn btn-link" data-toggle="modal">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <a href="#myModal" role="button" class="open-modal" data-parent="{{ $category['object']->getObjectId() }}" data-position="{{ count($category['items']) }}" data-action="add"  class="btn btn-link" data-toggle="modal">
                                    <span class="fa fa-plus"></span>
                                </a>
                            </h2>
                            <div class="menu-contents">
                                @foreach($category['items'] as $item)
                                    <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                        <button class="btn btn-link">
                                            <span class="fa fa-arrows-v"></span>
                                        </button>
                                        <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                            <span class="fa fa-times"></span>
                                        </button>
                                        {!! $item->relatedText !!}
                                        <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-position="{{ $item->position }}" data-parent="{{ $category['object']->getObjectId() }}" data-toggle="modal">
                                            <span class="fa fa-pencil"></span>
                                        </a>
                                    </p>
                                @endforeach
                            </div>
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
                                    <p id="{{ $item->getObjectId() }}" class="ui-state-default">
                                        <button class="btn btn-link">
                                            <span class="fa fa-arrows-v"></span>
                                        </button>
                                        <button class="delete-item btn btn-link" data-id="{{ $item->getObjectId() }}">
                                            <span class="fa fa-times"></span>
                                        </button>
                                        {!! $item->relatedText !!}
                                        <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-position="{{ $item->position }}" data-parent="{{ $category['object']->getObjectId() }}" data-toggle="modal">
                                            <span class="fa fa-pencil"></span>
                                        </a>
                                    </p>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>           
        </div>
@stop 

@section('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
          headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
          }
        });
        $(window).load(function() {
            $(".ui-state-default").each(function(index){
                var size = $(this).text().trim().length;
                console.log(size)
                if(size < 76){
                    $(this).addClass('force-one-line');
                }
                else if(size < 90){
                    var i = 60;
                    console.log($(this).text().trim());
                    console.log($(this).html());
                    while ($(this).text().trim().slice(i-1, i) != ' '){
                        i--;
                    }

                    console.log(i);
                    
                    // $(this).html([$(this).text().trim().slice(0, i), '<br>', $(this).text().trim().slice(i)].join(''));
                }
            });

        });

        // $(document).ready(function(){
        //     $(".relatedText").lettering();     
        // });

        $(document).on('click', '.item-action.add-item', function(e){
            e.preventDefault();
            var data = {
                // position: parseInt($(this).parent().siblings('.modal-body').children('input[name=position]').val() ) + 1,
                parent: $(this).parent().siblings('.modal-body').children('input[name=parent]').val(),
                relatedText: $($.parseHTML(tinymce.get('content').getContent())).html()
            };
            $.ajax({
              url: "{{ url('store') }}",
              data: data,
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
          var modal = $(this)
        var parent = button.data('parent');
        // var position = button.data('position');
        var id = button.data('id');

          if(button.data('action') === 'add'){
            modal.find('h3').text('ADD ITEM');
            tinyMCE.activeEditor.setContent('');
            modal.find('button.item-action').addClass('add-item').text('Add Item');
          }
          else{
            button.parent().find('button').addClass('hide');
            modal.find('h3').text('EDIT ITEM');
            tinyMCE.activeEditor.setContent(button.parent().html().find('<br>').remove().end());
            modal.find('button.item-action').addClass('update-item').text('Update Item');
            // modal.find('.modal-body select option[value='+position+']').prop("selected", true);
          }
          modal.find('.modal-body input[name=parent]').val(parent);
          modal.find('.modal-body input[name="id"]').val(id);
          // modal.find('.modal-body select option[value='+position+']').prop('selected', true);
        });
        $('#myModal').on('hide.bs.modal', function (event) {
            $('button').removeClass('hide add-item update-item');

        });
        $(document).on('click', '.update-item', function(e){
            e.preventDefault();

            var data = {
                objectId: $(this).parent().siblings('.modal-body').children('input[name=id]').val(),
                parent: $(this).parent().siblings('.modal-body').children('input[name=parent]').val(),
                // position: parseInt($(this).parent().siblings('.modal-body').find('select[name=position]').val()),
                relatedText: $($.parseHTML(tinymce.get('content').getContent())).children('button').remove().end().html()
            };

            console.log(data);

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
        // Prevent bootstrap dialog from blocking focusin
        $(document).on('focusin', function(e) {
            if ($(e.target).closest(".mce-window").length) {
                e.stopImmediatePropagation();
            }
        });

        $(function() {
            $( ".menu-contents" ).sortable({ 
                placeholder: "ui-sortable-placeholder",
                start: function(e,ui){
                    
                    //Before all other events
                    //Only occurs once each time sorting begins
                },
                activate: function(e,ui){
                    console.log("start");
                    $(this).addClass('draggin');
                    //After the start event and before all other events
                    //Occurs once for each connected list each time sorting begins
                },
                change: function(e,ui){
                    //After start/active but before over/sort/out events
                    //Occurs every time the item position changes
                    //Does not occur when item is outside of a connected list
                },
                over: function(e,ui){
                    //After change but before sort/out events
                    //Occurs while the item is hovering over a connected list
                },
                sort: function(e,ui){
                    //After over but before out event
                    //Occurs during sorting
                    //Does not matter if the item is outside of a connected list or not
                },
                out: function(e,ui){
                    //This one is unique
                    //After sort event before all drop/ending events unless **see NOTE
                    //Occurs, only once, the moment an item leaves a connected list
                    //NOTE: Occurs again when the item is dropped/sorting stops 
                    //--> EVEN IF the item never left the list
                    //--> Called just before the stop event but after all other ending events
                },
                beforeStop: function(e,ui){
                    //Before all other ending events: update,remove,receive,deactivate,stop
                    //Occurs only once at the last possible moment before sorting stops
                },
                remove: function(e,ui){
                    //After beforeStop and before all other ending events
                    //Occurs only once when an item is removed from a list
                },
                receive: function(e,ui){
                    //After remove and before all other ending events
                    //Occurs only once when an item is added to a list
                },
                axis: "y",
                update: function (event, ui) {
                    var data = $(this).sortable('toArray');
                    // $("#result").html("JSON:<pre>"+JSON.stringify(data)+"</pre>");
                    $.ajax({
                      url: "{{ url('update') }}",
                      data: JSON.stringify(data),
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
                }, 
                deactivate: function(e,ui){
                    //After all other events but before out (kinda) and stop
                    //Occurs once for each connected list each time sorting ends
                },
                stop: function(e,ui){
                    //After all other events
                    //Occurs only once when sorting ends
                }
            });
        });
    </script>
@stop
 