<template>
    <img src="images/avatar.png" class="image header-avatar-size small-avatar-circle" v-if="fakeImage">
    <img :src="imageUrl" class="image header-avatar-size small-avatar-circle" @error="fakeImage = true" v-else>


</template>

<script>
    export default {
        name: "userImage",
        data () {
            return {
                fakeImage : false,
                imageUrl : null
            };
        },
        props: {
            isn: Number,
        },
        mounted() {
            this.imageUrl = "/storage/images/employee/" + this.isn + ".png";
        }
    }
</script>

<style scoped>

</style>