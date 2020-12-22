<template>
    <div class="header" @onscroll="bottomOfWindow">
       <div class="container d-flex justify-content-between align-items-center">
           <div class="header-logo">
                <h4 v-if="showToTopBtn"
                    class="m-0 text-white text-uppercase pointer"
                    @click="goToTop">
                   <strong>Наверх</strong>
                </h4>
                <h4 v-else class="m-0 text-white text-uppercase pointer"
                    @click="goHome">
                    <strong>docs.cic.kz</strong>
                </h4>
           </div>
           <div class="header-auth">
               <button class="btn custom-btn"
                       @click="logout"
                       :disabled="isLoading">Выйти</button>
           </div>
           <preloader v-if="isLoading"></preloader>
       </div>
    </div>
</template>

<script>
    export default {
        name: "header-component",
        data() {
            return {
                bottomOfWindow: 0,
                showToTopBtn: false,

                isLoading: false
            }
        },
        beforeMount() {
            window.addEventListener("scroll", this.handleScroll)
        },
        beforeDestroy() {
            window.removeEventListener("scroll", this.handleScroll)
        },
        methods: {
            handleScroll() {
                this.showToTopBtn = document.documentElement.scrollTop > 50
            },
            goToTop() {
                window.scroll({
                    top: 0,
                    left: 0,
                    behavior: 'smooth'
                });
            },
            goHome() {
                this.setLoading(true);
                location.href = '/main'
            },
            setLoading(value) {
                this.isLoading = value;
            },
            logout() {
                this.setLoading(true)
                this.axios.get('/logout')
                          .then(response => {
                              if(response.data.success) {
                                  location.href = '/'
                              }
                          })
                          .catch(error => alert(error))
                          .finally(() => {
                              this.setLoading(false)
                          })
            }
        }
    }
</script>

<style scoped>

</style>
