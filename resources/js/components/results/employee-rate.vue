<template>
    <div>
        <div class="rating-list-container" v-for="rate in rating">
            <div class="rating-list">
                <div>
                    <div>
                        <span>
                            <a :href="`/my-results/rating/${rate.employee_isn}/${rate.rating_date}`">{{rate.employee}}</a>
                        </span>
                    </div>
                    <div>
                        <span>
                            <small>{{rate.department}}</small>
                        </span>
                    </div>
                </div>
                <div>
                    <div class="d-flex text-center">
                        <div class="rate-mean">{{rate.rate_mean}}</div>
                        <div class="rate-mark">{{rate.rate_mark}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "employee-rate",
        props: {
            rating: Array
        }
    }
</script>

<style scoped>
    .rating-list {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #EEE;
        padding: 0.5rem 1rem;
        width: 100%;
    }
    .employee-rating {
        color: cornflowerblue;
        font-weight: bold;
        padding: 0;
        margin: 0;
    }
    .rate-mean {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 1rem;
        color: #000;
        margin-right: 0.5rem;
    }
    .rate-mark {
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: cornflowerblue;
        padding: 0 1rem;
    }
</style>
