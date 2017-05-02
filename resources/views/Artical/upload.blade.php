@extends('Artical.base')

@section('title', '上传成功')

@section('content')

@if(isset($error))
    <div class="alert alert-danger" role="alert">
        <strong>{{ $error }}</strong>
    </div>
@endif

@if(isset($artical))
    <div class="alert alert-success" role="alert">
        <h3>上传成功</h3>
        <a href="#" class="alert-link"><h3>{{ $artical->title }}</h3></a>
    </div>
@endif

@endsection