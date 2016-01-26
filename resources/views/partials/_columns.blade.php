         <div class="left-column column">
            {{-- <img src="/img/logo.png" alt="Logo" class="logo"> --}}
            @if(isset($archive) && $archive)
                <img src="{{public_path($group->menu_logo )}}" alt="Logo" class="logo" style="visibility:hidden;">
            @else
                <img src="{{ $group->menu_logo }}" alt="Logo" class="logo">
            @endif
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
