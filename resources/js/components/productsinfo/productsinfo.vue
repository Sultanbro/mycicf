<template>
    <div class="nav mt-2 d-flex justify-content-center bg-WHITE">
        <div class="nav-container flex-row width100">
            <div class="row width110">
                <div class="blue-bg-all width100 alert">
                    <div class="flex-row width100 jc-center">
                        <div @click="getLevelOne(item.id, item.url)"
                             v-for="item in itemsLevelZero"
                             class="dropbtn d-flex p-3 ml-2"
                             :class="item.id === levelOnePinned ? 'active' : ''">
                            <img :src="item.icon_url">
                            <span>{{item.label}}</span>
                        </div>


                        <div class="input-gr">
                            <div class="form-outline">
                                <input type="search" id="form1" class="form-control doc-form" v-model="searchId">
                                <i class="fas fa-search icon-search" v-on:click="searchNameDoc(searchId);  "></i>
                            </div>


                        </div>

<!--                        <div class="input-form">-->
<!--                            <input type="search" id="form1">-->
<!--                            <i class="fas fa-search icon"></i>-->
<!--                        </div>-->

                    </div>
                </div>
                <div class=" nav-dropdown initial  alert alert-p width100   "  v-if="isOpened">
                    <div class="dropdown-content__list d-flex justify-content-between align-items-center w-100" >
                            <div v-for="innerItem in itemsLevelOne"
                                 @click="getLevelTwo(innerItem.id, innerItem.url)"
                                 class=""
                                 :class="innerItem.id === levelTwoPinned ? 'inner-active' : ''">
                                <div class="img-flex div-m ">
                                    <img class="img-fx size-img " :src="innerItem.icon_url"/>
                                    <span class=" label-size " >{{innerItem.label}}</span>
                                </div>

                        </div>
                    </div>
                </div>

<!--                <button @click="stepChangeM">dfgkh</button>-->
                <div class="dropdown-content mb-4 flex-row width-100-imp">
                    <div class=" nav-drop initial margin-t-5 alert alert-p  margin-r-2  " v-if="isOpened">
                        <div class="container  " >
                            <!--Column 1-->
                            <div class="<!--att-flex-class dropdown-content__list--> " >
                                <div class="d-flex justify-content-between pointer m-2"
                                     v-if="levelOneOpened"
                                     v-for="(innerItem, key) in itemsLevelTwo">
                                    <span class="mr-2 flex-cent">
                                        <a v-on:click="showDocuments(innerItem.id);  ">{{innerItem.label}}</a>
                                    </span>
                                    <!-- Button trigger modal -->
                                  <div v-on:click="showKeyProduct(innerItem)"   data-toggle="modal" data-target="#exampleModal">
                                        <div class="flex-attention">
                                            <img id="myImg" src="/images/Attention.png" class="attention-size" ref="modalButton" >
                                        </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="width-100-imp" v-if="paper==2">
                        <div class="d-flex nav-drop initial margin-t-5 alert alert-p width-100-imp col-md-12 flex-wrap" v-for="(res, ind) in record">
                                    <div class="docs-img-bg-container" v-for="(value,key) in res">
                                        <div class="docs-img-bg" v-on:click="showKey(value.profile)" data-toggle="modal" data-target="#exampleMod">
                                            <span> {{value.docfile}} </span>
                                        </div>
                                    </div>
                        </div>
                    </div>

                    <div class="width-100-imp" v-if="newText==2">
                        <div class="d-flex nav-drop initial margin-t-5 alert alert-p width-100-imp col-md-12 flex-wrap" v-for="(res, ind) in resultText">
                            <div class="docs-img-bg-container" v-for="(value,key) in res">
                                <div class="docs-img-bg" v-on:click="showKey(value.profile)" data-toggle="modal" data-target="#exampleMod">
                                    <span> {{value.docfile}} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dial" role="document">
                <div class="modal-content modal-external">

                    <div class="modal-contact">
                        <div type="button" class="backword" data-dismiss="modal">
                            <i class="fas back1 fa-chevron-circle-left"></i>
                            <span class="pl-1 back1 ">НАЗАД</span>
                        </div>
                        <div class="text-left product-name text-d">
                            {{keyProduct.label}}
                        </div>
                        <div class="product-text border border-dark1 ">
                            {{keyProduct.description}}
                        </div>
                        <div class="documents text-d">
                            Документы
                        </div>
                        <div class="statement">
                            {{keyProduct.documents}}
                        </div>
                        <div class="documents text-d">Франшиза</div>
                        <div class="dock div-border-bttm ">{{keyProduct.franzhiza}}</div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleMod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLab" aria-hidden="true">
            <div class="modal-dialog modal-dial" role="document">
                <div class="modal-content modal-external">

                    <div class="modal-contact">
                        <div type="button" class="backword" data-dismiss="modal">
                            <i class="fas back1 fa-chevron-circle-left"></i>
                            <span class="pl-1 back1 ">НАЗАД</span>
                        </div>

                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="" v-model="query">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>

                        <div class="text-full" v-html="highlight()"></div>
                        <a href="/{{}}" target="_blank" download> Скачать </a>
