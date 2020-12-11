window.Vue = require('vue');
import Vue from "vue";

import axios from 'axios'
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios);

Vue.component('Root', require('./components/auth/Root.vue').default);
Vue.component('Auth', require('./components/auth/Auth.vue').default);
Vue.component('Preloader', require('./components/common/Preloader.vue').default);

window.onload = function(){
    var app = new Vue({
        el: '#documentation-login',
    });
};
