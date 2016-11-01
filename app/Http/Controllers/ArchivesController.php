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
      parent::__construct();
  }

  // public function index()
  // {
  //   $archives = $this->archives->all(['menu']);
  //   return view('archives.index', compact('archives'));
  // }

  public function show($account, $objectId)
  {
    // dd($objectId);
    $savedFile = $this->archives->find($objectId, ['menu']);

    if(strcmp($savedFile->menu->objectId, 'BeQYNaR0Gc')==0 || strcmp($savedFile->menu->objectId, 'Ywi70Fq2xV') == 0  || strcmp($savedFile->menu->objectId, 'c4opmreiOf') == 0){
      $class = "wrapper-landscape";
      $pdf = \PDF::loadView('archives.show', compact('savedFile', 'class'));
      $pdf->setOrientation('landscape');
    }
    else{
      $class = "wrapper";
      $pdf = \PDF::loadView('archives.show', compact('savedFile', 'class'));
      $pdf->setOrientation('portrait');
    }

    return $pdf->stream();
  }
}
