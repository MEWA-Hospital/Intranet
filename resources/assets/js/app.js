/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);

window.Vue.prototype.authorize = function (handler) {
    // Additional Admin priviledges

    let user = window.App.user;

    return user ? handler(user) : false;
};


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('comments', require('./components/CommentsComponent'));
// Vue.component('comment', require('./components/CommentComponent.vue'));
Vue.component('news', require('./pages/news.vue'));
Vue.component('event-page', require('./pages/eventPage.vue'));
Vue.component('paginator', require('./components/Paginator.vue'));
Vue.component('create-event', require('./components/event/Create.vue'));
Vue.component('flash', require('./components/Flash.vue'));
Vue.component('countdown', require('./components/Countdown.vue'));
Vue.component('register', require('./components/auth/Register.vue'));


window.events = new Vue();

window.flash = function (message, level = 'success') {
    window.events.$emit('flash', { message, level });
};

const app = new Vue({
    el: '#app'
});
