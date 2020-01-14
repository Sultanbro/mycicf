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
<script type="text/javascript">

    'use strict';

    var AILabsChatInitialized = false;

    function AILabsChatStart(){
        try{
            if (  (/webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) ){ //Android|
                //pass mobile
                return;
            }
        } catch(ex){}


        var css = '.uniq-chat-button,.uniq-chat-frame{position:fixed!important;z-index:2147483000!important;right:20px}.uniq-chat-frame{border:none;height:calc(100% - 20px - 80px - 20px);bottom:calc(20px + 80px);width:376px;background:#fff;min-height:250px!important;max-height:704px!important;-webkit-box-shadow:0 5px 40px rgba(0,0,0,.16)!important;box-shadow:0 5px 40px rgba(0,0,0,.16)!important;border-radius:8px;overflow:hidden!important;opacity:0;pointer-events:none;transition:all .12s}.uniq-chat-frame.active{opacity:1;pointer-events:auto}.uniq-chat-button{border-radius:50%!important;user-select:none;bottom:20px;overflow:hidden;width:60px;height:60px;cursor:pointer;-webkit-transform-origin:center;transform-origin:center;background:#286efa;-webkit-backface-visibility:hidden;backface-visibility:hidden;transition:.3s;opacity:0}.uniq-chat-button .close,.uniq-chat-button .open{position:absolute;top:0;bottom:0;display:-webkit-box;display:-ms-flexbox;display:flex;width:100%;-webkit-transition:opacity .08s linear,-webkit-transform .16s linear;transition:opacity .08s linear,-webkit-transform .16s linear;transition:transform .16s linear,opacity .08s linear;transition:transform .16s linear,opacity .08s linear,-webkit-transform .16s linear;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.uniq-chat-button .close svg path,.uniq-chat-button .open svg path{fill:#fff}.uniq-chat-button .open svg{width:28px;height:32px}.uniq-chat-button .open{-webkit-transform:rotate(0) scale(1);transform:rotate(0) scale(1);opacity:1}.uniq-chat-button .close{-webkit-transform:rotate(-30deg);transform:rotate(-30deg);opacity:0}.uniq-chat-button.active .open{-webkit-transform:rotate(30deg) scale(0);transform:rotate(30deg) scale(0);opacity:0}.uniq-chat-button.active .close{-webkit-transform:rotate(0);transform:rotate(0);opacity:1}@media only screen and (max-device-width:667px),screen and (max-width:450px) {body.active-chat-window{overflow:hidden!important;position: fixed!important;}.uniq-chat-button.active{background:0 0;top:12px;right:8px;width:51px;height:51px}.uniq-chat-frame{height:100%!important;max-height: none !important;width:100%!important;bottom:0!important;right:0!important;border-radius:0!important}}@media only screen and (orientation:landscape){body.active-chat-window{position: static!important;}}'; //old blue

        //HALYK. changed opacity to display:none/block
        if (chat_client=='halyk'){
            css = '.uniq-chat-button,.uniq-chat-frame{position:fixed!important;z-index:2147483000!important;right:20px}\
        .uniq-chat-frame{display:none;border:none;height:calc(100% - 20px - 80px - 20px);bottom:calc(20px + 80px);width:376px;background:#fff;min-height:250px!important;max-height:704px!important;-webkit-box-shadow:0 5px 40px rgba(0,0,0,.16)!important;box-shadow:0 5px 40px rgba(0,0,0,.16)!important;border-radius:8px;overflow:hidden!important;pointer-events:none;transition:all .12s}\
        .uniq-chat-frame.active{display:block;pointer-events:auto}\
        .uniq-chat-button{border-radius:50%!important;user-select:none;bottom:20px;overflow:hidden;width:60px;height:60px;cursor:pointer;-webkit-transform-origin:center;transform-origin:center;background:#00805F;-webkit-backface-visibility:hidden;backface-visibility:hidden;transition:.3s;opacity:0}.uniq-chat-button .close,.uniq-chat-button .open{position:absolute;top:0;bottom:0;display:-webkit-box;display:-ms-flexbox;display:flex;width:100%;-webkit-transition:opacity .08s linear,-webkit-transform .16s linear;transition:opacity .08s linear,-webkit-transform .16s linear;transition:transform .16s linear,opacity .08s linear;transition:transform .16s linear,opacity .08s linear,-webkit-transform .16s linear;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.uniq-chat-button .close svg path,.uniq-chat-button .open svg path{fill:#fff}.uniq-chat-button .open svg{width:28px;height:32px}.uniq-chat-button .open{-webkit-transform:rotate(0) scale(1);transform:rotate(0) scale(1);opacity:1}.uniq-chat-button .close{-webkit-transform:rotate(-30deg);transform:rotate(-30deg);opacity:0}.uniq-chat-button.active .open{-webkit-transform:rotate(30deg) scale(0);transform:rotate(30deg) scale(0);opacity:0}.uniq-chat-button.active .close{-webkit-transform:rotate(0);transform:rotate(0);opacity:1}@media only screen and (max-device-width:667px),screen and (max-width:450px) {body.active-chat-window{overflow:hidden!important;position: fixed!important;}.uniq-chat-button.active{background:0 0;top:12px;right:8px;width:51px;height:51px}.uniq-chat-frame{height:100%!important;max-height: none !important;width:100%!important;bottom:0!important;right:0!important;border-radius:0!important}}@media only screen and (orientation:landscape){body.active-chat-window{position: static!important;}}';
        }


        var head = document.head || document.getElementsByTagName('head')[0];
        var style = document.createElement('style');
        style.type = 'text/css';

        if (style.styleSheet) {
            // This is required for IE8 and below.
            style.styleSheet.cssText = css;
        } else {
            style.appendChild(document.createTextNode(css));
        }

        head.appendChild(style);


        //url
        var dir = document.querySelector('script[src$="uniq-chat.js"]').getAttribute('src');
        var name = dir.split('/').pop();
        dir = dir.replace('/'+name,"");

        var params_st = '';
        if (ailabs_user_info) for (var p in ailabs_user_info){
            params_st+='&'+p+'='+ailabs_user_info[p];
        };
        var iframe_src = dir+'/chat.php?client='+chat_client+'&mode='+chat_mode+'&ailabs_user_id='+ailabs_user_id+params_st;
        //endOf url
        var icon_link = icon_link = 'https://halyk.ailabs.kz/aicc/chat-widget2/images/icon1.svg';
        if (chat_client == 'big' || chat_client == 'centras') 'https://halyk.ailabs.kz/aicc/chat-widget2/images/icon1-hlk-01.svg';

        //<svg viewBox="0 0 28 32"><path d="M28,32 C28,32 23.2863266,30.1450667 19.4727818,28.6592 L3.43749107,28.6592 C1.53921989,28.6592 0,27.0272 0,25.0144 L0,3.6448 C0,1.632 1.53921989,0 3.43749107,0 L24.5615088,0 C26.45978,0 27.9989999,1.632 27.9989999,3.6448 L27.9989999,22.0490667 L28,22.0490667 L28,32 Z M23.8614088,20.0181333 C23.5309223,19.6105242 22.9540812,19.5633836 22.5692242,19.9125333 C22.5392199,19.9392 19.5537934,22.5941333 13.9989999,22.5941333 C8.51321617,22.5941333 5.48178311,19.9584 5.4277754,19.9104 C5.04295119,19.5629428 4.46760991,19.6105095 4.13759108,20.0170667 C3.97913051,20.2124916 3.9004494,20.4673395 3.91904357,20.7249415 C3.93763774,20.9825435 4.05196575,21.2215447 4.23660523,21.3888 C4.37862552,21.5168 7.77411059,24.5386667 13.9989999,24.5386667 C20.2248893,24.5386667 23.6203743,21.5168 23.7623946,21.3888 C23.9467342,21.2215726 24.0608642,20.9827905 24.0794539,20.7254507 C24.0980436,20.4681109 24.0195551,20.2135019 23.8614088,20.0181333 Z"></path></svg>
        //<object id="svg1" data="https://halyk.ailabs.kz/aicc/chat-widget2/images/icon1-hlk-01.svg" type="image/svg+xml"></object>
        var iframe_html_body = '<iframe class="uniq-chat-frame"></iframe> <div class="uniq-chat-button">\
    <div class="open"><object width="100%" height="100%" data="'+icon_link+'" type="image/svg+xml"></object></div>\
    <div class="close"><svg width="14" height="14"><path d="M13.978 12.637l-1.341 1.341L6.989 8.33l-5.648 5.648L0 12.637l5.648-5.648L0 1.341 1.341 0l5.648 5.648L12.637 0l1.341 1.341L8.33 6.989l5.648 5.648z" fill-rule="evenodd"></path></svg>\
    </div></div>';


        //with innerHTML
        //document.body.innerHTML += iframe_html_body;

        //with appendChild
        var e = document.createElement('div');
        e.innerHTML = iframe_html_body;
        var counter = 0; //thinking that e.firstChild might go infinitive
        while(e.firstChild && counter < 5) {
            document.body.appendChild(e.firstChild);
            counter+=1;
        }
        //endOf with appendChild


        const button = document.querySelector('.uniq-chat-button');
        button.style.opacity = 1; //meine

        button.addEventListener('click', function (e) {
            AILabsChatIni();
            document.body.classList.toggle('active-chat-window');
            button.classList.toggle('active');
            document.querySelector('.uniq-chat-frame').classList.toggle('active');
        });

        document.querySelector('iframe.uniq-chat-frame').addEventListener('load', function () {
            button.style.opacity = 1;
        });

        //button.click(); //open chat on start
    }




    function AILabsChatIni(){
        if (AILabsChatInitialized == true) return;
        AILabsChatInitialized = true;
        //url
        var dir = document.querySelector('script[src$="uniq-chat.js"]').getAttribute('src');
        var name = dir.split('/').pop();
        dir = dir.replace('/'+name,"");
        //<object id="svg1" data="../images/icon2.svg" type="image/svg+xml"></object>
        var params_st = '';
        if (ailabs_user_info) for (var p in ailabs_user_info){
            params_st+='&'+p+'='+ailabs_user_info[p];
        };
        var iframe_src = dir+'/chat.php?client='+chat_client+'&mode='+chat_mode+'&ailabs_user_id='+ailabs_user_id+params_st;
        //endOf url

        const q = document.querySelector('iframe.uniq-chat-frame');
        q.setAttribute('src', iframe_src);
    }

</script>
<script>
var chat_client = 'centras', chat_mode=2, ailabs_user_id = null, ailabs_user_info  = {'user_intent_category_label':"DEFAULT"}; //3-client side, 2-ailabs server, 1-localhost; ailabs_user_id - users(id)
AILabsChatStart();
</script>