<template>
    <div class="login-form width100">
        <div class="input-container d-flex">
            <div class="input-container__background width100">
<!--                               <i class="fa fa-user-o fa-input mobile-input-icons" aria-hidden="true"></i>-->
                <input type="text" name="username" v-model="username" class="input-field width100 mobile-input-login color-white mobile-input pl-4 pr-0" placeholder="Логин">
            </div>
        </div>
        <div class="input-container d-flex">
            <div class="input-container__background width100 flex-row">
<!--                                 <i class="fa fa-lock fa-input mobile-input-icons" aria-hidden="true"></i>-->
                <input :type="passwordType" v-model="password" @keydown.enter="login" class="width100 mobile-input-password input-field color-white mobile-input pl-4 pr-0" placeholder="Пароль">
                <button type="button" class="show-btn color-white mobile-input-password-icon pl-3 pr-3" @click="checkType">
                    <i class="fa fa-eye" aria-hidden="true" id="icon"></i>
                </button>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <button @click="login" class="btn-block mt-0 mobile-input mobile-button-login">Войти</button>
        </div>
        <div class="input-container">
            <div class="color-white vertical-middle flex-column mobile-social-contain">
                <div>
                    <span class="fs-0_8">Подписывайтесь на наши социальные сети</span>
                </div>
                <div class="social-network__icons mt-3">
                    <a href="http://www.instagram.com/centras.insurance/" class="social-network__link color-white ml-4 mr-4 mobile-social-icons"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                    <a href="http://www.facebook.com/kupipolis.kz/" class="social-network__link color-white ml-4 mr-4 mobile-social-icons"><i class="fab fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="http://www.youtube.com/channel/UCf2GyNgEwFys5JdN4g6x4LQ" class="social-network__link color-white ml-4 mr-4 mobile-social-icons"><i class="fab fa-youtube" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "login",

        data() {
            return {
                passwordType: 'password',
                className: 'fa fa-eye',
                type: 1,
                username : '',
                password : '',
            }
        },

        methods: {
            login: function () {
                // this.preloader(true);
                if(!this.validate()){
                    // this.preloader(false)
                    return;
                }
                this.axios.post('/login', {username: this.username, password: this.password})
                    .then((response) => {
                        this.afterLogin(response.data)
                    })
                    .catch(response => {
                        alert(response);
                        // this.preloader(false)
                    })
            },
            afterLogin: function (response) {
                if(!response.success){
                    alert(response.error);
                    // this.preloader(false)
                }

                if(response.success){
                    location.href = '/dossier';
                }
            },
            validate: function () {
                var result = true;
                if(this.username === ''){
                    result = false;
                }

                if(this.password === ''){
                    result = false;
                }
                return result;
            },
            checkType: function () {
                this.type = this.type === 1 ? 0 : 1;
            },
            changeIcon: function () {
                if(this.type === 0){
                    this.className = 'fa fa-eye-slash';
                }else{
                    this.className = 'fa fa-eye';
                }
            },
            changeType: function () {
                if(this.type === 0){
                    this.passwordType = 'text';
                }else{
                    this.passwordType = 'password';
                }
            },
        },
        watch: {
            type : ['changeIcon', 'changeType']
        }
    }

</script>

<style scoped>

</style>