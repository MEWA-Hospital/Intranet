<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <div>
        <!-- Vertical form modal -->
        <div id="modal_form_vertical" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload Document</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <form @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                       name="name"
                                       id="name"
                                       placeholder="Enter Document Name. eg Financial Report"
                                       v-model="form.name">
                                <label class="validation-invalid-label" v-if="form.errors.has('name')"
                                       v-text="form.errors.first('name')">

                                </label>
                            </div>

                            <div class="form-group">
                                <input type="text"
                                       name="description"
                                       class="form-control"
                                       placeholder="Enter description of the document... optional"
                                       id="description"
                                       v-model="form.description">
                                <label class="validation-invalid-label" v-if="form.errors.has('description')"
                                       v-text="form.errors.first('description')">

                                </label>
                            </div>

                            <div class="form-group">
                                <input type="file"
                                       ref="document"
                                       name="document"
                                       required
                                       @change="handleFileUpload">
                                <label class="validation-invalid-label" v-if="form.errors.has('document')"
                                       v-text="form.errors.first('document')">

                                </label>
                                <label v-else><span
                                    class="form-text text-muted">Accepted formats: doc, docx, pdf.</span>

                                </label>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn bg-primary">Submit form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /vertical form modal -->

        <div class="card">
            <div class="card-header bg-white pb-0 pt-sm-0 pr-sm-0 header-elements-inline">

                <div class="header-elements">
                    <ul class="nav nav-tabs nav-tabs-bottom card-header-tabs mx-0">
                        <li class="nav-item">

                            <a href="#card-bottom-tab1" class="nav-link active show" data-toggle="tab">
                                <i class="icon-file-pdf mr-2"></i>
                                Documents
                            </a>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--<a href="#card-bottom-tab2" class="nav-link" data-toggle="tab">-->
                        <!--<i class="icon-stack-picture mr-2"></i>-->
                        <!--Pictures-->
                        <!--</a>-->
                        <!--</li>-->
                    </ul>

                </div>
            </div>

            <div class="card-body tab-content">
                <div class="tab-pane fade active show" id="card-bottom-tab1">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3 col-md-2" v-for="item in items">
                            <div class="card card-body">
                                <div class="media">
                                    <div class="mr-3">
                                        <i class="icon-file-pdf icon-3x"></i>
                                    </div>

                                    <div class="media-body">
                                        <h6 class="mb-0">{{item.name}}</h6>
                                        <span class="text-muted">{{item.description}}</span>
                                    </div>

                                    <div class="ml-3 align-self-center">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle caret-0"
                                                   data-toggle="dropdown" aria-expanded="false"><i
                                                    class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                                    <a target="_blank" v-bind:href="'/f/document/'+item.uuid+''"
                                                       class="dropdown-item">
                                                        <i class="icon-file-download"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

            </div>

            <div class="card-footer bg-white d-sm-flex justify-content-between align-items-center">
                <paginator :dataSet="dataSet" @changed="fetch"></paginator>

                <button type="button"
                        class="btn btn-sm btn-outline bg-success-400 border-success-400 ml-3"
                        data-toggle="modal" data-target="#modal_form_vertical">
                    Upload
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import Form from 'form-backend-validation'
    import axios from 'axios'
    import paginator from '../../Paginator'
    import 'izitoast/dist/css/iziToast.min.css'
    import VueNotifications from 'vue-notifications'

    export default {
        props: ['action'],

        components: {paginator},
        data() {
            return {
                form: new Form({
                    name: '',
                    description: '',
                    document: null
                }),
                dataSet: '',
                items: [],
                showUploadForm: false
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

        mounted() {
            this.fetch();
        },

        methods: {
            handleFileUpload(event) {
                this.form.document = event.target.files[0];
            },

            onSubmit() {
                this.form.post(this.action)
                    .then(response => {
                        this.showSuccessMsg({message: response.message});
                        this.items.push(response.data)
                    })
                    .catch(response => this.showErrorMsg())
            },

            fetch(page) {
                axios.get(this.url(page))
                    .then(this.refresh);
            },

            url(page = 1) {
                if (!page) {
                    let query = location.search.match(/page=(\d+)/);
                    page = query ? query[1] : 1;
                }
                return `${location.pathname}/?page=${page}`
            },

            refresh({data}) {

                this.dataSet = data.meta;
                this.items = data.data;
            },

        },
    }
</script>

<style scoped>

</style>
