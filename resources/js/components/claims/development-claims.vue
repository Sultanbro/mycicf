<template >
    <div class="mt-4 ml-2 mr-2">
        <div class="mb-2 bg-white rounded">

            <div class="d-flex justify-content-between bg-top pl-4 pt-2 pb-2 pr-4">
                <div>
                    <span class="bold">Подайте заявку на разработку</span>
                </div>
            </div>

            <div class="d-flex">
                <div class="d-flex ml-4 w-100">
                    <div class="pt-2 pb-2 hide-medium-small">
                        <img src="/images/avatar.png" class="image-circle-add-post" v-if="fakeImage">
                        <img :src="imageUrl" @error="fakeImage = true" class="image-circle-add-post" v-else>
                    </div>
                    <div class="w-100 h-100 wrapper pl-4 mt-4">
                        Я как <input v-model="claims.role" type="text" class="attr-input-text pl-2 text-center" placeholder="укажите роль">
                        хочу <input v-model="claims.want" type="text" class="attr-input-text pl-2 text-center" placeholder="укажите что"> для того,
                        чтобы <input v-model="claims.what_for" type="text" class="attr-input-text pl-2 text-center" placeholder="укажите зачем">
                    </div>
                </div>
            </div>

            <div class="d-flex w-100 horizontal-line"></div>

            <div class="m-auto col-md-12 c-0f9 pt-3 text-center" v-if="claimSended">Заявка успешно отправлена</div>
            <div class="flex-row">
                <div class="flex-row ml-4 mr-4 pb-2 pt-2 w-100 mt-2 mb-2">
                    <transition name="transition-opacity">
                        <div class="icons-bg m-auto">
                            <button class="pt-1 pb-1 pr-2 pl-2 common-btn" @click="sendClaim()">Отправить заявку</button>
                        </div>
                    </transition>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "development-claims",
        data() {
            return {
                fakeImage : false,
                imageUrl : null,
                claimSended: false,
                claims: {
                    role: '',
                    want: '',
                    what_for: '',
                    claim_type: 'development'
                }
            }
        },

        props: {
            isn: Number,
        },

        mounted: function() {
            this.imageUrl = "/storage/images/employee/" + this.isn + ".png";
        },

        methods: {
            sendClaim(){
                for(let index in this.claims){
                    if(this.claims[index] == ''){
                        alert('Заполните пожалуйста все поля');
                        return false;
                    }
                }
                this.preloader(true);
                this.axios.post('/save-dev-claims', {
                    claims: this.claims
                })
                    .then(response => {
                        if(response.data.success){
                            this.claimSended = true;
                            this.preloader(false);
                        }else{
                            alert(response.data.error);
                            this.preloader(false);
                        }
                    })
                    .catch(error => {
                        alert(error);
                        this.preloader(false);
                    });
            },
            preloader(show) {
                document.getElementById("preloader").style.display = show ? "flex" : "none";
            }
        },
        watch: {
            claims: {
                handler(val){
                    this.claimSended = false;
                },
                deep: true
            }
        }
    }
</script>

<style scoped>
    .rounded {
        border-radius: 16px !important;
    }

    .bg-top {
        background-color: #D9D9D9;
        border-radius: 16px 16px 0 0;
    }

    .avatar {
        height: 75px;
    }

    .post-textarea {
        box-sizing: border-box;
        outline: none;
    }

    .horizontal-line {
        border: 0.3px solid #A2A2A2;
    }

    .icons-bg {
        background-color: #EFEFEF;
        border-radius: 6px;
        margin: 0;
    }

    input[type="file"] {
        display:none;
    }

    .custom-file-upload {
        display: inline-block;
        cursor:pointer;
        color: inherit;
        transition: 0.4s ease;
        margin: 0;
    }

    .file-icons {
        transition: 0.4s ease;
    }

    .icons-bg:hover .custom-file-upload,
    .icons-bg:hover .file-icons
    {
        color: cornflowerblue;
    }


    .load-button {
        height: 2.1em;
        color: #000;
        background-color: #FFF;
        border: none;
        border-radius: 5px;
        transition: 0.4s ease;
        outline: none !important;
    }

    .load-button:hover {
        transition: 0.4s ease;
        background-color: #66ff00;
    }

    .image-container {
        position: relative;
    }

    .layer {
        position: absolute;
        z-index: 1;
        width: 100%;
        height: 100%;
        transition: 0.4s ease-in-out;
    }

    .delete-image-button {
        display: none;
        right: 0;
        position: absolute;
        z-index: 2;
        border: none;
        background-color: #000;
        outline: none;
        transition: 0.4s ease-in-out;
    }

    .delete-image-button i {
        color: #FFF;
    }

    .image-container:hover .layer {
        transition: 0.4s ease;
        background-color: rgba(0, 0, 0, 0.8);
    }

    .image-container:hover .delete-image-button {
        cursor: pointer;
        display: block;
    }

    .button-delete {
        cursor: pointer;
        outline: none;
        transition: 0.4s ease;
    }

    .button-delete:hover {
        color: red;
    }

    .c-0f9{
        color: #0f9f23;
    }

    @media only screen and (max-width: 1620px) {
        .hide-medium-small {
            display:none;
        }
    }
</style>
