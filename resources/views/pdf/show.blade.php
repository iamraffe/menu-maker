<!DOCTYPE html>
<html>
    <head>
        <title>Menu Maker</title>
       {{--  <link href="css/pdf.css" rel="stylesheet" media="all"> --}}
       <link type="text/css" media="all" rel="stylesheet" href="{{ public_path('css/pdf.css') }}">
    </head>
    <body>
    <div class="wrapper {{ $group->name }}">
         <div class="left-column column">
            <img src="{{ public_path($group->menu_logo) }}" alt="Logo" class="logo">
            @foreach($categories as $category)
                @if($category->position < 4)
                    <div class="menu-section">
                        <h2 class="category">{!! $category->name!!}</h2>
                        <div class="item-container">
                            @foreach($items as $item)
                                @if($item->category->objectId == $category->objectId)
                                    <p>
                                        {!! $item->relatedText !!}
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
                        <h2 class="category">{!! $category->name!!}</h2>
                        <div class="item-container">
                            @foreach($items as $item)
                                @if($item->category->objectId == $category->objectId)
                                    <p>
                                        {!! $item->relatedText !!}
                                    </p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <script type="text/javascript">
    //     $(window).load(function() {
    //         $("p").each(function(index){
    //             var size = $(this).text().trim().length;
    //             if(size < 76){
    //                 $(this).addClass('force-one-line');
    //             }
    //             else if(size < 90){
    //                 var i = 5;
    //                 while ($(this).text().trim().slice(i-1, i) != ' '){
    //                     i--;
    //                 }

    //                 $(this).html([$(this).text().trim().slice(0, i), '<br>', $(this).text().trim().slice(i)].join(''));
    //             }
    //         });

    //     });
    </script>
    </body>
</html>
