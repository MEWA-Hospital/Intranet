<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <form
            class="card"
            @submit.prevent="onSubmit"
            @keydown="form.errors.clear($event.target.name)"
    >
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
                    <!-- Venue-->
                    <div class="form-group">
                        <label for="from">From: <span class="text-danger small">* (Required)</span> </label>
                        <input type="text" class="form-control" name="from" id="from" v-model="form.from">
                        <label class="validation-invalid-label" v-if="form.errors.has('from')"
                               v-text="form.errors.first('from')"></label>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- to -->
                    <div class="form-group">
                        <label>To: <span class="text-danger small">* (Required)</span> </label>
                        <selectize v-model="form.to" :settings="settings" name="to[]"> <!-- settings is optional -->
                            <option v-for="department in departments" v-bind:value="department.id">
                                {{department.name}}
                            </option>
                        </selectize>
                        <label class="validation-invalid-label" v-if="form.errors.has('to')" v-text="form.errors.first('to')"></label>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Name -->
                    <div class="form-group">
                        <label for="subject">Subject: <span class="text-danger small">* (Required)</span> </label>
                        <input
                                type="text"
                                class="form-control"
                                name="subject"
                                id="subject"
                                v-model="form.subject"
                        >
                        <label
                                class="validation-invalid-label"
                                v-if="form.errors.has('subject')"
                                v-text="form.errors.first('subject')"
                        ></label>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-3">

                    <!-- Start Date -->
                    <DatePicker
                            label="Date"
                            v-model="form.date"
                            name="date"
                    >
                    </DatePicker>
                    <label
                            class="validation-invalid-label"
                            v-if="form.errors.has('date')"
                            v-text="form.errors.first('date')"
                    ></label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- Description -->
                    <div class="form-group">
                        <label>Message: <span class="text-danger small">* (Required)</span> </label>
                        <wysiwyg name="body" v-model="form.body" :value="form.body"  ></wysiwyg>
                        <label
                                class="validation-invalid-label"
                                v-if="form.errors.has('body')"
                                v-text="form.errors.first('body')"
                        ></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-between align-items-center">
            <a type="submit" class="btn btn-light btn-sm" href="">Cancel</a>
            <button
                    type="submit"
                    class="btn bg-blue btn-sm"
            >Submit<i class="icon-paperplane ml-2"></i></button>
        </div>

    </form>
</template>

<script>
    import Form from "form-backend-validation";
    import DatePicker from "../DatePicker";
    import selectize from 'vue2-selectize';

    export default {
        props: ['departments', 'method', 'action'],

        components: {
            DatePicker, selectize
        },
        data() {
            return {
                form: new Form({
                    subject: "",
                    from: "",
                    date: "",
                    body: "",
                    to: []
                }),
                settings: {
                    hideSelected: true,
                    maxItems: 40,
                    placeholder: 'choose department',
                },
                message: "",
                messageClass: "",
            };
        },

        methods: {
            onSubmit() {
                this.form[this.method](this.action)
                    .then(response => this.displaySuccessMessage('Memo created!'))
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

    };
</script>

<style src="selectize/dist/css/selectize.bootstrap3.css"></style>
