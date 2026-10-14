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
</div>
<script>
    export default {
        name: "simple-info",
        data() {
            return {
                caretClass: 'fa-chevron-down',
                imageCounter: 1,
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
        },

    }
</script>