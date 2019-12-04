<template>
    <div class="pt-3 pb-3 pl-2 pr-2 colleagues-info-section">
        <div class="d-flex align-items-center">
            <div class="mr-2">
                <img src="/images/avatar.png" class="small-avatar-circle small-avatar-circle-width" >
            </div>
            <div class="colleagues-info-section__main">
                <div class="color-blue fs-0_9">
                    <span>Ажимов Жанибек Кайратулы</span>
                </div>
                <div class="mt-minus-10px">
                    <span class="fs-0_7">Веб-программист</span>
                </div>
                <div class="mt-minus-10px">
                    <span class="fs-0_7">Департамент программрования</span>
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
                MainImageUrl: null,
                MainFakeImage: false,
            }
        }
    }
</script>

<style scoped>
</style>
