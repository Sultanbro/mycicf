<template>
    <div class="mt-2 mb-2 ml-0 agreement-block">
        <h4>{{attribute.Label}}</h4>
        <div>
            <div v-if="attribute.Type === 'TEXT'" class="d-flex align-items-center mb-2">
                <label class="bold mb-0 mr-2">Значение: </label>
                <input v-if="attribute.AttrISN != 831381" type="text" class="attr-input-text w-100" v-model="attribute.Value">
                <input v-if="attribute.AttrISN == 831381" type="tel" v-model="attribute.Value" v-mask="'+###########'" class="attr-input-text w-100">
            </div>
            <div v-else-if="attribute.Type === 'CHECKBOX'" class="d-flex align-items-center mb-2">
                <label class="bold mb-0 mr-2">Значение: </label>
                <input type="checkbox" class="attr-input-text w-100"  v-model="attribute.Value">
            </div>
            <div v-else-if="attribute.Type === 'DICTI'" class="d-flex align-items-center mb-2">
                <label class="bold mb-0 mr-2">Значение: </label>
                <select class="custom-select" v-model="attribute.Value">
                    <option v-for="dicti in attribute.Childs" :value="dicti.Value">{{dicti.Label}}</option>
                </select>
            </div>
            <div v-else-if="attribute.Type === 'DATE'" class="d-flex align-items-center mb-2">
                <label class="bold mb-0 mr-2">Значение: </label>
                <input type="date" class="attr-input-text w-100"  v-model="attribute.Value">
            </div>
            <div v-else class="d-flex align-items-center mb-2">
                <label class="bold mb-0 mr-2">Значение: </label>
                <input type="number" class="attr-input-text w-100"  v-model="attribute.Value">
            </div>
            <!--div class="d-flex align-items-center mb-2">
                <label class="bold mb-0 mr-2">Примечание: </label>
                <input type="text" class="attr-input-text w-100"  v-model="attribute.Remark">
            </div-->
        </div>
    </div>
</template>

<script>
    import {mask} from 'vue-the-mask'
    export default {
        name: "attributes",
        data() {
            return {

            }
        },
        directives: {mask},
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
