<template>
    <div>
        <div class="avatar-menu-size mt-3 mb-3 ml-2 mr-2">
            <img src="/images/avatar.png" v-if="fakeImage">
            <img :src="imageUrl" @error="fakeImage = true" v-else>
        </div>
        <div class="flex-row bg-color-blue color-white" @click="reverseCaret()" data-toggle="collapse" data-target="#persons-data" aria-expanded="true">
            <div class="pointer left-menu-nickname-fonts ml-3 mr-3 mt-1 mb-1 jc-sb width100">
                <span>{{fullname}}</span>
                <span class="ml-2 vertical-middle"><i class="fas " :class="caretClass" data-toggle="collapse" href="#multiCollapseExample1"></i></span>
            </div>
        </div>
        <div class="ml-3 mr-3 mt-2 collapse in" id="persons-data">
            <div class="left-menu-fonts">
                <span><strong>{{duty}}</strong></span>
            </div>
            <div class="left-menu-fonts" v-if="rating !== ''">
                <span><strong><i class="far color-blue fa-star mr2"></i>&nbsp;</strong><span>{{rating}}</span></span>
            </div>
            <div class="left-menu-fonts" v-if="birthday !== ''">
                <span><strong><i class="fas color-blue fa-gift"></i>&nbsp;&nbsp;</strong><span>Родился(-ась) {{birthday}}</span></span>
            </div>
            <div class="left-menu-fonts" v-if="place_of_birth !== ''">
                <span><strong><i class="fas color-blue fa-map-marker-alt ml2 mr2"></i>&nbsp;&nbsp;</strong><span>Из {{place_of_birth}}</span></span>
            </div>
            <div class="left-menu-fonts" v-if="married !== ''">
                <span><strong><i class="fas color-blue fa-heart"></i>&nbsp;&nbsp;</strong><span>{{married}}</span></span>
            </div>
            <div class="left-menu-fonts" v-if="education !== ''">
                <span><strong><i class="fas color-blue fa-graduation-cap"></i>&nbsp;</strong><span>Учился(-ась) {{education}}</span></span>
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
                caretClass: 'fa-chevron-down',
                fullname: '',
                imageCounter: 1,
                duty: '',
                birthday: '',
                place_of_birth: '',
                married: '',
                education: '',
                rating: '',
                fakeImage: false,
                imageUrl : null,
            }
        },
        props: {
            isn: Number,
        },
        created: function(){
            this.getTables();
            this.imageUrl = "/storage/images/employee/" + this.isn + ".png";
        },
        methods: {
            getTables: function(){
                this.axios.post("/getUsersData", {}).then((response) => {
                    this.fetchResponse(response.data)
                })
            },
            fetchResponse: function(response){
                if(response.success){
                    var information = response.response;
                    this.fullname = information.Name;
                    this.duty = information.Duty;
                    this.birthday = information.Birthday;
                    this.married = information.Married;
                    this.education = information.Education;
                    this.rating = information.Rating;
                    this.place_of_birth = information.City;
                }else{
                    alert(response.error);
                }
            },

            reverseCaret: function () {
                this.caretClass = this.caretClass === 'fa-chevron-down' ? 'fa-chevron-up' : 'fa-chevron-down';
            },
        },

    }
</script>
