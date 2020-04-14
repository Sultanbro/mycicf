<template>
    <div class="col-12 row mt-2 mb-2 ml-0 agreement-block">
        <h4>Дополнительные атрибуты договора</h4>
        <div class="row col-12">
            <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Атрибут : </label>
                <div class="attr-text">
                    {{attribute.Label}}
                </div>
            </div>
            <div v-if="attribute.Type === 'TEXT'" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Значение : </label>
                <input type="text" class="attr-input-text col-12" v-model="attribute.Value">
            </div>
            <div v-else-if="attribute.Type === 'CHECKBOX'" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Значение : </label>
                <input type="checkbox" class="attr-input-text col-12"  v-model="attribute.Value">
            </div>
            <div v-else-if="attribute.Type === 'DICTI'" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Значение : </label>
                <select class="custom-select" v-model="attribute.Value">
                    <option v-for="dicti in attribute.Childs" :value="dicti.Value">{{dicti.Label}}</option>
                </select>
            </div>
            <div v-else-if="attribute.Type === 'DATE'" class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Значение : </label>
                <input type="date" class="attr-input-text col-12"  v-model="attribute.Value">
            </div>
            <div v-else class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                <label class="bold">Значение : </label>
                <input type="number" class="attr-input-text col-12"  v-model="attribute.Value">
            </div>
            <div class="col-lg-6 col-xl-6 col-12">
                <label class="bold">Примечание : </label>
                <input type="text" class="attr-input-text col-12"  v-model="attribute.Remark">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "attributes",
        data() {
            return {

            }
        },
        props: {
            attribute : Object,
        },
    }
</script>

<style scoped>
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>