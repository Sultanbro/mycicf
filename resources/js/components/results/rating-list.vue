<template>
    <div>
        <div class="results-container mt-3 mb-3">
            <div class="w-100">
                <div class="">
                    <div class="p-3 pointer" data-toggle="collapse" href="#sick_days" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <strong>Рейтинг A+</strong>
                    </div>
                    <div class="collapse" id="sick_days">
                        <employee-rate></employee-rate>
<!--                        <div class="rating-list-container">-->
<!--                            <div class="rating-list w-100">-->
<!--                                <div>-->
<!--                                    <div>-->
<!--                                        <span>Имя Фамилия</span>-->
<!--                                    </div>-->
<!--                                    <div>-->
<!--                                        <span><small>Подразделение</small></span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div>-->
<!--                                    <div class="text-center">-->
<!--                                        <div>Рейтинг</div>-->
<!--                                        <h4 class="employee-rating">A</h4>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
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
        mounted() {
            // this.getTopRatingList();
        },
        methods: {
            getTopRatingList() {
                this.axios.post('/getTopRatingList',
                    {
                        class_isn: '1003961',
                        doc_isn: '34256169'
                    })
                    .then(response => {
                        console.log(response);
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
    /*.rating-list {*/
    /*    display: flex;*/
    /*    justify-content: space-between;*/
    /*    align-items: center;*/
    /*    padding: 0.5rem 1rem;*/
    /*    border-bottom: 1px solid #EEE;*/
    /*    width: 100%;*/
    /*}*/
    /*.rating-list:first-child {*/
    /*    border-top: 1px solid #EEE;*/
    /*}*/
    /*.rating-list:last-child {*/
    /*    border: 0;*/
    /*}*/
    /*.employee-rating {*/
    /*    color: cornflowerblue;*/
    /*    font-weight: bold;*/
    /*    padding: 0;*/
    /*    margin: 0;*/
    /*}*/
</style>
