<template>
    <div class="pt-3 pb-3 pl-2 pr-2 colleagues-info-section">
        <div class="d-flex align-items-center">
            <div class="mr-2">
                <img :src="info.imageUrl" class="small-avatar-circle small-avatar-circle-width">
            </div>
            <div class="colleagues-info-section__main">
                <div class="color-blue fs-0_9">
                    <a :href="'/colleagues/'+info.isn"><span>{{info.name}}</span></a>
                </div>
                <div class="mt-minus-10px">
                    <span class="fs-0_7">{{info.duty}}</span>
                </div>
                <div class="mt-minus-10px">
                    <span class="fs-0_7">{{info.department}}</span>
                </div>
            </div>
        </div>
    </div>
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
