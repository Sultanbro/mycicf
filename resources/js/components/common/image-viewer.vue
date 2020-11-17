<template>
    <div class="">
        <div class="modal fade bd-example-modal-lg height100vh" :id="`post-modal-${index}`">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="relative d-flex">
                        <div class="relative">
                            <img class="w-100 image-container" :src="imageArray[imageIndex]"/>
                            <div class="absolute d-flex justify-content-center w-100">
                                <span class="color-white">
                                    {{imageIndex + 1}} из {{imageArray.length}}
                                </span>
                            </div>
                        </div>

                        <div class="d-flex align-items-center absolute w-100 height100 image-arrows">
                            <div class="absolute d-flex justify-content-start zi-2">
                                <div class="image-arrows__inner pointer p-3" @click="prev">
                                    <i class="fas fa-chevron-left fs-2 color-white"></i>
                                </div>
                            </div>
                            <div class="absolute width100 d-flex justify-content-end">
                                <div class="image-arrows__inner pointer p-3" @click="next">
                                    <i class="fas fa-chevron-right fs-2 color-white"></i>
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
        name: "image-viewer",
        data() {
            return {
                caretClass: 'fa-chevron-down',
                imageIndex: 0,
                imageArray: [...this.array]
            }
        },

        props: {
            array: Array,
            index: Number
        },

        methods: {
            prev() {
                if(this.imageIndex === 0) {
                    this.imageIndex = this.imageArray.length - 1;
                }
                else {
                    this.imageIndex--;
                }
            },
            next() {
                if(this.imageIndex === this.imageArray.length - 1) {
                    this.imageIndex = 0;
                }
                else {
                    this.imageIndex++;
                }
            },
        },
    }
</script>

<style>
    .image-arrows {
        display: none;
    }

    .image-arrows__inner {
        transition: 0.4s ease;
        background-color: rgba(0, 0, 0, 0.8);
    }

    .image-container:hover .image-arrows{
        display: block;
    }

</style>
