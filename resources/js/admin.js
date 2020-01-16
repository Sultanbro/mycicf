require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios'

import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios);

Vue.component('treeselect', VueTreeselect.Treeselect);

Vue.component('login', require('./components/admin/login.vue').default);

Vue.component('dicti-list', require('./components/admin/dicti/list.vue').default);

Vue.component('role-list', require('./components/admin/role/list.vue').default);

Vue.component('role-new', require('./components/admin/role/new.vue').default);

Vue.component('parse-upload', require('./components/admin/parse/upload.vue').default);

Vue.component('parse-add-company', require('./components/admin/parse/addCompany.vue').default);
Vue.component('parse-edit-company', require('./components/admin/parse/editCompany.vue').default);
Vue.component('parse-add-product', require('./components/admin/parse/addProduct.vue').default);
Vue.component('parse-edit-product', require('./components/admin/parse/editProduct.vue').default);
Vue.component('parse-load-data', require('./components/admin/parse/loadData.vue').default);
Vue.component('parse-add-info', require('./components/admin/parse/addInfo.vue').default);

Vue.component('centcoin-list', require('./components/admin/centcoins/list.vue').default);
Vue.component('centcoin-history', require('./components/admin/centcoins/history.vue').default);
Vue.component('centcoin-spend', require('./components/admin/centcoins/spend.vue').default);
Vue.component('centcoin-replenish', require('./components/admin/centcoins/relpenish.vue').default);

Vue.component('org-structure', require('./components/admin/documentation/org-structure.vue').default);
Vue.component('svg-load', require('./components/admin/documentation/svg-load.vue').default);
Vue.component('image-load', require('./components/admin/documentation/image-load.vue').default);
Vue.component('menu-load', require('./components/admin/documentation/menu-load.vue').default);
Vue.component('pdf-load', require('./components/admin/documentation/pdf-load.vue').default);

Vue.component('menu-list', require('./components/admin/documentation/menu-list.vue').default);
Vue.component('svg-list', require('./components/admin/documentation/svg-list.vue').default);
Vue.component('word-list', require('./components/admin/documentation/word-list.vue').default);



window.onload = function(){
    var app = new Vue({
        el: '#app',
    });
};