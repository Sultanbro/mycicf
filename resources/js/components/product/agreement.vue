<template>
<div>
    <div class="col-12 mt-2 row agreement-block">
        <div class="col-lg-3 col-xl-3 col-md-6 col-12">
            <label>Дата начала : </label>
            <input type="date" id="dateBeg" class="date-products col-12" dateFormat="dd.mm.YYYY" v-model="dateBeg" required>
        </div>
        <div class="col-lg-3 col-xl-3 col-md-6 col-12">
            <label>Период : </label>
            <select class="custom-select" v-model="period">
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
        <div class="col-lg-3 col-xl-3 col-md-6 col-12">
            <label>Дата окончания : </label>
            <input type="date" id="dateEnd" class="date-products col-12" dateFormat="dd.mm.YYYY" v-model="dateEnd" :disabled="period !== '0'" required>
        </div>
    </div >
    <agr-attributes></agr-attributes>
    <agr-roles></agr-roles>
    <agr-drivers></agr-drivers>
    <div class="participant-form" v-show="showParticipantForm">
        <div class="col-12 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 row mt-5 justify-content-end">
            <div class="row justify-content-center vertical-middle border-black" style="width: 40px; height : 40px;">
                <i class="fas fa-search"></i>
            </div>
            <div class="col-12"></div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">ИИН : </label>
                <input type="text" class="attr-input-text col-12">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">РНН : </label>
                <input type="text" class="attr-input-text col-12">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Фамилия : </label>
                <input type="text" class="attr-input-text col-12">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Имя : </label>
                <input type="text" class="attr-input-text col-12">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Отчество : </label>
                <input type="text" class="attr-input-text col-12">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">ДР : </label>
                <input type="text" class="attr-input-text col-12">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Резидентство : </label>
                <input type="text" class="attr-input-text col-12">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Тип документа : </label>
                <input type="text" class="attr-input-text col-12">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Номер документа : </label>
                <input type="text" class="attr-input-text col-12">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Дата документа : </label>
                <input type="text" class="attr-input-text col-12">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Адрес : </label>
                <input type="text" class="attr-input-text col-12">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">    Стаж вождения : </label>
                <input type="text" class="attr-input-text col-12">
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: "agreement",
        data() {
            return {
                dateBeg : new Date(new Date().getFullYear(), new Date().getMonth(),  new Date().getDate(), 6).toJSON().slice(0, 10),
                dateEnd : new Date(new Date().getFullYear(), new Date().getMonth(),  new Date().getDate(), 6).toJSON().slice(0, 10),
                period : 12,
                showParticipantForm : false,
            }
        },
        mounted(){
            this.dateEnd = this.$moment(this.dateBeg, 'YYYY-MM-DD')
                .add(this.period, 'month')
                .add(-1, 'days')
                .format('YYYY-MM-DD');
        },
        props : {

        },
        watch: {
            period(val){
                val = parseInt(val);
                if(val > 0 && val < 13){
                    this.dateEnd = this.$moment(this.dateBeg, 'YYYY-MM-DD')
                        .add(this.period, 'month')
                        .add(-1, 'days')
                        .format('YYYY-MM-DD');
                }else if(val !== 0){
                    this.dateEnd = this.$moment(this.dateBeg, 'YYYY-MM-DD')
                        .add(this.period/10 - 1, 'days')
                        .format('YYYY-MM-DD');
                }
            },
            dateBeg(val){
                val = parseInt(this.period);
                if(val > 0 && val < 13){
                    this.dateEnd = this.$moment(this.dateBeg, 'YYYY-MM-DD')
                        .add(this.period, 'month')
                        .add(-1, 'days')
                        .format('YYYY-MM-DD');
                }else if(val !== 0){
                    this.dateEnd = this.$moment(this.dateBeg, 'YYYY-MM-DD')
                        .add(this.period/10 - 1, 'days')
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