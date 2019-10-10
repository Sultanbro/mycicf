<template>
    <div>
        <div class="avatar-menu-size mt-3 mb-3 ml-2 mr-2">
            <img src="/images/avatar.png" class="image" v-if="image.encoded === 0">
            <img :src="'data:image/jpeg;base64,' + image.encoded" v-else>
        </div>
        <div class="flex-row bg-color-blue color-white" @click="reverseCaret()" data-toggle="collapse" data-target="#persons-data" aria-expanded="true">
            <div class="pointer left-menu-nickname-fonts ml-3 mr-3 mt-1 mb-1 jc-sb width100">
                <span>{{fullname}}</span><span class="rating">{{rating}}</span>
                <span class="ml-2 vertical-middle"><i class="fas " :class="caretClass" data-toggle="collapse" href="#multiCollapseExample1"></i></span>
            </div>
        </div>
        <div class="ml-3 mr-3 mt-2 collapse in show" id="persons-data">
            <div class="left-menu-fonts">
                <span><strong>{{duty}}</strong></span>
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
        <hr class="left-menu-border mb-0">
    </div>
</template>

<script>
    export default {
        name: "simple-info",
        data() {
            return {
                caretClass: 'fa-chevron-up',
                fullname: '',
                duty: '',
                birthday: '',
                place_of_birth: '',
                married: '',
                education: '',
                rating: '',
            }
        },
        props: {
            image: Object,
            isn: Number,
        },
        mounted: function(){
            this.getTables();
        },
        methods: {
            getTables: function(){
                this.axios.post("/simpleInfo", {isn: this.isn, datebeg: this.datebeg, dateend: this.dateend}).then((response) => {
                    this.fetchResponse(response.data)
                })
            },
            fetchResponse: function(response){
                if(response.success){
                    var information = response.result.response;
                    this.fullname = information.Name;
                    this.duty = information.Duty;
                    this.birthday = information.Birthday;
                    this.married = information.Married === "0" ? "Не указано" : information.Married;
                    this.education = information.Edu  === "0" ? "Не указано" : information.Edu;
                    this.image.encoded = response.result.image;
                    this.rating = information.Rating === "0" ? "" : information.Rating;
                }else{
                    alert(response.error);
                }
            },
            reverseCaret: function () {
                this.caretClass = this.caretClass === 'fa-chevron-up' ? 'fa-chevron-down' : 'fa-chevron-up';
            },
        },

    }
</script>
