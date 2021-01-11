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
                           :class="touchedFields.includes('title') && doc.title === '' ? 'is-invalid' : ''"
                           placeholder="Метод для ..."
                           @blur="pushTouched('title')"
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
                           :class="touchedFields.includes('method') && doc.methodName === '' ? 'is-invalid' : ''"
                           placeholder="GetDictiList, GetAgrObjectClassList, ..."
                           @blur="pushTouched('method')"
                           v-model="doc.methodName"
                           required>
                    <div class="invalid-feedback">Необходимо заполнить данное поле</div>
                </div>
            </div>
            <!-- Parameters group block -->
            <div>
                <div>
                    <h5 class="text-center">Параметры</h5>
                </div>
                <div v-for="(param, index) in doc.params">
                    <kiasdoc-element-param :param="param"
                                           :index="index"
                                           :key="index"></kiasdoc-element-param>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="custom-plus-btn rounded pt-2 pb-2 pl-3 pr-3"
                            @click="createParam">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "kiasdoc-element",
        data() {
            return {
                param: {
                    paramName: '',
                    paramType: 'String',
                    description: '',
                    format: '',
                    required: '',
                },
                touchedFields: [],
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
                this.doc.params.push({...this.param})
            },
            deleteParam(index) {
                this.doc.params.splice(index, 1)
            },
            pushTouched(field) {
                if(!this.touchedFields.includes(field)) {
                    this.touchedFields.push(field)
                }
                else
                    return
            },
        }
    }
</script>

<style scoped>

</style>
