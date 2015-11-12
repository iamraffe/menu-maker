<!DOCTYPE html>
<html>
    <head>
        <title>Menu Maker</title>
       <link type="text/css" media="all" rel="stylesheet" href="{{ public_path('css/pdf.css') }}">
    </head>
    <body>
    <div class="wrapper-landscape" style="position: relative;">
         <div class="left-column column">
            <div class="column-container">
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <img class="logo-cover" src="{{public_path('/img/bufalina-logo-greyscale.png')}}" alt="Bufalina Logo">
            </div>
        </div>  
    </div>
    <div class="wrapper-landscape">
        <div class="left-column column">
            <div class="column-container">
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <h2 class="by-the-bottle" style="margin-top: 1.917cm; visibility: hidden;">{{ $categories[4]->name }}</h2>
                <div class="separator" style="margin-left: 0"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position > 5 && $subcategory->category->objectId == $categories[4]->objectId)
                        <h2 class="subcategory">{{$subcategory->name}}</h2>
                        @foreach($items as $item)
                            @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                <p class="ui-state-default">
                                    {!! $item->relatedText !!}
                                </p>
                            @endif 
                        @endforeach  
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="wrapper-landscape">
     <div class="left-column column">
        <div class="column-container">
            <h2 class="by-the-bottle" style="margin-top: 1.917cm;">{{ $categories[4]->name }}</h2>
            <div class="big-separator" style="top: 40px;"><img src="{{public_path('img/wine-list-separator-big.png') }}" alt="Content separator"></div>
            @foreach($subcategories as $subcategory)
                @if($subcategory->position < 6 && $subcategory->category->objectId == $categories[4]->objectId)
                    <h2 class="subcategory">{{$subcategory->name}}</h2>
                    @foreach($items as $item)
                        @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                            <p class="ui-state-default">
                                {!! $item->relatedText !!}
                            </p>
                        @endif 
                    @endforeach  
                @endif
            @endforeach
            </div>
        </div>      
        <div class="right-column column" style="position:relative;">
            <div class="column-container text-container" style="position:absolute; right:0; top:0; height:100%; z-index: 99999; background: white; width: 100%;">
                <img class="logo-intro" src="{{public_path('/img/bufalina-logo-simple-greyscale.png')}}" alt="Logo" class="logo">
                <div class="separator"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div>
                @foreach($items as $item)
                    @if(null !== $item->category && $item->category->objectId == $categories[0]->objectId)
                        {!! $item->relatedText !!}
                    @endif 
                @endforeach
            </div>
        </div> 
    </div> 
    <div class="wrapper-landscape">
        <div class="left-column column">
            <div class="column-container text-container">
                <img class="category-logo" src="{{public_path('/img/logo.png')}}" alt="Logo" class="logo" style="margin-top: 3.513cm;">
                <h2 class="category">{!! $categories[1]->name !!}</h2>
                <div class="separator"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div>
                @foreach($items as $item)
                    @if(null !== $item->category && $item->category->objectId == $categories[1]->objectId)
                        {!! $item->relatedText !!}
                    @endif 
                @endforeach             
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <h2 class="by-the-bottle" style="margin-top: 1.917cm; visibility: hidden;">{{ $categories[4]->name }}</h2>
                <div class="separator" style="margin-left: 0"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div>
                <h2 class="subcategory">{!! $categories[3]->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position > 3 && $subcategory->category->objectId == $categories[3]->objectId)
                        <h2  class="subcategory" style="padding-top:0; font-size: 14px; padding-bottom: 12.5px;">{{$subcategory->name}}</h2>
                        @foreach($items as $item)
                            @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                <p class="ui-state-default">
                                    {!! $item->relatedText !!}
                                </p>
                            @endif 
                        @endforeach  
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="wrapper-landscape">
        <div class="left-column column">
            <div class="column-container">
                <img class="category-logo" src="{{public_path('/img/logo.png')}}" alt="Logo" class="logo" style="visibility: hidden;">
                <h2 class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="big-separator"><img src="{{public_path('img/wine-list-separator-big.png') }}" alt="Content separator"></div>
                <h2 class="subcategory">{!! $categories[3]->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position > 1 && $subcategory->position < 4 &&$subcategory->category->objectId == $categories[3]->objectId)
                        <h2  class="subcategory" style="padding-top:0; font-size: 14px; padding-bottom: 12.5px;">{{$subcategory->name}}</h2>
                        @foreach($items as $item)
                            @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                <p class="ui-state-default">
                                    {!! $item->relatedText !!}
                                </p>
                            @endif 
                        @endforeach  
                    @endif
                @endforeach
            </div>
        </div>
        <div class="right-column column" style="position:relative;">
            <div class="column-container" style="position:absolute; right:0; top:0; height:100%; z-index: 99999; background: white; width: 100%;">
                <img class="category-logo" src="{{public_path('/img/logo.png')}}" alt="Logo" class="logo" style="visibility: hidden; margin-top: 3.513cm;">
                <h2  class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="separator"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->category->objectId == $categories[1]->objectId)
                        <h2  class="subcategory">{{$subcategory->name}}</h2>
                        @foreach($items as $item)
                            @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                <p class="ui-state-default">
                                    {!! $item->relatedText !!}
                                </p>
                            @endif 
                        @endforeach  
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="wrapper-landscape">
        <div class="left-column column">
            <div class="column-container text-container">
                <img class="category-logo" src="{{public_path('/img/logo.png')}}" alt="Logo" class="logo" style="">
                <h2 class="category">{!! $categories[2]->name !!}</h2>
                <div class="separator"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div>
                @foreach($items as $item)
                    @if(null !== $item->category && $item->category->objectId == $categories[2]->objectId)
                        {!! $item->relatedText !!}
                    @endif 
                @endforeach               
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <img class="category-logo" src="{{public_path('/img/logo.png')}}" alt="Logo" class="logo" style="visibility: hidden; ">
                <h2  class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="separator"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div>
                <h2 class="subcategory">{!! $categories[3]->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position < 2 && $subcategory->category->objectId == $categories[3]->objectId)
                        <h2  class="subcategory" style="padding-top:0; font-size: 14px; padding-bottom: 12.5px;">{{$subcategory->name}}</h2>
                        @foreach($items as $item)
                            @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                <p class="ui-state-default">
                                    {!! $item->relatedText !!}
                                </p>
                            @endif 
                        @endforeach  
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="wrapper-landscape">
        <div class="left-column column">
            <div class="column-container text-container">
                <img class="category-logo" src="{{public_path('/img/logo.png')}}" alt="Logo" class="logo" style="">
                <h2 class="category">{!! $categories[3]->name !!}</h2>
                <div class="separator"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div>
                @foreach($items as $item)
                    @if(null !== $item->category && $item->category->objectId == $categories[3]->objectId)
                        {!! $item->relatedText !!}
                    @endif 
                @endforeach   
            </div>
        </div>     
        <div class="right-column column">
            <div class="column-container">
                <img class="category-logo" src="{{public_path('/img/logo.png')}}" alt="Logo" class="logo" style="visibility: hidden; ">
                <h2  class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="separator"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div>
                <h2 class="subcategory">{!! $categories[2]->name !!}</h2>
                @foreach($subcategories as $subcategory)
                    @if($subcategory->position < 2 && $subcategory->category->objectId == $categories[2]->objectId)
                        <h2  class="subcategory">{{$subcategory->name}}</h2>
                        @foreach($items as $item)
                            @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                <p class="ui-state-default">
                                    {!! $item->relatedText !!}
                                </p>
                            @endif 
                        @endforeach  
                    @endif
                @endforeach
            </div>
        </div>        
    </div>
    <div class="wrapper-landscape">    
            <div class="left-column column">
                <div class="column-container">
                    <img class="category-logo" src="{{public_path('/img/logo.png')}}" alt="Logo" class="logo" style="visibility: hidden; margin-top: 3.513cm;">
                    <h2 class="by-the-bottle">BY THE BOTTLE</h2>
                    <div class="separator"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div>
                    <h2 class="subcategory">{!! $categories[2]->name !!}</h2>
                    @foreach($subcategories as $subcategory)
                        @if($subcategory->position > 1 && $subcategory->category->objectId == $categories[2]->objectId)
                            <h2  class="subcategory">{{$subcategory->name}}</h2>
                            @foreach($items as $item)
                                @if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId)
                                    <p class="ui-state-default">
                                        {!! $item->relatedText !!}
                                    </p>
                                @endif 
                            @endforeach  
                        @endif
                    @endforeach
                </div>
            </div>
        <div class="right-column column">
            <div class="column-container">
            </div>
        </div>    
    </div>
    </body>
</html>
