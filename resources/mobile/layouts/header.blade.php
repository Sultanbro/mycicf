<<<<<<< HEAD
<menu-mobile
    :fullname="{{json_encode(auth()->user()->full_name)}}"
    :motivation-show="{{json_encode(in_array(auth()->user()->dept_isn, \App\User::getMotivationDepartments()))}}"
    :isn="{{ auth()->user()->ISN }}"></menu-mobile>
=======
<menu-mobile></menu-mobile>
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
>>>>>>> origin/master
<header class="bg-color-blue color-white fs-1_3">
    <div class="container-fluid flex-row jc-sb vertical-middle pt-3 pb-3">
        <div>
            <a href="javascript: void(0)" class="color-white mobile-link-padding" onclick="changeDisplay('m-navbar')">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div>
            <div class="mobile-centras-logo hamburger-mobile">
                <a href="{{route('index')}}" class="hamburger-mobile">
                    <img src="{{asset('images/new-white-logo.png')}}" class="image hamburger-mobile">
                </a>
            </div>
        </div>
        <div>
            <a href="javascript: void(0)" class="color-white mobile-link-padding">
                <i class="fa fa-user"></i>
            </a>
        </div>
    </div>
<<<<<<< HEAD

    <div class="preloader" id="preloader" style="top : 0">
        <div class="item-1"></div>
        <div class="item-2"></div>
        <div class="item-3"></div>
        <div class="item-4"></div>
        <div class="item-5"></div>
    </div>
=======
>>>>>>> origin/master
</header>