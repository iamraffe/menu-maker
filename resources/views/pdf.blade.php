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
                <img src="{{ public_path('img/logo.png') }}" alt="Logo" class="logo" style="visibility: none">
                @foreach($categories as $position => $category)
                    @if($position < 4)
                        <div class="menu-section">
                            <h2 class="category">{!!$category['object']->relatedText!!}</h2>
                            @foreach($category['items'] as $item)
                                <p>
                                    {!! $item->relatedText !!}
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
                                    {!! $item->relatedText !!}
                                </p>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>           
        </div>
    </body>
</html>
