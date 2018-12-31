<!--
  -  Project: MEWA Hospital Intranet
  -  Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -  Last Modified: 10/27/18 4:19 PM.
  -
  -   Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -->

<template>
    <div class="d-md-flex align-items-md-start">
        <!-- Left content-->
        <div class=" sidebar-light sidebar-component sidebar-component-left wmin-300 shadow-5 sidebar-expand-md">
            <div class="card">
                <div class="card-body text-center card-img-top "
                     style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png); background-size: contain;">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid rounded-circle" :src="avatar" width="190" height="190" alt="">
                    </div>

                    <h6 class="font-weight-semibold mb-0" v-text="user.username"></h6>
                    <span class="d-block opacity-75">{{ this.user.employee.department.name}}</span>
                </div>

                <div class="card-body p-0">
                    <ul class="nav nav-sidebar mb-2">
                        <li class="nav-item-header">Navigation</li>
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active" data-toggle="tab">
                                <i class="icon-user"></i>
                                My profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#biometric" class="nav-link" data-toggle="tab">
                                <i class="icon-touch"></i>
                                Biometric

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings" class="nav-link" data-toggle="tab">
                                <i class="icon-wrench"></i>
                                Account Settings
                            </a>
                        </li>

                        <li class="nav-item-divider"></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Left content -->

        <!-- Right content -->
        <div class="tab-content w-100 overflow-auto">
            <div class="tab-pane fade active show" id="profile">

                <!-- Profile info -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Profile information</h5>

                    </div>

                    <div class="card-body">
                        <form action="#">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Username</label>
                                        <input type="text" v-model="user.username" class="form-control"
                                               readonly="readonly">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name">Full name</label>
                                        <input type="text" v-model="user.employee.name" class="form-control"
                                               readonly="readonly" name="name" id="name">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" readonly="readonly" name="address"
                                               v-model="user.employee.physical_address"
                                               id="address">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="email" readonly
                                               v-model="user.email">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="telephone">Telephone</label>
                                        <input type="text" class="form-control" name="telephone" id="telephone"
                                               v-model="user.employee.telephone.telephone"
                                               readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="department_id">Department</label>
                                        <input type="text" class="form-control" name="department_id" id="department_id"
                                               v-model="user.employee.department.name"
                                               readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="designation_id">Designation</label>
                                        <input type="text" class="form-control" name="designation_id"
                                               id="designation_id" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="date_employed">Date of Employement</label>
                                        <input type="text" class="form-control" name="date_employed" id="date_employed"
                                               v-model="user.employee.date_employed"
                                               readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="kra_pin">KRA PIN</label>
                                        <input type="text" class="form-control" name="kra_pin" id="kra_pin" readonly
                                               v-model="user.employee.kra_pin">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="nhif_no">NHIF no</label>
                                        <input type="text" class="form-control" name="nhif_no" id="nhif_no" readonly
                                               v-model="user.employee.nhif_no">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="nssf_no">NSSF no</label>
                                        <input type="text" class="form-control" name="nssf_no" id="nssf_no" readonly
                                               v-model="user.employee.nssf_no">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="bank_account_no">Bank Account </label>
                                        <input type="text" class="form-control" name="bank_account_no"
                                               v-model="user.employee.bank_account_no"
                                               id="bank_account_no" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Upload profile image</label>
                                        <input type="file" name="avatar" accept="image/*" @change="onChange">
                                        <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /profile info -->

            </div>
            <div class="tab-pane fade" id="settings">

                <!-- Account settings -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Account settings</h5>
                    </div>

                    <div class="card-body">
                        <form action="#" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                            <div class="form-group">
                                <div :class="this.messageClass " v-if="this.message">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    <span class="font-weight-semibold" v-text="this.message"></span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Username</label>
                                        <input type="text" v-model="user.username" name="username" readonly="readonly"
                                               class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input type="email" v-model="user.email" readonly="readonly"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>New password</label>
                                        <input type="password" placeholder="Enter new password" class="form-control"
                                               name="password" v-model="form.password">
                                        <label class="validation-invalid-label" v-if="form.errors.has('password')"
                                               v-text="form.errors.first('password')">
                                        </label>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Repeat password</label>
                                        <input type="password" placeholder="Repeat new password" class="form-control"
                                               name="password_confirmation" v-model="form.password_confirmation">
                                        <label class="validation-invalid-label"
                                               v-if="form.errors.has('password_confirmation')"
                                               v-text="form.errors.first('password_confirmation')">
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /account settings -->
            </div>
            <div class="tab-pane fade" id="biometric">

                <!-- Account settings -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Biometric clock-in details</h6>
                    </div>
                    <table class="table table-condensed table-xs table-border-dashed">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Date / Time</th>
                            <th>Hours worked</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="biometric in biometricData" v-bind:class="{'table-success': (biometric.In_Out_Flag === 'Check in')}">
                            <td v-text="biometric.Emp_Id"></td>
                            <td v-text="biometric.For_Date"></td>
                            <td v-text="biometric.In_Duration"></td>
                            <td v-text="biometric.In_Out_Flag"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /account settings -->
            </div>
        </div>
        <!-- Right content -->

    </div>
</template>

<script>
    import Form from 'form-backend-validation'
    import moment from 'moment';
    import axios from 'axios';

    export default {
        props: ['user', 'media', 'action'],

        data() {
            return {
                form: new Form({
                    password: '',
                    password_confirmation: '',
                    id: this.user.id,
                }),
                biometricData: [],
                employee: [this.user.employee],
                message: '',
                messageClass: '',
                avatar: this.media,
                moment: moment,
            };
        },

        created() {
            this.fetchBiometricData();
        },
        methods: {

            fetchBiometricData() {
                let vm = this;
                axios.get('/Intranet/public/admin/biometric-in-out/' + this.user.employee.biometric_code)
                    .then(function (response) {
                        vm.biometricData = response.data;
                    }).catch(function (error){});
            },

            onChange(e) {
                if (!e.target.files.length) {
                    return
                }

                let profile = e.target.files[0];

                let reader = new FileReader();

                reader.readAsDataURL(profile);

                reader.onload = e => {
                    this.avatar = e.target.result;
                };

                this.uploadAvatar(profile);
            },

            uploadAvatar(profile) {
                let data = new FormData();

                data.append('avatar', profile);
                data.append('username', this.user.username);

                axios.post('/Intranet/public/profile/${this.user.username}/picture', data)
            },

            onSubmit() {
                this.form.post(this.action)
                    .then(response => this.displaySuccessMessage('Password has been updated.'))
                    .catch(response => this.displayErrorMessage('Something went wrong! Change a few things up and try submitting again.'));
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

<style scoped>

</style>
