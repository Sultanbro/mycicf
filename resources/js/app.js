require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios'

import VueAxios from 'vue-axios'

import TextareaAutosize from 'vue-textarea-autosize'

import FlashMessage from '@smartweb/vue-flash-message'

import linkify from 'vue-linkify'

import VueGoogleCharts from 'vue-google-charts'

import {EmojiPickerPlugin} from 'vue-emoji-picker'

import VTooltip from 'v-tooltip'

import vmodal from 'vue-js-modal'

import VueTheMask from 'vue-the-mask'

import VueApexCharts from 'vue-apexcharts'

import Vue from "vue";

const moment = require('vue-moment');

import Antd from "ant-design-vue"
import "ant-design-vue/dist/antd.css"

Vue.use(Antd);

Vue.use(moment);

Vue.use(vmodal);

import Toastr from 'vue-toastr'

Vue.use(FlashMessage);

Vue.use(EmojiPickerPlugin);

Vue.use(FlashMessage);

Vue.use(VueGoogleCharts);

Vue.use(VueAxios, axios);

Vue.use(VueTheMask);

Vue.use(TextareaAutosize);

Vue.use(VTooltip);

Vue.use(VueApexCharts);

Vue.component('apexchart', VueApexCharts)

window.addEventListener('load', () => {
    Vue.use(Toastr);
});

Vue.directive('linkified', linkify);

// Vue.component('login', require('./components/registration/login.vue').default);

Vue.component('treeselect', VueTreeselect.Treeselect);

Vue.component('simple-info', require('./components/employee/simple-info.vue').default);

Vue.component('info', require('./components/employee/info.vue').default);

Vue.component('centcoins', require('./components/centcoins/centcoins.vue').default);

Vue.component('operations-history', require('./components/centcoins/operations-history.vue').default);

Vue.component('spend-centcoins', require('./components/centcoins/spend-centcoins.vue').default);

Vue.component('post', require('./components/news/post.vue').default);

Vue.component('news-post', require('./components/news/news-post.vue').default);

Vue.component('news-comment', require('./components/news/news-comment.vue').default);

Vue.component('news-birthday', require('./components/news/news-birthday.vue').default);

Vue.component('user-image', require('./components/employee/userImage.vue').default);

Vue.component('edslogin', require('./components/eds/edslogin').default);

Vue.component('eds-od', require('./components/eds/eds-od').default);

Vue.component('eds-payout', require('./components/eds/eds-payout').default);

Vue.component('payout-request', require('./components/eds/payout-request').default);

Vue.component('eds', require('./components/eds/eds').default);

Vue.component('eds-order-document', require('./components/eds/eds-order-document.vue').default);

Vue.component('coordination', require('./components/employee/coordination.vue').default);

Vue.component('search', require('./components/documentation/search.vue').default);

Vue.component('coordination-modal', require('./components/coordination/modal.vue').default);

Vue.component('productsmodal-modal', require('./components/productsmodal/modal.vue').default);

Vue.component('information-modal', require('./components/shared/information-modal.vue').default);

Vue.component('motivation', require('./components/employee/motivation.vue').default);

Vue.component('name', require('./components/name/name.vue').default);

Vue.component('library-doc', require('./components/name/library-doc.vue').default);

Vue.component('library-svg', require('./components/name/library-svg.vue').default);

Vue.component('parse-charts', require('./components/parse/parse-charts.vue').default);

Vue.component('main-data-charts', require('./components/parse/main-data-charts.vue').default);

Vue.component('mobile-info', require('./components/mobile/employee/mobile-info.vue').default);

Vue.component('emoji-component', require('./components/news/emoji-component.vue').default);

Vue.component('report', require('./components/employee/report.vue').default);

Vue.component('cabinet', require('./components/employee/cabinet.vue').default);

Vue.component('colleagues', require('./components/colleagues/colleagues.vue').default);

Vue.component('colleagues-info', require('./components/colleagues/colleagues-info.vue').default);

Vue.component('colleague-info', require('./components/employee/colleague-info.vue').default);

Vue.component('image-viewer', require('./components/common/image-viewer.vue').default);

