@extends('basic-layout')

@section('content')
  <div class="row">
    @foreach($allMenus as $menu)
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <h2 class="animated fadeIn"><a href="{{ url('admin/menus/'.str_slug($menu->name)) }}">{{ $menu->name }}</a></h2>
        </div>       
    @endforeach
  </div>
@stop

@section('script')

@stop