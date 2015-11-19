<?php

namespace App\Http\Controllers;

use App\Repositories\ParseGroupRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $user;

    public function __construct()
    {
      $groupRepo = new ParseGroupRepository();
      $this->user = auth()->user();
      view()->share('signedIn', auth()->check());
      view()->share('user', $this->user);
      view()->share('group', auth()->check() ? $this->user->group->fetch() : '');
      // $this->group = isset(\Auth::user()->group) ? \Auth::user()->group : '';
    }
}
