<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\ParseArchiveRepository;
use App\Repositories\ParseCategoryRepository;
use App\Repositories\ParseItemRepository;
use App\Repositories\ParseMenuRepository;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
  private $items;

  private $archives;

  private $menu;

  private $categories;

  public function __construct(ParseItemRepository $items, ParseArchiveRepository $archives, ParseMenuRepository $menu, ParseCategoryRepository $categories)
  {
      $this->items = $items;
      $this->archives = $archives;
      $this->menu = $menu;
      $this->categories = $categories;
      $this->middleware('auth');
  }

  public function update(Request $request, $objectId)
  {
    $this->categories->update($request->input('objectId'), [ 'name' => $request->input('name')]);
    // flash()->success('Your category has been updated correctly', '');
    return response()->json(['Message' => 'Category updated.'], 200);
  }
}
