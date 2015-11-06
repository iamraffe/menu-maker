@extends('basic-layout')

@section('content')
  <div class="row menus">
    @foreach($allMenus as $menu)
        <div class="col-sm-5">
          <h2 class="animated fadeIn"><a href="{{ url('admin/menus/'.str_slug($menu->name)) }}">{{ $menu->name }}</a></h2>
        </div>       
    @endforeach
  </div>
@stop

@section('script')

@stop