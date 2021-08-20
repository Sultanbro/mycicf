<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">

    @include('layouts.treeselect')
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbars/">
    <link rel="stylesheet" href="{{asset('css/admin_head.css')}}">
    <title>Navbar Template · Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container" id="app">
    @include('layouts.header')
    <main role="main">
        <form method="post" action="/wnd/save_word" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Наименование документа</label>
                <input type="text" class="form-control" placeholder="title" name="title">
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">https://my.cic.kz/productsinfo/</span>
                    </div>
                    <input type="text" class="form-control" placeholder="url" name="url">
                </div>
            </div>
            <div class="form-group">
                <label for="file">Загрузите файл</label>
                <div class="custom-file">
                    <input id="file" type="file" onchange="changeLabel()" name="word" class="custom-file-input">
                    <label class="custom-file-label" for="file" id="fileName">Не выбрано</label>
                </div>
            </div>            <div class="form-group">
                <label for="title">Документ</label>
                <textarea class="form-control" name="area3" style="width: 100%; height : 500px;"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">SEND</button>
        </form>
    </main>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script type="text/javascript" src="{{asset('js/nicEdit.js')}}"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<script>
    function changeLabel() {
        var name = document.getElementById('file').files[0].name;
        document.getElementById('fileName').innerHTML = name;
    }
</script>
</html>
