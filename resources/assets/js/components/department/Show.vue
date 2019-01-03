<!--
  -  Project: MEWA Hospital Intranet
  -  Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -  Last Modified: 10/27/18 4:19 PM.
  -
  -   Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -->

<template>
    <div class="row">
        <!-- Left content -->

        <div class="col-md-9">
            <!-- Task overview -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <h5 class="card-title"> {{this.department.name}}</h5>
                </div>

                <div class="card-body">
                    <h6 class="font-weight-semibold">Overview</h6>
                    <wysiwyg name="body" v-model="form.body" :value="form.body"></wysiwyg>
                    <label class="validation-invalid-label" v-if="form.errors.has('body')"
                           v-text="form.errors.first('body')">

                    </label>

                </div>

                <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">

                    <ul class="list-inline list-inline-condensed mb-0 mt-2 mt-sm-0">
                        <li class="list-inline-item">
                            <a href="#" class="text-default"><i class="icon-compose"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-default"><i class="icon-trash"></i></a>
                        </li>
                        <li class="list-inline-item dropdown">
                            <a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"><i
                                class="icon-grid-alt"></i></a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-alarm-add"></i> Check in</a>
                                <a href="#" class="dropdown-item"><i class="icon-attachment"></i> Attach screenshot</a>
                                <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> Assign users</a>
                                <a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report</a>
                            </div>
                        </li>
                    </ul>
                    <div>
                        <button class="btn btn-sm btn-primary btn-round">Save</button>
                    </div>
                </div>
            </div>
            <!-- /task overview -->
        </div>
        <!-- /left content -->

        <!-- Right content -->
        <div class="col-md-3">

            <!-- Department details -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Department details</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <table class="table table-borderless table-xs my-2">
                    <tbody>
                    <tr>
                        <td><i class="icon-user-tie mr-2"></i> HOD:</td>
                        <td class="text-right" v-if="!editing" v-model="departmentData.hod">Muhidin</td>
                        <td class="text-right" v-else="editing"><input type="text" class="form-control form-control-sm text-violet"></td>
                    </tr>


                    </tbody>
                </table>

                <div class="card-footer d-flex align-items-center">
                    <ul class="list-inline list-inline-condensed mb-0">
                        <li class="list-inline-item">
                            <a href="#" class="text-default"><i class="icon-pencil7" v-if="!editing"></i></a>
                            <a href="#" class="text-default"><i class="icon-checkmark4" v-if="editing"></i></a>
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
                    <ul class="media-list" v-if="documents">
                        <li v-for="document in documents" class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-file-word icon-2x text-primary-300 top-0"></i>
                            </div>

                            <div class="media-body">
                                <!--<div class="font-weight-semibold">{{ document[0].file_name}}</div>-->
                                <ul class="list-inline list-inline-dotted list-inline-condensed font-size-sm text-muted">
                                    <!--<li class="list-inline-item">Size: {{ document[0].size}}</li>-->

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
                        <select name="document_type" id="document_type" class="form-control" v-model="type">
                            <option v-for="type in document_type" v-bind:value="type.value"> {{type.name}}</option>
                        </select>
                    </div>
                </form>
                <div class="card-footer">
                    <button type="button"
                            class="btn btn-outline bg-indigo-400 text-indigo-400 border-indigo-400 btn-sm" @click="uploadFile">Upload
                    </button>
                    <div class="text-muted pull-right" v-if="this.processing"><i class="icon-spinner2 spinner mr-2"></i> Processing...</div>
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
        props: ['department', 'action', 'location'],

        components: {
            wysiwyg
        },

        data() {
            return {
                form: new Form({
                    body: ''
                }),
                departmentData: this.department,
                document_type: [
                    {name: 'S.O.P', value: 'sop'},
                    {name: 'service charter', value: 'charter'},
                    {name: 'mission & vision', value: 'mission'},
                ],
                type: null,
                uploadedFile: null,
                processing: false,
                editing: false,
                documents: ['']
            }
        },

        mounted() {
          this.fetchDocuments();
        },

        methods: {
            fetchDocuments() {
                let vm = this;
                axios.get(this.location).then(function($response) {
                    vm.documents = $response.data;
                });
            },

            processFile($e) {
                let selectedFile = $e.target.files[0];

                if (! selectedFile) {
                    return
                }

                this.uploadedFile = selectedFile;
            },

            uploadFile() {
                if (! this.uploadedFile || ! this.type) {
                    alert('Please upload a document and select it\'s type');
                    return;
                }

                let data = new FormData();

                data.append('document', this.uploadedFile);
                data.append('type', this.type);
                data.append('id', this.department.id);

                axios.post(this.action, data).then(this.fetchDocuments);
            }
        }
    }
</script>

<style scoped>

</style>
