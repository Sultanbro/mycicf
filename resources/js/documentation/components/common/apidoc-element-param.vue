<template>
    <div>
        <div class="param-card input-group p-4 mb-3">
            <!-- Delete button block -->
            <div class="d-flex justify-content-end w-100 mb-3">
                <button type="button"
                        class="delete-button text-white"
                        v-if="index > 0"
                        @click="deleteParam(index)">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- Parameter select block -->
            <div class="form-row w-100 mb-3">
                <div class="col-sm-12 col-md-6 col-lg-6 mb-sm-4 mb-lg-0 mb-md-0">
                    <select class="form-control" v-model="param.paramType">
                        <option :value="dataType" v-for="dataType in dataTypes">{{dataType}}</option>
                        <option value="" selected hidden>Тип параметра</option>
                    </select>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <select class="form-control" v-model="param.required">
                        <option value="true">Да</option>
                        <option value="false">Нет</option>
                        <option value="" selected hidden>Обязательный</option>
                    </select>
                </div>
            </div>
            <!-- Parameter description block -->
            <div class="form-row w-100">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div>
                        <span>Название</span>
                    </div>
                    <div class="w-100">
                        <input type="text"
                               class="form-control"
                               :class="isTouched && activeField === 'paramName' && param.paramName === '' ? 'is-invalid' : ''"
                               @focus="activeField = 'paramName', isTouched = false"
                               @blur="isTouched = true"
                               placeholder="tokem, isn, doc_id, ..."
                               v-model="param.paramName"
                               required>
                        <div class="invalid-feedback">Необходимо заполнить данное поле</div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div>
                        <span>Описание</span>
                    </div>
                    <div class="w-100">
                        <input type="text"
                               class="form-control"
                               :class="isTouched && activeField === 'description' && param.description === '' ? 'is-invalid' : ''"
                               @focus="activeField = 'description', isTouched = false"
                               @blur="isTouched = true"
                               placeholder="Тип документа, ИСН документа, ..."
                               v-model="param.description"
                               required>
                        <div class="invalid-feedback">Необходимо заполнить данное поле</div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div>
                        <span>Формат</span>
                    </div>
                    <div class="w-100">
                        <input type="text"
                               class="form-control"
                               :class="isTouched && activeField === 'format' && param.format === '' ? 'is-invalid' : ''"
                               placeholder="ДД.ММ.ГГ, +7(XXX), ..."
                               @focus="activeField = 'format', isTouched = false"
                               @blur="isTouched = true"
                               v-model="param.format">
                        <div class="invalid-feedback">Необходимо заполнить данное поле</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "apidoc-element-param",
        data() {
            return {
                activeField: '',
                isTouched: false,
                isFocused: false,

                dataTypes: [
                    'Boolean', 'Integer', 'Double', 'String', 'Array', 'Object', 'Resources', 'NULL'
                ]
            }
        },
        props: {
            param: Object,
            index: Number
        },
        methods: {
            deleteParam(index) {
                this.$parent.deleteParam(index)
            }
        }
    }
</script>

<style scoped>

</style>
