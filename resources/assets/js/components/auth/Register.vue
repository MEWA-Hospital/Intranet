<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>

    <!-- Registration form -->
    <form @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)" class="flex-fill">
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                            <h5 class="mb-0">Account Request form</h5>
                            <span class="d-block text-muted"><span
                                    class="text-danger">All fields are required</span>
                            </span>
                            <div :class="this.messageClass " v-if="this.message">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold" v-text="this.message"></span>
                            </div>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-right">
                            <input type="text" class="form-control" name="username" placeholder="Choose username"
                                   v-model="form.username">
                            <div class="form-control-feedback">
                                <i class="icon-user-plus text-muted"></i>
                            </div>
                            <label class="validation-invalid-label" v-if="form.errors.has('username')"
                                   v-text="form.errors.get('username')"></label>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="text" class="form-control" name="name" v-model="form.name"
                                           placeholder="Full name as it appears on your National Identification card">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                    <label class="validation-invalid-label" v-if="form.errors.has('name')"
                                           v-text="form.errors.get('name')"></label>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="email" class="form-control" name="email" v-model="form.email"
                                           placeholder="Your MEWA domain email">
                                    <div class="form-control-feedback">
                                        <i class="icon-mention text-muted"></i>
                                    </div>
                                    <label class="validation-invalid-label" v-if="form.errors.has('email')"
                                           v-text="form.errors.get('email')"></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="text" class="form-control" name="national_id_no"
                                           v-model="form.national_id_no"

                                           placeholder="Identification Number (ID)">
                                    <div class="form-control-feedback">
                                        <i class="icon-vcard text-muted"></i>
                                    </div>
                                    <label class="validation-invalid-label"
                                           v-if="form.errors.has('national_id_no')"
                                           v-text="form.errors.get('national_id_no')">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="password" class="form-control" name="password" v-model="form.password"
                                           placeholder="Create password">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock text-muted"></i>
                                    </div>
                                    <label class="validation-invalid-label" v-if="form.errors.has('password')"
                                           v-text="form.errors.get('password')"></label>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <select class="form-control" name="department_id" id="department"
                                            placeholder="Choose your currrent Department" v-model="form.department_id">
                                        <option v-for="department in departments" v-bind:value="department.id">{{department.name}}</option>
                                    </select>
                                    <div class="form-control-feedback">
                                        <i class="icon-users text-muted"></i>
                                    </div>
                                    <label class="validation-invalid-label" v-if="form.errors.has('department_id')"
                                           v-text="form.errors.first('department_id')"></label>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-4 offset-md-4 mb-2">
                            <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right btn-block"
                                    :disabled="form.errors.any()">
                                <b><i class="icon-plus3"></i></b> Submit request
                            </button>

                        </div>
                    </div>

                    <div class="form-group text-center text-muted content-divider">
                        <span class="px-2">Have an account?</span>
                    </div>
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <div class="form-group">
                                <a href="login" class="btn btn btn-outline bg-indigo-400 text-indigo-400 border-indigo-400 btn-block btn-outline">Sign in</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- /registration form -->

</template>

<script>

    import Form from 'form-backend-validation';
    import axios from 'axios';

    export default {
        props: ['method', 'action', 'departmentlink'],

        data() {
            return {
                form: new Form({
                    username: '',
                    password: '',
                    name: '',
                    email: '',
                    national_id_no: '',
                    department_id: '',
                }),
                message: '',
                messageClass: '',
                departments: [],
            }
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch() {
                let vm = this;
                axios.get(this.departmentlink).then(function($response) {
                    vm.departments = $response.data.data;
                });
            },

            onSubmit() {
                this.form[this.method](this.action)
                    .then(response => this.displaySuccessMessage('Well done! Your request has been successfully sent. Instructions on how to access your account will be mailed to you.'))
                    .catch(response => this.displayErrorMessage('Oh snap! Change a few things up and try submitting again.'));
            },

            displaySuccessMessage(message) {
                this.messageClass = 'bg-success alert text-white alert-dismissible';
                this.message = message;
            },

            displayErrorMessage(message) {
                this.messageClass = 'bg-danger alert text-white alert-dismissible';
                this.message = message;
            },

            clearMessage() {
                this.message = '';
            },
        }


    }
</script>

