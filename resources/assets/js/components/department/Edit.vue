<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <form class="row" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
        <input type="hidden" name="_method" value="PATCH">
        <div class="col-lg-6 col-md-12 offset-lg-3">
            <div :class="this.messageClass " v-if="this.message">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                <span class="font-weight-semibold" v-text="this.message"></span>
            </div>

            <div class="card">
                <div class="card-body">
                    <!-- name -->
                    <div class="form-group">
                        <label for="name">Department Name <span class="text-danger small">* (Required)</span> </label>
                        <input type="text" class="form-control" name="name" id="name" v-model="form.name">
                        <label class="validation-invalid-label" v-if="form.errors.has('name')"
                               v-text="form.errors.first('name')">

                        </label>
                    </div>

                    <!-- Email-->
                    <div class="form-group">
                        <label for="email">Department Email</label>
                        <input type="email" class="form-control" placeholder="Department email address" name="email"
                               id="email"
                               v-model="form.email">
                        <label class="validation-invalid-label" v-if="form.errors.has('email')"
                               v-text="form.errors.first('email')">

                        </label>
                    </div>

                    <!-- Mailing list -->
                    <div class="form-group">
                        <label for="mailing_list">Department Mailing Email</label>
                        <input type="email" class="form-control"
                               placeholder="Mailing address that will be used to mail all users" name="mailing_list"
                               id="mailing_list" v-model="form.mailing_list">
                        <label class="validation-invalid-label" v-if="form.errors.has('mailing_list')"
                               v-text="form.errors.first('mailing_list')">

                        </label>
                    </div>

                </div>

                <div class="card-footer d-flex justify-content-between align-items-center">

                    <button type="submit" class="btn bg-blue btn-sm " :disabled="this.form.errors.any()">Submit <i
                            class="icon-paperplane ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>

</template>

<script>

    import Form from 'form-backend-validation';

    export default {
        props: ['action', 'method', 'department'],

        data() {
            return {
                form: new Form({
                    name: this.department.name,
                    email: this.department.email,
                    mailing_list: this.department.mailing_list
                }, {
                    resetOnSuccess: false,
                }),
                message: '',
                messageClass: '',
            }
        },

        methods: {
            onSubmit() {
                this.form.patch(this.action)
                    .then(response => this.displaySuccessMessage('Department created!'))
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

<style scoped>

</style>
