<header class="flex-row header" id="header">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <div class="main_margin width100 flex-row vertical-middle">
        <div class="col-md-2 vertical-middle">
            <div class="header-img-width">
                <a href="{{route('index')}}">
                    <img src="{{asset('images/new-white-logo.png')}}" class="image">
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <ul class="header-ul flex-row jc-sb">
                @if(Auth::user()->ISN !== Auth::user()->level)
                    <a class="header-navigation" href="{{route('parse')}}">
                        <li>
                            Parse
                        </li>
                    </a>
                @endif
                {{--<a class="header-navigation" href="javascript:void(0)">--}}
                {{--<li>--}}
                {{--Рейтинг--}}
                {{--</li>--}}
                {{--</a>--}}
                <a class="header-navigation" href="javascript:void(0)">
                    <li>
                        О компании
                    </li>
                </a>
                <a class="header-navigation" href="{{route('documentation')}}">
                    <li>
                        Библиотека
                    </li>
                </a>
                <a class="header-navigation" href="javascript:void(0)">
                    <li>
                        Продукты
                    </li>
                </a>
            </ul>
        </div>
        <div class="col-md-4">
            <div class="flex-column col-md-5 mt-1 mb-1 pl-0 pr-0">
                <a href="javascript:void(0)"
                   class="flex-row header-avatar-contain header-menu-hover text-decoration pt-1 pb-1">
                    <div href="javascript:void(0)" class="small-avatar-circle-width ml-2">
                        <user-image
                                :isn="{{ auth()->user()->ISN }}"></user-image>
                    </div>

                    <div class="vertical-middle header-avatar-nickname">
                        <span class="ml-1">{{Auth::user()->short_name}}</span>
                        <span class="ml-2"><i class="fas fa-caret-down"></i></span>
                    </div>
                </a>
                <div class="header-section zi-2">
                    <section class="pointer">
                        <a href="/logout">
                            <option style="color:white">
                                Выйти
                            </option>
                        </a>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="preloader" id="preloader">
        <div class="item-1"></div>
        <div class="item-2"></div>
        <div class="item-3"></div>
        <div class="item-4"></div>
        <div class="item-5"></div>
    </div>
</header>
{{--<div class="ny-2020">--}}
{{--    <div>--}}
{{--    </div>--}}
{{--    <!-- header-area end -->--}}
{{--</div>--}}
<script>

//    var snowsrc = "images/snow.png";
//    var no = 20;
//    var log = 0;
//    var hidesnowtime = 0;
//    var snowdistance = "windowheight";
//
//    var ie4up = (document.all) ? 1 : 0;
//    var ns6up = (document.getElementById && !document.all) ? 1 : 0;
//
//    function iecompattest() {
//        return (document.compatMode && document.compatMode != "BackCompat") ? document.documentElement : document.body
//    }
//
//    var dx, xp, yp;
//    var am, stx, sty;
//    var i, doc_width = 800, doc_height = 600;
//
//    if (ns6up) {
//        doc_width = self.innerWidth;
//        doc_height = self.innerHeight;
//    } else if (ie4up) {
//        doc_width = iecompattest().clientWidth;
//        doc_height = iecompattest().clientHeight;
//    }
//
//    dx = new Array();
//    xp = new Array();
//    yp = new Array();
//    am = new Array();
//    stx = new Array();
//    sty = new Array();
//    snowsrc = (snowsrc.indexOf("all-blogspot.com") != 1) ? "http://all-blogspot.com/blog/img/snow.png" : snowsrc
//    for (i = 0; i < no; ++i) {
//        dx[i] = 0;
//        xp[i] = Math.random() * (doc_width - 50);
//        yp[i] = Math.random() * doc_height;
//        am[i] = Math.random() * 20;
//        stx[i] = 0.02 + Math.random() / 10;
//        sty[i] = 0.7 + Math.random();
//        if (ie4up || ns6up) {
//            if (i == 0) {
//                document.write("<div id=\"dot" + i + "\" style=\"POSITION: fixed; Z-INDEX: " + i + "; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src='" + snowsrc + "' border=\"0\"><\/div>");
//            } else {
//                document.write("<div id=\"dot" + i + "\" style=\"POSITION: fixed; Z-INDEX: " + i + "; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src='" + snowsrc + "' border=\"0\"><\/div>");
//            }
//        }
//    }
//
//    function snowIE_NS6() {
//        doc_width = ns6up ? window.innerWidth - 10 : iecompattest().clientWidth - 10;
//        doc_height = (window.innerHeight && snowdistance == "windowheight") ? window.innerHeight : (ie4up && snowdistance == "windowheight") ? iecompattest().clientHeight : (ie4up && !window.opera && snowdistance == "pageheight") ? iecompattest().scrollHeight : iecompattest().offsetHeight;
//        for (i = 0; i < no; ++i) {
//            yp[i] += sty[i];
//            if (yp[i] > doc_height - 50) {
//                xp[i] = Math.random() * (doc_width - am[i] - 30);
//                yp[i] = 0;
//                stx[i] = 0.02 + Math.random() / 10;
//                sty[i] = 0.7 + Math.random();
//            }
//            dx[i] += stx[i];
//            document.getElementById("dot" + i).style.top = yp[i] + "px";
//            document.getElementById("dot" + i).style.left = xp[i] + am[i] * Math.sin(dx[i]) + "px";
//        }
//        snowtimer = setTimeout("snowIE_NS6()", 10);
//    }
//
//    function hidesnow() {
//        if (window.snowtimer) clearTimeout(snowtimer)
//        for (i = 0; i < no; i++) document.getElementById("dot" + i).style.visibility = "hidden";
//    }
//
//    if (ie4up || ns6up) {
//        snowIE_NS6();
//        if (hidesnowtime > 0)
//            setTimeout("hidesnow()", hidesnowtime * 1000);
//    }
//
//    function stopsnow() {
//        if (log == 0) {
//            for (i = 0; i < no; i++) document.getElementById("dot" + i).style.visibility = "hidden";
//            no = 0;
//            log = 1;
//            document.getElementById('snow-start').innerHTML = 'Вкл. снег';
//        }
//        else {
//            log = 0;
//            no = 20;
//            for (i = 0; i < no; i++) document.getElementById("dot" + i).style.visibility = "visible";
//            document.getElementById('snow-start').innerHTML = 'Выкл. снег';
//
//        }
//
//    }
</script>
