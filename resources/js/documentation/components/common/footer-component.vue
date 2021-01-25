<template>
    <footer class="footer">
        <div class="container d-flex align-items-center p-2">
            <div class="row w-100">
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3 mb-sm-3 mb-md-0">
                    <div class="footer-title d-flex justify-content-center justify-content-sm-center justify-content-md-start justify-content-lg-start">
                        <small class="text-white">
                            <span>©1997-{{dateTo}} АО "СТРАХОВАЯ КОМПАНИЯ "СЕНТРАС ИНШУРАНС"</span>
                            <br>
                            <span>ВСЕ ПРАВА ЗАЩИЩЕНЫ</span>
                        </small>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="d-flex align-items-center justify-content-center justify-content-sm-center justify-content-md-end justify-content-lg-end">
                        <div class="mr-2">
                            <small class="text-white">Github автора</small>
                        </div>
                        <div class="footer-logo">
                            <a href="https://www.github.com/amadeus-8" target="_blank">
                                <i class="fab fa-github"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        name: "footer-component",
        data() {
            return {
                dateTo: new Date().getFullYear()
            }
        }
    }
</script>

<style scoped>

</style>
