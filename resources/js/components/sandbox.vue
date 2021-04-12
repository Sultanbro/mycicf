<template>
    <div>Sandbox {{ a }}</div>
</template>

<script>
    export default {
        name: "sandbox.vue",
        data() {
            return {
                a : 1,
            }
        },
        mounted(){
            console.log(1);
        }
    }
</script>

<style scoped>

</style>
