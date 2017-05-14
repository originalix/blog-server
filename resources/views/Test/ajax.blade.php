@extends('Test.base')

@section('content')
    <h1 class="title">Ajax Request</h1>

    <div class="list">
        {{--@if(count($artices))--}}
            @foreach($articales as $artical)
                <h3>{{$artical->title}}</h3>
            @endforeach
        {{--@endif--}}
    </div>
@stop

@section('footer-js')
    <script src="{{ asset('datetime/jquery/jquery-1.8.3.min.js') }}"></script>
    <script>
        $('.title').on('click', function () {
          $('.title').hide();
        });
    </script>
@show