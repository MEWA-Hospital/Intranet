<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <form class="row" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
        <input type="hidden" name="_method" value="put">
        <div class="col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-body">
                    <!-- name -->
                    <div class="form-group">
                        <label for="title">Title <span class="text-danger small">* (Required)</span> </label>
                        <input type="text"
                               class="form-control"
                               name="title"
                               id="title"
                               placeholder="Enter News Title"
                               v-model="form.title">

                        <label class="validation-invalid-label"
                               v-if="form.errors.has('title')"
                               v-text="form.errors.first('title')">
                        </label>
                    </div>

                    <!-- Email-->
                    <div class="form-group">
                        <label>Body</label>
                        <ckeditor :config="editorConfig"
                                  :editor="editor"
                                  name="body"
                                  id="body"
                                  v-model="form.body">

                        </ckeditor>
                        <label class="validation-invalid-label" v-if="form.errors.has('body')"
                               v-text="form.errors.first('body')">

                        </label>
                    </div>

                </div>

                <div class="card-footer d-flex justify-content-between align-items-center">
                    <a class="btn btn-light btn-sm" href="/admin/news">Cancel</a>
                    <button type="submit" class="btn bg-blue btn-sm ">Submit <i
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
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {

        props: ['action', 'news'],

        data() {
            return {
                form: new Form({
                    title: this.news.title,
                    body: this.news.body,
                }, {resetOnSuccess: false}),
                editor: ClassicEditor,
                editorConfig: {},
            }
        },

        methods: {
            onSubmit() {
                this.form.put(this.action)
                    .then(response => this.showSuccessMsg({message: response.message}))
                    .catch(error => this.showErrorMsg())
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

<style scoped>

</style>
