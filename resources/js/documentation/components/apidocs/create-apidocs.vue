<template>
    <div>
        <div class="mb-3">
            <h3 class="text-center">Наименование категории</h3>
            <input type="text"
                   class="form-control"
                   :class="isTouched && activeField === 'category' && categoryName === '' ? 'is-invalid' : ''"
                   placeholder="Oktell, Bestsender, Aviata, Choco, ..."
                   @focus="activeField = 'category', isTouched = false"
                   @blur="isTouched = true"
                   v-model="categoryName"
                   required>
            <div class="invalid-feedback">Необходимо заполнить данное поле</div>
        </div>
        <div>
            <apidoc-element v-for="(doc, index) in docs"
                            :doc="doc"
                            :index="index"
                            :key="index"></apidoc-element>
        </div>
        <div class="d-flex justify-content-center mb-3">
            <button class="custom-add-btn-outlined rounded pt-2 pb-2 pl-3 pr-3"
                    @click="createDoc">Добавить документацию</button>
        </div>
        <div class="mb-3">
            <div class="error-card p-4">
                <div>
                    <h5 class="text-center">Список ошибок</h5>
                </div>
                <apidoc-errors v-for="(error, index) in errors"
                               :error="error"
                               :index="index"
                               :key="index"></apidoc-errors>
                <div class="d-flex justify-content-center">
                    <button class="custom-btn-secondary rounded pt-2 pb-2 pl-3 pr-3 mt-3"
                            @click="createError">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
        <preloader v-if="isLoading"></preloader>
    </div>
</template>

<script>
    export default {
        name: "create-apidocs",
        data() {
            return {
                categoryName: '',
                docs: [
                    {
                        title: '',
                        methodName: '',
                        version: '',
                        baseUrl: '',
                        securedBy: '',
                        method: 'GET',
                        params: [],
                        returnValue: ''
                    }
                ],
                docElement: {
                    title: '',
                    methodName: '',
                    version: '',
                    baseUrl: '',
                    securedBy: '',
                    method: 'GET',
                    params: [],
                    returnValue: ''
                },
                errors: [
                    {
                        errorCode: '',
                        description: ''
                    }
                ],
                errorElement: {
                    errorCode: '',
                    description: ''
                },
                activeField: '',
                isTouched: false,
                isFocused: false,
                isLoading: false,
            }
        },
        methods: {
            createDoc() {
                this.docs = [...this.docs, {...this.docElement}]
            },
            createError() {
                this.errors = [...this.errors, {...this.errorElement}]
            },
            deleteDoc(index) {
                this.docs.splice(index, 1)
            },
            deleteError(index) {
                this.errors.splice(index, 1)
            },
            createDocumentation() {
                console.log("here")

                this.setIsLoading(true)

                const url = '/main/create'

                this.axios.post(url, {
                        type: 'api',
                        categoryName: this.categoryName,
                        docs: this.docs,
                        errors: this.errors
                    })
                    .then(response => {
                        console.log(response)
                    })
                    .catch(error => {

                    })
                    .finally(() => {
                        this.setIsLoading(false)
                    })
            },
            setIsLoading(value) {
                this.isLoading = value
            }
        }
    }
</script>

<style scoped>

</style>
