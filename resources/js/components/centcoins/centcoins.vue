<template>
    <div class="col-md-2 blocks-small-borderRad-top blocks-small-borderRad-bot box-shadow padding0 mt-3 mb-3">
        <div>
            <div class="centcoins-bg-blue color-white">
                <div class="ml-4 mr-4 pt-2">
                    <a class="color-white-hover color-white" href="javascript:void(0)">
                        Назад
                    </a>
                    <div class="font-size-1_6">Сенткоины</div>
                    <div>
                        <small>Доступно</small>
                    </div>
                    <div class="flex-row jc-center">
                        <div class="font-size-4rem">
                            {{this.centcoins}}
                        </div>
                        <div class="font-size-3_8rem ml-2">
                            <img src="/images/centcoin-logo.png" class="centcoin">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <hr class="left-menu-border mb-0">
        </div>
        <div class="mb-5">
            <ul class="flex-column mr-3 ml-3">
                <a class="pt-2 pb-2 color-blue font-size-1_2" href="javascript:void(0)">
                    <li>
                        <i class="far fa-clipboard"></i>
                        <span>История операций</span>
                    </li>
                </a>
                <a class="pt-2 pb-2 color-blue font-size-1_2" href="javascript:void(0)">
                    <li>
                        <i class="far fa-thumbs-up"></i>
                        <span>Потратить Сенткоины</span>
                    </li>
                </a>
                <a class="pt-2 pb-2 color-blue font-size-1_2" href="javascript:void(0)">
                    <li>
                        <i class="far fa-grin-stars"></i>
                        <span>О Сенткоине</span>
                    </li>
                </a>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "centcoins",

        data() {
            return {
                centcoins: '',
            }
        },

        props: {
            isn: Number,
        },

        mounted() {
            this.getCentcoins();
        },

        methods: {
            getCentcoins: function () {
                this.axios.post('/getCentcoins', {isn: this.isn}).then(response => {
                    this.fetchCentcoins(response.data);
                });
            },

            fetchCentcoins(response) {
                this.centcoins = response;
            }
        }
    }
</script>

<style scoped>

</style>
