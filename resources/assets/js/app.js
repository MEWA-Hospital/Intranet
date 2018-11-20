/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

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

const app = new Vue({
    el: '#app'
});
