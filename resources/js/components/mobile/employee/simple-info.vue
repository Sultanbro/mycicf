<template>
    <div class="bg-white">
        <div class="pb-3 container-fluid flex-column vertical-middle">
            <div class="mt-3 flex-column vertical-middle">
                <div class="flex-column vertical-middle">
                    <div class="width100">
                        <img src="images/avatar.png" class="width100"  v-if="fakeImage">
                        <img :src="imageUrl" class="width100" @error="fakeImage = true" v-else>
                    </div>
                </div>
                <div class="mt-2 mb-2 color-blue-name">
                    <strong>{{fullname}}</strong>
                </div>
            </div>
            <div class="width100">
                <div class="flex-column vertical-middle color-white bg-color-blue width100" @click="reverseCaret()" data-toggle="collapse" data-target="#persons-data" aria-expanded="true">
                    <span>Основная информация</span>
                    <!--span><i class="fa fa-chevron-down"></i></span-->
                    <span class="ml-2 vertical-middle"><i class="fas " :class="caretClass" data-toggle="collapse" href="#multiCollapseExample1"></i></span>
                </div>
            </div>
            <div class="ml-3 mr-3 mt-2 collapse in show" id="persons-data" v-show="duty != ''">
                <div class="left-menu-fonts">
                    <span><strong>{{duty}}</strong></span>
                </div>
                <div class="left-menu-fonts" v-if="rating !== ''">
                    <span><strong>Рейтинг: &nbsp; </strong><span>{{rating}}</span></span>
                </div>
                <div class="left-menu-fonts">
                    <span><strong>Дата рождения: &nbsp; </strong><span>{{birthday}}</span></span>
                </div>
                <div class="left-menu-fonts">
                    <span><strong>Место рождения: &nbsp; </strong><span>{{place_of_birth}}</span></span>
                </div>
                <div class="left-menu-fonts">
                    <span><strong>Семейное положение: &nbsp; </strong><span>{{married}}</span></span>
                </div>
                <div class="left-menu-fonts">
                    <span><strong>Образование: &nbsp; </strong><span>{{education}}</span></span>
                </div>
            </div>
<!--            {{                    <div class="width100 mt-3 mb-4">&#45;&#45;}}-->
<!--            {{                        <div class="flex-row jc-center bg-notification-center border-rad-10 pt-2 pb-2 vertical-middle color-white width100">&#45;&#45;}}-->
<!--                {{                            <span><i class="far fa-bell fs-1_2"></i></span>&#45;&#45;}}-->
<!--                {{                            <span class="pl-2">Центр уведомлений</span>&#45;&#45;}}-->
<!--                {{                            <div class="notification-counter">1</div>&#45;&#45;}}-->
<!--                {{                      </div>&#45;&#45;}}-->
<!--                                </div>-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "simple-info",
        data() {
            return {
                datebeg: '1990-01-01',
                dateend: '2019-09-10',
                carier: null,
                vacation: null,
                sick: null,
                mission: null,
                thanks: null,
                admins: null,
                options: null,
                fakeImage : false,

                caretClass: 'fa-chevron-up',
                duty: '',
                birthday: '',
                place_of_birth: '',
                married: '',
                education: '',
                rating: '',
            }
        },
        props : {
            isn: Number,
            fullname: String,
        },
        created: function(){
            this.getColleagueData();
            this.imageUrl = "/storage/images/employee/" + this.isn + ".png";
        },
        mounted: function(){
            this.getOptions();
            this.getTables();
        },
        methods: {
            getTables: function(){
                this.axios.post("/emplInfo", {isn: this.isn, datebeg: this.datebeg, dateend: this.dateend}).then((response) => {
                    this.fetchResponse(response.data)
                })
            },
            getOptions: function () {
                this.axios.post('/getBranchData', {}).then((response) => {
                    this.options = response.data.result;
                })
            },
            fetchResponse: function(response){
                if(response.success){
                    this.carier = response.result.CARIER;
                    this.vacation = response.result.VACATION;
                    this.sick = response.result.SICK;
                    this.mission = response.result.MISSION;
                    this.thanks = response.result.THANKS;
                    this.admins = response.result.ADMINS;

                }else{
                    alert(response.error);
                }
            },
            reverseCaret: function () {
                this.caretClass = this.caretClass === 'fa-chevron-up' ? 'fa-chevron-down' : 'fa-chevron-up';
            },
            getColleagueData: function(){
                this.axios.post("/getColleagueData", {isn : this.isn}).then((response) => {
                    this.fetchColleagueData(response.data)
                })
            },
            fetchColleagueData: function(response){
                if(response.success){
                    var information = response.response;
                    this.fullname = information.Name;
                    this.duty = information.Duty;
                    this.birthday = information.Birthday;
                    this.married = information.Married;
                    this.education = information.Education;
                    this.rating = information.Rating;
                }else{
                    alert(response.error);
                }
            },
        },

    }
</script>
