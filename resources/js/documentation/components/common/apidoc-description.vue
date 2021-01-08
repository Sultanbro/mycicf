<template>
    <div>
        <apidoc-description-table v-for="(doc, index) in apidocs.docs"
                                  :doc="doc"
                                  :key="index"></apidoc-description-table>
        <apidoc-error-table :errors="apidocs.errors"></apidoc-error-table>
    </div>
</template>

<script>
    export default {
        name: "apidoc-description",
        props: {
            apidocs: Object
        }
    }
</script>

<style scoped>

</style>
