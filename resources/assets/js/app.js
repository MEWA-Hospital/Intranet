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


/**
 * Notification libraries
 */

import VueNotifications from 'vue-notifications'

import iziToast from 'izitoast'

import {Datetime} from 'vue-datetime'
import CKEditor from '@ckeditor/ckeditor5-vue';

function toast({title, message, type, timeout, cb}) {
    if (type === VueNotifications.types.warn) type = 'warning';
    return iziToast[type]({title, message, timeout})
}

const options = {
    success: toast,
    error: toast,
    info: toast,
    warn: toast
};

Vue.use(VueNotifications, options);

Vue.use(CKEditor);

let authorizations = require('./authorizations');

Vue.prototype.authorize = function (...params) {
    if (!window.signedIn) return false;

    if (typeof params[0] === 'string') {
        return authorizations[params[0]](params[1]);
    }

    return params[0](window.authenticated);
};


require('./frontendComponents');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('datetime', Datetime);
Vue.component('news', require('./pages/news.vue').default);
Vue.component('event-page', require('./pages/eventPage.vue').default);
Vue.component('paginator', require('./components/Paginator.vue').default);
Vue.component('create-event', require('./components/event/Create.vue').default);
Vue.component('edit-event', require('./components/event/Edit.vue').default);
Vue.component('create_user', require('./components/User/Create.vue').default);
Vue.component('edit_user', require('./components/User/Edit.vue').default);
Vue.component('create_memo', require('./components/memo/Create.vue').default);
Vue.component('edit_employee', require('./components/employee/Edit.vue').default);
Vue.component('create_department', require('./components/department/Create.vue').default);
Vue.component('edit_department', require('./components/department/Edit.vue').default);
Vue.component('view_department', require('./components/department/Show.vue').default);
Vue.component('create_extension', require('./components/extension/Create.vue').default);
Vue.component('edit_extension', require('./components/extension/Edit.vue').default);
// Vue.component('create_minutes', require('./components/minutes/Create.vue').default);
// Vue.component('edit_minutes', require('./components/minutes/Edit.vue').default);
Vue.component('front_create_event', require('./components/Frontend/Events/create').default);

Vue.component('countdown', require('./components/Countdown.vue').default);
Vue.component('register', require('./components/auth/Register.vue').default);
Vue.component('wysiwyg', require('./components/Wysiwyg.vue').default);
Vue.component('profile', require('./components/Frontend/Profile.vue').default);
Vue.component('activate', require('./components/User/Activate.vue').default);

Vue.component('notifications', require('./components/Notifications.vue').default);
// Vue.component('documents', require('./components/Frontend/Documents.vue').default);
Vue.component('documents_upload', require('./components/Frontend/DocumentsUpload').default);
Vue.component('documents', require('./components/Frontend/Documents/index').default);


Vue.component('user-index', require('./components/backend/user/index').default);
Vue.component('user-create', require('./components/backend/user/create').default);
Vue.component('user-edit', require('./components/backend/user/edit').default);


Vue.component('department-create', require('./components/backend/department/create').default);
Vue.component('department-edit', require('./components/backend/department/edit').default);


Vue.component('event-create', require('./components/backend/event/create').default);
Vue.component('event-edit', require('./components/backend/event/edit').default);


Vue.component('document-create', require('./components/backend/document/create').default);
Vue.component('document-edit', require('./components/backend/document/edit').default);

Vue.component('news-create', require('./components/backend/news/create').default);
Vue.component('news-edit', require('./components/backend/news/edit').default);

const app = new Vue({
    el: '#app'
});
