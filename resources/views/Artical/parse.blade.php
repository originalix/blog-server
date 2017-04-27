<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parse Markdown</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/artical.css') }}">
</head>
<body>
    <div class="jumbotron">
        <div class="container">
        <p>Blog Server System</p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-8">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#">Home</a></li>
                    <li role="presentation"><a href="#">Upload</a></li>
                    <li role="presentation"><a href="#">Delete</a></li>
                </ul>
            </div>
        </div>
        <div class="row" id="form">
            <form method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label for="file">Filename:</label>
                <input type="file" name="file" id="file" />
                <br/>
                <input type="submit" name="submit" value="Submit" />
            </form>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>
    <script>
        var example1 = new Vue({
            el: '#example-1',
            data: {
                message: 'hello vue'
            }
        })
    </script>
</body>
</html>