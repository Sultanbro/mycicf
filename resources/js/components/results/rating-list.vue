<template>
    <div>
        <div class="rating-search p-4 mb-3 mt-3">
            <div>
                <label for="rating-input">
                    <input id="rating-input" type="month" class="rating-date-input" v-model="ratingDate">
                </label>
            </div>
            <div class="rating-search-btn" @click="getTopRatingList">
                <span>Показать</span>
            </div>
        </div>

        <div class="results-container mt-3 mb-3" v-for="(rating, index) in ratingList">
            <div class="w-100">
                <div class>
                    <div class="p-3 pointer" data-toggle="collapse" :href="`#rating-${index}`" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <div class="d-flex justify-content-between">
                            <strong>Рейтинг {{index}}</strong>
                            <div>
                                <span class="mr-3">Ср. {{ rating.rate_avg }}</span>
                                <span>Кол-во. {{ rating.count }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" :id="`rating-${index}`">
                        <employee-rate :rating="rating.rate"></employee-rate>
                    </div>
                </div>
            </div>
        </div>

        <div class="results-container mt-3 mb-3">
            <div class="p-3 w-100">
                <div class="d-flex justify-content-between">
                    <strong>Общее кол-во:</strong>
                    <div>
                        <span class="mr-3">Ср. {{ ratingTotal.rating_avg_total }}</span>
                        <span>Кол-во. {{ ratingTotal.rating_count_total }}</span>
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
                ratingDate: new Date(new Date().getFullYear(), new Date().getMonth() - 1,  1, 10).toJSON().slice(0, 7),
                ratingTotal: {},
            }
        },
        mounted() {
            this.getTopRatingList();
        },
        methods: {
            getTopRatingList() {
                this.preloader(true);
                this.axios.post('/getTopRatingList',
                    {
                        rating_date: this.ratingDate
                    })
                    .then(response => {
                        this.setTopRatingList(response.data);
                    })
                    .catch(error => {
                        alert(error);
                    })
                    .finally(() => {
                        this.preloader(false);
                    })
            },
            setTopRatingList(data) {
                this.ratingList = data.rating_list;
                this.ratingTotal = data.rating_total;
            },
            preloader(show) {
                if (show) {
                    document.getElementById('preloader').style.display = 'flex';
                } else {
                    document.getElementById('preloader').style.display = 'none';
                }
            },
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
    label {
        padding: 0;
        margin: 0;
    }
    .rating-search {
        background-color: #FFF;
        border-radius: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .rating-date-input {
        padding: 4px;
        border: 1px solid #DDD;
    }
    .rating-search-btn {
        display: flex;
        padding: 5px 15px;
        cursor: pointer;
        color: cornflowerblue;
        border: 1px solid cornflowerblue;
        transition: 0.4s ease;
    }
    .rating-search-btn:hover {
        background-color: cornflowerblue;
        box-shadow: 0 0 20px rgba(47, 100, 187, 0.3);
        color: #FFF;
    }
</style>
