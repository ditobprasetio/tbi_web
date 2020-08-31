
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios';
axios.defaults.baseURL = '/';

import VideoBg from 'vue-videobg';
Vue.component('video-bg', VideoBg);

// Filter Collection
Vue.filter('firstChar', function (value) {
    if (!value) return ''
    value = value.toString()
    return value.charAt(0).toUpperCase();
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// Editor
Vue.component('query-gallery', require('./components/Tools/QueryGallery.vue'));
Vue.component('query-banner', require('./components/Tools/QueryBanner.vue'));
Vue.component('form-config', require('./components/Tools/FormConfig.vue'));
Vue.component('rendering-content', require('./components/Tools/RenderingContent.vue'));

// Custom - Map
Vue.component('custom-map', require('./components/Maps/CustomMap'));

// Content - Faq
Vue.component('content-faq', require('./components/Faq/Faq'));

const app = new Vue({
    el: '#app'
});
