window.Vue = require('vue');
import Vue from "vue";

import axios from 'axios'
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios);

Vue.component('Header', require('./components/common/Header.vue').default);
Vue.component('Sidebar', require('./components/common/Sidebar.vue').default);
Vue.component('Footer', require('./components/common/Footer.vue').default);
Vue.component('Preloader', require('./components/common/Preloader.vue').default);

window.onload = function(){
    var app = new Vue({
        el: '#documentation-app',
    });
};
