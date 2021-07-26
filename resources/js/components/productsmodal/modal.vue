<!--suppress SpellCheckingInspection -->
<template>
    <div class="">
        <div class="modal fade bd-example-modal-lg" id="test" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content products-margin modal-lg-custom modal-custom-border-top">
                    <div>
                        <div class="bg-blue-standart modal-custom-border-top">
                            <div class="border-bottom-white">
                                <div class="pl-5 pt-4 pb-4 pr-5">
                                    <div @click="close"
                                         class="color-white-standart vertical-middle pt-3 pb-3 inline pointer">
                                        <i class="fas fa-chevron-circle-left"></i>
                                        <span class="pl-1">НАЗАД</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "productsmodal-modal",
        data() {
            return {
                Remark: "",
                resolution: "0",
            }
        },
        props: {

        },
        methods: {

            close() {
                this.$parent.$refs.modalButton.click()
            },

        },
    }
</script>

<style scoped>

</style>
