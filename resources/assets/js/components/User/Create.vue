<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <form class="card card-body" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
        <div class="row">

            <div class="col-md-12">
                <div :class="this.messageClass " v-if="this.message">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                    <span class="font-weight-semibold" v-text="this.message"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <fieldset>
                    <legend class="font-weight-semibold">
                        Account Details
                    </legend>
                    <div class="row">
                        <div class="col-md-5">
                            <!-- Username-->
                            <div class="form-group">
                                <label>Username <span class="text-danger small">* (Required)</span> </label>
                                <input type="text" class="form-control" name="username" id="username"
                                       placeholder="choose a unique username" v-model="form.username">
                                <label class="validation-invalid-label" v-if="form.errors.has('username')"
                                       v-text="form.errors.first('username')"></label>

                            </div>
                        </div>
                        <div class="col-md-7">
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
                        <div class="col-md-4">
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
            <div class="col-md-6">
                <fieldset>
                    <legend class="font-weight-semibold">
                        Employee Details
                    </legend>
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Full name -->
                            <div class="form-group">
                                <label for="name">Full name</label>
                                <input type="text" class="form-control" placeholder="Full name " name="name" id="name"
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
                                <input type="text" class="form-control" placeholder="National ID" name="national_id_no"
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
                                    <option v-for="gender in genderList" v-bind:value="gender.value">{{gender.label}}</option>
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
                                       name="physical_address" id="physical_address" v-model="form.physical_address">
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
                                <select class="form-control" name="department_id" id="department_id" v-model="form.department_id">>
                                    <option v-for="department in departments" v-bind:value="department.id"> {{department.name}} </option>
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
                                <select  class="form-control" name="employee_type_id" id="employee_type_id"
                                         v-model="form.employee_type_id">
                                    <option v-for="type in employeeType" v-bind:value="type.id"> {{type.name}} </option>
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

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" :disabled="form.errors.any()">Submit<i
                                class="icon-paperplane ml-2"></i>
                        </button>
                    </div>

                </fieldset>
            </div>
        </div>
    </form>
</template>

<script>
    import DatePicker from '../DatePicker';
    import Form from 'form-backend-validation';

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
                message: '',
                messsageClass: '',
                genderList: [
                    {value: 'Male', label: 'Male'},
                    {value: 'Female', label: 'Female'}
                    ],
                employeeType: [],
                departments: []
            }
        },

        created() {
            this.fetchEmployeeType();
            this.fetchDepartments();
        },

        methods: {

            fetchEmployeeType() {
                axios.get('/admin/employee-type').then(this.refreshEmployeeType);
            },

            fetchDepartments() {
                axios.get('/admin/departments').then(this.refreshDepartments);
            },

            refreshEmployeeType({data}) {
                this.employeeType = data.data
            },

            refreshDepartments({data}) {
                this.departments = data.data
            },

            onSubmit() {
                this.form.post(this.action)
                    .then(response => this.displaySuccessMessage('User created!'))
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

<style scoped>

</style>
