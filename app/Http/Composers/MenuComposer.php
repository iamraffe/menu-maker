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

		$viewData['menu'] = $this->menu->findBy('name', str_replace('-', ' ', $this->request->route('menu_name')));

    $viewData['categories'] = $this->categories->findAllBy('menu', $viewData['menu'], [], 1000, true, 'position');

    $viewData['items'] = $this->items->findAllBy('menu', $viewData['menu'], ['category'], 1000, true, 'position');

		if(strcmp($this->request->route('menu_name'), 'wine-list')==0){
			$subcategoryRepo = new ParseSubCategoryRepository();
			$viewData['subcategories'] = $subcategoryRepo->findAllBy('menu', $viewData['menu'], ['category'], 1000, true, 'position');		
		}
		
		$view->with($viewData);			
	}
}