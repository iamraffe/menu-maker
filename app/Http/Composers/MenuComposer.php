<?php

namespace App\Http\Composers;

use App\Repositories\ParseArchiveRepository;
use App\Repositories\ParseCategoryRepository;
use App\Repositories\ParseItemRepository;
use App\Repositories\ParseMenuRepository;
use App\Repositories\ParseSubCategoryRepository;
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

		$menu = $this->menu->findBy('name', str_replace('-', ' ', $this->request->route('menu_name')));

    $categories = $this->categories->findAllBy('menu', $menu, [], 1000, true, 'position');

     // dd([$menu, $categories, strcmp($this->request->route('menu_name'), 'wine-list')==0]);

		if(strcmp($this->request->route('menu_name'), 'wine-list')==0){
			$subcategoryRepo = new ParseSubCategoryRepository();
			$subcategories = $subcategoryRepo->findAllBy('menu', $menu, ['category'], 1000, true, 'position');
			$items = $this->items->findAllBy('menu', $menu, ['category'], 1000, true, 'position');
			$view->with([
				'subcategories' => $subcategories,
	      'categories' => $categories,
				'items' => $items,
				'archives' => $this->archives->all(),
				'menu' => $menu
			]);		
		}
		else{
			// $items = $this->items->all(['category'], 1000, true, 'position');
      $items = $this->items->findAllBy('menu', $menu, ['category'], 1000, true, 'position');
			$view->with([
	      'categories' => $categories,
				'items' => $items,
				'archives' => $this->archives->all(),
				'menu' => $menu
			]);			
		}
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