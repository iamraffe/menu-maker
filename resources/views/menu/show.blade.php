@extends('layout')

@section('css')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/zf-5.5.2/dt-1.10.9,r-1.0.7/datatables.min.css"/> --}}
@stop

@section('content')
    <div class="wrapper">
        @include('partials._columns', compact('categories', 'items'))           
    </div>
@stop

@section('scripts')
{{--<script type="text/javascript">
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
</script>--}}
@stop