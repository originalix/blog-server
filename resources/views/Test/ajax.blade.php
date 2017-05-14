@extends('Test.base')

@section('content')
    <h1 class="title">Ajax Request</h1>
    <button class="btn">ajax</button>
    <div class="list">
        <ul>
            <li class="item">
                @foreach($articales as $artical)
                    <h3>{{$artical->title}}</h3>
                    <hr>
                    <p>{{$artical->desc}}</p>
                    <hr>
                @endforeach
            </li>
        </ul>
    </div>
@stop

@section('footer-js')
    <script src="{{ asset('datetime/jquery/jquery-1.8.3.min.js') }}"></script>
    <script>
        $('.title').on('click', function () {
          $('.title').hide();
        });
        $('.btn').on('click', function () {
            $.ajax({
              type: "GET",
              url: "/blogService/public/ajax",
              dataType: "html"
            }).done( function (msg) {
              alert(msg);
            })
        });
    </script>
@show