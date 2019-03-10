<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <div class="row">

        <div class="col-lg-8 col-md-8 offset-md-2 lg-offset-2">

            <form class="card " @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">

                <div class="card-body">
                    <fieldset>
                        <legend class="font-weight-semibold">
                            Account Details
                        </legend>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Username-->
                                <div class="form-group">
                                    <label>Username <span class="text-danger small">* (Required)</span> </label>
                                    <input type="text" class="form-control" name="username" id="username"
                                           placeholder="choose a unique username" v-model="form.username">
                                    <label class="validation-invalid-label" v-if="form.errors.has('username')"
                                           v-text="form.errors.first('username')"></label>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Email-->
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger small">* (Required)</span></label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="example@mewa.or.ke" v-model="form.email">
                                    <label class="validation-invalid-label" v-if="form.errors.has('email')"
                                           v-text="form.errors.first('email')"></label>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Telephone -->
                                <div class="form-group">
                                    <label for="telephone">Telephone</label>
                                    <input type="text" class="form-control" name="telephone" id="telephone"
                                           placeholder="10 digits mobile no" v-model="form.telephone">
                                    <label class="validation-invalid-label" v-if="form.errors.has('telephone')"
                                           v-text="form.errors.first('telephone')"></label>

                                </div>
                                <!-- Telephone -->

                            </div>
                        </div>

                    </fieldset>
                </div>

                <div class="card-body">
                    <fieldset>
                        <legend class="font-weight-semibold">
                            Employee Details
                            <a class="btn btn-light btn-sm pull-right" data-toggle="modal"
                               data-target="#modal_default"><i class="icon-search4"></i> Search
                            </a>
                        </legend>
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Full name -->
                                <div class="form-group">
                                    <label for="name">Full name</label>
                                    <input type="text" class="form-control" placeholder="Full name " name="name"
                                           id="name"
                                           v-model="form.name">
                                    <label class="validation-invalid-label" v-if="form.errors.has('name')"
                                           v-text="form.errors.first('name')"></label>

                                </div>
                                <!-- Full name -->
                            </div>

                            <div class="col-md-4">
                                <!-- national_id_no -->
                                <div class="form-group">
                                    <label for="national_id_no">ID no</label>
                                    <input type="text" class="form-control" placeholder="National ID"
                                           name="national_id_no"
                                           id="national_id_no" v-model="form.national_id_no">
                                    <label class="validation-invalid-label" v-if="form.errors.has('national_id_no')"
                                           v-text="form.errors.first('national_id_no')"></label>

                                </div>
                                <!-- national_id_no -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" name="gender" id="gender" v-model="form.gender">
                                        <option v-for="gender in genderList" v-bind:value="gender.value">
                                            {{gender.label}}
                                        </option>
                                    </select>
                                    <label class="validation-invalid-label" v-if="form.errors.has('gender')"
                                           v-text="form.errors.first('gender')"></label>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <DatePicker label="DOB" v-model="form.dob" name="dob"></DatePicker>
                                </div>
                                <label class="validation-invalid-label" v-if="form.errors.has('dob')"
                                       v-text="form.errors.first('dob')"></label>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Physical Address</label>
                                    <input type="text" class="form-control" placeholder="Physical address"
                                           name="physical_address" id="physical_address"
                                           v-model="form.physical_address">
                                    <label class="validation-invalid-label" v-if="form.errors.has('physical_address')"
                                           v-text="form.errors.first('physical_address')"></label>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <DatePicker label="Employment Date" v-model="form.date_employed"
                                            name="date_employed"></DatePicker>
                                <label class="validation-invalid-label" v-if="form.errors.has('date_employed')"
                                       v-text="form.errors.first('date_employed')"></label>

                            </div>

                            <div class="col-md-3">
                                <!-- Department -->
                                <div class="form-group">
                                    <label form="department_id">Department</label>
                                    <select class="form-control" name="department_id" id="department_id"
                                            v-model="form.department_id">>
                                        <option v-for="department in departments" v-bind:value="department.id">
                                            {{department.name}}
                                        </option>
                                    </select>
                                    <label class="validation-invalid-label" v-if="form.errors.has('department_id')"
                                           v-text="form.errors.first('department_id')"></label>


                                </div>
                                <!-- Department -->
                            </div>

                            <div class="col-md-3">
                                <!-- designation -->
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input type="text" class="form-control" placeholder="Designation" name="designation"
                                           id="designation" v-model="form.designation">
                                </div>
                                <!-- designation -->
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="employee_type_id">Employee type</label>
                                    <select class="form-control" name="employee_type_id" id="employee_type_id"
                                            v-model="form.employee_type_id">
                                        <option v-for="type in employeeType" v-bind:value="type.id"> {{type.name}}
                                        </option>
                                    </select>
                                    <label class="validation-invalid-label" v-if="form.errors.has('employee_type_id')"
                                           v-text="form.errors.first('employee_type_id')"></label>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nssf_no">NSSF No</label>
                                    <input type="text" class="form-control" placeholder="NSSF No" name="nssf_no"
                                           id="nssf_no" v-model="form.nssf_no">
                                    <label class="validation-invalid-label" v-if="form.errors.has('nssf_no')"
                                           v-text="form.errors.first('nssf_no')"></label>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nhif_no">NHIF No</label>
                                    <input type="text" class="form-control" placeholder="NHIF No" name="nhif_no"
                                           id="nhif_no" v-model="form.nhif_no">
                                    <label class="validation-invalid-label" v-if="form.errors.has('nhif_no')"
                                           v-text="form.errors.first('nhif_no')"></label>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kra_pin">KRA Pin</label>
                                    <input type="text" class="form-control" placeholder="KRA Pin" name="kra_pin"
                                           id="kra_pin" v-model="form.kra_pin">
                                    <label class="validation-invalid-label" v-if="form.errors.has('kra_pin')"
                                           v-text="form.errors.first('kra_pin')"></label>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="biometric_code">Biometric User Code</label>
                                <input type="text" class="form-control" placeholder="123" name="biometric_code"
                                       id="biometric_code" v-model="form.biometric_code">
                            </div>
                        </div>


                    </fieldset>

                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <a class="btn btn-light btn-sm" href="/admin/users">Cancel</a>
                    <button type="submit" class="btn btn-primary btn-sm" :disabled="form.errors.any()">Submit<i
                        class="icon-paperplane ml-2"></i>
                    </button>

                </div>

            </form>


            <!-- Basic modal -->
            <form id="modal_default" class="modal fade" tabindex="-1" @submit.prevent="">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center">Search Employee</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">

                            <div class="input-group">
                                <input type="text"
                                       class="form-control"
                                       placeholder="Search by National ID"
                                       name="searchID"
                                       v-model="searchID">

                                <span class="input-group-append">
                                    <a class="btn btn-light legitRipple" @click.prevent="searchEmployee">
                                        <i class="icon-search4"></i>
                                        <div class="legitRipple-ripple"></div>
                                    </a>
                                </span>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                            <button type="button" class="btn bg-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /basic modal -->

        </div>

    </div>
