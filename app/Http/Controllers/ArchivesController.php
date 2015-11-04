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

  public function show($objectId)
  {
    $menu = $this->archives->find($objectId);
    $pdf = \PDF::loadView('archives.show', compact('menu'));
    return $pdf->stream();
  }
}
