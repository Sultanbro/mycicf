<template>
    <a :href="'/colleagues/'+info.isn">
        <div class="container-fluid mt-2 mb-2 flex-column">
            <div class="flex-row vertical-middle">
                <div>
                    <img :src="info.imageUrl" class="image-circle-add-post">
                </div>
                <div class="flex-column ml-4 mb-1">
                    <span class="color-blue-name bold">{{info.name}}</span>
                    <span class="fs-0_8 color-black">{{info.duty}}</span>
                    <span class="fs-0_8 color-black">{{info.department}}</span>
                </div>
            </div>
        </div>
    </a>
</template>

<script>
    export default {
        name: "colleagues-info",

        data() {
            return {
            }
        },
        props : {
            info : Object
        },
    }
</script>

<style scoped>

</style>