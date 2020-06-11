require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios'

import VueAxios from 'vue-axios'

Vue.use(require('vue-moment'));

Vue.use(VueAxios, axios);

Vue.component('agreement', require('./components/product/agreement.vue').default);
Vue.component('agr-attributes', require('./components/product/attributes.vue').default);
Vue.component('agr-roles', require('./components/product/roles.vue').default);
Vue.component('agr-drivers', require('./components/product/drivers.vue').default);
Vue.component('participant-form', require('./components/product/participantForm.vue').default);
window.onload = function(){
    var app = new Vue({
        el: '#order',
    });
};
