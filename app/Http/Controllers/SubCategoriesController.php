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

class SubCategoriesController extends Controller
{
  private $subcategories;

  public function __construct(ParseSubCategoryRepository $subcategories)
  {
      $this->subcategories = $subcategories;
      $this->middleware('auth');
  }

  public function update(Request $request, $objectId)
  {
    $this->subcategories->update($request->input('objectId'), [ 'name' => $request->input('name')]);
    flash()->success('Your subcategory has been updated correctly', '');
    return response()->json(['Message' => 'Sub category updated.'], 200);
  }
}