Vue.component('news-birthday', require('./components/news/news-birthday.vue').default);

Vue.component('simple-birthday', require('./components/news/simpleBirthday.vue').default);

Vue.component('edslogin', require('./components/eds/edslogin.vue').default);

Vue.component('express-calc', require('./components/product/express.vue').default);

Vue.component('full-quotation-calc', require('./components/product/full-quotation.vue').default);

Vue.component('participant', require('./components/product/participants.vue').default);

Vue.component('participant-create', require('./components/product/participantCreate.vue').default);

Vue.component('period', require('./components/product/period.vue').default);

//Vue.component('participant-form', require('./components/product/participantForm.vue').default);

Vue.component('agr-attributes', require('./components/product/attributes.vue').default);

Vue.component('agr-clause', require('./components/product/agrclause.vue').default);

Vue.component('agr-object', require('./components/product/agrobjects.vue').default);

Vue.component('agrobjcar', require('./components/product/agrobjcar.vue').default);

Vue.component('new-vehicle', require('./components/product/newVehicle.vue').default);

Vue.component('upload-docs', require('./components/product/uploadDocs.vue').default);

Vue.component('printable-form', require('./components/product/printableForm.vue').default);

Vue.component('quotation-list', require('./components/product/quotation-list.vue').default);

Vue.component('online-inspection', require('./components/product/online-inspection.vue').default);

Vue.component('test', require('./components/test.vue').default);
Vue.component('parse-opu', require('./components/parse/parse-opu.vue').default);

Vue.component('parse-info', require('./components/parse/parse-info.vue').default);

Vue.component('parse-indicators', require('./components/parse/parse-indicators.vue').default);


Vue.component('parse-top', require('./components/parse/parse-top.vue').default);

Vue.component('my-parse', require('./components/parse/my-parse.vue').default);
Vue.component('top-company', require('./components/parse/top-company.vue').default);
Vue.component('parse-centras', require('./components/parse/parse-centras.vue').default);
Vue.component('tree-folder', require('./components/parse/tree-folder.vue').default);
Vue.component('parse_opu2', require('./components/parse/parse_opu2.vue').default);
Vue.component('parse_indicators2', require('./components/parse/parse_indicators2.vue').default);

Vue.component('insurance-inspection', require('./components/employee/insurance-inspection').default);
Vue.component('inspection-info', require('./components/employee/inspection-info').default);

Vue.component('upload-image', require('./components/common/upload-image').default);

Vue.component('booking', require('./components/common/booking').default);

Vue.component('reception', require('./components/booking/reception').default);

Vue.component('reception', require('./components/booking/reception').default);

Vue.component('conf', require('./components/booking/conf').default);

Vue.component('dps', require('./components/booking/dps').default);

Vue.component('drr', require('./components/booking/drr').default);

Vue.component('dsv', require('./components/booking/dsv').default);

Vue.component('statistics', require('./components/employee/statistics').default);

Vue.component('boss-news', require('./components/news/boss-news').default);

Vue.component('my-results', require('./components/results/my-results').default);

Vue.component('rating', require('./components/results/rating').default);

Vue.component('motivation', require('./components/results/motivation').default);

Vue.component('report', require('./components/results/report').default);

Vue.component('rating-list', require('./components/results/rating-list').default);

Vue.component('employee-rate', require('./components/results/employee-rate').default);

Vue.filter('numberFormat', (value) => {
    // https://stackoverflow.com/a/59875056
    return value.toLocaleString();

    // https://stackoverflow.com/a/47219162
    // let numberFormat = new Intl.NumberFormat();
    // return numberFormat.format(value);
});

Vue.component('products-info', require('./components/productsinfo/productsinfo').default);
Vue.component('step1', require('./components/productsinfo/step1').default);
Vue.component('step2', require('./components/productsinfo/step2').default);

window.onload = function(){
    var app = new Vue({
        el: '#app',
        data: {
            value: null,
            // define options
            options: null,
            office: 'conf',
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
            'd-player': VueDPlayer
        }
    });

    var head = new Vue({
        el: '#header',
    });
};
