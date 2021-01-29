<template>
    <div class="modal fade p-0"
         id="create-docs"
         tabindex="-1"
         role="dialog"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg"
             role="document"
             style="transform: matrix(1, 0, 0, 1, 0, 0)">
            <div class="modal-content">
                <div class="modal-header p-sm-4 pt-md-4 pb-md-4 pl-md-5 pr-md-5">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <div>
                            <div class="d-flex align-items-center">
                                <button class="pl-3 pr-3 custom-btn-outlined border-right-0 text-uppercase"
                                        :class="modalType === 'api' ? 'custom-btn-outlined_active' : ''"
                                        @click="modalType = 'api'">api</button>
                                <button class="pl-3 pr-3 custom-btn-outlined text-uppercase"
                                        :class="modalType === 'kias' ? 'custom-btn-outlined_active' : ''"
                                        @click="modalType = 'kias'">kias</button>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="close"
                                    data-dismiss="modal"
                                    aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-body p-sm-4 pt-md-4 pb-md-4 pl-md-5 pr-md-5">
                    <create-apidocs v-if="modalType === 'api'"
                                    ref="apiDocs"></create-apidocs>
                    <create-kiasdocs v-if="modalType === 'kias'"
                                     ref="kiasDocs"></create-kiasdocs>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-end">
                        <button v-if="modalType === 'api'"
                                class="btn btn-success"
                                @click="$refs.apiDocs.createDocumentation()">Создать документацию</button>
                        <button v-if="modalType === 'kias'"
                                class="btn btn-success"
                                @click="$refs.kiasDocs.createDocumentation()">Создать документацию</button>
                    </div>
                </div>
            </div>
        </div>
        <flash-message v-if="showFlash"
                       :message="flashMessage"
                       :type="flashType"></flash-message>
    </div>
</template>

<script>
    export default {
        name: "modal",
        data() {
            return {
                modalType: 'api',
                showFlash: false,
                flashMessage: '',
                flashType: ''
            }
        },
        methods: {
            showFlashMessage(value) {
                this.showFlash = value
            },
            setFlashOptions(message, type) {
                this.flashMessage = message
                this.flashType = type
            }
        }
    }
</script>

<style scoped>

</style>
