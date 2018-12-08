<!--
  - Project: MEWA Hospital Intranet
  -  Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -  Last Modified: 10/27/18 4:19 PM.
  -
  -  Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0
  -   (https://opensource.org/licenses/AGPL-3.0).
  -->

<template>
    <form class="card" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
        <div class="card-body">
            <input type="hidden" name="method" :value="this.method">
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
                               v-text="form.errors.get('name')"></label>
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
                               v-text="form.errors.get('venue')"></label>
                    </div>
                </div>
                <div class="col-md-3">

                    <!-- Start Date -->
                    <datetime type="datetime" v-model="form.start_date" input-class="form-control" input-id="start_date"
                              hidden-name="start_date">
                        <label slot="before">Start Date </label>
                    </datetime>
                    <label class="validation-invalid-label" v-if="form.errors.has('start_date')"
                           v-text="form.errors.get('start_date')"></label>
                </div>

                <div class="col-md-3">

                    <!-- Start Date -->
                    <datetime type="datetime" v-model="form.end_date" input-class="form-control" input-id="end_date"
                              hidden-name="end_date">
                        <label slot="before">End Date</label>
                    </datetime>
                    <label class="validation-invalid-label" v-if="form.errors.has('end_date')"
                           v-text="form.errors.get('end_date')"></label>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Description -->
                    <div class="form-group">
                        <label >Description<span class="text-danger small">* (Required)</span> </label>
                        <wysiwyg name="body" v-model="form.body" :value="form.body"></wysiwyg>
                        <span class="form-text text-danger"
                              v-if="form.errors.has('body')"
                              v-text="form.errors.first('body')">
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-between align-items-center">
            <a type="submit" class="btn btn-light btn-sm" href="">Cancel</a>
            <button type="submit" class="btn bg-blue btn-sm">Submit<i
                    class="icon-paperplane ml-2"></i></button>
        </div>

    </form>
</template>

<script>
    import Form from 'form-backend-validation';
    import wysiwyg from '../Wysiwyg.vue';

    export default {
        props: [
            'method', 'action', 'event', 'start_date', 'end_date'
        ],

        components: { wysiwyg },

        data() {
            return {
                form: new Form({
                    name: this.event.name,
                    body: this.event.body,
                    venue: this.event.venue,
                    start_date: this.start_date,
                    end_date: this.end_date
                }),
                message: '',
                messageClass: '',
            }
        },

        methods: {
            onSubmit() {
                this.form[this.method](this.action)
                    .then(response => this.displaySuccessMessage('Event updated!'))
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
