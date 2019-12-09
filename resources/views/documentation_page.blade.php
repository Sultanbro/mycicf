<html>
<head>
    <title>my.cic.kz</title>
    <script type="text/javascript" src="{{asset('js/nicEdit.js')}}"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    </script>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.3.0/dist/vue-treeselect.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.3.0/dist/vue-treeselect.min.css">

    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
@include('layouts.header')
<div class="container-fluid" >
    <div id="app">
        <div class="row">
            <div class="col-12 border-20 border-gray">
                <name
                        v-bind:pinned_id="{{ isset($_GET['id']) ? (int)$_GET['id'] : 0 }}"></name>
            </div>
        </div>
        <div class="row">
            <div class="col-12 border-20 border-gray">
                <search></search>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 border-20 border-gray">
            <h2><p class="text-center">{{$page->title}}</p></h2>
            {!! $page->encoded_text !!}
        </div>
    </div>
</div>
</body>

</html>