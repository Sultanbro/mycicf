<template>
    <div class="nav mt-2 d-flex justify-content-center">
        <div class="nav-container flex-row">
            <a href="#" @click='getLevelOne(item.id)'
                        v-for="item in itemsLevelZero"
                        class="dropbtn d-flex p-2 ml-2">{{item.label}}</a>

            <div class="nav-dropdown" v-if="isOpened">
                <div class="nav-dropdown__container mr-4 mt-5">
                    <button type='button'
                            class="close-btn"
                            @click="showDropdown"><i class="fas fa-times"></i></button>
                    <div class="dropdown-content mb-4 flex-row" >
                        <!--Column 1-->
                        <div class="dropdown-content__list">
                            <div v-for="innerItem in itemsLevelOne"
                                 @click="getLevelTwo(innerItem.id)"
                                 class="flex-row pl-4 pt-3 pb-3 dropbtn-inner">
                                <img :src="innerItem.icon_url" class="items-icons mr-2">
                                <img :src="imageUrl" @error="fakeImage = true">
                                <a href="#" class=" d-flex">{{innerItem.label}}</a>
                            </div>

<!--                            <a class="dropbtn-inner p-3 d-flex"-->
<!--                               @click="getLevelTwo(innerItem.id)"-->
<!--                               v-for="innerItem in itemsLevelOne">{{innerItem.label}}</a>-->
                        </div>
                        <!--Column 2-->
                        <div class="dropdown-content__inner pr-4 pl-4 pb-4 w-100" >
                            <div class="flex-row border border-danger" v-if="levelOneOpened">
                                <a class="p-4 mr-2"
                                   v-for="innerItem in itemsLevelTwo">{{innerItem.label}}</a>
                            </div>
                            <div class="flex-row" v-if="levelOneOpened">
                                <div class="flex-column w-25 mr-4 border border-danger">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum et maiores natus nihil odio quis sed tempore. Fugiat, officiis, quia?
                                </div>
                                <div class="flex-column w-25 border border-danger mr-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores cumque deleniti, distinctio dolorum ducimus eos itaque odit officiis provident sunt?</div>
                                <div class="flex-column w-25 border border-danger mr-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores cumque deleniti, distinctio dolorum ducimus eos itaque odit officiis provident sunt?</div>
                                <div class="flex-column w-25 border border-danger">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores cumque deleniti, distinctio dolorum ducimus eos itaque odit officiis provident sunt?</div>
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
                counter: 0,
                isOpened: false,
                isActive: false,
                levelOneOpened: false,
                imageUrl: null,
                fakeImage: false,

                items: [],
                itemsLevelZero: [],
                itemsLevelOne: [],
                itemsLevelTwo: [],



                // dropItems: [
                //     //Item 1
                //     {
                //         id: 1,
                //         label: "Drop item 1",
                //         url: '',
                //         childs: [
                //             {
                //                 id: 1,
                //                 label: 'Inner 1',
                //                 url: '',
                //                 childs: []
                //             },
                //             {
                //                 id: 2,
                //                 label: 'Inner 2',
                //                 url: '',
                //                 childs: []
                //             },
                //             {
                //                 id: 3,
                //                 label: 'Inner 3',
                //                 url: '',
                //                 childs: []
                //             }
                //         ],
                //     },
                //
                //     // //Item 2
                //     {
                //         id: 2,
                //         label: "Drop item 2",
                //         url: '',
                //         childs: [
                //             {
                //                 id: 1,
                //                 label: 'Inner 1',
                //                 url: '',
                //                 childs: []
                //             },
                //             {
                //                 id: 2,
                //                 label: 'Inner 2',
                //                 url: '',
                //                 childs: []
                //             },
                //             {
                //                 id: 3,
                //                 label: 'Inner 3',
                //                 url: '',
                //                 childs: []
                //             },
                //             {
                //                 id: 4,
                //                 label: 'Inner 4',
                //                 url: '',
                //                 childs: []
                //             },
                //         ],
                //     },
                //
                //     //Item 3
                //     {
                //         id: 3,
                //         label: "Drop item 3",
                //         url: '',
                //         childs: [
                //             {
                //                 id: 1,
                //                 label: 'Inner 1',
                //                 url: '',
                //                 childs: []
                //             },
                //             {
                //                 id: 2,
                //                 label: 'Inner 2',
                //                 url: '',
                //                 childs: []
                //             },
                //             {
                //                 id: 3,
                //                 label: 'Inner 3',
                //                 url: '',
                //                 childs: []
                //             },
                //             {
                //                 id: 4,
                //                 label: 'Inner 4',
                //                 url: '',
                //                 childs: []
                //             },
                //             {
                //                 id: 5,
                //                 label: 'Inner 5',
                //                 url: '',
                //                 childs: []
                //             },
                //         ],
                //     },
                // ],
                //
                // levelOne: [
                //     {
                //         id: 1,
                //         label: "Inner 1"
                //     },
                //     {
                //         id: 2,
                //         label: "Inner 2"
                //     },
                //     {
                //         id: 3,
                //         label: "Inner 3"
                //     }
                // ],
                //
                // levelTwo: [
                //     {
                //         id: 1,
                //         label: "Inner Inner 1"
                //     },
                //     {
                //         id: 2,
                //         label: "Inner Inner 2"
                //     },
                //     {
                //         id: 3,
                //         label: "Inner Inner 3"
                //     },
                // ]
            }
        },
        methods: {
            showDropdown: function() {
                this.isOpened = false;
                this.levelOneOpened = false;
            },

            getItems: function(id) {
                this.axios.post('/getItemsList', {parentId: id}).then(response => {
                    this.fetchGetItems(response.data);
                });
            },

            fetchGetItems: function(response, id) {
                var vm = this;


                response.forEach(data => {
                    vm.itemsLevelZero.push(data);
                    // vm.items.push(data);
                })
            },

            getLevelOne: function(id) {

                var vm = this;

                for(var i = 0; i < vm.itemsLevelZero.length; i++) {
                    if(vm.itemsLevelZero[i].id === id && vm.itemsLevelZero[i].opened === false) {

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
                    }
                }
           },

            fetchLevelOne: function(response, id) {
                var vm = this;

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
            },

            getLevelTwo: function(id) {
                // debugger;
                var vm = this;

                for(var i = 0; i < vm.itemsLevelOne.length; i++) {
                    if(vm.itemsLevelOne[i].id === id && vm.itemsLevelOne[i].opened === false) {

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
                    }
                }
            },

            fetchLevelTwo: function(response, id) {

                var vm = this;

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

                this.levelOneOpened = true;
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




    .show-me {
        display: none;
    }

    .showInner {
        display: block;
    }

    .nav {
        position: relative;
    }

    .dropdown-content__list {
        width: 300px;
        /*max-height: 500px;*/
        /*overflow-y: auto;*/
    }




    .dropbtn {
        cursor: pointer;
        border: none;
        outline: none;
        transition: 0.4s ease;
        background: #FFF;
        border-bottom: 1px solid transparent;
    }

    .dropbtn:hover {
        border-bottom: 1px solid #000;
    }

    .dropbtn-inner {
        font-size: 1.2em;
        cursor: pointer;
        border: none;
        outline: none;
        transition: 0.4s ease;
        /*border-bottom: 2px solid transparent;*/
        border-left: 3px solid transparent;
    }

    .dropbtn-inner:hover {
        /*border-bottom: 2px solid #000;*/
        border-left: 3px solid #007bff;
        /*box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);*/
    }

    .dropbtn-inner:hover a {
        color: #007bff;
    }

    .active-btn {
        border-left: 3px solid #818181;
        color: #818181;
    }


    .nav-dropdown {
        position: absolute;
        left: 0;
        width: 100%;
        top: 45px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
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

    .close-btn:hover i {
        color: red;
    }





    .items-icons {
        height: 25px;
    }

    a {
        color: #000;
        text-decoration: none;
    }

</style>
