<template>
    <div>
        <div class="row d-flex justify-content-center">
            <div class="card col-12 p-5">
                <h3 class="text-center text-uppercase mb-4">docs.cic.kz</h3>
                <form class="pl-4 pr-4" method="POST">
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input type="text"
                                   class="form-control p-4"
                                   placeholder="Имя пользователя КИАС"
                                   v-model="user.username">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                            <input :type="isPasswordShown ? 'text' : 'password'"
                                   class="form-control p-4"
                                   placeholder="Пароль"
                                   v-model="user.password">
                            <div class="input-group-append"
                                 @click="showPassword">
                                <span class="input-group-text">
                                    <i :class="isPasswordShown ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button"
                                class="btn btn-danger pt-2 pb-2 pl-4 pr-4" @click="login">Войти</button>
                    </div>
                </form>
            </div>
        </div>
        <Preloader v-show="isLoading"></Preloader>
    </div>
</template>

<script>
    export default {
        name: "Auth",
        data() {
            return {
                isLoading: false,
                isPasswordShown: false,

                user: {
                    username: '',
                    password: '',
                }
            }
        },
        methods: {
            login() {
                this.setIsLoading(true)
                this.axios.post('/login', this.user)
                          .then(response => {
                              console.log(response)
                          })
                          .catch(error => {
                              alert(error)
                          })
                          .finally(() => {
                              this.setIsLoading(false)
                          })
            },
            setIsLoading(value) {
                this.isLoading = value;
            },
            showPassword() {
                this.isPasswordShown = !this.isPasswordShown;
            }
        }
    }
</script>

<style scoped>

</style>
