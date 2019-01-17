<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <div class="row">
        <!-- Left content -->

        <form class="col-md-9" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
            <input type="hidden" name="_method" value="PATCH">
            <div :class="this.messageClass " v-if="this.message">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                <span class="font-weight-semibold" v-text="this.message"></span>
            </div>
            <!-- Task overview -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <h5 class="card-title"> {{this.department.name}}</h5>
                </div>

                <div class="card-body">
                    <h6 class="font-weight-semibold">Department Overview</h6>
                    <wysiwyg name="overview" v-model="form.overview" :value="form.overview"></wysiwyg>
                    <label class="validation-invalid-label" v-if="form.errors.has('overview')"
                           v-text="form.errors.first('overview')">

                    </label>

                </div>
                <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
                    <button type="submit" class="btn btn-sm btn-success btn-round pull-right">Update</button>
                </div>
            </div>

            <!-- /task overview -->
        </form>
        <!-- /left content -->

        <!-- Right content -->
        <div class="col-md-3">

            <!-- Department details -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Department details</span>

                </div>

                <table class="table table-border-dashed table-xs my-2">
                    <tbody>
                    <tr>
                        <td><i class="icon-user-tie mr-2"></i> HOD:</td>
                        <td class="text-right" v-if="editingDetails">
                            <input type="text" class="form-control" name="hod" v-model="hod">
                        </td>
                        <td class="text-right" v-else v-text="department.hod"></td>
                    </tr>

                    <tr>
                        <td><i class="icon-mailbox mr-2"></i> Email:</td>
                        <td class="text-right" v-if="editingDetails">
                            <input type="text" class="form-control" name="email" v-model="email"></td>
                        <td class="text-right" v-else v-text="department.email"></td>
                    </tr>

                    </tbody>
                </table>

                <div class="card-footer d-flex align-items-center">
                    <ul class="list-inline list-inline-condensed mb-0 ml-auto">
                        <li class="list-inline-item dropdown">
                            <a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"><i
                                class="icon-cog3"></i></a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" @click="editingDetails=true"><i
                                    class="icon-pencil7"></i> Edit
                                </button>
                                <button class="dropdown-item" @click="editingDetails=false"><i
                                    class="icon-cross"></i> Close
                                </button>
                                <hr class="dropdown-divider">
                                <button class="dropdown-item" @click="updateDetails"><i
                                    class="icon-check"></i> Update
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /Department details -->


            <!-- Attached files -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Attached files</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"
                                   aria-expanded="false"><i class="icon-menu7"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                    <a href="#" class="dropdown-item"> <i class="icon-file-word"></i> Upload
                                        Documents</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="media-list">
                        <li v-for="document in documents" class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-file-word icon-2x text-primary-300 top-0"></i>
                            </div>

                            <div class="media-body">
                                <div class="font-weight-semibold"> {{document.file_name}}</div>
                                <ul class="list-inline list-inline-dotted list-inline-condensed font-size-sm text-muted">
                                    <li class="list-inline-item">Size: 1.2Mb</li>

                                </ul>
                            </div>

                            <div class="ml-3">
                                <div class="list-icons">
                                    <a href="#" class="list-icons-item"><i class="icon-trash"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /attached files -->


            <!-- Upload files -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Upload Documents</span>
                </div>

                <form class="card-body">
                    <div class="form-group">
                        <label>Document</label>
                        <input type="file" class="form-control" name="sop" @change="processFile">
                    </div>

                    <div class="form-group">
                        <label>Document type</label>
                        <input type="text" class="form-control" name="document_type"
                               placeholder="Doc. type eg Standard operating..."
                               v-model="type"
                               id="document_type">

                        <!--<select name="document_type" id="document_type" class="form-control" v-model="type">-->
                        <!--<option v-for="type in document_type" v-bind:value="type.value"> {{type.name}}</option>-->
                        <!--</select>-->
                    </div>
                </form>
                <div class="card-footer">
                    <button type="button"
                            class="btn btn-outline bg-indigo-400 text-indigo-400 border-indigo-400 btn-sm"
                            @click="uploadFile">Upload
                    </button>
                    <div class="text-muted pull-right" v-if="this.processing"><i class="icon-spinner2 spinner mr-2"></i>
                        Processing...
                    </div>
                </div>
            </div>
            <!-- /attached files -->


        </div>
        <!-- /right content -->

    </div>
</template>

<script>
    import Form from 'form-backend-validation';
    import wysiwyg from '../Wysiwyg.vue';
    import axios from 'axios';

    export default {
        props: ['department', 'action', 'documentroute'],

        components: {
            wysiwyg
        },
        data() {
            return {
                form: new Form({
                    overview: ''
                }),
                documents: {},
                document_type: [
                    {name: 'S.O.P', value: 'sop'},
                    {name: 'service charter', value: 'charter'},
                    {name: 'mission & vision', value: 'mission'},
                ],
                type: null,
                uploadedFile: null,
                processing: false,
                editingDetails: false,
                hod: '',
                email: '',
                message: '',
                messageClass: '',
            }
        },

        mounted() {
            this.getDocuments();
        },

        methods: {
            updateDetails() {
                axios.patch('/admin/departments/update-details/' + this.department.id, {
                        hod: this.hod,
                        email: this.email,
                        id: this.department.id
                    }
                ).then(response => alert(response.data))
                    .catch(error => alert('Something went wrong! Please try again!'))
            },

            processFile($e) {
                let selectedFile = $e.target.files[0];

                if (!selectedFile) {
                    return
                }

                this.uploadedFile = selectedFile;
            },

            uploadFile() {
                if (!this.uploadedFile || !this.type) {
                    alert('Please upload a document and select it\'s type');
                    return;
                }

                let data = new FormData();

                data.append('document', this.uploadedFile);
                data.append('type', this.type);
                data.append('id', this.department.id);

                axios.post(this.action, data)
                    .then(response => alert(response.data))
                    .catch(error => alert('Something went wrong'));
            },

            getDocuments() {
                let vm = this;
                axios.get(this.documentroute, this.department.id).then(function ($response) {
                    vm.documents = $response.data;
                })
            },

            onSubmit() {
                this.form.patch('/admin/departments/update-overview/' + this.department.id)
                    .then(response => this.displaySuccessMessage('Department updated!'))
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
