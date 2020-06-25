<template>
    <div class="mt-2 mb-2 ml-0">
        <div  v-if="quotationId == 0 && contract_number == null" class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12 text-center mb-4">
            <label for="inspection" class="bold">Пердстраховой осмотр </label>
            <input type="checkbox" class="mt-2 ml-2" id="inspection" v-model="inspection.active" value="true" @change="calcChanged">
        </div>

        <div v-if="inspection.active" class="mt-2 mb-2 ml-0 agreement-block">
            <div class="row">
                <div class="col-md-6 align-items-center mb-2">
                    <label class="mb-0 mr-2">Дата осмотра</label>
                    <input type="text" class="attr-input-text w-100" v-model="inspection.date" @keyup="calcChanged" v-mask="'##.##.####'" placeholder="день-месяц-год">
                </div>
                <div class="col-md-6 align-items-center mb-2">
                    <label class="mb-0 mr-2">Время осмотра</label>
                    <input type="text" class="attr-input-text w-100" v-model="inspection.time" @keyup="calcChanged" v-mask="'##:##'" placeholder="час-минуты">
                </div>
                <div class="col-md-12 align-items-center mb-2">
                    <label class="mb-0 mr-2">Местонахождения объекта</label>
                    <input type="text" class="attr-input-text w-100" v-model="inspection.address" @keyup="calcChanged" placeholder="Укажите местоположение объекта">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mask} from 'vue-the-mask'
    export default {
        name: "online-inspection",
        data() {
            return {

            }
        },
        directives: {mask},
        props: {
            quotationId: String,
            contract_number: String,
            calcChanged: Function,
            inspection: Object
        },
        created(){

        }
    }
</script>

<style scoped>
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>
