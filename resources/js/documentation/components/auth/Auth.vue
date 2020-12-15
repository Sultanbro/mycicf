<template>
    <div @keydown.enter="login">
        <div class="row d-flex justify-content-center">
            <div class="auth-card col-12">
                <h2 class="text-center text-uppercase mb-4">
                    <strong>docs.cic.kz</strong>
                </h2>
                <form class="pl-4 pr-4" method="POST">
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <div class="input-group-prepend m-0">
                                <span class="input-icon-container input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div>
                            <input type="text"
                                   class="form-control custom-input border-0 p-4"
                                   placeholder="Имя пользователя КИАС"
                                   v-model="user.username">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="input-group">
                            <div class="input-group-prepend m-0">
                                <span class="input-icon-container input-group-text">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                            <input :type="isPasswordShown ? 'text' : 'password'"
                                   class="custom-input form-control border-0 p-4"
                                   placeholder="Пароль"
                                   v-model="user.password">
                            <div class="input-group-append m-0"
                                 @click="showPassword">
                                <span class="input-icon-container input-group-text">
                                    <i :class="isPasswordShown ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button"
                                class="btn custom-btn pt-2 pb-2 pl-4 pr-4"
                                @click="login"
                                :disabled="!user.username || !user.password">Войти</button>
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
                              if(response.data.success) {
                                  location.href = '/main'
                              }
                          })
                          .catch(error => {
                              alert(error)
                          })
                          .finally(() => {
                              this.setIsLoading(false)
                              this.user.username = ''
                              this.user.password = ''
                          })
            },
            setIsLoading(value) {
                this.isLoading = value
            },
            showPassword() {
                this.isPasswordShown = !this.isPasswordShown
            }
        }
    }
</script>

<style scoped>
</style>
