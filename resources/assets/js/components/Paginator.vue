<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <ul class="pagination-separated justify-content-center twbs-separated pagination" v-if="shouldPaginate">
        <li class="page-item prev " v-show="prevUrl"><a href="#" rel="prev" class="page-link" @click.prevent="page--">Prev</a></li>

        <li class="page-item next" v-show="nextUrl"><a href="#" rel="next" class="page-link" @click.prevent="page++">Next</a></li>
    </ul>
</template>

<script>
    export default {
        props: ['dataSet'],

        data() {
            return {
                page: 1,
                prevUrl: false,
                nextUrl: false
            }
        },
        watch: {
            dataSet() {
                this.page = this.dataSet.pagination.current_page;
                this.prevUrl = this.dataSet.pagination.links.previous;
                this.nextUrl = this.dataSet.pagination.links.next;
            },

            page() {
                this.broadcast().updateUrl();
            }
        },
        computed: {
            shouldPaginate() {
                return !! this.prevUrl || !! this.nextUrl;
            }
        },

        methods: {
            broadcast() {
                return this.$emit('changed', this.page);
            },

            updateUrl() {
                history.pushState(null, null, '?page=' + this.page)
            }
        }
    }
</script>
<!-- TODO: Update data when user clicks browser back button-->
