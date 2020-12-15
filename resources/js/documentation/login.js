window.Vue = require('vue');
import Vue from "vue";

import axios from 'axios'
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios);

Vue.component('root', require('./components/auth/root.vue').default);
Vue.component('auth', require('./components/auth/auth.vue').default);
Vue.component('preloader', require('./components/common/preloader.vue').default);

window.onload = function(){
    var app = new Vue({
        el: '#documentation-login',
    });
};
