<template>
    <div class="nav mt-2 d-flex justify-content-center bg-WHITE">
        <div class="nav-container flex-row width100">
            <div class="row width110">

                <div class="container ">
                        <di
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "step1",

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
                stepChange: 1,
            }
        },
        props: {
            pinned_id: Number,
        },
        methods: {


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
