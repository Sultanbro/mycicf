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
            <div class="rating-search-btn">
                <span>Показать</span>
            </div>
        </div>
        <!-- Rating Table Section-->
        <div class="rating-wrapper p-4">
            <div class="rating-wrapper__inner">
                <div class="d-flex align-items-center">
                    <div class="mr-2">
                        <img src="/images/avatar.png" class="rating-avatar" v-if="fakeImage">
                        <img :src="imageUrl" @error="fakeImage = true" class="rating-avatar" v-else>
                    </div>
                    <div>
                        <h5>Имя фамилия</h5>
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
                        <th scope="col">Бенчмарк</th>
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
                    <span>Итого:</span>
                </div>
                <div>
                    <span>{{this.meanShare}}</span>
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
                dateBeg: new Date(new Date().getFullYear(), new Date().getMonth() - 1, 1, 6).toJSON().slice(0, 7),
                imageUrl: null,
                fakeImage: false,
                userISN: this.propsUserISN,
                emplRate: null,
                emplDuty: null,
                meanShare: null,
                ratings: [],
            }
        },
        mounted() {
            this.imageUrl = "/storage/images/employee/" + this.userISN + ".png";
            // this.getTreeOptions();
            this.getRating();
        },
        updated() {
            this.imageUrl = "/storage/images/employee/" + this.userISN + ".png";
        },
        props: {
            propsUserISN: Number
        },
        methods: {
            getTreeOptions() {
                this.preloader(true);
                this.axios.post('/getBranchData', {})
                    .then((response) => {
                        this.setTreeOptions(response.data);
                    })
                    .catch(error => {
                        alert(error);
                    })
                    .finally(() => {
                        this.preloader(false);
                    });
            },
            setTreeOptions(data) {
                this.treeOptions = data.result;
                this.userISN = data.value;
            },
            getRating() {
                this.preloader(true);
                this.axios.post('/my-results/rating',
                    {
                        // user_isn: this.userISN,
                        user_isn: 1446218,
                        // begin_date: this.dateBeg,
                        begin_date: "2020-09",
                    })
                    .then(response => {
                        if (response.data.success) {
                            this.setRating(response.data);
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
        padding: 3px;
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
        /*border-top: 1px solid #DEE2E6;*/
        border-top: 1px solid cornflowerblue;
    }
    .rating-table-bottom {
        display: flex;
        justify-content: space-between;
        padding: 0 0.8rem;
        font-size: 1.4rem;
        font-weight: bold;
        color: cornflowerblue;
        /*border-top: 1px solid #DEE2E6;*/
        border-top: 1px solid cornflowerblue;
    }
</style>
