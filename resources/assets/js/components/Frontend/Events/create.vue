<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 offset-md-2">
            <form class="card" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div :class="this.messageClass " v-if="this.message">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold" v-text="this.message"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger small">* (Required)</span> </label>
                                <input type="text" class="form-control" name="name" id="name"
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
                                <input type="text" class="form-control" name="venue" id="venue"
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
                        <div class="col-md-12">
                            <!-- Description -->
                            <div class="form-group">
                                <label>Description<span class="text-danger small">* (Required)</span> </label>
                                <wysiwyg name="body" v-model="form.body" :value="form.body"></wysiwyg>
                                <label class="validation-invalid-label" v-if="form.errors.has('body')"
                                       v-text="form.errors.first('body')"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between align-items-center">
                    <a type="submit" class="btn btn-light btn-sm" href="/f/events"> <i class="icon-arrow-left12"></i> Back </a>
                    <button type="submit" class="btn bg-blue btn-sm">Submit<i
                        class="icon-paperplane ml-2"></i></button>
                </div>

            </form>
        </div>

    </div>
</template>

<script>

    import Form from 'form-backend-validation';
    import wysiwyg from '../../Wysiwyg.vue';
    import VueNotifications from 'vue-notifications'

    export default {

        props: ['method', 'action',],

        components: {wysiwyg},

        data() {
            return {
                form: new Form({
                    name: '',
                    body: '',
                    venue: '',
                    start_date: '',
                    end_date: '',
                }),

                message: '',
                messageClass: '',
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

        methods: {
            onSubmit() {
                this.form.post(this.action)
                    .then(response => this.showSuccessMsg({message: response.message}))
                    .catch(response => this.showErrorMsg())
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

