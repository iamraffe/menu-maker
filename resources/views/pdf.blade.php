<!DOCTYPE html>
<html>
    <head>
        <title>Menu Maker</title>
       {{--  <link href="css/pdf.css" rel="stylesheet" media="all"> --}}
       <link type="text/css" media="all" rel="stylesheet" href="{{ public_path('css/all.css') }}">
    </head>
    <body>
    <div class="wrapper">
         <div class="left-column column">
            <img src="/img/logo.png" alt="Logo" class="logo" style="visibility: none;">
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
    </body>
</html>
