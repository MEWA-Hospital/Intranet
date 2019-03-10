<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <form class="card" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
        <input type="hidden" name="_method" value="put">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger small">* (Required)</span> </label>
                        <input type="text"
                               class="form-control"
                               name="name"
                               id="name"
                               placeholder="Enter Event Name ..."
                               v-model="form.name">
                        <label class="validation-invalid-label" v-if="form.errors.has('name')"
                               v-text="form.errors.first('name')"></label>
                    </div>

                </div>


            </div>
            <div class="row">
                <div class="col-md-6">
                    <!-- Venue-->
                    <div class="form-group">
                        <label for="venue">Venue <span class="text-danger small">* (Required)</span> </label>
                        <input type="text"
                               class="form-control"
                               name="venue"
                               id="venue"
                               placeholder="Enter Venue"
                               v-model="form.venue">
                        <label class="validation-invalid-label" v-if="form.errors.has('venue')"
                               v-text="form.errors.first('venue')"></label>
                    </div>
                </div>

                <div class="col-md-3">

                    <!-- Start Date -->
                    <datetime
                        type="datetime"
                        v-model="form.start_date"
                        input-class="form-control"
                        input-id="start_date"
                        hidden-name="start_date"
                        zone="Africa/Nairobi"
                        value-zone="Africa/Nairobi">

                        <label slot="before">Start Date</label>
                    </datetime>
                    <label class="validation-invalid-label" v-if="form.errors.has('start_date')"
                           v-text="form.errors.first('start_date')"></label>
                </div>

                <div class="col-md-3">

                    <!-- Start Date -->
                    <datetime type="datetime"
                              v-model="form.end_date"
                              input-class="form-control"
                              input-id="end_date"
                              zone="Africa/Nairobi"
                              value-zone="Africa/Nairobi"
                              hidden-name="end_date">
                        <label slot="before">End Date </label>
                    </datetime>
                    <label class="validation-invalid-label" v-if="form.errors.has('end_date')"
                           v-text="form.errors.first('end_date')"></label>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Department <span
                            class="text-danger small">* (Required)</span>
                        </label>
                        <selectize v-model="form.department_id" :settings="settings"
                                   name="department_id">
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
                    <!-- Description -->
                    <div class="form-group">
                        <label>Description<span class="text-danger small">* (Required)</span> </label>
                        <ckeditor :config="editorConfig"
                                  :editor="editor"
                                  name="body"
                                  v-model="form.body"></ckeditor>

                        <label class="validation-invalid-label" v-if="form.errors.has('body')"
                               v-text="form.errors.first('body')"></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-between align-items-center">
            <a class="btn btn-light btn-sm" href="/admin/events">Cancel</a>
            <button type="submit" class="btn bg-blue btn-sm">Submit<i
                class="icon-paperplane ml-2"></i></button>
        </div>

    </form>
</template>

<script>

    import Form from 'form-backend-validation';
    import selectize from 'vue2-selectize';
    import VueNotifications from 'vue-notifications'
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {

        props: ['action', 'event', 'start_date', 'end_date', 'departments'],

        components: {selectize},

        data() {
            return {
                form: new Form({
                    name: this.event.name,
                    body: this.event.body,
                    venue: this.event.venue,
                    start_date: this.start_date,
                    end_date: this.end_date,
                    department_id: this.event.department_id,
                }),
                editor: ClassicEditor,
                editorConfig: {},
                settings: {
                    placeholder: 'Choose department'
                },
            }
        },

        methods: {
            onSubmit() {
                this.form.put(this.action)
                    .then(response => this.showSuccessMsg({message: response.message}))
                    .catch(errors => this.showErrorMsg())
            },

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

<style src="selectize/dist/css/selectize.bootstrap3.css"></style>
