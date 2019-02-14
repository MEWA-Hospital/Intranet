<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="row">
                <div class="col-md-12">
                    <div :class="this.messageClass " v-if="this.message">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                        <span class="font-weight-semibold" v-text="this.message"></span>
                    </div>
                </div>
            </div>
            <form class="card" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                <input type="hidden" name="_method" value="PATCH">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Name -->
                            <div class="form-group">
                                <label for="department_id">Department <span
                                    class="text-danger small">* (Required)</span>
                                </label>
                                <selectize v-model="form.department_id" :settings="departmentSettings"
                                           name="department_id"
                                           id="department_id">
                                    <option v-for="department in departments" v-bind:value="department.id">
                                        {{department.name}}
                                    </option>
                                </selectize>
                                <label class="validation-invalid-label" v-if="form.errors.has('department_id')"
                                       v-text="form.errors.first('department_id')"></label>
                            </div>

                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Venue-->
                            <div class="form-group">
                                <label for="ext_no">Station / Desk <span class="text-success small"> (option)</span>
                                </label>
                                <input type="text" class="form-control" name="station_name" id="station_name"
                                       placeholder="Station / desk name"
                                       v-model="form.station_name">
                                <label class="validation-invalid-label" v-if="form.errors.has('station_name')"
                                       v-text="form.errors.first('station_name')"></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <!-- Description -->
                            <div class="form-group">
                                <label for="employee_id">Contact Person <span
                                    class="text-danger small">* (Required)</span>
                                </label>
                                <selectize v-model="form.employee_id" :settings="contactSettings" name="employees[]"
                                           id="employee_id">
                                    <option v-for="employee in employees" v-bind:value="employee.id">
                                        {{ employee.name }}
                                    </option>
                                </selectize>
                                <label class="validation-invalid-label" v-if="form.errors.has('contact_person')"
                                       v-text="form.errors.first('contact_person')"></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Venue-->
                            <div class="form-group">
                                <label for="ext_no">Extension <span class="text-danger small">* (Required)</span>
                                </label>
                                <input type="text" class="form-control" name="ext_no" id="ext_no"
                                       placeholder="Extension number eg 132"
                                       v-model="form.ext_no">
                                <label class="validation-invalid-label" v-if="form.errors.has('ext_no')"
                                       v-text="form.errors.first('ext_no')"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn bg-blue btn-sm">Submit<i
                        class="icon-paperplane ml-2"></i>
                    </button>
                </div>

            </form>
        </div>
    </div>

</template>

<script>

    import Form from 'form-backend-validation';
    import selectize from 'vue2-selectize';

    export default {

        props: ['method', 'action', 'departments', 'employees', 'extension'],

        components: {selectize},

        data() {
            return {
                form: new Form({
                    ext_no: this.extension.ext_no,
                    department_id: this.extension.department_id,
                    employee_id: this.extension.employees.id,
                    station_name: this.extension.station_name
                }),
                message: '',
                messageClass: '',
                departmentSettings: {
                    placeholder: 'Choose the department',
                },
                contactSettings: {
                    hideSelected: true,
                    maxItems: 20,
                    placeholder: 'Choose the contact persons',
                },
            }
        },

        methods: {

            onSubmit() {
                this.form.patch(this.action)
                    .then(response => this.displaySuccessMessage('Extension created!'))
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
        }
    }
</script>

<style src="selectize/dist/css/selectize.bootstrap3.css"></style>
