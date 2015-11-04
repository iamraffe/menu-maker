<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\ParseCategoryRepository;
use App\Repositories\ParseItemRepository;
use App\Repositories\ParseMenuRepository;
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
        $menu = $this->makeMenu($menu);   
        $pdf = \PDF::loadView('pdf.show', $menu);
        return $pdf->stream();
    }

    public function makeMenu($name)
    {
        $menu = $this->menu->findBy('name', str_replace('-', ' ', $name));
        $categories = $this->categories->findAllBy('menu', $menu, [], 1000, true, 'position');
        $items = $this->items->all(['category'], 1000, true, 'position'); 
        return ['categories' => $categories, 'items' => $items];
    }


}
