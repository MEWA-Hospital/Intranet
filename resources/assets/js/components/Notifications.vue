<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <li class="nav-item dropdown" v-if="notifications.length">
        <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
            <i class="icon-bell2"></i>
            <span class="d-md-none ml-2">Notifications</span>

        </a>

        <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
            <div class="dropdown-content-header">
                <span class="font-weight-semibold">Notifications</span>
            </div>

            <div class="dropdown-content-body dropdown-scrollable">
                <ul class="media-list">
                    <li v-for="notification in notifications" class="media">
                        <div class="media-body">
                            <div class="media-title">
                                <a href="#">
                                    <span class="font-weight-semibold"> {{ notification.data.user}}</span>
                                    <span class="text-muted float-right font-size-sm">{{ notification.data.date}}</span>
                                </a>
                            </div>
                            <span class="text-muted">{{ notification.data.message}}.  <a :href="notification.data.link" @click="markAsRead(notification)">Link </a></span>

                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </li>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {notifications: false}
        },

        created() {
            axios.get("/profile/" + window.authenticated.username + "/notifications")
                .then(response => this.notifications = response.data)
        },

        methods: {
            markAsRead(notification) {
                axios.delete("/profile/" + window.authenticated.username + "/notifications/" + notification.id)
            }
        }
    }
</script>

<style scoped>

</style>
