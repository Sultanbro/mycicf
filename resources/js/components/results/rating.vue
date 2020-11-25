<template>
    <div>
        <div class="rating-search p-4 mb-3">
            <div>
                <label for="rating-input">
                    <input id="rating-input" type="month" class="rating-date-input" v-model="dateBeg">
                </label>
            </div>
            <div>
                <treeselect v-model="userISN" :options="treeOptions" :multiple="false"></treeselect>
            </div>
            <div class="rating-search-btn" @click="getRating">
                <span>Показать</span>
            </div>
        </div>
        <!-- Rating Table Section-->
        <div class="rating-wrapper p-4 mb-3" v-if="showRating">
            <div class="rating-wrapper__inner">
                <div class="d-flex align-items-center">
                    <div class="mr-2">
                        <img src="/images/avatar.png" class="rating-avatar" v-if="fakeImage">
                        <img :src="imageUrl" @error="fakeImage = true" class="rating-avatar" v-else>
                    </div>
                    <div>
                        <h5>
                            <a :href="`/colleagues/${this.emplISN}/dossier`" class="text-dark">{{this.emplName}}</a>
                        </h5>
                        <div>{{this.emplDuty}}</div>
                    </div>
                </div>
                <div class="text-center">
                    <div>Рейтинг</div>
                    <h2 class="employee-rating">{{this.emplRate}}</h2>
                </div>
            </div>
            <div class="rating-table mt-3">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Критерии</th>
                        <th scope="col">Показатель</th>
                        <th scope="col">Оценка</th>
                        <th scope="col">
                            <span class="mr-1">Цель</span>
                            <i class="fas fa-info-circle" v-tooltip.top-center="'Твоя следующая цель по показателю для повышения оценки и рейтинга, галочка - максимальная оценка'"></i>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="rating in ratings">
                        <td><span v-tooltip.top-center="rating.tooltip">{{rating.criteria}}</span></td>
                        <td>{{rating.mark}}</td>
                        <td>{{rating.assessment}}</td>
                        <td v-if="rating.benchmark === ''">
                            <i class="fas fa-check text-success"></i>
                        </td>
                        <td v-else>{{rating.benchmark}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="rating-table-bottom">
                <div>
                    <span>Итоговая оценка:</span>
                </div>
                <div>
                    <span>{{this.meanShare}}</span>
                </div>
            </div>
        </div>
        <!-- Chart Section -->
        <div v-if="showRating">
            <div class="rating-wrapper p-4">
                <div class="ml-3">
                    <h4 class="employee-rating">Динамика рейтинга</h4>
                </div>
                <div class="chart-container">
                    <apexchart ref="realtimeChart" type="area" height="400" :options="chartOptions" :series="series"></apexchart>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "rating",
        data() {
            return {
                treeOptions: null,
                dateBeg: this.begin !== undefined ? this.begin : new Date(new Date().getFullYear(), new Date().getMonth() - 1, 1, 6).toJSON().slice(0, 7),
                imageUrl: null,
                fakeImage: false,
                userISN: this.isn,
                emplRate: null,
                emplDuty: null,
                emplName: null,
                emplISN: null,
                meanShare: null,
                showRating: false,
                showChart: false,
                ratings: [],

                chartOptions: {
                    xaxis: {
                        categories: [],
                    }
                },
                series: [{
                    name: 'Итог',
                    data: []
                }]
            }
        },
        mounted() {
            this.imageUrl = "/storage/images/employee/" + this.emplISN + ".png";
            this.getTreeOptions();
        },
        updated() {
            this.imageUrl = "/storage/images/employee/" + this.emplISN + ".png";
        },
        props: {
            isn: Number,
            begin: String,
        },
        methods: {
            getTreeOptions() {
                this.preloader(true);
                this.axios.post('/getBranchData', {})
                    .then((response) => {
                        this.setTreeOptions(response.data);
                    })
                    .then(() => {
                        this.getRating();
                    })
                    .catch(error => {
                        alert(error);
                    })
            },
            setTreeOptions(data) {
                this.treeOptions = data.result;
                // this.userISN = data.value;
            },
            getRating() {
                this.preloader(true);
                this.showRating = false;
                this.axios.post('/my-results/rating',
                    {
                        user_isn: this.userISN,
                        begin_date: this.dateBeg,
                    })
                    .then(response => {
                        if (response.data.success) {
                            this.setRating(response.data);
                            this.setChartData(response.data);
                        }
                        else {
                            alert(response.data.message);
                        }
                    })
                    .catch(error => {
                        alert(error);
                    })
                    .finally(() => {
                        this.preloader(false);
                    })
            },
            setRating(data) {
                this.ratings = data.rating;
                this.emplRate = data.emplRate;
                this.emplDuty = data.emplDuty;
                this.meanShare = data.meanShare;
                this.emplName = data.emplName;
                this.emplISN = data.emplISN;
                this.showRating = true;

            },
            setChartData(data) {
                this.chartOptions.xaxis.categories = data.xAxis;
                this.series[0].data = data.yAxis;

            },
            preloader(show) {
                if (show) {
                    document.getElementById('preloader').style.display = 'flex';
                } else {
                    document.getElementById('preloader').style.display = 'none';
                }
            },
        },
    }
</script>

<style scoped>
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
    .rating-wrapper {
        background-color: #FFF;
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .rating-wrapper__inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }
    .employee-rating {
        color: cornflowerblue;
        font-weight: bold;
    }
    .rating-avatar {
        border-radius: 50%;
        width: 70px;
        height: 70px;
    }
    .rating-table {
        padding-top: 1rem;
        border-top: 1px solid cornflowerblue;
    }
    .rating-table-bottom {
        display: flex;
        justify-content: space-between;
        padding: 0 0.8rem;
        font-size: 1.4rem;
        font-weight: bold;
        color: cornflowerblue;
        border-top: 1px solid cornflowerblue;
    }
    .chart-container {
        width: 100%;
        overflow: hidden;
    }
</style>
