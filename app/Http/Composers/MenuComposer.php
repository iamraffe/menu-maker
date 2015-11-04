<?php

namespace App\Http\Composers;

use App\Repositories\ParseArchiveRepository;
use App\Repositories\ParseCategoryRepository;
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

  private $categories;

	public function __construct(ParseItemRepository $items, Request $request, ParseArchiveRepository $archives, ParseArchiveRepository $archives, ParseMenuRepository $menu, ParseCategoryRepository $categories)
	{
    $this->items = $items;

    $this->request = $request;

    $this->archives = $archives;

    $this->menu = $menu;

    $this->categories = $categories;
	}

	public function compose(View $view)
	{
		$menu = $this->menu->findBy('name', str_replace('-', ' ', $this->request->route('menus')));

    $categories = $this->categories->findAllBy('menu', $menu, [], 1000, true, 'position');

  	// $items = $this->make($categories);
    //
    $items = $this->items->all(['category'], 1000, true, 'position'); 

    // dd($items);

		$view->with([
      'categories' => $categories,
			'items' => $items,
			'archives' => $this->archives->all(),
			'menu' => $menu
		]);
	}

	public function make($categories)
	{
    foreach ($categories as $key => $category) {
      $items[$category->position]['category'] = $category;
      $items[$category->position]['items'] = $this->items->findAllBy('category', $category, [], 1000, true, 'position');
    }
    return $items;
	}
}