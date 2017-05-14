@extends('Test.base')

@section('content')
    <h1 class="title">Ajax Ajax</h1>
    <h2>test artical</h2>
@stop

@section('footer-js')
    <script src="{{ asset('datetime/jquery/jquery-1.8.3.min.js') }}"></script>
    <script>
        $('.title').on('click', function () {
          $('.title').hide();
        });
    </script>
@show