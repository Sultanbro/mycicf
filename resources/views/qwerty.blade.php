<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>i-ci.kz</title>

    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font awesome-->
    <link rel="stylesheet" href="{{asset('fonts/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- include vue-treeselect & its styles. you can change the version tag to better suit your needs. -->
    <script src="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.3.0/dist/vue-treeselect.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.3.0/dist/vue-treeselect.min.css">

{{--    <script src="{{asset('js/app.js')}}"></script>--}}
    {{--    <script src="{{asset('js/simple_info.js')}}"></script>--}}
</head>
<body>
    <main class="flex-row"  id="app">
        <div class="col-md-12" id="employee_info">

            <form method="post" action="/documentation" enctype="multipart/form-data" class="d-flex justify-content-center align-items-center" style="display:flex; min-height:100vh;">
                @csrf
                <div class="col-md-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">SVG</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" onchange="changeName()" class="custom-file-input" name="file_url" id="file_upload" accept="image/svg+xml">
                            <label class="custom-file-label" id="upload_file_label" for="file_upload">Choose file</label>
                        </div>
                    </div>
                    <div class="md-form">
                        <label for="url">Url</label>
                        <input type="text" name="url" class="form-control" id="url">
                    </div>
                    <div class="form-group">
                        <label for="script">Script</label>
                        <textarea class="form-control rounded-0" rows="10" v-model="script" name="script" id="script"></textarea>
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Submit</button>
                </div>
            </form>

        </div>

        {{--RIGHT SIDE BAR GOES HERE--}}
        </div>
    </main>
{{--FOOTER GOES HERE--}}
</body>
<script>
    function changeName(){
        var filename = document.getElementById('file_upload').files[0].name;
        document.getElementById('upload_file_label').innerHTML = filename;
    }
</script>
</html>
