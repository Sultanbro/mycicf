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
        <div v-for="(doc, index) in docs">
            <kiasdoc-element :doc="doc" :index="index" :key="index"></kiasdoc-element>
        </div>
        <div class="d-flex justify-content-center">
            <button class="custom-add-btn-outlined rounded pt-2 pb-2 pl-3 pr-3"
                    @click="createDoc">Добавить документацию</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "create-kiasdocs",
        data() {
            return {
                categoryName: '',
                docs: [],
                docElement: {
                    title: '',
                    methodName: '',
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
            this.docs.push({...this.docElement})
        },
        methods: {
            createDoc() {
                this.docs.push({...this.docElement})
            },
            deleteDoc(index) {
                this.docs.splice(index, 1)
            }
        }
    }
</script>

<style scoped>

</style>
