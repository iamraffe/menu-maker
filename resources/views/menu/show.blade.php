@extends('layout')

@section('content')
    <div class="wrapper">
         <div class="left-column column">
            <img src="/img/logo.png" alt="Logo" class="logo">
            @foreach($categories as $category)
                @if($category->position < 4)
                    <div class="menu-section">
                        <h2 class="category">{!! $category->name!!}</h2>
                        <div class="item-container">
                            @foreach($items as $item)
                                @if($item->category->objectId == $category->objectId)
                                    <p>
                                        {!! $item->relatedText !!}
                                    </p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="right-column column">
            @foreach($categories as $category)
                @if($category->position > 3)
                    <div class="menu-section">
                        <h2 class="category">{!! $category->name!!}</h2>
                        <div class="item-container">
                            @foreach($items as $item)
                                @if($item->category->objectId == $category->objectId)
                                    <p>
                                        {!! $item->relatedText !!}
                                    </p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>           
    </div>
    <div class="container-fluid" style="margin-top: 150px; background: #f8f8f8">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Creation Date</th>
                            <th>Options</th>{{-- 
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th> --}}
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>Creation Date</th>
                            <th>Options</th>{{-- 
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th> --}}
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach($archives as $item)
                            <tr>
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->name)->format('l jS \\of F Y') }}</td>
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->name)->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>               
            </div>
        </div>
    </div>
@stop

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

@stop