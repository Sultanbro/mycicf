<template>
    <div @keydown.enter="login" class="col-lg-6 column-2"> <!-- Second column-->
        <div class="users d-flex justify-content-center" v-if="!bitrixData.isBitrix">
            <img src="images/users-white-image.png" alt="users image" class="users__image">
        </div>
        <div class="login-form" v-if="!bitrixData.isBitrix">
            <div class="input-container d-flex justify-content-center">
                <div class="input-container__background">
                    <i class="fa fa-user-o fa-input" aria-hidden="true"></i>
                    <input type="text" name="username" id="username" v-model="username" class="input-field" placeholder="Логин">
                </div>
            </div>
            <div class="input-container d-flex justify-content-center">
                <div class="input-container__background">
                    <i class="fa fa-lock fa-input" aria-hidden="true"></i>
                    <input :type="passwordType" v-model="password" id="password" class="input-field" placeholder="Пароль">
                    <button type="button" class="show-btn" @click="checkType">
                        <i :class="className" aria-hidden="true" id="icon"></i>
                    </button>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button @click="login" class="btn-block">Войти</button>
            </div>
        </div>

        <FlashMessage></FlashMessage>
    </div> <!-- Second column-->

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
                bitrixData: []
            }
        },
        methods: {
            login: function () {
                this.preloader(true);
                if(!this.validate()){
                    this.preloader(false)
                    return;
                }
                this.axios.post('/login', {username: this.username, password: this.password})
                .then((response) => {
                    this.afterLogin(response.data)
                })
                .catch(error => {
                    console.log(error.response);
                    if(error.response.status === 419){
                        this.flashMessage.error({
                            title: "Ошибка",
                            message: 'Пожалуйста обновите страницу или сайт будет обновлен автоматически',
                            time: 5000
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 5000);
                    }else {
                        this.flashMessage.error({
                            title: "Ошибка",
                            message: error.response.statusText,
                            time: 5000
                        });
                    }
                })
                .finally(() => {
                    if(!window.bitrixData.isBitrix) {
                        this.preloader(false)
                    }
                });
            },

            afterLogin: function (response) {
                if(response.success){
                    let url = 'news';
                    if(window.bitrixData.isBitrix){
                        url = 'full?isBitrix='+window.bitrixData.isBitrix;
                    }
                    location.href = '/'+url;
                }else{
                    this.flashMessage.error({
                        title: "Ошибка",
                        message: response.error,
                        time: 5000
                    });
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

            preloader(show){
                if(show)
                {
                    document.getElementById('preloader').style.display = 'flex';
                }
                else
                {
                    document.getElementById('preloader').style.display = 'none';
                }
            }
        },

        watch: {
            type : ['changeIcon', 'changeType']
        },

        created: function(){
            this.bitrixData = window.bitrixData;
            if(window.bitrixData.isBitrix){
                this.preloader(true);
                this.username = window.bitrixData.bitrixAuthData.username;
                this.password = window.bitrixData.bitrixAuthData.password;
                this.login();
            }
        }
    }
</script>
