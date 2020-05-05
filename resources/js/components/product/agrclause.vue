<template>
    <div class="col-12 row mt-2 mb-2 ml-0 agreement-block">
        <h4>{{agrclause.Label}}</h4>
        <div class="w-100">
            <div v-if="agrclause.Type === 'TEXT'" class="d-flex align-items-center mb-2">
                <label class="bold mb-0 mr-2">Значение: </label>
                <input type="text" class="attr-input-text w-100" v-model="agrclause.Value" @change="calcChanged">
            </div>
            <div v-else-if="agrclause.Type === 'CHECKBOX'" class="d-flex align-items-center mb-2">
                <label class="bold mb-0 mr-2">Значение: </label>
                <input type="checkbox" class="attr-input-text w-100" v-model="agrclause.Value" @change="calcChanged">
            </div>
            <div v-else-if="agrclause.Type === 'DICTI'" class="d-flex align-items-center mb-2">
                <label class="bold mb-0 mr-2">Значение: </label>
                <select class="custom-select" v-model="agrclause.Value" @change="calcChanged">
                    <option v-for="dicti in agrclause.Childs" :value="dicti.Value">{{dicti.Label}}</option>
                </select>
            </div>
            <div v-else-if="agrclause.Type === 'DATE'" class="d-flex align-items-center mb-2">
                <label class="bold mb-0 mr-2">Значение: </label>
                <input type="date" class="attr-input-text w-100" v-model="agrclause.Value" @change="calcChanged">
            </div>
            <div v-else class="d-flex align-items-center mb-2">
                <label class="bold mb-0 mr-2">Значение: </label>
                <input type="number" class="attr-input-text w-100" v-model="agrclause.Value" @change="calcChanged">
            </div>
            <div class="d-flex align-items-center mb-2">
                <label class="bold mb-0 mr-2">Примечание: </label>
                <input type="text" class="attr-input-text w-100" v-model="agrclause.Remark" @change="calcChanged">
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
            calcChanged: Function
        },
    }
</script>

<style scoped>
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
</style>
