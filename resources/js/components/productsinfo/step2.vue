<template>
    <div class="nav mt-2 d-flex justify-content-center bg-WHITE">
        <!--<productsmodal-modal>
        </productsmodal-modal>

        <button ref="modalButton" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>
-->


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
                    </div>
                </div>
                <div class=" nav-dropdown initial  alert alert-p width100   "  v-if="isOpened">
                    <div class="dropdown-content__list d-flex justify-content-between align-items-center w-100" >
                        <!--<img src="/images/surface1.png" class="img-size"/><a href="#exampleModal"></a>-->
<!--                        <div class="img-fx">-->
                            <div v-for="innerItem in itemsLevelOne"
                                 @click="getLevelTwo(innerItem.id, innerItem.url)"
                                 class=""
                                 :class="innerItem.id === levelTwoPinned ? 'inner-active' : ''">
                                <div class="img-flex div-m ">
                                    <img class="img-fx size-img " :src="innerItem.icon_url"/>
                                    <span class=" label-size " >{{innerItem.label}}</span>
                                </div>
<!--                            </div>-->
                        </div>
                    </div>
                </div>
                <!-- <div class="dropdown-content mb-4 flex-row width-100-imp">
                     <div class=" nav-drop initial margin-t-5 alert alert-p  margin-r-2  " v-if="isOpened">
                         <div class="container ">
                             &lt;!&ndash;Column 1&ndash;&gt;
                             <div class="&lt;!&ndash;att-flex-class dropdown-content__list&ndash;&gt;" >
                                 <div v-for="innerItem in itemsLevelOne"
                                      @click="getLevelTwo(innerItem.id, innerItem.url)"
                                      class="flex-row pl-4 pt-3 pb-3 dropbtn-inner justify-content-between"
                                      :class="innerItem.id === levelTwoPinned ? 'inner-active' : ''">
                                     <div class="d-flex align-items-center">

                                         <span class="d-flex">{{innerItem.label}}</span>
                                     </div>
                                     <div @click="getModalImage()" >
                                         <div class="flex-attention">
                                             <img id="myImg" src="/images/Attention.png" class="attention-size " alt="Snow" >
                                         </div>


                                         &lt;!&ndash; The Modal &ndash;&gt;
                                         <div id="myModal" class="modal">
                                             <span class="close">&times;</span>
                                             <img class="modal-content" id="img01">
                                             <div id="caption"></div>
                                         </div>
                                        &lt;!&ndash; <img src="/image/Attention.png">
                                         <span>{{item.label}}</span>&ndash;&gt;
                                     </div>
                                     &lt;!&ndash;<div  class="flex-attention">
                                         <a href="#exampleModal">
                                             <img class="attention-size " src="/images/Attention.png"
                                                >
                                         </a>
                                     </div>&ndash;&gt;
                                     &lt;!&ndash;<div class="flex-attention">
                                         <nav class="cl-effect-15  ">
                                             <img class="attention-size " src="/images/Attention.png"/><a href="#exampleModal"></a>

                                         </nav>
                                     </div>&ndash;&gt;

                                 </div>




                             </div>
                         </div>
                     </div>
                     <div class=" nav-drop initial margin-t-5 alert alert-p width-80" v-if="isOpened" id="exampleModal">
                         <div class="container ">
                             <button type='button'
                                     class="close-btn"
                                     @click="showDropdown"><i class="fas fa-times"></i></button>
                             &lt;!&ndash;Column 2&ndash;&gt;
                                 <div class=" pr-4 pl-4 pb-4  flex-column" >
                                     <div class="input-group mb-3">
                                         <div class="input-group-prepend">
                                             <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                                             <div class="dropdown-menu">
                                                 <a class="dropdown-item" href="#">Action</a>
                                                 <a class="dropdown-item" href="#">Another action</a>
                                                 <a class="dropdown-item" href="#">Something else here</a>
                                                 <div role="separator" class="dropdown-divider"></div>
                                                 <a class="dropdown-item" href="#">Separated link</a>
                                             </div>
                                         </div>
                                         <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                         <div class="input-group-append">

                                             <span class="input-group-text" id="basic-addon2">
                                                 <img class="attention-size " src="/images/search.png"/>
                                             </span>
                                         </div>
                                     </div>

                                     <div class="m-2"
                                          v-if="levelOneOpened"
                                          v-for="innerItem in itemsLevelTwo">
                                         <img :src="innerItem.icon_url"
                                              class="items-icons">
                                         <span class="mr-2"><a :href="'/productsinfo/'+innerItem.url+'?id='+levelOnePinned">{{innerItem.label}}</a></span>
                                     </div>

                                 </div>
                         </div>
                     </div>
                 </div>-->
                <div class="dropdown-content mb-4 flex-row width-100-imp">
                    <div class=" nav-drop initial margin-t-5 alert alert-p  margin-r-2  " v-if="isOpened">
                        <div class="container  " >
                            <!--Column 1-->
                            <div class="<!--att-flex-class dropdown-content__list--> " >
                                <div class="m-2"
                                     v-if="levelOneOpened"
                                     v-for="innerItem in itemsLevelTwo">
                                    <img :src="innerItem.icon_url"
                                         class="items-icons ">
                                    <span class="mr-2 flex-cent"><a :href="'/productsinfo/'+innerItem.url+'?id='+levelOnePinned">{{innerItem.label}}</a></span>
                                    <!-- Button trigger modal -->
                                  <div data-toggle="modal" data-target="#exampleModal">
                                        <div class="flex-attention">
                                            <img id="myImg" src="/images/Attention.png" class="attention-size" ref="modalButton" >
                                        </div>
                                  </div>
                                        <!-- The Modal -->
