<template>
    <div class="nav mt-2 d-flex justify-content-center bg-white" id="elem_two">
        <div class="nav-container flex-row width100">
            <div class="row width110">
                <div class="blue-bg-all width100">
                    <div class="flex-row width100 jc-center">
                        <div @click="getLevelOne(item.id, item.url)"
                             v-for="item in itemsLevelZero"
                             class="dropbtn d-flex p-3 ml-2"
                             :class="item.id === levelOnePinned ? 'active' : ''">
                            <img :src="item.icon_url">
                            <span>{{item.label}}</span>
                        </div>
                    </div>
                </div>
                <div class="nav-dropdown initial" v-if="isOpened">
                    <div class="nav-dropdown__container mr-4 mt-5">
<!--                        <button type='button'-->
<!--                                class="close-btn"-->
<!--                                @click="showDropdown"><i class="fas fa-times"></i></button>-->
                        <div class="dropdown-content mb-4 flex-row" >

                            <!--Column 1-->
                            <div class="dropdown-content__list">
                                <div v-for="innerItem in itemsLevelOne"
                                     @click="getLevelTwo(innerItem.id, innerItem.url)"
                                     class="flex-row pl-4 pt-3 pb-3 dropbtn-inner"
                                     :class="innerItem.id === levelTwoPinned ? 'inner-active' : ''">
                                    <img :src="innerItem.icon_url"
                                         class="items-icons mr-2">
                                    <span class="d-flex">{{innerItem.label}}</span>
                                </div>
                            </div>

                            <!--Column 2-->
                            <div class="dropdown-content__inner pr-4 pl-4 pb-4 w-100 flex-row" id="searchElem">
                                <div class="w-100">
                                    <search v-if="changed"
                                            :positionSearch="positionSearch"
                                            :url="url"
                                    ></search>
                                    <div class="d-flex justify-content-center">
                                        <h2>{{title}}</h2>
                                    </div>
                                    <div class="d-flex justify-content-center" ref="content">
                                        <div v-html="encodedtext" v-if="first"></div>
                                        <div v-html="newText" v-else></div>
                                    </div>
                                </div>
                                <div v-if="levelOneOpened" class="border border-primary p-2 d-flex dropdown-content__inner-list w-100 bg-white justify-content-between flex-column">
                                    <div class="ml-auto">
                                        <button type="button"
                                                class="close-btn"
                                                @click="closeLevelTwo">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="m-2 d-flex min-height-15"
                                         v-for="innerItem in itemsLevelTwo">
                                        <img :src="innerItem.icon_url"
                                             class="items-icons">
                                        <span class="">
                                            <a :href="'/documentation/'+innerItem.url+'?id='+levelOnePinned">{{innerItem.label}}</a>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "name",

        mounted: function() {
            this.getItems(0);
        },

        data() {
            return {
                isOpened: false,
                isActive: false,
                levelOneOpened: false,
                first : true,
                items: [],
                itemsLevelZero: [],
                itemsLevelOne: [],
                itemsLevelTwo: [],
                itemsLevelThree: [],
                levelOnePinned: null,
                levelTwoPinned: null,
                changed: true,
                newText: '',
                index : 0,
                positionSearch: 'relative'
            }
        },
        props: {
            pinned_id: Number,
            title: String,
            encodedtext: String,
            url : {
                type : String,
                default : null,
            }
        },
        methods: {
            searchText(word){
                this.first=false;
                this.newText = this.encodedtext.split(word).join(`<span class="highlight">${word}</span>`);
                this.index = 0;
                setTimeout(() => {
                    var elements = document.getElementsByClassName('highlight');
                    elements[0].className = 'highlight selected-highlight';
                }, 100);
            },
            prev(){
                var elements = document.getElementsByClassName('highlight');
                elements[this.index].className = 'highlight';
                if(this.index === 0){
                    this.index = elements.length - 1;
                }else if(elements.length !== 1){
                    this.index--;
                }
                elements[this.index].className = 'highlight selected-highlight';
                window.scroll({
                    top: elements[this.index].offsetTop + 100,
                    behavior: 'smooth'
                });
            },
            next(){
                var elements = document.getElementsByClassName('highlight');
                elements[this.index].className = 'highlight';
                if(this.index === elements.length - 1){
                    this.index = 0;
                }else if(elements.length !== 1){
                    this.index++;
                }
                elements[this.index].className = 'highlight selected-highlight';
                window.scroll({
                    top: elements[this.index].offsetTop + 100,
                    behavior: 'smooth'
                });
            },
            showDropdown: function() {
                this.isOpened = false;
                this.levelOneOpened = false;
                this.levelOnePinned = null;
                this.levelTwoPinned = null;
            },

            getItems: function(id) {
                this.preloader(true);
                this.axios.post('/getItemsList', {parentId: id}).then(response => {
                    this.fetchGetItems(response.data);
                });
            },

            fetchGetItems: function(response, id) {
                var vm = this;
                response.forEach(data => {
                    vm.itemsLevelZero.push(data);
                })
                this.preloader(false);
                if(this.pinned_id !== 0) {
                    this.getLevelOne(this.pinned_id, null);
                }
            },

            getLevelOne: function(id, url) {
                this.levelOnePinned = id;
                if(id !== this.pinned_id){
                    this.encodedtext = '';
                    this.title = '';
                    this.changed = false;
                }
                var vm = this;

                if(url !== null && url !== '') {
                    location.replace('/documentation/'+url);
                    return 0;
                }

                for(var i = 0; i < vm.itemsLevelZero.length; i++) {
                    if(vm.itemsLevelZero[i].id === id && vm.itemsLevelZero[i].opened === false) {

                        this.preloader(true);

                        this.axios.post('/getItemsList', {parentId: id}).then(response => {
                            vm.fetchLevelOne(response.data, id);
                        });

                        vm.itemsLevelZero[i].opened = true;

                        break;
                    }
                    else if(vm.itemsLevelZero[i].id === id && vm.itemsLevelZero[i].opened === true) {

                        if(vm.itemsLevelOne.length !== 0) {

                            for(var i = 0; i < vm.itemsLevelOne.length; i++) {
                                vm.itemsLevelOne.slice(i);
                            }

                            for(var i = 0; i < vm.itemsLevelZero.length; i++) {
                                if(vm.itemsLevelZero[i].id === id) {
                                    vm.itemsLevelOne = vm.itemsLevelZero[i].childs;
                                }
                            }

                            this.isOpened = true;
                            this.levelOneOpened = false;
                            break;
                        }
                        else {
                            for(var i = 0; i < vm.itemsLevelZero.length; i++) {
                                if(vm.itemsLevelZero[i] === id) {
                                    vm.itemsLevelOne = vm.itemsLevelZero[i].childs;
                                }
                            }
                            this.isOpened = true;
                            this.levelOneOpened = false;
                            break;
                        }
                    }
                }
            },
            closeLevelTwo() {
                this.levelOneOpened = false;
            },
            fetchLevelOne: function(response, id) {
                var vm = this;

                if(response.length === 0) return 0;

                for(var i = 0; i < vm.itemsLevelZero.length; i++) {
                    if(vm.itemsLevelZero[i].id === id) {
                        vm.itemsLevelZero[i].childs = response;
                    }
                }

                if(vm.itemsLevelOne.length !== 0) {
                    for(var i = 0; i < vm.itemsLevelOne.length; i++) {
                        vm.itemsLevelOne.slice(i);
                    }

                    vm.itemsLevelOne = response;
                }
                else {
                    vm.itemsLevelOne = response;
                }
                this.levelOneOpened = false;
                this.isOpened = true;

                this.preloader(false);

            },

            getLevelTwo: function(id, url) {
                this.levelTwoPinned = id;
                var vm = this;
                if(url !== null && url !== '') {
                    location.replace(`/documentation/` + url + `?id=${this.levelOnePinned}`);
                    return 0;
                }
                for(var i = 0; i < vm.itemsLevelOne.length; i++) {
                    if(vm.itemsLevelOne[i].id === id && vm.itemsLevelOne[i].opened === false) {
                        this.preloader(true);
                        this.axios.post('/getItemsList', {parentId: id}).then(response => {
                            vm.fetchLevelTwo(response.data, id);
                        });
                        vm.itemsLevelOne[i].opened = true;
                        break;
                    }
                    else if(vm.itemsLevelOne[i].id === id && vm.itemsLevelOne[i].opened === true) {
                        if(vm.itemsLevelTwo.length !== 0) {
                            for(var i = 0; i < vm.itemsLevelTwo.length; i++) {
                                vm.itemsLevelTwo.slice(i);
                            }
                            for(var i = 0; i < vm.itemsLevelOne.length; i++) {
                                if(vm.itemsLevelOne[i].id === id) {
                                    vm.itemsLevelTwo = vm.itemsLevelOne[i].childs;
                                }
                            }
                            this.levelOneOpened = true;
                            break;
                        }
                        else {
                            for(var i = 0; i < vm.itemsLevelZero.length; i++) {
                                for(var j = 0; j < vm.itemsLevelZero[i].childs.length; j++) {
                                    if(vm.itemsLevelZero[i].childs[j].id === id) {
                                        vm.itemsLevelTwo = vm.itemsLevelZero[i].childs[j].childs;
                                    }
                                }
                            }
                            this.levelOneOpened = true;
                            break;
                        }

                    }
                }
            },
            fetchLevelTwo: function(response, id) {
                var vm = this;
                if(response.length === 0) {
                    this.preloader(false);
                    return 0;
                }
                for(var i = 0; i < vm.itemsLevelZero.length; i++) {
                    for(var j = 0; j < vm.itemsLevelZero[i].childs.length; j++) {
                        if(vm.itemsLevelZero[i].childs[j].id === id) {
                            vm.itemsLevelZero[i].childs[j].childs = response;
                        }
                    }
                }

                if(vm.itemsLevelTwo.length !== 0) {
                    for(var i = 0; i < vm.itemsLevelTwo.length; i++) {
                        vm.itemsLevelTwo.slice(i);
                    }
                    vm.itemsLevelTwo = response;
                }
                else {
                    vm.itemsLevelTwo = response;
                }

                this.preloader(false);

                this.levelOneOpened = true;
            },

            preloader(show){
                if(show)
                {
                    document.getElementById('preloader').style.display = 'flex';
                }
                else
                {
                    document.getElementById('preloader').style.display = 'none';
                }
            },
            handleScroll(){
                var elementOffset = document.getElementById('searchElem').offsetTop + document.getElementById('elem_two').offsetTop + 100;
                var windowTopOffset = document.body.scrollTop;
                if(windowTopOffset > elementOffset){
                    this.positionSearch = 'fixed';
                }else{
                    this.positionSearch = 'relative';
                }
            }

        },
        beforeMount () {
            window.addEventListener("scroll", this.handleScroll);
        },

        beforeDestroy () {
            window.removeEventListener("scroll", this.handleScroll);
        }
    }
