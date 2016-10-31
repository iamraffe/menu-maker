@extends('basic-layout')

@section('content')
  @if($group->account == 'bufalinadues')
    <div class="row menus">
      <div class="col-sm-4">
        <h3 class="animated fadeIn {{ $group->account }}"><a href="{{ url('admin/menus/menu') }}">menu</a></h3>
      </div>
      <div class="col-sm-4">
        <h3 class="animated fadeIn {{ $group->account }}"><a href="{{ url('admin/menus/lunch-menu') }}">lunch menu</a></h3>
      </div>
      <div class="col-sm-4">
        <h3 class="animated fadeIn {{ $group->account }}"><a href="{{ url('admin/menus/wine-list') }}">wine list</a></h3>
      </div>
    </div>
  @else
    <div class="row menus">
      <div class="col-sm-5">
        <h3 class="animated fadeIn {{ $group->account }}"><a href="{{ url('admin/menus/menu') }}">menu</a></h3>
      </div>
      <div class="col-sm-5">
        <h3 class="animated fadeIn {{ $group->account }}"><a href="{{ url('admin/menus/wine-list') }}">wine list</a></h3>
      </div>
    </div>
  @end
@stop

@section('script')

@stop
