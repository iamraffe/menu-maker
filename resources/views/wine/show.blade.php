@extends('layout')

@section('content')
    <div class="wrapper-landscape" style="position: relative;">
         <div class="left-column column">
            <div class="column-container">
                
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <img class="logo-cover" src="/img/bufalina-logo-greyscale.png" alt="Bufalina Logo">
            </div>
        </div>  
    </div>
@foreach($categories as $category)
@if($category->position == 1)
    <div class="wrapper-landscape">
         <div class="left-column column">
            <div class="column-container">
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container text-container">
                <img class="logo-intro" src="/img/bufalina-logo-simple-greyscale.png" alt="Logo" class="logo">
                <div class="separator"></div>
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
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="margin-top: 3.513cm;">
                <h2 class="category">{!! $category->name !!}</h2>
                <div class="separator"></div>
                @foreach($items as $item)
                    @if(null !== $item->category && $item->category->objectId == $category->objectId)
                        {!! $item->relatedText !!}
                    @endif 
                @endforeach             
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="visibility: hidden; margin-top: 3.513cm;">
                <h2  class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="separator"></div>
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
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="">
                <h2 class="category">{!! $category->name !!}</h2>
                <div class="separator"></div>
                @foreach($items as $item)
                    @if(null !== $item->category && $item->category->objectId == $category->objectId)
                        {!! $item->relatedText !!}
                    @endif 
                @endforeach                
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="visibility: hidden; ">
                <h2  class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="separator"></div>
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
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="visibility: hidden; margin-top: 3.513cm;">
                <h2 class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="separator"></div>
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
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="">
                <h2 class="category">{!! $category->name !!}</h2>
                <div class="separator"></div>
                @foreach($items as $item)
                    @if(null !== $item->category && $item->category->objectId == $category->objectId)
                        {!! $item->relatedText !!}
                    @endif 
                @endforeach                
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="visibility: hidden; ">
                <h2  class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="separator"></div>
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
{{--         <div class="right-column column">
            <div class="column-container">
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="visibility: hidden;">
                <h2 class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="separator"></div>
                <h2  class="subcategory">RED</h2>
                <h2  class="subcategory" style="padding-top:0; font-size: 14px; padding-bottom: 12.5px;">FRANCE</h2>
                <p class="ui-state-default">2014 cousin &ldquo;pur breton&rdquo; cabernet franc 40 </p>
                <p class="ui-state-default">2010 domaine rimbert &ldquo;mas au schiste&rdquo; carignan, syrah, grenache 38 </p>
                <p class="ui-state-default">2014 catherine and pierre breton bourgueil &ldquo;trinch!&rdquo; cabernet franc 42 </p>
                <p class="ui-state-default">2014 lapierre morgon beaujolais gamay 50 </p>
                <p class="ui-state-default">2012 chaussard &ldquo;les longues vignes&rdquo; pineau d&rsquo;aunis 50 </p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"> </p>
                <p class="ui-state-default"> </p>
                <p class="ui-state-default"> </p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"> 2011 eric texier &ldquo;st. julien en st. alban&rdquo; vielle serine syrah 67 </p>
                <p class="ui-state-default">2013 jean foillard &ldquo;cuv&eacute;e corcelette&rdquo; morgon gamay 75 </p>
                <p class="ui-state-default">2013 domaine du p&eacute;lican &ldquo;trois c&eacute;pages&rdquo; arbois pinot noir, trousseau, poulsard 85</p>
                <p class="ui-state-default">2013 pierre gonon st joseph syrah 105</p>
                <p class="ui-state-default"> 2009 pierre gonon st joseph &ldquo;vieilles vignes&rdquo; syrah 155 </p>
                <p class="ui-state-default">2011 d&rsquo;angerville volnay premier cru pinot noir 150 </p>
                <p class="ui-state-default">2010 grange des p&egrave;res syrah, mourvedre, cabernet sauvignon, cunois 180 </p>
                <p class="ui-state-default">2010 clos rougeard &ldquo;le clos&rdquo; cabernet franc 125</p>
                <p class="ui-state-default"> 2010 clos rougeard &ldquo;le bourg&rdquo; cabernet franc 225 </p>
                <p class="ui-state-default">2011 jamet c&ocirc;te-r&ocirc;tie syrah 200</p>
                <p class="ui-state-default"> 2012 thierry allemand &ldquo;les chaillots&rdquo; cornas syrah 210</p>
                <p class="ui-state-default"> 2012 thierry allemand &ldquo;reynard&rdquo; cornas syrah 240</p>         
            </div>
        </div> --}}        
    </div>
 
    <div class="wrapper-landscape">
         <div class="left-column column">
            <div class="column-container">
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="visibility: hidden;">
                <h2 class="by-the-bottle">BY THE BOTTLE</h2>
                <div class="big-separator"></div>
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
{{--                 <h2  class="subcategory">RED</h2>
                <h2  class="subcategory" style="padding-top:0; font-size: 14px; padding-bottom: 12.5px;">OTHER</h2>
                <p class="ui-state-default"></p>
                <p class="ui-state-default">/p>
                <p class="ui-state-default"></p>
                <h2  class="subcategory" style="padding-top:0; font-size: 14px; padding-bottom: 12.5px;">ITALY</h2> 
                <p class="ui-state-default"></p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"> </p>
                <p class="ui-state-default"> </p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"> </p>
                <p class="ui-state-default"> 2009 poggio di sotto &ldquo;rosso di montalcino&rdquo; sangiovese 140</p>
                <p class="ui-state-default"> 2003 emidio pepe montepulciano d&rsquo;abruzzo montepulciano 150</p>
                <p class="ui-state-default">2005 quintarelli &ldquo;ca&rsquo; del merlo&rdquo; rosso corvina, etc. 165 </p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"></p> --}}
            </div>
        </div>
        <div class="right-column column">
            <div class="column-container">
                <img class="category-logo" src="/img/logo.png" alt="Logo" class="logo" style="visibility: hidden;">
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
{{--                 <h2  class="subcategory">RED</h2>
                <h2  class="subcategory" style="padding-top:0; font-size: 14px; padding-bottom: 12.5px;">CALIFORNIA and OREGON</h2>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"> </p>
                <p class="ui-state-default"> </p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"> </p>
                <p class="ui-state-default"></p>
                <p class="ui-state-default"></p> --}}        
            </div>
        </div>        
    </div>
@endif
@if($category->position == 5)
    <div class="wrapper-landscape">
         <div class="left-column column">
            <div class="column-container">
                <h2 class="by-the-bottle" style="margin-top: 1.917cm;">{{ $category->name }}</h2>
                <div class="big-separator" style="top: 40px;"></div>
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
{{--                 <h2  class="subcategory">SPARKLING</h2>
                <p class="ui-state-default">nv pascal pibaleau “la perlette” pet nat rosé grolleau 14 / 40 </p>
                <p class="ui-state-default">2012 tripoz “cremant de bourgogne” brut nature chardonnay 16 / 45 </p>
                <h2  class="subcategory">ROSE</h2>
                <p class="ui-state-default">2014 lioco “indica” mendocino county rosé carignan 12 / 35</p>
                <h2  class="subcategory">SHERRY</h2>
                <p class="ui-state-default">nv valdespino manzanilla deliciosa &ldquo;en rama&rdquo; palomino 7 (3 oz) / 22 (375ml)</p>
                <p class="ui-state-default">nv valdespino paolo cortado &ldquo;viejo c.p.&rdquo; palomino 10 (3 oz)</p>
                <h2  class="subcategory">WHITE</h2>
                <p class="ui-state-default">2013 domaine de la patience &ldquo;from the tank&rdquo; chardonnay 7</p>
                <p class="ui-state-default">2014 berger gr&uuml;ner veltliner 10 / 28 </p>
                <p class="ui-state-default">2014 peter lauer &ldquo;barrel x&rdquo; riesling 14 / 44 </p>
                <p class="ui-state-default">2013 lieu dit sauvignon blanc saint ynez valley 14 / 40</p>
                <p class="ui-state-default">2014 occhipinti &ldquo;sp 68&rdquo; bianco zibbibo, albanello 16 / 47</p>
                <h2  class="subcategory">RED</h2>
                <p class="ui-state-default">2013 est&eacute;zargues &ldquo;from the tank&rdquo; c&ocirc;tes du rh&ocirc;ne grenache, syrah 7</p>
                <p class="ui-state-default">2013 cirelli montepulciano d&rsquo;abruzzo montepulciano 10 / 28 </p>
                <p class="ui-state-default">2013 roagna dolcetto d&rsquo;alba dolcetto 12 / 32</p>
                <p class="ui-state-default"> 2014 chermette vissoux beaujolais gamay 12 / 35</p>
                <p class="ui-state-default"> 2013 montesecondo rosso toscana sangiovese 14 / 42 </p>
                <p class="ui-state-default">2011 piedrasassi santa barbara county syrah 16 / 50</p>
                <p class="ui-state-default">2012 tyler santa barbara county pinot noir</p>      --}} 
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
{{--                 <h2  class="subcategory">BEER</h2>
                <p class="ui-state-default">2014 cousin &ldquo;pur breton&rdquo; cabernet franc 40 </p>
                <p class="ui-state-default">2010 domaine rimbert &ldquo;mas au schiste&rdquo; carignan, syrah, grenache 38 </p>
                <p class="ui-state-default">2014 catherine and pierre breton bourgueil &ldquo;trinch!&rdquo; cabernet franc 42 </p>
                <p class="ui-state-default">2014 lapierre morgon beaujolais gamay 50 </p>
                <p class="ui-state-default">2012 chaussard &ldquo;les longues vignes&rdquo; pineau d&rsquo;aunis 50 </p>
                <p class="ui-state-default">2012 c&eacute;dric garreau &ldquo;gar&rsquo;o&rsquo;vin&rdquo; cabernet sauvignon 55 </p>
                <p class="ui-state-default">2014 souhaut syrah 57</p>
                <p class="ui-state-default"> 2014 souhaut &ldquo;les cessieux&rdquo; st joseph syrah 87</p>
                <p class="ui-state-default"> 2010 catherine and pierre breton bourgueil &ldquo;les perrieres&rdquo; cabernet franc 72</p>
                <h2  class="subcategory">DESSERT</h2>
                <p class="ui-state-default">nv valdespino &ldquo;el candado&rdquo; pedro ximenez 10 (3 oz) </p>
                <p class="ui-state-default">nv equipo navazos &ldquo;la bota de oloroso 46&rdquo; montilla palomino, pedro ximenez 12 (2 oz)</p>
                <p class="ui-state-default">nv jean francois ganevat &ldquo;sul q...&rdquo; savagnin 100 (375ml)</p> --}}
            </div>
        </div>        
    </div> 
@endif
@endforeach
@stop

@section('scripts')

@stop