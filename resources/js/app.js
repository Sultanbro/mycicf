require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios'

import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios);

Vue.component('login', require('./components/registration/login.vue').default);

Vue.component('treeselect', VueTreeselect.Treeselect);

Vue.component('simple-info', require('./components/employee/simple-info.vue').default);

Vue.component('info', require('./components/employee/info.vue').default);

Vue.component('centcoins', require('./components/centcoins/centcoins.vue').default);

Vue.component('operations-history', require('./components/centcoins/operations-history.vue').default);

Vue.component('post', require('./components/news/post.vue').default);

Vue.component('news-post', require('./components/news/news-post.vue').default);

Vue.component('user-image', require('./components/employee/userImage.vue').default);

Vue.component('coordination', require('./components/employee/coordination.vue').default);

Vue.component('search', require('./components/documentation/search.vue').default);

Vue.component('coordination-modal', require('./components/coordination/modal.vue').default);

window.onload = function(){
    var app = new Vue({
        el: '#app',
        data: {
            value: null,
            // define options
            options: null,
            image: {
                encoded: 0,
            },
        },
        mounted: function () {
            // this.getOptions();
        },
        methods: {
            getOptions: function () {
                // this.axios.post('/getBranchData', {}).then((response) => {
                //     this.options = response.data.result;
                //     this.value = response.data.value;
                // })
            }
        },
        watch: {
            multiple(newValue) {
                if (newValue) {
                    this.value = this.value ? [this.value] : []
                } else {
                    this.value = this.value[0]
                }
            },
        },
        component: {

        }
    });

    var head = new Vue({
        el: '#header',
    });
};