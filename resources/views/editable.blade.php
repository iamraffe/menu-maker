<!DOCTYPE html>
<html>
    <head>
        <title>Menu Maker</title>
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" />
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
                <h3 id="myModalLabel">Edit</h3>
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
        <div class="wrapper">
             <div class="left-column column">
                <img src="img/logo.png" alt="Logo" class="logo">
                @foreach($categories as $category)
                    <div class="menu-section">

                        <h2 class="category">{!!$category['object']->relatedText!!}</h2>
                        @foreach($category['items'] as $item)
                            <p>
                                <button class="delete-item btn btn-link">
                                    <span class="fa fa-times"></span>
                                </button>
                                {!! $item->relatedText !!}
                                <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="{{ $item->getObjectId() }}" data-category="{{ $item->category }}" data-toggle="modal">
                                    <span class="fa fa-pencil"></span>
                                </a>
                            </p>
                        @endforeach
                    </div>
                @endforeach
{{--                    
                        <h2 class="category">starters</h2>
                        <p>
                            <button class="delete-item btn btn-link">
                                <span class="fa fa-times"></span>
                            </button>
                            <strong>today's mozzarella ... 8</strong>
                            <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-id="90Pmp2xJZK" data-category="false" data-toggle="modal">
                                <span class="fa fa-pencil"></span>
                            </a>
                        </p>      
                        <p>
                            <button class="delete-item btn btn-link">
                                <span class="fa fa-times"></span>
                            </button>
                            <strong>cerignola olives ... 5</strong>
                            <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-toggle="modal">
                                <span class="fa fa-pencil"></span>
                            </a>
                        </p> 
                        <p>
                            <button class="delete-item btn btn-link">
                                <span class="fa fa-times"></span>
                            </button>
                            <strong>bibb salad</strong> – cucumber, melon, mint, scallion, vinaigrette<strong> ... 8</strong>
                            <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-toggle="modal">
                                <span class="fa fa-pencil"></span>
                            </a>
                        </p> 
                        <p>
                            <button class="delete-item btn btn-link">
                                <span class="fa fa-times"></span>
                            </button>
                            <strong>tomato &amp; melon salad</strong> – peach chili sauce, mint, olive oil 8 rosemary focaccia - house chèvre, fig jam<strong> ... 9</strong>
                            <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-toggle="modal">
                                <span class="fa fa-pencil"></span>
                            </a>
                        </p> 
                        <p>
                            <button class="delete-item btn btn-link">
                                <span class="fa fa-times"></span>
                            </button>
                            <strong>burrata</strong> – eggplant, roasted pepper, romesco, basil, olive oil<strong> ... 12</strong>
                            <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-toggle="modal">
                                <span class="fa fa-pencil"></span>
                            </a>
                        </p> 
                        <p>
                            <button class="delete-item btn btn-link">
                                <span class="fa fa-times"></span>
                            </button>
                            <strong>orecchiette</strong> – pesto, summer squash<strong> ... 12</strong>
                            <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-toggle="modal">
                                <span class="fa fa-pencil"></span>
                            </a>
                        </p> 
                        <p>
                            <button class="delete-item btn btn-link">
                                <span class="fa fa-times"></span>
                            </button>
                            <strong>culatello &amp; old parmigiano</strong> – sicilian olive oil, 10 yr balsamic, arugula<strong> ... 12</strong>
                            <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-toggle="modal">
                                <span class="fa fa-pencil"></span>
                            </a>
                        </p> 
                        <p>
                            <button class="delete-item btn btn-link">
                                <span class="fa fa-times"></span>
                            </button>
                            <strong>meat plate</strong> – la quercia tamworth prosciutto, house nduja, salumeria, biellese finochietta, house pickles, red pepper mostarda<strong> ... 12</strong>
                            <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-toggle="modal">
                                <span class="fa fa-pencil"></span>
                            </a>
                        </p> 
                        <p>
                            <button class="delete-item btn btn-link">
                                <span class="fa fa-times"></span>
                            </button>
                            <strong>cheese plate</strong> – montboissie, fiore sardo, bayley hazen blue, marcona, almonds, peach jam, house pickles<strong> ... 12</strong>
                            <a href="#myModal" role="button" class="open-modal" class="btn btn-link" data-toggle="modal">
                                <span class="fa fa-pencil"></span>
                            </a>
                        </p>   --}}  
                <div class="menu-section">
                    <h2 class="category">pizza</h2>
                    <p>marinara<strong> –– tomato, garlic, oregano</strong> ... 8</p> 
                    <p>margherita<strong> – tomato, mozzarella, basil, parm</strong> ... 12</p> 
                    <p>calabrese<strong> – tomato, mozzarella, salami, serrano, garlic, basil</strong> ... 14</p> 
                    <p>fresca<strong> – prosciutto piccante, arugula, meyer lemon, mozz, olive oil</strong> ... 16</p> 
                    <p>harissa<strong> – eggplant, shallot, banana pepper,pistachio, green herbs</strong> ... 12</p> 
                    <p>taleggio<strong> –  sausage, mozzarella, scallion</strong> ... 14</p> 
                    <p>corn &amp; nduja<strong> –  charred scallion, peppers, mozz, parm cream</strong> ... 15</p>
                    <p>braised goat<strong> –  garrotxa, mozzarella, herbs, fennel pollen, onion</strong> ... 16</p>                    
                    <p>calzone<strong> – mozz, ricotta, ham, black olive, salami, tomato, basil</strong> ... 17</p>
                </div>
                <div class="menu-section">
                    <h2 class="category">dessert</h2>
                    <p>yogurt panna cotta and melon ... 7</p> 
                    <p>limoncello tart<strong> – fennel shortbread crust,toasted meringue, blackberries</strong> ... 7</p> 
                    <p>vanilla ice cream and sherry ... 7</p> 
                    <p>mango lassi ice cream<strong> – mint, maldon salt</strong> ... 7</p> 
                    <p>grilled chocolate sandwich<strong> – olive oil brioche,olive oil ice cream</strong> ... 9</p> 
                    <p>nv valdespino “el candado” pedro ximenez 10 (3 oz)</p>             
                </div>
            </div>
            <div class="right-column column">
                <div class="menu-section">
                    <h2 class="category">beer</h2>
                    <p>zilker<strong> – pale ale</strong> ... 5</p> 
                    <p>strange land <strong>sour brown ale</strong> ... 5</p> 
                    <p>karbach<strong> – love street kolsch</strong> ... 5</p> 
                    <p>rabbit hole<strong> – rapture brown ale</strong> ... 5</p>
                    <p>live oak <strong> – hefeweizen</strong> ... 5</p> 
                    <p>austin beer works<strong> – fire eagle IPA</strong> ... 5</p> 
                    <p>lone star 12 oz ... 3</p> 
                    <p>argus cidery ciderkin 12 oz ... 7</p> 
                    <p>jester king<strong> – el cedro hoppy cedar-aged ale</strong> ...  11 / 30 (750ml)</p>             
                </div>
                <div class="menu-section">
                    <h2 class="category">other drinks</h2>
                    <p>mexican coke, topo chico, san pellegrino lemon or orange ... 3</p>
                </div>
                <div class="menu-section">
                    <h2 class="category">sparkling</h2>
                    <p><strong>nv pascal pibaleau “la perlette” pet nat rosé </strong>grolleau ... 14 / 40</p> 
                    <p><strong>2012 tripoz “cremant de bourgogne” brut nature</strong> chardonnay ... 16 / 45</p>           
                </div>
                <div class="menu-section">
                    <h2 class="category">rose</h2>
                    <p><strong>2014 lioco “indica” mendocino county rosé</strong> carignan ... 12 / 35</p>              
                </div>
                <div class="menu-section">
                    <h2 class="category">white</h2>
                    <p><strong>2013 domaine de la patience “from the tank”</strong>chardonnay ... 7</p> 
                    <p><strong>2014 berger</strong> grüner veltliner ... 10 / 28</p> 
                    <p><strong>2014 peter lauer “barrel x”</strong>riesling ... 14 / 44</p> 
                    <p><strong>2013 lieu dit</strong> sauvignon blanc <strong>saint ynez valley</strong> ... 14 / 40</p> 
                    <p><strong>2014 occhipinti “sp 68 bianco”</strong> zibibbo, albanello ... 16 / 47</p>
                </div>
                <div class="menu-section">
                    <h2 class="category">red</h2>
                    <p><strong>2013 estézargues “from the tank” côtes du rhône</strong> grenache, syrah ... 7</p> 
                    <p><strong>2013 cirelli montepulciano d’abruzzo</strong>montepulciano ... 10 / 28</p> 
                    <p><strong>2013 roagna dolcetto d’alba</strong> dolcetto ... 12 / 32</p> 
                    <p><strong>2014 chermette vissoux beaujolais</strong>gamay ... 12 / 35</p> 
                    <p><strong>2013 montesecondo rosso toscana</strong>sangiovese ... 14 / 42</p> 
                    <p><strong>2011 piedrasassi santa barbara county</strong> syrah ... 16 / 50</p> 
                    <p><strong>2012 tyler santa barbara county</strong> pinot noir ... 16 / 50</p>
                </div>
            </div>           
        </div>

        <script type="text/javascript">
        $.ajaxSetup({
          headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
          }
        });
        $('button.delete-item').on('click', function(e){
            e.preventDefault();
            confirm('Are you sure you want to delete this item?')
        });
        $('#myModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget);
          button.parent().find('button').addClass('hide');
          var id = button.data('id');
          console.log(id);
          var category = button.data('category');
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
                $('#results').hide().html(response).fadeIn('fast');
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
        </script>
    </body>
</html>
