<template>
    <div>
        <div class="results-container mt-3 mb-3">

        </div>
    </div>
</template>

<script>
    export default {
        name: "rating-list",
        data() {
            return {
                ratingList: [],
            }
        },
        methods: {
            getRatingList() {
                this.axios.post('/getTopRatingList',
                    {

                    })
                    .then(response => {

                    })
            }
        }
    }
</script>

<style scoped>
    .results-container {
        background-color: #FFF;
        border-radius: 15px;
        display: flex;
        justify-content: center;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
</style>
