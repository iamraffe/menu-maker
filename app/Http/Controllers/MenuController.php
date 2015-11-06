<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\ParseClasses\Archive;
use App\ParseClasses\Item;
use App\ParseClasses\Menu;
use App\Repositories\ParseArchiveRepository;
use App\Repositories\ParseCategoryRepository;
use App\Repositories\ParseItemRepository;
use App\Repositories\ParseMenuRepository;
use App\Repositories\ParseSubCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Parse\ParseQuery;
use \Carbon\Carbon as Carbon;

class MenuController extends Controller
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

	public function index()
	{
    $allMenus = $this->menu->all();
		return view('menu.index', compact('allMenus'));
	}

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($name)
  {

    if(strcmp($name, 'wine-list') == 0){
      return view('wine.show');
    }

    return view('menu.show');
  }

  public function edit($name)
  {
    if(strcmp($name, 'wine-list')==0){
      return view('wine.edit');
    }
    return view('menu.edit'); 
  }

  public function store($content, $menu)
  {
    return $this->archives->create(['name'=> Carbon::now()->format('Y-m-d'), 'content' => $content, 'menu' => $menu]); 
  }

  public function storeOrUpdate($name)
  {
    $menu = $this->menu->findBy('name', str_replace('-', ' ', $name));
    
    if(strcmp($name, 'wine-list') == 0){
      $menuData = $this->makeWineMenu($menu);
      $_menuPartial = view()->make('partials._wine', $menuData)->render();
    }
    else{
      $menuData = $this->makeMenu($menu);
      $_menuPartial = view()->make('partials._columns', $menuData)->render();  
    }
    $archives = $this->archives->findAllBy('menu', $menu);
    if($archives->contains('name', Carbon::now()->format('Y-m-d'))){
      $this->update($_menuPartial); 
    }
    else{
      $this->store($_menuPartial, $menuData['menu']);
    }
    // $this->handlePDFBackup($menu);
    flash()->overlay('Your menu configuration has been saved correctly', 'This menu will be displayed on the Archive section');
    return redirect('/admin/menus/'.$name);
  }

  public function handlePDFBackup($menu)
  {
    $file = 'archive/menu'.Carbon::now()->format('Y-m-d').'.pdf';
    $pdf = \PDF::loadView('pdf.show', $menu);
    if (\File::exists($file)) \File::delete($file);
    return $pdf->save($file);
  }

  public function makeMenu($menu)
  {
      $categories = $this->categories->findAllBy('menu', $menu, [], 1000, true, 'position');
      $items = $this->items->findAllBy('menu', $menu, ['category'], 1000, true, 'position');
      return ['categories' => $categories, 'items' => $items, 'menu' => $menu];
  }

  public function makeWineMenu($menu)
  {
      $subcategoryRepo = new ParseSubCategoryRepository();
      $subcategories = $subcategoryRepo->findAllBy('menu', $menu, ['category'], 1000, true, 'position');
      $categories = $this->categories->findAllBy('menu', $menu, [], 1000, true, 'position');
      $items = $this->items->findAllBy('menu', $menu, ['category'], 1000, true, 'position');
      return ['subcategories' => $subcategories, 'categories' => $categories, 'items' => $items, 'menu' => $menu];
  }

  public function update($_menu)
  {
    $menu = $this->archives->findBy('name', Carbon::now()->format('Y-m-d'));
    // dd($_menu);
    return $this->archives->update($menu->objectId, ['content' => $_menu]);
  }

  public function archive($name)
  {
    $menu = $this->menu->findBy('name', str_replace('-', ' ', $name));
    // dd($menu);
    $archives = $this->archives->findAllBy('menu', $menu, ['menu']);
    return view('archives.index', compact('archives', 'menu'));
  }

  // public function download()
  // {
  //   $categories = $this->prepareItems();
  //   $pdf = \PDF::loadView('pdf', ['categories' => $categories]);
  //   // $pdf->setOption('user-style-sheet', '/your/file.css');
  //   return $pdf->download();
  // }

  // public function update(Request $request)
  // {

  //   $newOrder = $request->json()->all();
  //   if(empty($newOrder)){
  //     $this->items->update($request->input('objectId'), [ 'relatedText' => $request->input('relatedText')]);
  //   }
  //   else{
  //     // $allItems = $this->items->all();
  //     foreach($newOrder as $key => $objectId){
  //       // $found = $allItems->filter(function($item) use ($objectId){
  //       //   return $item->objectId == $objectId;
  //       // })->first();
  //       $this->items->update($objectId, ['position' => intval($key)+1]);
  //     }
  //   }
		// return response()->json(['Message' => 'Item updated.'], 200);
  // }

  // public function store(Request $request)
  // {

  //   $item = [
  //     'position' => intval($request->input('position')),
  //     'parent' => $this->items->find($request->input('parent')),
  //     'relatedText' => $request->input('relatedText'),
  //     'category' => false
  //   ];

  //   $this->items->create($item);
  // }

  // public function delete($objectId)
  // {
  //   $this->items->delete($objectId);
  // }
}
