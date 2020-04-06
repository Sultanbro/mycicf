<template>
    <div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tbody>
                <tr>
                    <th scope="col">Сентрас</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                <tr class="bold">
                    <td>Показатель</td>
                    <td>Январь 2019</td>
                    <td>Январь 2018</td>
                </tr>
                <tr class="bold">
                    <td>Рейтинг</td>
                    <td>B+ / Fitch Ratings / 01.01.2019</td>
                    <td>C+ / Fitch Ratings </td>
                </tr>
                <tr class="bold">
                    <td>Ренкинг</td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "parse-info",

        data() {
            return {
                companyList: [],
                firstYear: 2019,
                secondYear: 2019,
                firstPeriod: 7,
                secondPeriod: 7,

                firstPeriodData: [],
                secondPeriodData: [],
                firstPeriodLabel: null,
                secondPeriodLabel: null,

            }
        },

        methods: {
            getCompanyInfo() {
                this.axios.post('/parse/info/getData', {
                    company_list: this.companyList[0],
                    first_year: this.firstYear,
                    second_year: this.secondYear,
                    first_period: this.firstPeriod,
                    second_period: this.secondPeriod,
                }).then(response => {
                    if(response.data.success) {
                        this.setCompanyInfo(response.data);
                    }
                }).catch(error => {
                    alert(error);
                });
            },
            setCompanyInfo(response) {
                this.firstPeriodData = response.firstPeriodData;
                this.secondPeriodData = response.secondPeriodData;
                this.firstPeriodLabel = response.firstPeriodLabel;
                this.secondPeriodLabel = response.secondPeriodLabel;
            },

            getCompanies() {
                this.axios.post('/parse/getCompanies', {}).then(response => {
                    this.setCompanies(response.data);
                }).catch(error => {
                    alert(error);
                });
            },
            setCompanies(response) {
                this.companyList = response;
            }
        },

        mounted() {
            this.getCompanies();
            // this.getOpuTopSum();
        }
    }
</script>

<style scoped>

</style>
