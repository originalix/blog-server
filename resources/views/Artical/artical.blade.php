<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artical</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/artical.css') }}">
</head>
<body>
    <div class="container-fluid">
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