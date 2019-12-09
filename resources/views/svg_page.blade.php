<html>
<head>
    <title>{{$page->title}}</title>
    <script type="text/javascript" src="{{asset('js/nicEdit.js')}}"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    </script>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.3.0/dist/vue-treeselect.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.3.0/dist/vue-treeselect.min.css">

    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
@include('layouts.header')
<div class="container-fluid">
    <br>
    <div id="app">
        <div class="col-12 border-20 border-gray">
            <library-svg :pinned_id="{{ isset($_GET['id']) ? (int)$_GET['id'] : 0 }}"
                         :title="{{json_encode($page->title)}}"
                         :body="{{json_encode($page->body)}}"></library-svg>
        </div>
    </div>
{{--    <div class="row">--}}
{{--        <div class="col-12 border-20 border-gray svg_center">--}}
{{--            <h2><p class="text-center">{{$page->title}}</p></h2>--}}
{{--            {!! $page->body !!}--}}
{{--            <br>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <br>--}}
{{--    <br>--}}
</div>
</body>
<script>
    function changeDisplay(idName){
        var element = document.getElementById(idName);
        if(element.classList.contains('active')){
            element.classList.remove('active');
            element.style.display = "none";
        }
        else {
            element.classList.add('active');
            element.style.display = "block";
        }
    }
</script>
</html>
