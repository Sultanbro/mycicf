<template>
    <div>
        <kiasdoc-description-table v-for="(doc, index) in kiasdocs.docs"
                                  :doc="doc"
                                  :key="index"></kiasdoc-description-table>
        <kiasdoc-error-table :errors="kiasdocs.errors"></kiasdoc-error-table>
    </div>
</template>

<script>
    export default {
        name: "kiasdoc-description",
        props: {
            kiasdocs: Object
        }
    }
</script>

<style scoped>

</style>
