@extends('Artical.base')

@section('title', 'Write')

@section('content')
    <form>
      <div class="title">
          <div class="row">
            <div class="col-md-8">
              <input type="text" class="form-control" placeholder="文章标题">
            </div>
            <div class="col-md-4">
             <input type="date" class="form-control" name="date">
            </div>
          </div>
      </div>
      <div class="artical">
        <textarea class="form-control" rows="30"></textarea>
      </div>
      <div class="submit">
        <button type="button" class="btn btn-primary">发布</button>
      </div>
    </form>
@endsection

