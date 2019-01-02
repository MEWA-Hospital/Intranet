<!--
  -  Project: MEWA Hospital Intranet
  -  Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -  Last Modified: 10/27/18 4:19 PM.
  -
  -   Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -->

<template>
    <form class="row" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
        <input type="hidden" name="_method" value="PATCH">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="media flex-column flex-md-row mb-2">
                        <div class="media-body">
                            <h5 class="media-title font-weight-semibold" v-text="form.name"></h5>
                            <ul class="list-inline list-inline-dotted text-muted mb-0">
                                <li class="list-inline-item" v-text="form.designation"></li>
                            </ul>
                        </div>

                        <div class="align-self-md-center ml-md-3 mt-2 mt-md-0">
                            <a href="#"><i class="badge badge-success mr-2" v-text="form.staff_no">  </i> </a>
                        </div>
                    </div>
                </div>

                <!-- Employee details -->
                <fieldset class="card-body">
                    <h6 class="font-weight-semibold mt-1 mb-3">Employee Details</h6>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Department: <span class="text-danger">*</span></label>
                                <select class="form-control" name="department_id" v-model="form.department_id">
                                    <option v-for="department in departmentList" v-bind:value="department.id"> {{
                                        department.name }}
                                    </option>
                                </select>
                                <label class="validation-invalid-label" v-if="form.errors.has('department_id')"
                                       v-text="form.errors.first('department_id')">
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Designation: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="designation" v-model="form.designation">
                                <label class="validation-invalid-label" v-if="form.errors.has('designation')"
                                       v-text="form.errors.first('designation')">
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Staff No: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="staff_no" v-model="form.staff_no">
                                <label class="validation-invalid-label" v-if="form.errors.has('staff_no')"
                                       v-text="form.errors.first('staff_no')">
                                </label>
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label> Employee Type: <span class="text-danger">*</span></label>
                                <select class="form-control" name="employee_type_id" v-model="form.employee_type_id">
                                    <option v-for="type in employeeType" v-bind:value="type.id"> {{ type.name }}
                                    </option>
                                </select>
                                <label class="validation-invalid-label" v-if="form.errors.has('employee_type_id')"
                                       v-text="form.errors.first('employee_type_id')">
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <DatePicker label="Date Employed" v-model="form.date_employed" name="dob"></DatePicker>
                            </div>
                            <label class="validation-invalid-label" v-if="form.errors.has('date_employed')"
                                   v-text="form.errors.first('date_employed')">
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <label>Biometric code: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="biometric_code" v-model="form.biometric_code">
                            <label class="validation-invalid-label" v-if="form.errors.has('biometric_code')"
                                   v-text="form.errors.first('biometric_code')">
                            </label>
                        </div>
                    </div>

                </fieldset>
                <!-- /Employee details -->

                <!-- Personal details -->
                <fieldset class="card-body">
                    <h6 class="font-weight-semibold mb-3">Personal details</h6>

                    <div class="form-group">
                        <label>Full name: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control " name="name" v-model="form.name">
                        <label class="validation-invalid-label" v-if="form.errors.has('name')"
                               v-text="form.errors.first('name')">
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">

                            <div class="form-group">
                                <label>Telephone: <span class="text-success">optional</span></label>
                                <input type="text" class="form-control" name="telephone"
                                       v-model="form.telephone">
                                <label class="validation-invalid-label" v-if="form.errors.has('telephone')"
                                       v-text="form.errors.first('telephone')">

                                </label>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Email: <span class="text-success">optional</span></label>
                                <input type="text" class="form-control" name="email"
                                       v-model="form.email">
                                <label class="validation-invalid-label" v-if="form.errors.has('email')"
                                       v-text="form.errors.first('email')">
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>National ID no: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control " name="national_id_no"
                                       placeholder="National ID No"
                                       v-model="form.national_id_no">
                                <label class="validation-invalid-label" v-if="form.errors.has('national_id_no')"
                                       v-text="form.errors.first('national_id_no')">
                                </label>
                            </div>

                        </div>
                    </div>


                    <div class="row">

                        <div class="col-sm-3">
                            <div class="form-group">
                                <DatePicker label="DOB " v-model="form.dob" name="dob"></DatePicker>
                            </div>
                            <label class="validation-invalid-label" v-if="form.errors.has('dob')"
                                   v-text="form.errors.first('dob')">
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Gender: <span class="text-danger">*</span></label>
                                <select class="form-control" name="gender" id="gender" v-model="form.gender">
                                    <option v-for="gender in genderList" v-bind:value="gender.value">
                                        {{gender.label}}
                                    </option>
                                </select>
                                <label class="validation-invalid-label" v-if="form.errors.has('gender')"
                                       v-text="form.errors.first('gender')">
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Address: <span class="text-success">optional</span></label>
                                <input type="text" class="form-control" name="physical_address"
                                       v-model="form.physical_address">
                                <label class="validation-invalid-label" v-if="form.errors.has('physical_address')"
                                       v-text="form.errors.first('physical_address')">

                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>KRA Pin: <span class="text-success">optional</span></label>
                                <input type="text" class="form-control" name="kra_pin" v-model="form.kra_pin">
                                <label class="validation-invalid-label" v-if="form.errors.has('kra_pin')"
                                       v-text="form.errors.first('kra_pin')">
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>NHIF: <span class="text-success">optional</span></label>
                                <input type="text" class="form-control" name="nhif_no" v-model="form.nhif_no">
                                <label class="validation-invalid-label" v-if="form.errors.has('nhif_no')"
                                       v-text="form.errors.first('nhif_no')">
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>NSSF: <span class="text-success">optional</span></label>
                                <input type="text" class="form-control" name="nssf_no" v-model="form.nssf_no">
                                <label class="validation-invalid-label" v-if="form.errors.has('nssf_no')"
                                       v-text="form.errors.first('nssf_no')">
                                </label>
                            </div>
                        </div>
                    </div>

                </fieldset>
                <!-- Personal details -->

                <div class="card-footer d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn bg-blue btn-sm">Submit<i
                        class="icon-paperplane ml-2"></i></button>
                </div>


            </div>
            <div class="row">
                <div class="col-md-12">
                    <div :class="this.messageClass " v-if="this.message">
                        <span class="font-weight-semibold" v-text="this.message"></span>
                    </div>
                </div>
            </div>

        </div>

    </form>
