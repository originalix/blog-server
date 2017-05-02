@extends('Artical.base')

@section('title', 'Leon')

@section('content')

@if(isset($artical))
    <h1>{{ $artical->title }}</h1>
    {{ $artical->content }}
@endif

@endsection