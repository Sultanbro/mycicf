<template>
    <div class="col-12 row mt-2 mb-2 ml-0 agreement-block">
        <h4>Оговорки и ограничения</h4>
        <div class="row col-12">
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Атрибут : </label>
                <div class="attr-text">
                    {{agrclause.Label}}
                </div>
            </div>
            <div v-if="agrclause.Type === 'TEXT'" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Значение : </label>
                <input type="text" class="attr-input-text col-12" v-model="agrclause.Value">
            </div>
            <div v-else-if="agrclause.Type === 'CHECKBOX'" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Значение : </label>
                <input type="checkbox" class="attr-input-text col-12"  v-model="agrclause.Value">
            </div>
            <div v-else-if="agrclause.Type === 'DICTI'" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Значение : </label>
                <select class="custom-select" v-model="agrclause.Value">
                    <option v-for="dicti in agrclause.Childs" :value="dicti.Value">{{dicti.Label}}</option>
                </select>
            </div>
            <div v-else-if="agrclause.Type === 'DATE'" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Значение : </label>
                <input type="date" class="attr-input-text col-12"  v-model="agrclause.Value">
            </div>
            <div v-else class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Значение : </label>
                <input type="number" class="attr-input-text col-12"  v-model="agrclause.Value">
            </div>
            <div class="col-lg-6 col-xl-6 col-12">
                <label class="bold">Примечание : </label>
                <input type="text" class="attr-input-text col-12"  v-model="agrclause.Remark">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "agr-clause",
        data() {
            return {

            }
        },
        props: {
            agrclause : Object,
        },
    }
</script>

<style scoped>
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>