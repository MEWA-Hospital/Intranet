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
                                    <select class="form-control" name="department_id" id="department"
                                            placeholder="Choose your currrent Department"
                                            v-model="form.department_id">
                                        <option v-for="department in departmentList" v-bind:value="department.id">
                                            {{department.name}}
                                        </option>
                                    </select>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nssf_no">Biometric Code</label>
                                    <input type="text" class="form-control" placeholder="Biometric code"
                                           name="biometric_code"
                                           id="biometric_code" v-model="form.biometric_code">
                                    <label class="validation-invalid-label" v-if="form.errors.has('biometric_code')"
                                           v-text="form.errors.first('biometric_code')"></label>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-action">
                                    <button type="submit" class="btn btn-sm bg-success">Activate user <i
                                            class="icon-check "></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</template>

<script>
    import Form from 'form-backend-validation';
    import DatePicker from '../DatePicker';
    import toggleInput from '../Form/ToggleInput.vue';
    import axios from 'axios';

    export default {
        components: {DatePicker, toggleInput},

        props: ['user', 'action',],

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
                    employee_id: null
                }),
                employeeDetails: null,
                message: '',
                messsageClass: '',
                genderList: [
                    {value: 'MALE', label: 'MALE'},
                    {value: 'FEMALE', label: 'FEMALE'}
                ],
                searchID: '',
                departmentList: [],
                employeeType: [],
                activateAccount: false,
            }
        },

        created() {
            this.getDepartments();
            this.getEmployeeType();
        },

        methods: {
            searchEmployee() {
                axios.get('/Intranet/public/admin/employees/search/' + this.searchID)
                    .then(this.refreshEmployeeDetails);
            },

            refreshEmployeeDetails({data}) {
                this.employeeDetails = data.data;
                this.form.name = data.data.name;
                this.form.physical_address = data.data.physical_address;
                this.form.national_id_no = data.data.national_id_no;
                this.form.gender = data.data.gender;
                this.form.nssf_no = data.data.nssf_no;
                this.form.nhif_no = data.data.nhif_no;
                this.form.kra_pin = data.data.kra_pin;
                this.form.dob = data.data.dob;
                this.form.date_employed = data.data.date_employed;
                this.form.bank_account_no = data.data.bank_account_no;
                this.form.staff_no = data.data.staff_no;
                this.form.employee_type_id = data.data.employee_type_id;
                this.form.designation = data.data.designation;
                this.form.employee_id = data.data.id;
            },

            refreshDepartments({data}) {
                this.departmentList = data.data
            },

            refreshEmployeeType({data}) {
                this.employeeType = data.data;
            },

            getDepartments() {
                axios.get('/Intranet/public/admin/departments').then(this.refreshDepartments)
            },

            getEmployeeType() {
                axios.get('/Intranet/public/admin/employee-type').then(this.refreshEmployeeType);
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
