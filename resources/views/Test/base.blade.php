<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leon's Blog - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}">
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="logo">Originalee</div>
        <ul class="navi">
          <li class="item active"><a href="login">Home</a></li>
          <li class="item"><a href="artical">Write</a></li>
        </ul>
      </div>
    </nav>
    <div class="jumbotron">
        <div class="container-fluid">
          <h1>Leon's Blog</h1>
          <p>Management Systems</p>
        </div>
    </div>
    <div class="content">
      <div class="container">
        @section('content')
          this is the master content
        @show
      </div>
    </div>
    <footer class="footer-wrapper">
      <div class="sperate">
        <hr>
      </div>
      <p>© 2015 - 2017 Originalee,powered By Leon</p>
    </footer>

    @section('footer-js')
    @show
</body>
</html>