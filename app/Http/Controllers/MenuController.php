<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\ParseItemRepository;
use Illuminate\Http\Request;

class MenuController extends Controller
{
	private $items;

	public function __construct(ParseItemRepository $items)
	{
		$this->items = $items;
	}

	public function index()
	{
  	$allCategories = $this->items->findAllBy('category', true);
  	foreach($allCategories as $category){
  		$categories[$category->position]['object'] = $category;
  		$items = $this->items->findAllBy('category', false, ['parent']);
  		$items = $items->sortBy('position');
  		foreach($items as $item){
  			if($item->parent->getObjectId() == $category->getObjectId()){
					$categories[$category->position]['items'][] = $item;
  			}
  		}
  		
  	}
		return view('welcome')->with('categories', $categories);
	}

  public function create()
  {
  	$allCategories = $this->items->findAllBy('category', true);
  	foreach($allCategories as $category){
  		$categories[$category->position]['object'] = $category;
  		$items = $this->items->findAllBy('category', false, ['parent']);
  		$items = $items->sortBy('position');
  		foreach($items as $item){
  			if($item->parent->getObjectId() == $category->getObjectId()){
					$categories[$category->position]['items'][] = $item;
  			}
  		}
  		
  	}
		$pdf = \PDF::loadView('pdf', ['categories' => $categories]);
		return $pdf->stream();
  }

  public function edit()
  {
  	$allCategories = $this->items->findAllBy('category', true);
  	foreach($allCategories as $category){
  		$categories[$category->position]['object'] = $category;
  		$items = $this->items->findAllBy('category', false, ['parent']);
  		$items = $items->sortBy('position');
  		foreach($items as $item){
  			if($item->parent->getObjectId() == $category->getObjectId()){
					$categories[$category->position]['items'][] = $item;
  			}
  		}
  		
  	}
		return view('editable')->with('categories', $categories);
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
      $allItems = $this->items->all();
      foreach($newOrder as $key => $objectId){
        $found = $allItems->filter(function($item) use ($objectId){
          return $item->objectId == $objectId;
        })->first();
        $this->items->update($found->objectId, ['position' => intval($key)+1]);
      }
    }

    // dd(13);
    // $objectId = $request->input('objectId');
    // $position = intval($request->input('position'));
    // $parent = $request->input('parent');
    // $relatedText = $request->input('relatedText');

    // if(!$this->isCategory($objectId, $parent)){
    //   $allItems = $this->items->findAllBy('category', false, ['parent'])->sortByDesc('position');
    //   $allItems = $allItems->filter(function($item) use ($position){
    //     if($item->position <= $position){
    //       return true;
    //     }
    //   });
    //   $allItems = $allItems->each(function($item) use ($parent, $position, $objectId){
    //     if($item->parent->objectId == $parent && $item->position >= $position && $item->objectId != $objectId){
    //       $this->items->update($item->objectId, ['position' => intval($item->position)+1]);
    //     }

    //   });
    // }
    // else{
    // }

    // $item['position'] = $position;
    // $item['relatedText'] = $relatedText;
    // $item = $this->items->findBy('objectId', $objectId, ['parent']);
    // $allItems = $this->items->findAllBy('parent', $item->parent, ['parent']);




    // dd($allItems);
    // foreach($allItems as $it){
    //   if($it->position >= $position && $it->getObjectId() != $objectId){
    //     $this->items->update($it->getObjectId(), ['position' => $it->position+1]);
    //   }
    // }
    
  	// $this->items->update($objectId, $item);
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
