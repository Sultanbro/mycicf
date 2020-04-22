<template>
    <div class="col-12 row ml-0 mt-2 mb-2 agreement-block">
        <h4>Дата начала / окончания договора</h4>
        <div class="row col-12">
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label>Дата начала : </label>
                <input type="date" id="dateBeg" class="date-products col-12" dateFormat="dd.mm.YYYY" v-model="period.begin" required>
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-12">
                <label>Период : </label>
                <select class="custom-select" v-model="period.period">
                    <option value="12">12 месяцев</option>
                    <option value="11">11 месяц</option>
                    <option value="10">10 месяц</option>
                    <option value="9">9 месяц</option>
                    <option value="8">8 месяц</option>
                    <option value="7">7 месяц</option>
                    <option value="6">6 месяц</option>
                    <option value="5">5 месяц</option>
                    <option value="4">4 месяц</option>
                    <option value="3">3 месяц</option>
                    <option value="2">2 месяц</option>
                    <option value="1">1 месяц</option>
                    <option value="150">15 дней</option>
                    <option value="100">10 дней</option>
                    <option value="50">5 дней</option>
                    <option value="0">Произвольная</option>
                </select>
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label>Дата окончания : </label>
                <input type="date" id="dateEnd" class="date-products col-12" dateFormat="dd.mm.YYYY" v-model="period.end" :disabled="period.period !== '0'" required>
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label>Дата подписания : </label>
                <input type="date" id="dateSig" class="date-products col-12" dateFormat="dd.mm.YYYY" v-model="period.sig" required>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "period",
        data() {
            return {
                //...
            }
        },
        props: {
            period: Object
        },
        mounted(){
            this.period.end = this.$moment(this.period.begin, 'YYYY-MM-DD')
                .add(this.period.period, 'month')
                .add(-1, 'days')
                .format('YYYY-MM-DD');
        },
        created(){
            //...
        },
        methods: {
            //...
        },
        watch: {
            'period.period': function (val, oldVal){
                val = parseInt(val);
                if(val > 0 && val < 13){
                    this.period.end = this.$moment(this.period.begin, 'YYYY-MM-DD')
                        .add(this.period.period, 'month')
                        .add(-1, 'days')
                        .format('YYYY-MM-DD');
                }else if(val !== 0){
                    this.period.end = this.$moment(this.period.begin, 'YYYY-MM-DD')
                        .add(this.period.period/10 - 1, 'days')
                        .format('YYYY-MM-DD');
                }
            },
            'period.begin': function (val, oldVal){
                val = parseInt(this.period.period);
                this.period.sig = this.$moment(this.period.begin, 'YYYY-MM-DD').format('YYYY-MM-DD');
                if(val > 0 && val < 13){
                    this.period.end = this.$moment(this.period.begin, 'YYYY-MM-DD')
                        .add(this.period.period, 'month')
                        .add(-1, 'days')
                        .format('YYYY-MM-DD');
                }else if(val !== 0){
                    this.period.end = this.$moment(this.period.begin, 'YYYY-MM-DD')
                        .add(this.period.period/10 - 1, 'days')
                        .format('YYYY-MM-DD');
                }
            }
        }
    }
</script>

<style scoped>
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>