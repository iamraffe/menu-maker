<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\ParseArchiveRepository;
use Illuminate\Http\Request;

class ArchivesController extends Controller
{

  private $archives;

  public function __construct(ParseArchiveRepository $archives)
  {
      $this->archives = $archives;
      $this->middleware('auth');
  }

  // public function index()
  // {
  //   $archives = $this->archives->all(['menu']);
  //   return view('archives.index', compact('archives'));
  // }

  public function show($objectId)
  {
    // dd($objectId);
    $savedFile = $this->archives->find($objectId, ['menu']);
    $pdf = \PDF::loadView('archives.show', compact('savedFile', 'class'));
    if(strcmp($savedFile->menu->objectId, 'BeQYNaR0Gc')==0){
      $class = "wrapper-landscape";
      $pdf->setOrientation('landscape');
    }
    else{
      $class = "wrapper"; 
      $pdf->setOrientation('portrait');
    }    
    
    return $pdf->stream();
  }
}
