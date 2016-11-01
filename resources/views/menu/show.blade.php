@extends('layout')

@section('css')
@stop

@section('content')
    <div class="wrapper {{ $group->name }}">
        @include('partials._columns', compact('categories', 'items'))           
    </div>
@stop

@section('scripts')

@stop