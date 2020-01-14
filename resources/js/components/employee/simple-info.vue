<template>
    <div>
        <div class="avatar-menu-size mt-3 mb-3 ml-2 mr-2" ref="modalButton" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
            <img src="/images/avatar.png" v-if="fakeImage">
            <img :src="imageUrl" @error="fakeImage = true" v-else>
        </div>
        <div class="modal fade bd-example-modal-lg" id="mainModal" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content modalImageSize">
                    <div>
                        <div class="relative d-flex">
<!--                            <img src="/images/avatar.png" class="image pt-0 pb-0" v-if="fakeImage">-->
<!--                            <img :src="imageUrl" @error="fakeImage = true" v-else>-->
                            <img class="width100 max-height-90vh" :src="imagesInModal[imageCounter-1].url"/>
                            <div class="absolute d-flex jc-center width100">
                                {{imageCounter}} из {{imagesInModal.length}}
                            </div>
                            <div class="d-flex vertical-middle absolute width100 height100">
                                <div v-if="imagesInModal.length > 1" class="absolute modalImageButtons d-flex justify-content-start zi-2" @click="prev()">
                                    <div class="modalImageArrowLeft pointer">
                                        <i class="fas fa-chevron-left"></i>
                                    </div>
                                </div>
                                <div v-if="imagesInModal.length > 1" class="absolute modalImageButtons width100 d-flex justify-content-end" @click="next()">
                                    <div class="modalImageArrowRight pointer">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                imagesInModal: [
                    {
                        url: '/images/avatar.png',
                    },
                    {
                        url: '/images/background.png',
                    },
                    {
                        url: '/images/img-01.png',
                    },
                    {
                        url: '/images/centcoin-logo.png',
                    },
                    {
                        url: '/images/new-white-logo.png',
                    },
                    {
                        url: '/images/img-01.png',
                    },
                ]
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
            prev(){
                if(this.imageCounter === 0){
                    this.imageCounter = this.imagesInModal.length - 1;
                }else{
                    this.imageCounter--;
                }
            },
            next(){
                if(this.imageCounter === this.imagesInModal.length){
                    this.imageCounter = 0;
                }else{
                    this.imageCounter++;
                }
            },
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
