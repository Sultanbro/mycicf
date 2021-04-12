<template>
    <div></div>
</template>

<script>
    export default {
        name: "test.vue",
        mounted(){
            this.axios.post('https://kupipolis.kz/oktell/getHelpRoadAssistance', {
                pnd_id: 667
            });
        }
    }
</script>

<style scoped>

</style>
