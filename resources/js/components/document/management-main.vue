<template>
    <div class="news-tape-bg radius-4px mt-3 pb-2">
        <ManagementSearch>

        </ManagementSearch>
    </div>
</template>

<script>
    import ManagementSearch from './management-search'

    export default {
        name: "management-main",
        components: {
            ManagementSearch,
        },
        data() {
            return {}
        },
        mounted() {},
        props: {
            isn: Number,
        },
        methods: {}
    }
</script>
