<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Search Employee</span>

                </div>

                <div class="card-body">
                    <form @submit.prevent="searchEmployee">
                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="text" class="form-control" placeholder="National ID" name="field"
                                   v-model="searchID">
                            <div class="form-control-feedback">
                                <i class="icon-mailbox text-muted"></i>
                            </div>
                        </div>

                        <button type="submit" class="btn bg-blue btn-block">
                            <i class="icon-search4 font-size-base mr-2"></i>
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <form @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                <div class="card">
                    <div class="card-body">
                        <h6 class="font-weight-semibold mb-3">Account details</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Username <span class="text-danger small">* (Required)</span> </label>
                                    <input type="text" class="form-control" name="username" id="username"
                                           placeholder="choose a unique username" v-model="form.username">
                                    <label class="validation-invalid-label" v-if="form.errors.has('username')"
                                           v-text="form.errors.first('username')"></label>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger small">* (Required)</span></label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="example@mewa.or.ke" v-model="form.email">
                                    <label class="validation-invalid-label" v-if="form.errors.has('email')"
                                           v-text="form.errors.first('email')"></label>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="national_id_no">ID no</label>
                                    <input type="text" class="form-control" placeholder="National ID"
                                           name="national_id_no"
                                           id="national_id_no" v-model="form.national_id_no">
                                    <label class="validation-invalid-label" v-if="form.errors.has('national_id_no')"
                                           v-text="form.errors.first('national_id_no')"></label>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" v-if="this.employeeDetails">
                        <h6 class="font-weight-semibold mb-3">Employee details</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Full name</label>
                                    <input type="text" class="form-control" placeholder="Full name " name="name"
                                           id="name"
                                           v-model="form.name">
                                    <label class="validation-invalid-label" v-if="form.errors.has('name')"
                                           v-text="form.errors.first('name')"></label>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="national_id_no">ID no</label>
                                    <input type="text" class="form-control" placeholder="National ID"
                                           name="national_id_no"
                                           v-model="form.national_id_no">
                                    <label class="validation-invalid-label" v-if="form.errors.has('national_id_no')"
                                           v-text="form.errors.first('national_id_no')"></label>

                                </div>
                            </div>
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
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <DatePicker label="DOB" v-model="form.dob" name="dob"></DatePicker>
                                </div>
                                <label class="validation-invalid-label" v-if="form.errors.has('dob')"
                                       v-text="form.errors.first('dob')"></label>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Physical Address: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="physical_address">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <DatePicker label="Employment Date" v-model="form.date_employed"
                                                name="date_employed"></DatePicker>
                                    <label class="validation-invalid-label" v-if="form.errors.has('date_employed')"
                                           v-text="form.errors.first('date_employed')"></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Department: <span class="text-danger">*</span></label>
                                    <select class="form-control"
                                            name="department_id"
                                            id="department"
                                            v-model="form.department_id">
                                        <option v-for="department in departments" v-bind:value="department.id">
                                            {{department.name}}
                                        </option>
                                    </select>
                                    <label class="validation-invalid-label" v-if="form.errors.has('department_id')"
                                           v-text="form.errors.first('department_id')"></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Designation: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Designation"
                                           name="designation"
                                           id="designation" v-model="form.designation">
                                    <label class="validation-invalid-label" v-if="form.errors.has('designation')"
                                           v-text="form.errors.first('designation')"></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Employee Type: <span class="text-danger">*</span></label>
                                    <select class="form-control" name="department_id" id="employee_type_id"
                                            placeholder="Choose your currrent Department"
                                            v-model="form.employee_type_id">
                                        <option v-for="type in employeeType" v-bind:value="type.id">{{type.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nssf_no">NSSF No</label>
                                    <input type="text" class="form-control" placeholder="NSSF No" name="nssf_no"
                                           id="nssf_no" v-model="form.nssf_no">
                                    <label class="validation-invalid-label" v-if="form.errors.has('nssf_no')"
                                           v-text="form.errors.first('nssf_no')"></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nhif_no">NHIF No</label>
                                    <input type="text" class="form-control" placeholder="NHIF No" name="nhif_no"
                                           id="nhif_no" v-model="form.nhif_no">
                                    <label class="validation-invalid-label" v-if="form.errors.has('nhif_no')"
                                           v-text="form.errors.first('nhif_no')"></label>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="kra_pin">KRA Pin</label>
                                    <input type="text" class="form-control" placeholder="KRA Pin" name="kra_pin"
                                           id="kra_pin" v-model="form.kra_pin">
                                    <label class="validation-invalid-label" v-if="form.errors.has('kra_pin')"
                                           v-text="form.errors.first('kra_pin')"></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="kra_pin">Bank account</label>
                                    <input type="text" class="form-control" placeholder="Bank Account"
                                           name="bank_account_no"
                                           id="bank_account_no" v-model="form.bank_account_no">
                                    <label class="validation-invalid-label" v-if="form.errors.has('bank_account_no')"
                                           v-text="form.errors.first('bank_account_no')"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="biometric_search"
                                               placeholder="Search employee Biometric Code " id="biometric_search">
                                        <span class="input-group-append">
												<button class="btn btn-light" type="button" @click="searchBioCode">Search</button>
											</span>
                                    </div>
                                </div>

                                <div class="form-group mt-2" v-if="biometricResult">
                                    <label class="font-weight-semibold">Results:</label>

                                    <div class="form-check" v-for="result in biometricResult">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="unstyled-radio-left"
                                                   v-model="form.biometric_code"
                                                   v-bind:value="result.Emp_Code">
                                            Name: {{ result.Emp_Name }}. Code: {{ result.Emp_Code}}
                                        </label>
                                        <label class="validation-invalid-label" v-if="form.errors.has('biometric_code')"
                                               v-text="form.errors.first('biometric_code')"></label>
                                    </div>

                                </div>

                            </div>

                        </div>


                        <div class="row mt-2">

                            <div class="col-md-12">
                                <div class="form-action">
                                    <button type="submit" class="btn btn-sm bg-success">Activate user <i
                                        class="icon-check "></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div :class="this.messageClass " v-if="this.message">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                        <span class="font-weight-semibold" v-text="this.message"></span>
                    </div>
                </div>
            </form>
        </div>
    </div>

</template>

<script>
    import Form from 'form-backend-validation';
    import DatePicker from '../DatePicker';
    import axios from 'axios';

    export default {
        components: {DatePicker},

        props: ['user', 'action'],

        data() {
            return {
                form: new Form({
                    username: this.user.username,
                    email: this.user.email,
                    national_id_no: this.user.national_id_no,
                    telephone: '',
                    name: '',
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
                    biometric_code: '',
                    bank_account_no: '',
                    user_id: this.user.id,
                    employee_id: null,
                    send_email: ''
                }),
                employeeDetails: null,
                message: '',
                messsageClass: '',
                genderList: [
                    {value: 'MALE', label: 'MALE'},
                    {value: 'FEMALE', label: 'FEMALE'}
                ],
                searchID: '',
                departments: [],
                employeeType: [],
                activateAccount: false,
                biometricResult: null,
            }
        },

        mounted() {
            this.getDepartments();
            this.getEmployeeType();
        },

        methods: {

            searchEmployee() {
                axios.get('/admin/employees/search/' + this.searchID)
                    .then(response => {
                        this.employeeDetails = response.data;
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
                    });
            },

            searchBioCode() {
                const vm = this;
                axios.post('/admin/employees/searchBiometric', {
                    biometricSearch: document.getElementById('biometric_search').value
                }).then(function (response) {
                    vm.biometricResult = response.data;
                }).catch(function (error) {

                });
            },


            refreshDepartments({data}) {
                this.departments = data.data
            },

            refreshEmployeeType({data}) {
                this.employeeType = data.data;
            },

            getDepartments() {
                axios.get('/admin/departments').then(this.refreshDepartments)
            },

            getEmployeeType() {
                axios.get('/admin/employee-type').then(this.refreshEmployeeType);
            },

            onSubmit() {
                this.form.post(this.action)
                    .then(response => this.displaySuccessMessage('User activated!'))
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
