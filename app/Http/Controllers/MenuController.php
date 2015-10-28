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

  public function update(Request $request)
  {
    $objectId = $request->input('objectId');
    $position = $request->input('position');
    $item = $this->items->find($objectId, ['parent']);
    $allItems = $this->items->findAllBy('parent', $item->parent, ['parent']);
    dd($allItems);
    foreach($allItems as $it){
      if($it->position >= $position && $it->getObjectId() != $objectId){
        $this->items->update($it->getObjectId(), ['position' => $it->position+1]);
      }
    }
    
  	$this->items->update($objectId, $request->except('objectId'));
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
