<div class="wrapper-landscape" style="position: relative;">
<div class="left-column column">
   <div class="column-container">

</div>
</div>
<div class="right-column column">
<div class="column-container">
<img class="logo-cover" src="{{public_path($group->menu_logo)}}" alt="Bufalina Logo" style="visibility: hidden;">
</div>
</div>
    </div>
<!-- CATEGORY START -->
<!-- cat 5 -->
    <div class="wrapper-landscape">
<div class="left-column column">
<div class="column-container">
<h2 class="by-the-bottle" style="margin-top: 1.917cm;  margin-bottom: 25px;">{{ $categories[4]->name }}</h2>
<!-- <div class="separator" style="margin-left: 0 top: 40px;"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div> -->
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
<div class="right-column column">
<div class="column-container">
<h2 class="by-the-bottle" style="visibility: hidden; margin-top: 1.917cm">BY THE BOTTLE</h2>
<div class="separator" style="margin-left: 0; visibility: hidden;"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div>
<h2 class="subcategory" style="visibility: hidden;">{!! $categories[3]->name !!}</h2>
@foreach($subcategories as $subcategory)
@if($subcategory->position > 2 && $subcategory->position < 5 && $subcategory->category->objectId == $categories[3]->objectId)
<h2  class="subcategory">{{$subcategory->name}}</h2>
@foreach($items as $item)
@if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId && $item->position < 12)
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
<!-- end -->
<!-- cat 2 -->
    <div class="wrapper-landscape">
<div class="left-column column">
<div class="column-container">
<h2 class="by-the-bottle" style="margin-top: 1.917cm;  margin-bottom: 10px;">BY THE BOTTLE</h2>
<div class="separator" style=" margin-bottom: 10px;"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div>
<!-- <div class="big-separator" style="top: 40px;"></div> -->
<h2 class="subcategory">{!! $categories[3]->name !!}</h2>
@foreach($subcategories as $subcategory)
@if($subcategory->position < 3 && $subcategory->category->objectId == $categories[3]->objectId)
<h2  class="subcategory">{{$subcategory->name}}</h2>
@foreach($items as $item)
@if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId && $item->position < 20)
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
<h2 class="by-the-bottle" style="visibility: hidden; margin-top: 1.917cm; margin-bottom: 25px;">BY THE BOTTLE</h2>
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
<!-- end -->
<!-- cat 4 -->
<div class="wrapper-landscape">
<div class="left-column column">
<div class="column-container">
<h2 class="by-the-bottle" style="margin-top: 1.917cm; margin-bottom: 25px;">BY THE BOTTLE</h2>
<!-- <div class="separator"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div> -->
<div class="big-separator" style="top: 40px;"><img src="{{public_path('img/wine-list-separator-big.png') }}" alt="Content separator"></div>
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
{{-- EDIT ON FEB 12 --}}
<h2 class="subcategory" data-id="{!! $categories[2]->getObjectId() !!}">{!! $categories[2]->name !!}</h2>
@foreach($subcategories as $subcategory)
@if($subcategory->category->objectId == $categories[2]->objectId && $subcategory->position == 1)
<h2 class="subcategory">
 {{$subcategory->name}}
</h2>
<div class="menu-contents item-container">
@foreach($items as $item)
@if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId && $item->position < 12)
<p class="ui-state-default">
{!! $item->relatedText !!}
</p>
@endif
@endforeach
</div>
@endif
@endforeach
</div>
</div>
<div class="right-column column">
<div class="column-container">
<h2 class="by-the-bottle" style="visibility: hidden; margin-top: 1.917cm; margin-bottom: 25px;">BY THE BOTTLE</h2>
<div class="separator" style="margin-left: 0; visibility: hidden"><img src="{{public_path('img/wine-list-separator.png') }}" alt="Content separator"></div>
<h2 class="subcategory">{!! $categories[2]->name !!}, continued</h2>
@foreach($subcategories as $subcategory)
@if($subcategory->category->objectId == $categories[2]->objectId && $subcategory->position != 1)
<h2  class="subcategory">{{$subcategory->name}}</h2>
@foreach($items as $item)
@if(null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId && $item->position < 6 && $subcategory->position != 1 ||
null !== $item->subcategory && $item->subcategory->objectId == $subcategory->objectId && $item->position > 11 && $subcategory->position == 1)
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
<!-- end -->



<!-- CATEGORY END -->
