@extends('basic-layout')

@section('content')
  <div class="row menus">
    <div class="col-sm-5">
      <h2 class="animated fadeIn"><a href="{{ url('admin/menus/menu') }}">menu</a></h2>
    </div>
    <div class="col-sm-5">
      <h2 class="animated fadeIn"><a href="{{ url('admin/menus/wine-list') }}">wine list</a></h2>
    </div>
  </div>
@stop

@section('script')

@stop