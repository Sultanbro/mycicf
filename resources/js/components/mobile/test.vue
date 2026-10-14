<template>
    <div>
        <div class="mobile-matching-second-table-contain box-shadow">
            <div class="flex-row pl-3 pr-3 color-blue jc-sb table-striped-custom pt-2 pb-2">
                <div>Иванов Иван</div>
                <div><i class="fas fa-chevron-up"></i></div>
            </div>
            <div class="mb-2">
                <div class="table-responsive width100">
                    <table class="dosier-table color-blue mobile-matching-second-table-contain box-shadow table text-align-center mb-0">
                        <tbody>
                        <tr>
                            <td>Виза</td>
                            <td><i class="far fa-check-circle green-button"></i></td>
                        </tr>
                        <tr>
                            <td>Дата</td>
                            <td>20-10-2019</td>
                        </tr>
                        <tr>
                            <td>Подразделение</td>
                            <td>Управление управления</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div>
            <div class="flex-row pl-3 pr-3 pt-2 pb-2 box-shadow jc-sb table-striped-custom">
                <div>Иванов Иван</div>
                <div><i class="far fa-check-circle green-button"></i></div>
            </div>
        </div>
        <div>
            <div class="flex-row pl-3 pr-3 pt-2 pb-2 mt-1 mb-5 box-shadow jc-sb table-striped-custom">
                <div>Иванов Иван</div>
                <div><i class="far fa-check-circle green-button"></i></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "mobile-test",
        data() {
            return {
                datebeg: '2018-01-01',
                dateend: '2019-09-10',
                carier: null,
                vacation: null,
                sick: null,
                mission: null,
                thanks: null,
                admins: null,
                options: null,
            }
        },
        props : {
            isn: Number,
        },
        mounted: function(){
            this.getOptions();
            this.getTables();
        },
        props: {
            isn: Number,
        },
        methods: {
            getTables: function(){
                this.axios.post("/emplInfo", {isn: this.isn, datebeg: this.datebeg, dateend: this.dateend}).then((response) => {
                    this.fetchResponse(response.data)
                })
            },
            getOptions: function () {
                this.axios.post('/getBranchData', {}).then((response) => {
                    this.options = response.data.result;
                })
            },
            fetchResponse: function(response){
                if(response.success){
                    this.carier = response.result.CARIER;
                    this.vacation = response.result.VACATION;
                    this.sick = response.result.SICK;
                    this.mission = response.result.MISSION;
                    this.thanks = response.result.THANKS;
                    this.admins = response.result.ADMINS;
                }else{
                    alert(response.error);
                }
            },
            // modalBlur: function () {
            //     var qwe = document.getElementById(qwe);
            //   // var app = document.getElementById(app);
            //   if (qwe.className == active){
            //       alert('qwe');
            //   }
            //   else{
            //       alert('empty')
            //   }
            // },
        },

    }
</script>

<style scoped>

</style>