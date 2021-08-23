<template>
    <div class="nav mt-2 d-flex justify-content-center bg-WHITE">
        <div class="nav-container flex-row width100">
            <div class="row width110">
                <div class="blue-bg-all width100">
                    <div class="flex-row width100 jc-center">
                        <div @click="getLevelOne(item.id, item.url)"
                             v-for="item in itemsLevelZero"
                             class="dropbtn d-flex p-3 ml-2"
                            :class="item.id === levelOnePinned ? 'active' : ''"
                        >
                            <img :src="item.icon_url">
                            <span @click="tabs(item.label)">{{item.label}}</span>
                        </div>
                    </div>
                </div>
                <div class="nav-dropdown initial" v-if="isOpened">
                    <div class="nav-dropdown__container mr-4 mt-5">
                        <button type='button'
                                class="close-btn"
                                @click="showDropdown"><i class="fas fa-times"></i></button>
                        <div class="dropdown-content mb-4 flex-row" >
                            <!--Column 1-->
                            <div class="dropdown-content__list">
                                    <div v-for="innerItem in itemsLevelOne"
                                     @click="getLevelTwo(innerItem.id, innerItem.url)"
                                     class="flex-row pl-4 pt-3 pb-3 dropbtn-inner"
                                     :class="innerItem.id === levelTwoPinned  ? 'inner-active' : ''">
                                    <img :src="innerItem.icon_url"
                                         class="items-icons mr-2">
                                    <span class="d-flex">{{innerItem.label}}</span>
                                </div>
                            </div>
                            <!--Column 2-->
                            <div class="dropdown-content__inner pr-4 pl-4 pb-4 w-100 flex-column" >
                                <div class="m-2"
                                     v-if="levelOneOpened"
                                     v-for="innerItem in itemsLevelTwo">
                                    <img :src="innerItem.icon_url"
                                         class="items-icons">
                                    <span class="mr-2"><a :href="'/documentation/'+innerItem.url+'?id='+levelOnePinned">{{innerItem.label}}</a></span>
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

                items: [],
                itemsLevelZero: [],
                itemsLevelOne: [],
                itemsLevelTwo: [],
                itemsLevelThree: [],
                levelOnePinned: null,
                levelTwoPinned: 21,
            }
        },
        props: {
            pinned_id: Number
        },
        methods: {

            /*
            *
            *
            *
            * Method for default display the first column
            * thanks to document.location interface for url handling by label from loop!
            *
            *
            * */

            tabs ( label ) {
                if ( label === 'Бизнес процессы' ) {

                    document.location.assign('http://127.0.0.1:8000/name?parentId=11&childId=13')

                } else if ( label === 'Инструкции КИАС' ){

                    document.location.assign('http://127.0.0.1:8000/name?parentId=37&childId=38')

                } else if ( label === 'Протоколы' ) {

                    document.location.assign('http://127.0.0.1:8000/name?parentId=64&childId=65')
                } else if ( label === 'Внутренние нормативные документы' ) {

                    document.location.assign('http://127.0.0.1:8000/name?parentId=10&childId=21')
                }


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

                let params = (new URL(document.location)).searchParams;
                if(params.get("parentId") != undefined){
                    console.log('qwe 1');
                    vm.getLevelOne(parseInt(params.get("parentId")),'',parseInt(params.get("childId")));
                }
            },

            getLevelOne: function(id, url,childId) {
                this.levelOnePinned = id;
                var vm = this;
                if(url !== null && url !== '') {
                    location.replace('/documentation/'+url);
                    return 0;
                }
                for(var i = 0; i < vm.itemsLevelZero.length; i++) {
                    if(vm.itemsLevelZero[i].id === id && vm.itemsLevelZero[i].opened === false) {
                        this.preloader(true);
                        this.axios.post('/getItemsList', {parentId: id}).then(response => {
                           vm.fetchLevelOne(response.data, id, childId);
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
                vm.pushUrl(id,'one',url);
           },

            fetchLevelOne: function(response, id, childId) {
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
                if(childId != undefined){
                    vm.getLevelTwo(parseInt(childId),'');
                }
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
                vm.pushUrl(id,'ten',url);
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
            pushUrl(id,meth, url){
                let newParams = (new URL(document.location)).searchParams;
                let param = '';
                if(id != 'NaN' && id != NaN && id != undefined) {
                    if (meth == 'one') {
                        param = '?parentId=' + id;
                    } else {
                        param = '?parentId=' + newParams.get("parentId") + '&childId=' + id;
                    }
                    let newUrl = window.location.protocol + '//' + window.location.hostname + '/name' + param; //window.location.href+'?parentId='+id;  window.location.pathname
                    window.history.pushState({}, null, newUrl);
                }
            }
        }
    }
</script>

<style scoped>

    .dropdown-content__list::-webkit-scrollbar {
        display: none;
    }

    .dropdown-content__inner {
        /*max-height: 500px;*/
        overflow-y: auto;
        border-left: 1px solid #818181;
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
        position: absolute;
        right: 15px;
        top: 12px;
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
