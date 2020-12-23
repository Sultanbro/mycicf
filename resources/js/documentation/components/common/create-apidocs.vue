<template>
    <div>
        <div v-for="(doc, index) in docs" :key="index">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Тест2</span>
                </div>
                <input type="text"
                       class="form-control"
                       :class="isTouched && activeField === 'method' && doc.method === '' ? 'is-invalid' : ''"
                       @focus="activeField = 'method', isTouched = false"
                       @blur="isTouched = true"
                       :id="`method-${index}`"
                       name="method"
                       v-model="docs.method"
                       required>
                <div class="invalid-feedback">тут другой текст</div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button class="custom-add-btn-outlined pt-2 pb-2 pl-3 pr-3"
                    @click="createDoc">Добавить документацию</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "create-apidocs",
        data() {
            return {
                docs: [],
                docElement: {
                    title: '',
                    methodName: '',
                    version: '',
                    baseUrl: '',
                    securedBy: '',
                    method: '',
                    params: [],
                    errors: [],
                    returnValue: ''
                },
                activeField: '',
                isTouched: false,
                isFocused: false,
            }
        },
        mounted() {
            this.docs.push(this.docElement)
        },
        methods: {
            createDoc() {
                this.docs.push(this.docElement)
            }
        }
    }
</script>

<style scoped>

</style>
