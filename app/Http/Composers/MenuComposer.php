<?php

namespace App\Http\Composers;

use App\Repositories\ParseArchiveRepository;
use App\Repositories\ParseItemRepository;
use App\Repositories\ParseMenuRepository;
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

	private $archives;

	private $menu;

	public function __construct(ParseItemRepository $items, Request $request, ParseArchiveRepository $archives, ParseArchiveRepository $archives, ParseMenuRepository $menu)
	{
    $this->items = $items;

    $this->request = $request;

    $this->archives = $archives;

    $this->menu = $menu;
	}

	public function compose(View $view)
	{
		$menu = $this->menu->findBy('name', str_replace('-', ' ', $this->request->route('menus')));

		// dd($menu);

		$categories = $this->make($menu);

		$view->with([
			'categories' => $categories,
			'archives' => $this->archives->all(),
			'menu' => $menu
		]);
	}

	public function make($menu)
	{
    $allItems = $this->items->findAllBy('menu', $menu, ['menu', 'parent'], 1000, true, 'position');
    foreach ($allItems as $key => $item) {
      if($item->category){
        $categories[$item->objectId]['object'] = $item;
      }
      else{
        $categories[$item->parent->objectId]['items'][] = $item;    
      }
    }
    return $categories;
	}
}