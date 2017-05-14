<li class="item">
    @foreach($articales as $artical)
        <h3>{{$artical->title}}</h3>
        <hr>
        <p>{{$artical->desc}}</p>
        <hr>
    @endforeach
</li>