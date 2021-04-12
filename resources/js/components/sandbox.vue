<template>
    <div>
        Sandbox {{ a }}

        <p v-if="b">{{b}}</p>
    </div>
</template>

<script>
    export default {
        name: "sandbox.vue",
        data() {
            return {
                a : 1,
                b : 888,
            }
        },
        mounted(){
        }
    }
</script>

<style scoped>

</style>
