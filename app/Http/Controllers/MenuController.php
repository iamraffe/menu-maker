<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\ParseClasses\Archive;
use App\ParseClasses\Item;
use App\ParseClasses\Menu;
use App\Repositories\ParseArchiveRepository;
use App\Repositories\ParseItemRepository;
use App\Repositories\ParseMenuRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Parse\ParseQuery;
use \Carbon\Carbon as Carbon;

class MenuController extends Controller
{
	private $items;

  private $archives;

  private $menu;

	public function __construct(ParseItemRepository $items, ParseArchiveRepository $archives, ParseMenuRepository $menu)
	{
    $this->items = $items;
    $this->archives = $archives;
    $this->menu = $menu;
    $this->middleware('auth');
	}

  public function prepareItems($value='')
  {
    $query = new ParseQuery('Item');
    $allCategories = $this->items->findAllBy('category', true);
    foreach($allCategories as $category){
      $categories[$category->position]['object'] = $category;
      $categories[$category->position]['items'] = Collection::make($query->equalTo('parent', $category)->ascending('position')->find());    
    }
    return $categories;
  }

	public function index()
	{
    //$categories = $this->prepareItems();
    
    // $allMenus = $this->archives->all();
    // foreach($allMenus as $menu){
    //   $name = Carbon::createFromFormat('Y-m-d-H.i', $menu->name)->toDateTimeString(); 

    //   dd($name);
    // }
    // dd();
    // 
    // $query = new ParseQuery('Menu');
    // $menu = $query->equalTo('name', 'menu')->first();
    // $allCategories = $this->items->all();
    // foreach ($allCategories as $key => $value) {
    //   $this->items->update($value->objectId, ['menu' => $menu]);
    // }
    $allMenus = $this->menu->all();
		return view('menu.index', compact('allMenus'));
	}

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show()
  {
    //$menu = $this->menu->findBy('name', str_replace('-', ' ', $menuName));
    // dd($menu);
    return view('menu.show');
  }


  public function create()
  {
    $categories = $this->prepareItems();
		$pdf = \PDF::loadView('pdf', ['categories' => $categories]);
    // $pdf->save('archive/menu.pdf');
		return $pdf->stream();
  }

  public function save()
  {
    $categories = $this->prepareItems();
    $pdf = \PDF::loadView('pdf', ['categories' => $categories]);
    $this->archives->create(['name'=> Carbon::now()->format('Y-m-d-H.i')]);
    $pdf->save('archive/menu'.Carbon::now()->format('Y-m-d-H.i').'.pdf');
    flash()->overlay('Your file has been saved correctly', 'This file will be displayed on the Archive section');
    return redirect('/');
  }

  public function download()
  {
    $categories = $this->prepareItems();
    $pdf = \PDF::loadView('pdf', ['categories' => $categories]);
    return $pdf->download();
  }

  public function edit()
  {
  //   $categories = $this->prepareItems();
		// return view('editable')->with('categories', $categories);
    return view('menu.edit'); 
  }

  public function isCategory($objectId, $parentId)
  {
    return $parentId == $objectId;
  }

  public function update(Request $request)
  {

    $newOrder = $request->json()->all();
    if(empty($newOrder)){
      $this->items->update($request->input('objectId'), [ 'relatedText' => $request->input('relatedText')]);
    }
    else{
      // $allItems = $this->items->all();
      foreach($newOrder as $key => $objectId){
        // $found = $allItems->filter(function($item) use ($objectId){
        //   return $item->objectId == $objectId;
        // })->first();
        $this->items->update($objectId, ['position' => intval($key)+1]);
      }
    }
		return response()->json(['Message' => 'Item updated.'], 200);
  }

  public function store(Request $request)
  {

    $item = [
      'position' => intval($request->input('position')),
      'parent' => $this->items->find($request->input('parent')),
      'relatedText' => $request->input('relatedText'),
      'category' => false
    ];

    $this->items->create($item);
  }

  public function delete($objectId)
  {
    $this->items->delete($objectId);
  }
}
