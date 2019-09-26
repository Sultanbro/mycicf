<template>
    <div class="col-lg-6"> <!-- Second column-->
        <div class="users d-flex justify-content-center">
            <img src="images/users-white-image.png" alt="users image" class="users__image">
        </div>
        <div class="login-form">
            <div class="input-container d-flex justify-content-center">
                <div class="input-container__background">
                    <i class="fa fa-user-o fa-input" aria-hidden="true"></i>
                    <input type="text" name="username" v-model="username" class="input-field" placeholder="Логин">
                </div>
            </div>
            <div class="input-container d-flex justify-content-center">
                <div class="input-container__background">
                    <i class="fa fa-lock fa-input" aria-hidden="true"></i>
                    <input v-bind:type="passwordType" v-model="password" class="input-field" placeholder="Пароль">
                    <button type="button" @click="checkType" class="show-btn">
                        <i v-bind:class="className" aria-hidden="true" id="icon"></i>
                    </button>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button @click="login" class="btn-block">Войти</button>
            </div>
        </div>
    </div> <!-- Second column-->
</template>

<script>
    export default {
        name: "login",
        data() {
            return {
                passwordType: 'password',
                className: 'fa fa-eye',
                type: 0,
                username : '',
                password : '',
            }
        },
        methods: {
            login: function () {
                if(!this.validate()){
                    return;
                }
                this.axios.post('/login', {username: this.username, password: this.password}).then((response) => {
                    this.afterLogin(response.data)
                })
            },
            afterLogin: function (response) {
                if(!response.success){
                    alert(response.error);
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
            }
        },
        watch: {
            type : ['changeIcon', 'changeType']
        }

    }
</script>