</template>

<script>
    import Form from 'form-backend-validation';
    import axios from 'axios';
    import DatePicker from '../DatePicker';

    export default {
        props: ['action', 'employee', 'departmentlink', 'employeetypelink'],

        components: {DatePicker},

        data() {
            return {
                form: new Form({
                    name: this.employee.name,
                    department_id: this.employee.department_id,
                    designation: this.employee.designation,
                    gender: this.employee.gender,
                    national_id_no: this.employee.national_id_no,
                    date_employed: this.employee.date_employed,
                    employee_type_id: this.employee.employee_type_id,
                    nhif_no: this.employee.nhif_no,
                    nssf_no: this.employee.nssf_no,
                    kra_pin: this.employee.kra_pin,
                    dob: this.employee.dob,
                    physical_address: this.employee.physical_address,
                    biometric_code: this.employee.biometric_code,
                    bank_account_no: this.employee.bank_account_no,
                    telephone: this.employee.telephone[0].telephone,
                    email: this.employee.email[0].email,
                }),
                genderList: [
                    {value: 'MALE', label: 'MALE'},
                    {value: 'FEMALE', label: 'FEMALE'}
                ],
                employeeType: [],
                message: '',
                messsageClass: '',
                departmentList: [],
            }
        },

        created() {
            this.fetchDepartments();
            this.fetchEmployeeType();
        },

        methods: {
            fetchDepartments() {
                let vm = this;
                axios.get(this.departmentlink).then(function ($response) {
                    vm.departmentList = $response.data.data;
                })
            },

            fetchEmployeeType() {
                let vm = this;
                axios.get(this.employeetypelink).then(function ($response) {
                    vm.employeeType = $response.data.data;
                })
            },

            onSubmit() {
                this.form.patch(this.action)
                    .then(response => this.displaySuccessMessage('Employee updated!'))
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
