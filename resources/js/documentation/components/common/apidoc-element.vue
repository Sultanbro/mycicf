<template>
    <div>
        <div class="border border-secondary rounded p-4 mb-3">
            <div class="d-flex justify-content-end w-100">
                <button type="button"
                        class="delete-button"
                        v-if="index > 0"
                        @click="deleteDoc(index)">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- First group -->
            <div class="input-group mb-3">
                <div>
                    <span>Заголовок</span>
                </div>
                <div class="w-100">
                    <input type="text"
                           class="form-control"
                           :class="isTouched && activeField === 'title' && doc.title === '' ? 'is-invalid' : ''"
                           placeholder="Метод для..."
                           @focus="activeField = 'title', isTouched = false"
                           @blur="isTouched = true"
                           v-model="doc.title"
                           required>
                    <div class="invalid-feedback">Необходимо заполнить данное поле</div>
                </div>
            </div>
            <!-- Second group -->
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
            <!-- Third group -->
            <div class="input-group mb-3">
                <div class="form-row w-100">
                    <div class="col-sm-12 col-md-6 col-lg-6">
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
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div>
                            <span>Метод защиты</span>
                        </div>
                        <div class="w-100">
                            <input type="text"
                                   class="form-control"
                                   :class="isTouched && activeField === 'security' && doc.securedBy === '' ? 'is-invalid' : ''"
                                   placeholder="OAuth2, JWT, ..."
                                   v-model="doc.securedBy">
                            <div class="invalid-feedback">Необходимо заполнить данное поле</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fourth group -->
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
        </div>
    </div>
</template>

<script>
    export default {
        name: "apidoc-element",
        data() {
            return {
                activeField: '',
                isTouched: false,
                isFocused: false,
            }
        },
        props: {
            doc: Object,
            index: Number
        },
        methods: {
            deleteDoc(index) {
                this.$parent.deleteDoc(index)
            }
        }
    }
</script>

<style scoped>

</style>
