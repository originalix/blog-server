@extends('Artical.base')

@section('title', 'Write')

@section('content')
    <form method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="title">
          <div class="row">
            <div class="col-md-8">
              <input type="text" class="form-control" name="title" placeholder="文章标题">
            </div>
            <div class="col-md-4">
             <input type="date" class="form-control" name="date">
            </div>
          </div>
      </div>
      <div class="desc">
        <textarea class="form-control" name="desc" rows="4"></textarea>
      </div>
      <div class="artical">
        <textarea class="form-control" name="content" rows="30"></textarea>
      </div>
      <div class="submit">
        <button type="submit" class="btn btn-primary">发布</button>
      </div>
    </form>
@endsection

