<template>
    <div class="d-flex flex-column vertical-middle Birthday-margin-inner">
        <div class="jc-center d-flex width50 events-window-size relative">
            <img src="http://animations.shoppinng.ru/wp-content/uploads/2014/02/13.gif" class="absolute width100 height100" />
            <img src="/images/balloons-icon.png" class="width100 absolute birthday-balls zi-1">
            <img :src="imageUrl" @error="fakeImage = true" class="width100" v-if="!fakeImage">
            <img :src="fakeImageUrl" class="width100" v-else>
        </div>
        <!--                            <div class="width50">-->
        <!--                                <img src="/images/birthday-flags.png" class="width-100-imp birthday-balls">-->
        <!--                            </div>-->
        <div class="colleagues-info-section__main d-flex flex-column vertical-middle">
            <div class="color-blue mt-1 fs-1_1 Birthday-line_height-header text-center">
                <span>{{fullName}}</span>
            </div>
            <div class="Birthday-line_height mt-1 mb-1">
                <span class="fs-0_9">{{date}}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "simpleBirthday",
        data() {
            return {
                fakeImage : false,
                imageUrl : null,
                fakeImageUrl : '/images/avatar.png'
            }
        },
        props : {
            fullName: String,
            date: String,
            ISN : Number
        },
        mounted(){
            this.imageUrl = `/storage/images/employee/${this.ISN}.png`;
        },
        updated(){
            this.check();
        },
        methods: {
            check(){
                var url = `/storage/images/employee/${this.ISN}.png`;
                if(this.imageUrl !== url){
                    this.imageUrl = `/storage/images/employee/${this.ISN}.png`;
                    this.fakeImage = false;
                }
            }
        },
    }
</script>

<style scoped>

</style>