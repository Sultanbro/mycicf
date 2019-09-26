<html>
<head>
    <title>DOCUMENTATION ADD NEW FILE</title>
    <script type="text/javascript" src="{{asset('js/nicEdit.js')}}"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    </script>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
@include('layouts.header')
    <div class="container">
        <form method="post" action="/documentation/save">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" placeholder="title" name="title">
            </div>
            <div class="form-group">
                <label for="url">Url</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">https://my.cic.kz/documentation/</span>
                    </div>
                    <input type="text" class="form-control" placeholder="url" name="url">
                </div>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <textarea class="form-control" name="area3" style="width: 100%; height : 500px;"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">SEND</button>
        </form>
    </div>
</body>
</html>