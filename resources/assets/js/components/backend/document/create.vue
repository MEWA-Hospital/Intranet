<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <form class="row" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
        <div class="col-lg-6 col-md-12 offset-lg-3 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <!-- name -->
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger small">* (Required)</span> </label>
                        <input type="text"
                               class="form-control"
                               name="name"
                               id="name"
                               placeholder="Enter Document Name"
                               v-model="form.name">

                        <label class="validation-invalid-label"
                               v-if="form.errors.has('name')"
                               v-text="form.errors.first('name')">
                        </label>
                    </div>

                    <!-- Email-->
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text"
                               class="form-control"
                               placeholder="Enter Document description... optional" name="description"
                               id="description"
                               v-model="form.description">
                        <label class="validation-invalid-label" v-if="form.errors.has('description')"
                               v-text="form.errors.first('description')">

                        </label>
                    </div>

                    <!-- Mailing list -->
                    <div class="form-group">
                        <label for="document">Upload Document</label>
                        <input type="file"
                               class="form-control"
                               name="document"
                               @change="handleFileUpload"
                               id="document">

                        <label class="validation-invalid-label" v-if="form.errors.has('document')"
                               v-text="form.errors.first('document')">
                        </label>
                    </div>

                </div>

                <div class="card-footer d-flex justify-content-between align-items-center">
                    <a class="btn btn-light btn-sm" href="/admin/documents">Cancel</a>
                    <button type="submit" class="btn bg-blue btn-sm " >Submit <i
                        class="icon-paperplane ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>

</template>

<script>

    import Form from 'form-backend-validation';
    import VueNotifications from 'vue-notifications'

    export default {

        props: ['action'],

        data() {
            return {
                form: new Form({
                    name: '',
                    description: '',
                    document: null
                }),
            }
        },

        methods: {
            onSubmit() {
                this.form.post(this.action)
                    .then(response => this.showSuccessMsg({message: response.message}))
                    .catch(errors => this.showErrorMsg())
            },

            handleFileUpload(event) {
                this.form.document = event.target.files[0];
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
    }
</script>

<style scoped>

</style>