<!--                        <button type="button" class="btn btn-outline-dark download">Скачать</button>-->

                    </div>
                </div>
            </div>
        </div>

        <FlashMessage></FlashMessage>
    </div>
</template>

<script>
    export default {
        name: "products-info",

        mounted: function() {
            this.getItems(0);
        },

        data() {
            return {
                search: false,
                isOpened: false,
                isActive: false,
                levelOneOpened: false,
                items: [],
                item: [],
                result: [],
                itemsLevelZero: [],
                itemsLevelOne: [],
                itemsLevelTwo: [],
                itemsLevelThree: [],
                levelOnePinned: null,
                levelTwoPinned: null,
                stepChange: 1,
                productInfoId: Object,
                paper: 0,
                countDocs: 0,
                record: Object,
                text: Object,
                showFull: Object,
                keyText: '',
                query: '',
                searchText: '',
                nameDoc: '',
                resultText: '',
                searchId: '',
                newText: 0,
                keyProduct: ''
            }
        },
        props: {
            pinned_id: Number,
        },
        methods: {
            lookFile: function(){
                this.newText = 0;
            },
            showKey: function(id){
                this.keyText = id;
            },
            showKeyProduct: function(id){
                this.keyProduct = id;
                // for(var i = 0; i < this.itemsLevelTwo.length; i++) {
                //     if(this.keyText == this.itemsLevelTwo[])
                // }
                //
                // }

            },
            highlight() {
                if(!this.query) {
                    return this.keyText;
                }
                return this.keyText.replace(new RegExp(this.query, "gi"), match => {
                    return '<span class="highlightText" style="background: yellow;">' + match + '</span>';
                });
            },
            // searchNameDoc: function(searchNameDocs){
            //     this.axios.post('/productsinfo/searchName', {searchId: this.searchId}).then(response => {
            //
            //         }
            //     )
            // },
            searchNameDoc: function(searchNameDocs) {
                this.axios.post('/productsinfo/searchName', {searchId: this.searchId}).then(response => {
                    if (response.data.success) {
                        this.resultText= response.data;
                        this.paper = 0;
                        this.newText = 2;
                    } else {
                        this.flashMessage.error({
                            title: "Ошибка",
                            message: "Файла с таким именем не существует",
                            time: 5000
                        });
                    }
                }).catch(error => {})
            },

             showDocuments: function(productInfoId){
                 this.axios.post('/productsinfo/showNameDocuments', {productInfoId: productInfoId}).then(response => {
                      this.record = response.data;
                      this.paper = 2;
                      this.lookFile();
                         }
                     )
                 },
            showDropdown: function() {
                this.isOpened = false;
                this.levelOneOpened = false;
                this.levelOnePinned = null;
                this.levelTwoPinned = null;
            },
            getItems: function(id) {
                this.preloader(true);
                this.axios.post('/getItemList', {parentId: id}).then(response => {
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
            getItemsF(){
                this.axios.post('/getItemsFirst', {parentId: id}).then(response => {
                    vm.getlevelT(response.data, id);
                });
            },

            getLevelOne: function(id, url) {
                this.levelOnePinned = id;
                var vm = this;

                if(url !== null && url !== '') {
                    location.replace('/productsinfo/'+url);
                    return 0;
                }

                for(var i = 0; i < vm.itemsLevelZero.length; i++) {
                    if(vm.itemsLevelZero[i].id === id && vm.itemsLevelZero[i].opened === false) {

                        this.preloader(true);

                        this.axios.post('/getItemList', {parentId: id}).then(response => {
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
                    location.replace(`/productsinfo/` + url + `?id=${this.levelOnePinned}`);
                    return 0;
                }
                for(var i = 0; i < vm.itemsLevelOne.length; i++) {
                    if(vm.itemsLevelOne[i].id === id && vm.itemsLevelOne[i].opened === false) {
                        this.preloader(true);
                        this.axios.post('/getItemList', {parentId: id}).then(response => {
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
            getLevelThree: function(id, url) {
                this.levelThreePinned = id;
                var vm = this;
                if(url !== null && url !== '') {
                    location.replace(`/productsinfo/` + url + `?id=${this.levelOnePinned}`);
                    return 0;
                }
                for(var i = 0; i < vm.itemsLevelOne.length; i++) {
                    if(vm.itemsLevelOne[i].id === id && vm.itemsLevelOne[i].opened === false) {
                        this.preloader(true);
                        this.axios.post('/getItemsFirst', {parentId: id}).then(response => {
                            vm.fetchLevelThree(response.data, id);
                        });
                        vm.itemsLevelOne[i].opened = true;
                        break;
                    }
                    else if(vm.itemsLevelOne[i].id === id && vm.itemsLevelOne[i].opened === true) {
                        if(vm.itemsLevelThree.length !== 0) {
                            for(var i = 0; i < vm.itemsLevelThree.length; i++) {
                                vm.itemsLevelThree.slice(i);
                            }
                            for(var i = 0; i < vm.itemsLevelOne.length; i++) {
                                if(vm.itemsLevelOne[i].id === id) {
                                    vm.itemsLevelThree = vm.itemsLevelOne[i].childs;
                                }
                            }
                            this.levelOneOpened = true;
                            break;
                        }
                        else {
                            for(var i = 0; i < vm.itemsLevelZero.length; i++) {
                                for(var j = 0; j < vm.itemsLevelZero[i].childs.length; j++) {
                                    if(vm.itemsLevelZero[i].childs[j].id === id) {
                                        vm.itemsLevelThree = vm.itemsLevelZero[i].childs[j].childs;
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
            fetchLevelThree: function(response, id) {
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

                if(vm.itemsLevelThree.length !== 0) {
                    for(var i = 0; i < vm.itemsLevelThree.length; i++) {
                        vm.itemsLevelThree.slice(i);
                    }
                    vm.itemsLevelThree = response;
                }
                else {
                    vm.itemsLevelThree = response;
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
            getModalImage:function() {
                var modal = document.getElementById("myModal");
                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("myImg");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function () {
                    modal.style.display = "block";
                    modalImg.src = this.src;
                    captionText.innerHTML = this.alt;
                }
                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];
                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {
                    modal.style.display = "none";
                }
            },
            stepChangeM: function(){
              this.stepChange=2;
            },


        },
    }
</script>

<style scoped lang="scss">
    .pdf{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
    .input-gr{
        position: relative;
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
        margin-left: 15%;
    }
    .dropdown-content__list::-webkit-scrollbar {
        display: none;
    }
    .docs{
        padding: 30px;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }
    .docs-img-bg-container{
        width: 30%;
    }
    .docs-img-bg{
        background-image: url('/images/docc.png');
        background-size: cover;
        background-repeat: no-repeat no-repeat;
        width: 15rem;
        height: 15rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .docs-img-bg span{
        margin: 0 2.5rem;
    }
    .docs-img{
        background-image: url('/images/docc.png');
        background-size: cover;
        background-repeat: no-repeat no-repeat;
        width: 70%;
        height: 70%;
        padding: 100px;
        text-align: center;
    }
    .download{
        margin-left: auto;
        margin-top: 5px;
        margin-right: 20px;
    }

    .dropdown-content__inner {
        /*max-height: 500px;*/
        overflow-y: auto;
        border-left: 1px solid #818181;
    }
    .wrapdoc{
        display: flex;
        flex-direction: row;
        justify-content: center;
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
    .icon{
        margin-right: -26px;
        position: relative;
        z-index: 1;
    }
    .icon-search{
        margin-right: 5%;
        margin-top: -11% !important;
        display: flex;
        justify-content: flex-end;

    }
    .modal-dial{
        max-width: 85%;
        margin: 1.75rem auto;
    }
    .pdf_icon{
        width: 40px;
        height: 40px;
    }
    .back1{
        color: #82b0d1;
    }
    .modal-cont{
        position: relative;
        display: flex;
        flex-direction: column;
        width: 100%;
        pointer-events: auto;
        background-color: #fff;
        background-clip: padding-box;
    }
    .modal-contact{
        padding-top: 20px;
        padding-right: 20px;
        padding-left: 20px;
        padding-bottom: 20px;
        margin-bottom: 60px;
        margin-left: 20px;
        margin-right: 20px;
    }
    .modal-external{
        border-radius: 35px;
    }
    .nav {
        position: relative;
        background-color: #508ff4;
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
    .input-form {
        margin-left: 15%;
    }
    .doc-form{
        background-color: #7c9bd6;
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
    .nav-drop{
        position: absolute;
        left: 0;
        width: 35%;
        top: 50px;
        box-shadow: 0px 0px 14px 4px rgba(0,0,0,0.2);
        /*box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);*/
        z-index: 200;
        margin-top: -2px;
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
    .product-name{
        color: #4348e5;
        padding: 10px;
        background-color: #edf2f2;
    }
    .product-text{
        padding: 10px;

    }
    .documents{
        padding: 10px;
        background-color: #dcd8fb;
    }
    .statement{
        border-left: 1px solid;
        border-right: 1px solid;
        padding: 10px;
        border-color: #bac9d8;
    }
    .dock{
        padding: 10px;
        border-left: 1px solid;
        border-right: 1px solid;
        border-bottom: 1px;
        border-color: #bac9d8;
    }
    .backword{
        margin-bottom: 20px;
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
    .border-dark1 {
        border-color: #bac9d8;
    }
    .text-d{
        font-weight: bolder;
        font-family: Arial;
    }
    .div-border-bttm{
        border-bottom: 1px solid;
        border-color: #bac9d8;
    }
    .paper-col{
        width: 70%;
        height: 60%;
    }
    .item{
        width: 250px;
        padding: 0 15px;
        text-align: center;
    }
    .text-full{
        margin-top: 15px;
        text-align: justify;
    }

    @media (max-width: 1412px) {
       .docs-img-bg-container{
           width: 50%;
       }
    }
</style>
