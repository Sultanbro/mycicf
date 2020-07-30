<template>
    <div>
        <div class="d-flex flex-column vertical-middle Birthday-margin-inner">
            <div class="jc-center d-flex width50 events-window-size relative">
                <img src="http://animations.shoppinng.ru/wp-content/uploads/2014/02/13.gif" class="absolute width100 height100" />
                <img src="/images/balloons-icon.png" class="width100 absolute birthday-balls zi-1">
                <img :src="imageUrl" class="width100" v-if="!fakeImage">
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
                <div class="Birthday-line_height mt-1 mb-1">
                    <span class="fs-0_9">{{dept}}</span>
                </div>
                <div class="Birthday-line_height mt-1 mb-1">
                    <span class="fs-0_9">{{duty}}</span>
                </div>
            </div>
        </div>

        <div v-if="similar.length > 0" v-for="birthday in similar" class="d-flex flex-column vertical-middle Birthday-margin-inner">
            <div class="jc-center d-flex width50 events-window-size relative">
                <img src="http://animations.shoppinng.ru/wp-content/uploads/2014/02/13.gif" class="absolute width100 height100" />
                <img src="/images/balloons-icon.png" class="width100 absolute birthday-balls zi-1">
                <img :src="'/storage/images/employee/'+birthday.ISN+'.png'" class="width100" v-if="!birthday.fakeImage">
                <img :src="fakeImageUrl" class="width100" v-else>
            </div>
            <div class="colleagues-info-section__main d-flex flex-column vertical-middle">
                <div class="color-blue mt-1 fs-1_1 Birthday-line_height-header text-center">
                    <span>{{birthday.fullname}}</span>
                </div>
                <div class="Birthday-line_height mt-1 mb-1">
                    <span class="fs-0_9">{{birthday.birthday}}</span>
                </div>
                <div class="Birthday-line_height mt-1 mb-1">
                    <span class="fs-0_9">{{birthday.dept}}</span>
                </div>
                <div class="Birthday-line_height mt-1 mb-1">
                    <span class="fs-0_9">{{birthday.duty}}</span>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "simpleBirthday",
        data() {
            return {
                imageUrl : null,
                fakeImageUrl : '/images/avatar.png'
            }
        },
        props : {
            fullName: String,
            date: String,
            ISN : Number,
            dept: String,
            duty: String,
            fakeImage : Boolean,
            similar: Array
        },
        mounted(){
            this.imageUrl = `/storage/images/employee/${this.ISN}.png`;
        },
        updated(){
            this.imageUrl = `/storage/images/employee/${this.ISN}.png`;
        },
    }
</script>

<style scoped>

</style>