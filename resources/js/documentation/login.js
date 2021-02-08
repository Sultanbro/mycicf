window.Vue = require('vue');
import Vue from "vue";

import axios from 'axios'
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios);

Vue.component('root', require('./components/auth/root').default);
Vue.component('auth', require('./components/auth/auth').default);
Vue.component('preloader', require('./components/common/preloader').default);
Vue.component('flash-message', require('./components/common/flash-message').default);

window.onload = function(){
    var app = new Vue({
        el: '#documentation-login',
    });
};
