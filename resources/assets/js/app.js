/*
 *   Project: MEWA Hospital Intranet
 *   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
 *
 *    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
 *
 */

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

import {Datetime} from 'vue-datetime';

let authorizations = require('./authorizations');

Vue.prototype.authorize = function (...params) {
    if (! window.signedIn) return false;

    if (typeof params[0] === 'string') {
        return authorizations[params[0]](params[1]);
    }

    return params[0](window.authenticated);
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
Vue.component('edit-event', require('./components/event/Edit.vue'));

Vue.component('create_user', require('./components/User/Create.vue'));
Vue.component('edit_user', require('./components/User/Edit.vue'));

Vue.component('create_memo', require('./components/memo/Create.vue'));

Vue.component('edit_employee', require('./components/employee/Edit.vue'));

Vue.component('create_department', require('./components/department/Create.vue'));
Vue.component('edit_department', require('./components/department/Edit.vue'));
Vue.component('view_department', require('./components/department/Show.vue'));

Vue.component('create_extension', require('./components/extension/Create.vue'));
Vue.component('edit_extension', require('./components/extension/Edit.vue'));

// Vue.component('flash', require('./components/Flash.vue'));
Vue.component('countdown', require('./components/Countdown.vue'));
Vue.component('register', require('./components/auth/Register.vue'));
Vue.component('wysiwyg', require('./components/Wysiwyg.vue'));
Vue.component('profile', require('./components/Frontend/Profile.vue'));
Vue.component('activate', require('./components/User/Activate.vue'));
Vue.component('datetime', Datetime);

Vue.component('notifications', require('./components/Notifications.vue'));
Vue.component('documents', require('./components/Frontend/Documents.vue'));

// window.events = new Vue();

// window.flash = function (message, level = 'success') {
//     window.events.$emit('flash', {message, level});
// };

const app = new Vue({
    el: '#app'
});
