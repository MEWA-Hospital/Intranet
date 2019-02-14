<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <div class="d-flex align-items-start flex-column flex-md-row">
        <div class="col-md-9">
            <div v-for="department in items">
                <div class="card card-body" v-for="media in department.media">
                    <div
                        class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                        <div class="mr-lg-3 mb-3 mb-lg-0">
                            <a href="/global_assets/images/placeholders/placeholder.jpg">
                                <img src="/global_assets/images/placeholders/placeholder.jpg" width="76"
                                     alt="">
                            </a>
                        </div>

                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold">
                                {{ media.name}}
                            </h6>

                            <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                <li class="list-inline-item text-muted">{{ department.name}}</li>
                                <li class="list-inline-item text-muted">{{ media.collection_name}}</li>
                                <li class="list-inline-item text-muted"> {{(formatBytes(media.size))}}</li>
                            </ul>

                            <p class="mb-3"></p>

                            <ul class="list-inline list-inline-dotted mb-0">
                                <!--<li class="list-inline-item">lorem</li>-->
                                <!--<li class="list-inline-item"></li>-->
                            </ul>
                        </div>

                        <div class="mt-3 mt-lg-0 ml-lg-3 text-center">

                            <!--<div class="text-muted">100 downloads</div>-->
                            <a v-bind:href="'/f/download-document/'+media.id+''">
                                <button type="button" class="btn btn-outline bg-success text-slate-600 border-success">Download</button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- /pagination -->
            <div class="d-flex justify-content-center pt-3 mb-3">

                <paginator :dataSet="dataSet" @changed="fetch"></paginator>

            </div>
            <!-- /pagination -->
        </div>

        <!-- Left content -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Filter</span>

                </div>

                <!--<div class="card-body">-->
                <!--<form action="#">-->
                <!--<div class="form-group">-->
                <!--<div class="font-size-xs text-uppercase text-muted mb-3">Departments</div>-->

                <!--<div class="overflow-auto" style="max-height: 192px;">-->

                <!--<div class="form-check" v-for="(department, index) in items" :key="department.id">-->
                <!--<label class="form-check-label">-->
                <!--<input type="checkbox" class="form-input-check" name="departmentFilter">-->

                <!--{{ department.name }}-->

                <!--</label>-->
                <!--</div>-->

                <!--</div>-->
                <!--</div>-->


                <!--<button type="submit" class="btn bg-blue btn-block">Filter</button>-->
                <!--</form>-->
                <!--</div>-->
            </div>
        </div>
        <!-- Left content -->

    </div>
</template>

<script>
    import axios from 'axios';

    export default {

        data() {
            return {
                items: [],
                dataSet: false,
                departmentFilter: null,
                downloadUrl: ''
            }
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch(page) {
                axios.get(this.url(page))
                    .then(this.refresh);
            },

            url(page = 1) {
                if (!page) {
                    let query = location.search.match(/page=(\d+)/);
                    page = query ? query[1] : 1;
                }
                return `${location.pathname}/get-documents?page=${page}`
            },

            refresh({data}) {

                this.dataSet = data;
                this.items = data.data;
                window.scrollTo(0, 0)
            },

            downloadDocument(media) {
                axios.get('/f/download-document/' + media.id, media.id, {
                    responseType: 'blob', // important
                })
            },

            formatBytes(a, b) {
                if (0 === a) return "0 Bytes";
                let c = 1024, d = b || 2, e = ["Bytes", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"],
                    f = Math.floor(Math.log(a) / Math.log(c));
                return parseFloat((a / Math.pow(c, f)).toFixed(d)) + " " + e[f]
            }

        }
    }
</script>

<style scoped>

</style>