<!--                                        <div id="myModal" class="modal modal-flex ">-->
<!--                                            <div class=" bottom-border-modal bg-div modal-d " id="img01">-->
<!--                                                <div class="  ">-->
<!--                                                    <div class="pl-5 pt-4 pb-4 pr-5">-->
<!--                                                        <div class="nav-dropdown initial  alert alert-p ">-->
<!--                                                            <div class=" color-icon vertical-m  close ">-->
<!--                                                                <i class="  color-icon   fas fa-chevron-circle-left icon-size"></i>-->
<!--                                                                <span class="pl-1 color-icon  icon-size">НАЗАД</span>-->
<!--                                                            </div>-->
<!--                                                            <div>-->
<!--                                                                <div class="mt-4">-->
<!--                                                                    <div class="table-responsive-sm">-->
<!--                                                                        <table class="table table-bordered table-striped">-->
<!--                                                                            <tbody>-->
<!--                                                                            <td>{{innerItem.Label}}</td>-->
<!--                                                                            <tr>Документы {{innerItem.description}}</tr>-->
<!--                                                                            <tr>Франшиза {{innerItem.documents}}</tr>-->
<!--                                                                            </tbody>-->
<!--                                                                        </table>-->
<!--                                                                    </div>-->
<!--                                                                </div>-->
<!--                                                            </div>-->

<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->

<!--                                            &lt;!&ndash;<div id="caption">-->
<!--                                                <div>-->
<!--                                                    <img  src="/images/back-arrow-circular-simbol@2x.png" class="attention-size  "  >-->
<!--                                                    <span class="close">&times;</span>-->
<!--                                                </div>-->


<!--                                            </div>&ndash;&gt;-->
<!--                                        </div>-->









                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="width-100-imp">
                        <div class=" nav-drop initial margin-t-5 alert alert-p width-100-imp" v-if="isOpened">
                            <div class="  ">
                                <div class="container ">
                                    <button type='button'
                                            class="close-btn"
                                            @click="showDropdown"><i class="fas fa-times"></i></button>
                                    <!--Column 2-->
                                    <div class=" pr-4 pl-4 pb-4  flex-column" >
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">По всем продуктам</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                    <div role="separator" class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" aria-describedby="basic-addon2">
                                            <div class="input-group-append">

                                            <span class="input-group-text" id="basic-addon2">
                                                <img class="attention-size " src="/images/search.png"/>
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
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dial" role="document">
                <div class="modal-content modal-external">



                    <div class="modal-contact">
                        <div type="button" class="backword" data-dismiss="modal">
                            <i class="fas back fa-chevron-circle-left"></i>
                            <span class="pl-1 back">НАЗАД</span>
                        </div>
<!--                        <button type="button" class="backword" data-dismiss="modal" aria-label="Close" aria-hidden="true">-->
<!--                            <i class="fas back fa-chevron-circle-left"></i>-->
<!--                            <span class="pl-1 back">НАЗАД</span>-->
<!--                        </button>-->
                        <div class="text-left product-name text-d">
                            ДГПО АВТО
                        </div>
                        <div class="product-text border border-dark1 ">
                            Добровольное страхование гражданско-правовой ответственности владельцев транспортных средтств для спец техники и для автомобильного транспорта подлежащего
                        </div>
                        <div class="documents text-d">
                            Документы
                        </div>
                        <div class="statement ">
                            1) заявление на страхование
                            <br>
                            2) копии документов
                        </div>
                        <div class="documents text-d">Франшиза</div>
                        <div class="dock div-border-bttm ">Применяется</div>
                    </div>
                </div>
            </div>
        </div>
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
            }
        },
        props: {
            pinned_id: Number,
        },
        methods: {
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

        },
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
    .modal-dial{
        max-width: 85%;
        margin: 1.75rem auto;
    }
    .back{
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


</style>