</script>

<style scoped>

    .dropdown-content__list::-webkit-scrollbar {
        display: none;
    }

    .dropdown-content__inner-list {
        position: absolute;
        top: 0;
        left: 0;
        box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.2);
        z-index: 30;
    }

    .dropdown-content__inner {
        /*max-height: 500px;*/
        overflow-y: auto;
        border-left: 1px solid #818181;
        position: relative;
    }

    .dropdown-content__inner::-webkit-scrollbar {
        width: 3px;
    }

    .dropdown-content__inner::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    .dropdown-content__inner::-webkit-scrollbar-thumb {
        background: cornflowerblue;
        border-radius: 10px;
    }

    .dropdown-content__inner::-webkit-scrollbar-thumb:hover {
        background: #4974CC;
    }

    .nav {
        position: relative;
        background-color: #508ff4;
        z-index: 500;
    }

    .dropdown-content__list {
        width: 300px;
    }

    .dropbtn {
        color: #FFF;
        cursor: pointer;
        border: none;
        outline: none;
        transition: 0.4s ease;
        border-bottom: 2px solid transparent;
    }

    .dropbtn:hover {
        border-bottom: 2px solid #FFF;
    }

    .dropbtn-inner {
        font-size: 1.2em;
        cursor: pointer;
        border: none;
        outline: none;
        transition: 0.4s ease;
        border-left: 3px solid transparent;
    }

    .dropbtn-inner:hover {
        border-left: 3px solid #508ff4;
    }

    .dropbtn-inner:hover span {
        color: #508ff4;
    }

    .nav-dropdown {
        position: absolute;
        left: 0;
        width: 100%;
        top: 50px;
        box-shadow: 0px 8px 16px -3px rgba(0,0,0,0.2);
        /*box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);*/
        z-index: 200;
    }

    .close-btn {
        border: none;
        outline: none;
        background: none;
    }

    .fa-times {
        transition: 0.4s ease;
    }

    .close-btn i {
        font-size: 1.5em;
    }

    .close-btn:hover i {
        color: red;
    }

    .items-icons {
        height: 25px;
    }

    .active {
        /*background-color: #4974cc;*/
        /*border-top: 2px solid #FFF;*/
        border-bottom: 2px solid #FFF;
    }

    .inner-active {
        /*color: #007bff;*/
        /*border-left: 3px solid #007bff;*/

        color: #508ff4;
        border-left: 3px solid #508ff4;

    }


</style>
