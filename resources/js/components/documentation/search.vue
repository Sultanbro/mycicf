<template>
    <div>
        <div class="form-group">
            <br>
            <div class="input-group mb-3">
                <input v-model="searchText" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="button" >Search</button>
            </div>
    </div>
        <div>
            <a href="#" class="fa-underline">DOCUMENT TITLE</a>
            <br>
            <p>

            </p>
        </div>
    </div>

</template>

<script>
    export default {
        name: "search",
        data() {
            return {
                searchText: '',
                result: []
            }
        },
        methods: {

        },
    }
</script>
