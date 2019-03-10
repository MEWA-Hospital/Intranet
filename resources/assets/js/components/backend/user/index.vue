<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <div class="card">
        <table class="table table-striped text-nowrap table-customers" id="table">
            <thead>
            <tr>
                <th>Username</th>
                <th>Gender</th>
                <th>Department</th>
                <th>Employed</th>
                <th>ID</th>
                <th>Status</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in usersCollection">
                <td> {{ user.username}}</td>
                <td> {{ user.employee ? user.employee.gender : ''}}</td>
                <td> {{ user.employee ? user.employee.department.name : ''}}</td>
                <td> {{ user.employee ? user.employee.date_employed : ''}}</td>
                <td> {{ user.national_id_no}}</td>
                <td> {{ user.isActive}}</td>
                <td> {{ user.employee ? user.employee.department.name : '' }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "user-index",

        props: ['users'],

        data() {
            return {
                usersCollection: this.users
            }
        }
    }
</script>

<style scoped>

</style>
