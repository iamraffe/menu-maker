         <div class="left-column column">
            <img src="/img/logo.png" alt="Logo" class="logo">
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