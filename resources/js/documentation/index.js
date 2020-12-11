window.Vue = require('vue');
import Vue from "vue";

import axios from 'axios'
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios);

window.onload = function(){
    var app = new Vue({
        el: '#documentation-app',
    });
};
