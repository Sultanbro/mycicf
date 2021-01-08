<template>
    <div>
        <div class="border border-secondary rounded p-4 mb-3">
            <!-- Delete button block -->
            <div class="d-flex justify-content-end w-100">
                <button type="button"
                        class="delete-button"
                        v-if="index > 0"
                        @click="deleteDoc(index)">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- Title group block-->
            <div class="input-group mb-3">
                <div>
                    <span>Заголовок</span>
                </div>
                <div class="w-100">
                    <input type="text"
                           class="form-control"
                           :class="isTouched && activeField === 'title' && doc.title === '' ? 'is-invalid' : ''"
                           placeholder="Метод для ..."
                           @focus="activeField = 'title', isTouched = false"
                           @blur="isTouched = true"
                           v-model="doc.title"
                           required>
                    <div class="invalid-feedback">Необходимо заполнить данное поле</div>
                </div>
            </div>
            <!-- Method name group block -->
            <div class="input-group mb-3">
                <div>
                    <span>Название метода</span>
                </div>
                <div class="w-100">
                    <input type="text"
                           class="form-control"
                           :class="isTouched && activeField === 'method' && doc.methodName === '' ? 'is-invalid' : ''"
                           placeholder="calculate, save, ..."
                           @focus="activeField = 'method', isTouched = false"
                           @blur="isTouched = true"
                           v-model="doc.methodName"
                           required>
                    <div class="invalid-feedback">Необходимо заполнить данное поле</div>
                </div>
            </div>
            <!-- Version group block -->
            <div class="input-group mb-3">
                <div class="form-row w-100">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div>
                            <span>Версия</span>
                        </div>
                        <div class="w-100">
                            <input type="text"
                                   class="form-control"
                                   :class="isTouched && activeField === 'version' && doc.version === '' ? 'is-invalid' : ''"
                                   placeholder="v1, v2, ..."
                                   maxlength="3"
                                   v-model="doc.version">
                            <div class="invalid-feedback">Необходимо заполнить данное поле</div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div>
                            <span>Метод защиты</span>
                        </div>
                        <div class="w-100">
                            <select class="form-control"
                                    v-model="doc.securedBy">
                                <option :value="securityType"
                                        v-for="securityType in securityTypes">{{securityType}}</option>
                                <option value="" selected>Нет</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- URL group block -->
            <div class="mb-3">
                <div>
                    <span>URL адрес</span>
                </div>
                <div class="input-group w-100">
                    <div class="input-group-prepend">
                        <select class="form-control"
                                v-model="doc.method">
                            <option value="GET">GET</option>
                            <option value="POST">POST</option>
                            <option value="PUT">PUT</option>
                            <option value="DELETE">DELETE</option>
                            <option value="" selected hidden>Метод</option>
                        </select>
                    </div>
                    <input type="text"
                           class="form-control"
                           :class="isTouched && activeField === 'url' && doc.baseUrl === '' ? 'is-invalid' : ''"
                           placeholder="https://api.kupipolis.kz/..."
                           @focus="activeField = 'url', isTouched = false"
                           @blur="isTouched = true"
                           v-model="doc.baseUrl"
                           required>
                    <div class="invalid-feedback">Необходимо заполнить данное поле</div>
                </div>
            </div>
            <!-- Parameters group block -->
            <div>
                <div>
                    <h5 class="text-center">Параметры</h5>
                </div>
                <div>
                    <apidoc-element-param v-for="(param, index) in doc.params"
                                          :param="param"
                                          :index="index"
                                          :key="index"></apidoc-element-param>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="custom-plus-btn rounded pt-2 pb-2 pl-3 pr-3"
                            @click="createParam()">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <!-- Error group block -->
        </div>
    </div>
</template>

<script>
    export default {
        name: "apidoc-element",
        data() {
            return {
                param: {
                    paramName: '',
                    paramType: 'String',
                    description: '',
                    format: '',
                    required: 'false',
                },
                activeField: '',
                isTouched: false,
                isFocused: false,
                securityTypes: ['Token', 'OAuth2', 'JWT'],
            }
        },
        props: {
            doc: Object,
            index: Number
        },
        methods: {
            deleteDoc(index) {
                this.$parent.deleteDoc(index)
            },
            createParam() {
                this.doc.params = [...this.doc.params, {...this.param}]
            },
            deleteParam(index) {
                this.doc.params.splice(index, 1)
            }
        }
    }
</script>

<style scoped>

</style>
