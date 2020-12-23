<template>
    <div class="modal fade" id="create-docs" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header p-3">
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
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-body p-3">
                    <create-apidocs v-if="modalType === 'api'"></create-apidocs>
                    <create-kiasdocs v-if="modalType === 'kias'"></create-kiasdocs>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "modal",
        data() {
            return {
                modalType: 'api',
            }
        },
    }
</script>

<style scoped>

</style>
