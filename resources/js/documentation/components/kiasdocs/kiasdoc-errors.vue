<template>
    <div>
        <div class="input-group rounded pl-3 pr-3 pb-2"
             :class="index === 0 ? 'pt-2' : ''">
            <!-- Delete button block -->
            <div class="d-flex justify-content-end w-100 mb-0"
                 :class="index !== 0 ? 'pt-2 border-top border-danger' : ''">
                <button type="button"
                        class="delete-button text-white"
                        v-if="index > 0"
                        @click="deleteError(index)">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- Error fields block -->
            <div class="form-row w-100 mb-3">
                <div class="col-sm-12 col-md-12 col-lg-6 ">
                    <div>
                        <span>Код ошибки</span>
                    </div>
                    <input type="number"
                           class="form-control"
                           placeholder="401, 404, 500, ..."
                           v-model="error.errorCode"
                           required>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div>
                        <span>Описание</span>
                    </div>
                    <input type="text"
                           class="form-control"
                           placeholder="Данные не найдены, ..."
                           v-model="error.description"
                           required>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "kiasdoc-errors",
        props: {
            error: Object,
            index: Number
        },
        methods: {
            deleteError(index) {
                this.$parent.deleteError(index)
            }
        }
    }
</script>

<style scoped>

</style>
