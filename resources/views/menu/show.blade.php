@extends('layout')

@section('css')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/zf-5.5.2/dt-1.10.9,r-1.0.7/datatables.min.css"/> --}}
@stop

@section('content')
    <div class="wrapper">
        @include('partials._columns', compact('categories', 'items'))           
    </div>
    <div class="container-fluid" style="margin-top: 150px; background: #fff; padding: 50px;">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Creation Date</th>
                            <th>Options</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>Creation Date</th>
                            <th>Options</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach($archives as $item)
                            <tr>
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->name)->format('l, jS \\of F, Y') }}</td>
                                <td><a href="{{ url('admin/pdf/'.$item->objectId) }}" class="btn btn-default"><span class="ion ion-ios-paperplane-outline"></span></a></td>
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
    <script type="text/javascript">
        $(window).load(function() {
            $("p").each(function(index){
                var size = $(this).text().trim().length;
                if(size < 76){
                    $(this).addClass('force-one-line');
                }
                else if(size < 90){
                    var i = 5;
                    while ($(this).text().trim().slice(i-1, i) != ' '){
                        i--;
                    }
                    
                    $(this).html([$(this).text().trim().slice(0, i), '<br>', $(this).text().trim().slice(i)].join(''));
                }
            });

        });
    </script>
@stop