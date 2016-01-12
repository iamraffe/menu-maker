@extends('layout')

@section('css')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/zf-5.5.2/dt-1.10.9,r-1.0.7/datatables.min.css"/> --}}
@stop

@section('content')
    <div class="container-fluid" style="margin-top: -21px; background: #fff; padding: 50px; height: 100%;">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Creation Date</th>
                            <th>Menu</th>
                            <th>Options</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>Creation Date</th>
                            <th>Menu</th>
                            <th>Options</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach($archives as $item)
                            <tr>
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->name)->format('l, jS \\of F, Y') }}</td>
                                <td>{{ $item->menu->name }}</td>
                                <td>
                                    @if($menu->multivsn)
                                        <div class="dropdown">
                                          <button class="btn btn-link btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            View as...
                                            <span class="caret"></span>
                                          </button>
                                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="{{ url('admin/archives/'.$item->objectId) }}" target="_blank">Full version</a></li>
                                            <li><a href="{{ url('admin/archives/'.$item->objectId.'/shortened') }}" target="_blank">Short version</a></li>
                                          </ul>
                                        </div>
                                    @else
                                        <a href="{{ url('admin/archives/'.$item->objectId) }}" class="btn btn-default" target="_blank"><span class="ion ion-ios-paperplane-outline"></span></a>
                                    @endif
                                </td>
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