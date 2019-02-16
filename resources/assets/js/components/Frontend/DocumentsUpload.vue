<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <div class="col-md-12">

        <div class="card">
            <div class="card-header bg-white pb-0 pt-sm-0 pr-sm-0 header-elements-sm-inline">

                <div class="header-elements">
                    <ul class="nav nav-tabs nav-tabs-bottom card-header-tabs mx-0">
                        <li class="nav-item">
                            <a href="#card-bottom-tab1" class="nav-link active show" data-toggle="tab">
                                <i class="icon-file-pdf mr-2"></i>
                                Documents
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#card-bottom-tab2" class="nav-link" data-toggle="tab">
                                <i class="icon-stack-picture mr-2"></i>
                                Pictures
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card-body tab-content">
                <div class="tab-pane fade active show" id="card-bottom-tab1">
                    This is the first card tab content
                </div>

                <div class="tab-pane fade" id="card-bottom-tab2">
                    This is the second card tab content
                </div>

                <div class="tab-pane fade" id="card-bottom-tab3">
                    This is the third card tab content
                </div>

                <div class="tab-pane fade" id="card-bottom-tab4">
                    This is the fourth card tab content
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="name">Name: <span class="label text-danger small">Required</span></label>
                        <input type="text" class="form-control" id="name" name="name" v-model="form.name"
                               placeholder="Document name. eg Financial Report for ...">
                    </div>

                    <div class="form-group">
                        <label for="description">Description: <span
                            class="label text-success small">Optional</span></label>
                        <input type="text" class="form-control" id="description" name="description"
                               v-model="form.description"
                               placeholder="Enter description of the document.">
                    </div>

                    <div class="form-group">
                        <label for="file">File: <span class="label text-danger small">required</span></label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>

                    <div class="form-action d-flex justify-content-between align-items-center">
                        <a type="submit" class="btn btn-light btn-sm" href="/f/documents">Cancel</a>
                        <button type="submit" class="btn bg-blue btn-sm">Submit<i
                            class="icon-paperplane ml-2"></i></button>
                    </div>

                </form>
            </div>
            <div class="card-footer">
                <span class="d-flex justify-content-center text-muted small"><i class="icon-info3"></i>
                    Document will be published after the system Administrator's approval</span>
            </div>
        </div>
    </div>
</template>

<script>
    import Form from 'form-backend-validation'

    export default {
        props: ['action'],

        data() {
            return {
                form: new Form({
                    name: '',
                    description: '',
                    file: null,
                })
            }
        },

        methods: {}
    }
</script>

<style scoped>

</style>
