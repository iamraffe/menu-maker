@foreach($categories as $category)
@if($category->position == 1)
<div class="wrapper-landscape">
<div class="left-column column">
<div class="column-container">
</div>
</div>
<div class="right-column column">
<div class="column-container text-container">
<img class="logo-intro" src="{{public_path('/img/bufalina-logo-simple-greyscale.png')}}" alt="Logo" class="logo">
<div class="separator"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div>
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
<img class="category-logo" src="{{public_path('/img/logo.png')}}" alt="Logo" class="logo" style="margin-top: 3.513cm;">
<h2 class="category">{!! $category->name !!}</h2>
<div class="separator"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div>
@foreach($items as $item)
@if(null !== $item->category && $item->category->objectId == $category->objectId)
{!! $item->relatedText !!}
@endif 
@endforeach
</div>
</div>
<div class="right-column column">
<div class="column-container">
<img class="category-logo" src="{{public_path('/img/logo.png')}}" alt="Logo" class="logo" style="visibility: hidden; margin-top: 3.513cm;">
<h2  class="by-the-bottle">BY THE BOTTLE</h2>
<div class="separator"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div>
@foreach($subcategories as $subcategory)
@if($subcategory->category->objectId == $category->objectId)
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
@endif
@if($category->position == 3)
<div class="wrapper-landscape">
<div class="left-column column">
<div class="column-container text-container">
<img class="category-logo" src="{{public_path('/img/logo.png')}}" alt="Logo" class="logo" style="">
<h2 class="category">{!! $category->name !!}</h2>
<div class="separator"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div>
@foreach($items as $item)
@if(null !== $item->category && $item->category->objectId == $category->objectId)
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
<h2 class="subcategory">{!! $category->name !!}</h2>
@foreach($subcategories as $subcategory)
@if($subcategory->position < 2 && $subcategory->category->objectId == $category->objectId)
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
<h2 class="subcategory">{!! $category->name !!}</h2>
@foreach($subcategories as $subcategory)
@if($subcategory->position > 1 && $subcategory->category->objectId == $category->objectId)
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
@endif  
@if($category->position == 4)
<div class="wrapper-landscape">
<div class="left-column column">
<div class="column-container text-container">
<img class="category-logo" src="{{public_path('/img/logo.png')}}" alt="Logo" class="logo" style="">
<h2 class="category">{!! $category->name !!}</h2>
<div class="separator"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div>
@foreach($items as $item)
@if(null !== $item->category && $item->category->objectId == $category->objectId)
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
<h2 class="subcategory">{!! $category->name !!}</h2>
@foreach($subcategories as $subcategory)
@if($subcategory->position < 2 && $subcategory->category->objectId == $category->objectId)
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
<h2 class="subcategory">{!! $category->name !!}</h2>
@foreach($subcategories as $subcategory)
@if($subcategory->position > 1 && $subcategory->position < 4 &&$subcategory->category->objectId == $category->objectId)
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
<div class="right-column column">
<div class="column-container">
<img class="category-logo" src="{{public_path('/img/logo.png')}}" alt="Logo" class="logo" style="visibility: hidden;">
<h2 class="by-the-bottle" style="visibility: hidden;">BY THE BOTTLE</h2>
<h2 class="subcategory">{!! $category->name !!}</h2>
@foreach($subcategories as $subcategory)
@if($subcategory->position > 3 && $subcategory->category->objectId == $category->objectId)
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
@endif
@if($category->position == 5)
<div class="wrapper-landscape">
<div class="left-column column">
<div class="column-container">
<h2 class="by-the-bottle" style="margin-top: 1.917cm;">{{ $category->name }}</h2>
<div class="big-separator" style="top: 40px;"><img src="{{public_path('img/wine-list-separator-big.png') }}" alt="Content separator"></div>
@foreach($subcategories as $subcategory)
@if($subcategory->position < 6 && $subcategory->category->objectId == $category->objectId)
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
<div class="right-column column">
<div class="column-container">
<h2 class="by-the-bottle" style="visibility: hidden; margin-top: 1.917cm;">BY THE BOTTLE</h2>
@foreach($subcategories as $subcategory)
@if($subcategory->position > 5 && $subcategory->category->objectId == $category->objectId)
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
@endif
@endforeach