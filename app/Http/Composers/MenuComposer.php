<?php

namespace App\Http\Composers;

use App\Repositories\ParseItemRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Parse\ParseQuery;

/**
* 
*/
class MenuComposer
{

	private $items;

	private $request;

	public function __construct(ParseItemRepository $items, Request $request)
	{
    $this->items = $items;

    $this->request = $request;
	}

	public function compose(View $view)
	{
		
		$menu = $this->request->route('menus');
		
		$query = new ParseQuery('Item');
    $allCategories = $this->items->findAllBy('category', true);
    foreach($allCategories as $category){
      $categories[$category->position]['object'] = $category;
      $categories[$category->position]['items'] = Collection::make($query->equalTo('parent', $category)->ascending('position')->find());    
    }
		$view->with('categories', $categories);
	}


}