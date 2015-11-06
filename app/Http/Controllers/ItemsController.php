<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\ParseArchiveRepository;
use App\Repositories\ParseCategoryRepository;
use App\Repositories\ParseItemRepository;
use App\Repositories\ParseMenuRepository;
use App\Repositories\ParseSubCategoryRepository;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
  private $items;

  private $archives;

  private $menu;

  private $categories;

  private $subcategories;

  public function __construct(ParseItemRepository $items, ParseArchiveRepository $archives, ParseMenuRepository $menu, ParseCategoryRepository $categories, ParseSubCategoryRepository $subcategories)
  {
      $this->subcategories = $subcategories;
      $this->items = $items;
      $this->archives = $archives;
      $this->menu = $menu;
      $this->categories = $categories;
      $this->middleware('auth');
  }

  public function positions(Request $request)
  {
    foreach($request->order as $key => $objectId){
      $this->items->update($objectId, ['position' => intval($key)+1]);
    }
    flash()->success('Your items order has been updated correctly', '');
    return response()->json(['Message' => 'Item order updated.'], 200);
  }

  public function update(Request $request, $objectId)
  {
    $this->items->update($request->input('objectId'), [ 'relatedText' => $request->input('relatedText')]);
    flash()->success('Your item has been updated correctly', '');
    return response()->json(['Message' => 'Item updated.'], 200);
  }

  public function store(Request $request)
  {
    // dd([$this->menu->find($request->input('menu')), $request->all(), $request->menu, strcmp($request->input('menu'), 'BeQYNaR0Gc') == 0]);
    if(strcmp($request->input('menu'), 'BeQYNaR0Gc') == 0){
      $subcategory = $this->subcategories->find($request->input('subcategory'));
      $position = $this->items->findAllBy('subcategory', $subcategory)->count();
      $item = [
        'position' => $position,
        'subcategory' => $subcategory,
        'relatedText' => $request->input('relatedText'),
        'menu' => $this->menu->find($request->input('menu')),
      ];

    }
    else{
      $category = $this->categories->find($request->input('category'));
      $position = $this->items->findAllBy('category', $category)->count();
      $item = [
        'position' => $position,
        'category' => $category,
        'relatedText' => $request->input('relatedText'),
        'menu' => $this->menu->find($request->input('menu')),
      ];

    }


    $this->items->create($item);
    flash()->success('Your item has been created correctly', '');
    return response()->json(['Message' => 'Item created.'], 200);
  }

  public function destroy($objectId)
  {
    $this->items->delete($objectId);
    flash()->success('Your item has been deleted correctly', '');
    return response()->json(['Message' => 'Item deleted.'], 200);
  }

}
