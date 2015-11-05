<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\ParseCategoryRepository;
use App\Repositories\ParseItemRepository;
use App\Repositories\ParseMenuRepository;
use App\Repositories\ParseSubCategoryRepository;
use Illuminate\Http\Request;

class PDFController extends Controller
{

    private $items;

    private $menu;

    private $categories;

    public function __construct(ParseItemRepository $items, ParseMenuRepository $menu, ParseCategoryRepository $categories)
    {
        $this->items = $items;

        $this->menu = $menu;

        $this->categories = $categories;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($menu)
    {
        if(strcmp($menu, 'wine-list')==0){
            //$menu = $this->makeMenu($menu); 
            $menu = $this->makeWineMenu($menu);  
            $pdf = \PDF::loadView('wine.pdf', $menu); 
            return $pdf->setOrientation('landscape')->stream();
        }
        else{
            $menu = $this->makeMenu($menu);   
            $pdf = \PDF::loadView('pdf.show', $menu); 
            return $pdf->setOrientation('portrait')->stream();
        }
        // return $pdf->setOrientation('landscape')->stream();
    }

    public function makeMenu($name)
    {
        $menu = $this->menu->findBy('name', str_replace('-', ' ', $name));
        $categories = $this->categories->findAllBy('menu', $menu, [], 1000, true, 'position');
        $items = $this->items->findAllBy('menu', $menu, ['category'], 1000, true, 'position');
        return ['categories' => $categories, 'items' => $items];
    }

    public function makeWineMenu($menu)
    {
      $menu = $this->menu->findBy('name', str_replace('-', ' ', $menu));
      $subcategoryRepo = new ParseSubCategoryRepository();
      $subcategories = $subcategoryRepo->findAllBy('menu', $menu, ['category'], 1000, true, 'position');
      $categories = $this->categories->findAllBy('menu', $menu, [], 1000, true, 'position');
      $items = $this->items->findAllBy('menu', $menu, ['category'], 1000, true, 'position');
      return ['subcategories' => $subcategories, 'categories' => $categories, 'items' => $items, 'menu' => $menu];
    }

    public function download($menu)
    {
        if(strcmp($menu, 'wine-list')==0){
            $menu = $this->makeWineMenu($menu); 
            dd($menu); 
            $pdf = \PDF::loadView('wine.pdf', $menu); 
            return $pdf->setOrientation('landscape')->download();
        }
        else{
            $menu = $this->makeMenu($menu);   
            $pdf = \PDF::loadView('pdf.show', $menu); 
            return $pdf->setOrientation('portrait')->download();
        }
    }

}
