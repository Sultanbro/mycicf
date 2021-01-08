require('../bootstrap');

import Vue from "vue";
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios);

Vue.component('preloader', require('./components/common/preloader.vue').default);
Vue.component('modal', require('./components/common/modal.vue').default);
Vue.component('apidoc-element', require('./components/apidocs/apidoc-element').default);
Vue.component('apidoc-errors', require('./components/apidocs/apidoc-errors').default);
Vue.component('apidoc-element-param', require('./components/apidocs/apidoc-element-param').default);
Vue.component('apidoc-description', require('./components/apidocs/apidoc-description').default);
Vue.component('apidoc-description-table', require('./components/apidocs/apidoc-description-table').default);
Vue.component('apidoc-param-table', require('./components/apidocs/apidoc-param-table').default);
Vue.component('apidoc-error-table', require('./components/apidocs/apidoc-error-table').default);
Vue.component('kiasdoc-element', require('./components/kiasdocs/kiasdoc-element').default);
Vue.component('kiasdoc-errors', require('./components/kiasdocs/kiasdoc-errors').default);
Vue.component('kiasdoc-element-param', require('./components/kiasdocs/kiasdoc-element-param').default);
Vue.component('create-apidocs', require('./components/apidocs/create-apidocs.vue').default);
Vue.component('create-kiasdocs', require('./components/kiasdocs/create-kiasdocs.vue').default);
Vue.component('header-component', require('./components/common/header-component.vue').default);
Vue.component('footer-component', require('./components/common/footer-component.vue').default);
Vue.component('sidebar-component', require('./components/common/sidebar-component.vue').default);

window.onload = function(){
    var app = new Vue({
        el: '#documentation-app',
    });
};