</template>

<script>
    import DatePicker from '../../DatePicker';
    import Form from 'form-backend-validation';
    import VueNotifications from 'vue-notifications';
    import axios from 'axios';

    export default {
        components: {DatePicker},

        props: ['action'],

        data() {
            return {
                form: new Form({
                    username: '',
                    email: '',
                    telephone: '',
                    name: '',
                    national_id_no: '',
                    date_employed: '',
                    department_id: '',
                    designation: '',
                    employee_type_id: '',
                    nhif_no: '',
                    nssf_no: '',
                    kra_pin: '',
                    dob: '',
                    physical_address: '',
                    gender: '',
                    biometric_code: ''
                }),
                genderList: [
                    {value: 'Male', label: 'Male'},
                    {value: 'Female', label: 'Female'}
                ],
                employeeType: [],
                departments: [],
                searchID: '',
            }
        },

        created() {
            this.fetchEmployeeType();
            this.fetchDepartments();
        },

        methods: {

            fetchEmployeeType() {
                axios.get('/admin/employee-type')
                    .then(response => this.employeeType = response.data)
                    .catch(error => console.log(error));
            },

            fetchDepartments() {
                axios.get('/admin/departments')
                    .then(response => this.departments = response.data)
                    .catch(error => console.log(error));
            },

            onSubmit() {
                this.form.post(this.action)
                    .then(response => this.showSuccessMsg({message: response.message}))
                    .catch(error => this.showErrorMsg())
            },

            searchEmployee() {
                axios.get('/admin/employees/search/' + this.searchID)
                    .then(response => {
                        this.form.name = response.data.name;
                        this.form.physical_address = response.data.physical_address;
                        this.form.national_id_no = response.data.national_id_no;
                        this.form.gender = response.data.gender;
                        this.form.nssf_no = response.data.nssf_no;
                        this.form.nhif_no = response.data.nhif_no;
                        this.form.kra_pin = response.data.kra_pin;
                        this.form.dob = response.data.dob;
                        this.form.date_employed = response.data.date_employed;
                        this.form.bank_account_no = response.data.bank_account_no;
                        this.form.staff_no = response.data.staff_no;
                        this.form.employee_type_id = response.data.employee_type_id;
                        this.form.designation = response.data.designation;
                        this.form.employee_id = response.data.id;
                    })
            }

        },

        notifications: {
            showSuccessMsg: {
                type: VueNotifications.types.success,
                title: 'Success',
                message: 'That\'s the success!',
            },
            showErrorMsg: {
                type: VueNotifications.types.error,
                title: 'Whoops!',
                message: 'Something went wrong.'
            }
        },


    }
</script>

<style scoped>

</style>
