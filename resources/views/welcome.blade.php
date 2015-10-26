<!DOCTYPE html>
<html>
    <head>
        <title>Menu Maker</title>
        <link href="css/all.css" rel="stylesheet" media="all">
    </head>
    <body>
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
                    <p>marinara<span class="description"> –– tomato, garlic, oregano</span> ... 8</p> 
                    <p>margherita<span class="description"> – tomato, mozzarella, basil, parm</span> ... 12</p> 
                    <p>calabrese<span class="description"> – tomato, mozzarella, salami, serrano, garlic, basil</span> ... 14</p> 
                    <p>fresca<span class="description"> – prosciutto piccante, arugula, meyer lemon, mozz, olive oil</span> ... 16</p> 
                    <p>harissa<span class="description"> – eggplant, shallot, banana pepper,pistachio, green herbs</span> ... 12</p> 
                    <p>taleggio<span class="description"> –  sausage, mozzarella, scallion</span> ... 14</p> 
                    <p>corn &amp; nduja<span class="description"> –  charred scallion, peppers, mozz, parm cream</span> ... 15</p>
                    <p>braised goat<span class="description"> –  garrotxa, mozzarella, herbs, fennel pollen, onion</span> ... 16</p>                    
                    <p>calzone<span class="description"> – mozz, ricotta, ham, black olive, salami, tomato, basil</span> ... 17</p>
                </div>
                <div class="menu-section">
                    <h2 class="category">dessert</h2>
                    <p>yogurt panna cotta and melon ... 7</p> 
                    <p>limoncello tart<span class="description"> – fennel shortbread crust,toasted meringue, blackberries</span> ... 7</p> 
                    <p>vanilla ice cream and sherry ... 7</p> 
                    <p>mango lassi ice cream<span class="description"> – mint, maldon salt</span> ... 7</p> 
                    <p>grilled chocolate sandwich<span class="description"> – olive oil brioche,olive oil ice cream</span> ... 9</p> 
                    <p>nv valdespino “el candado” pedro ximenez 10 (3 oz)</p>             
                </div>
            </div>
            <div class="right-column column">
                <div class="menu-section">
                    <h2 class="category">beer</h2>
                    <p>zilker<span class="description"> – pale ale</span> ... 5</p> 
                    <p>strange land <span class="description">sour brown ale</span> ... 5</p> 
                    <p>karbach<span class="description"> – love street kolsch</span> ... 5</p> 
                    <p>rabbit hole<span class="description"> – rapture brown ale</span> ... 5</p>
                    <p>live oak <span class="description"> – hefeweizen</span> ... 5</p> 
                    <p>austin beer works<span class="description"> – fire eagle IPA</span> ... 5</p> 
                    <p>lone star 12 oz ... 3</p> 
                    <p>argus cidery ciderkin 12 oz ... 7</p> 
                    <p>jester king<span class="description"> – el cedro hoppy cedar-aged ale</span> ...  11 / 30 (750ml)</p>             
                </div>
                <div class="menu-section">
                    <h2 class="category">other drinks</h2>
                    <p>mexican coke, topo chico, san pellegrino lemon or orange ... 3</p>
                </div>
                <div class="menu-section">
                    <h2 class="category">sparkling</h2>
                    <p><span class="description">nv pascal pibaleau “la perlette” pet nat rosé </span>grolleau ... 14 / 40</p> 
                    <p><span class="description">2012 tripoz “cremant de bourgogne” brut nature</span> chardonnay ... 16 / 45</p>           
                </div>
                <div class="menu-section">
                    <h2 class="category">rose</h2>
                    <p><span class="description">2014 lioco “indica” mendocino county rosé</span> carignan ... 12 / 35</p>              
                </div>
                <div class="menu-section">
                    <h2 class="category">white</h2>
                    <p><span class="description">2013 domaine de la patience “from the tank”</span>chardonnay ... 7</p> 
                    <p><span class="description">2014 berger</span> grüner veltliner ... 10 / 28</p> 
                    <p><span class="description">2014 peter lauer “barrel x”</span>riesling ... 14 / 44</p> 
                    <p><span class="description">2013 lieu dit</span> sauvignon blanc <span class="description">saint ynez valley</span> ... 14 / 40</p> 
                    <p><span class="description">2014 occhipinti “sp 68 bianco”</span> zibibbo, albanello ... 16 / 47</p>
                </div>
                <div class="menu-section">
                    <h2 class="category">red</h2>
                    <p><span class="description">2013 estézargues “from the tank” côtes du rhône</span> grenache, syrah ... 7</p> 
                    <p><span class="description">2013 cirelli montepulciano d’abruzzo</span>montepulciano ... 10 / 28</p> 
                    <p><span class="description">2013 roagna dolcetto d’alba</span> dolcetto ... 12 / 32</p> 
                    <p><span class="description">2014 chermette vissoux beaujolais</span>gamay ... 12 / 35</p> 
                    <p><span class="description">2013 montesecondo rosso toscana</span>sangiovese ... 14 / 42</p> 
                    <p><span class="description">2011 piedrasassi santa barbara county</span> syrah ... 16 / 50</p> 
                    <p><span class="description">2012 tyler santa barbara county</span> pinot noir ... 16 / 50</p>
                </div>
            </div>           
        </div>
    </body>
</html>
