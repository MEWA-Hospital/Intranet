<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <div>
        <div v-for="(comment, index) in items">
            <comment :data="comment" @deleted="remove(index)"></comment>
        </div>

        <paginator :dataSet="dataSet" @changed="fetch"></paginator>


        <addComment @created="add"></addComment>
    </div>

    </template>

    <script>
        import comment from './CommentComponent.vue';
        import addComment from './NewComment.vue';
        import collection from '../mixins/collection.js';

        export default {

            components: {comment, addComment},

            mixins: [collection],

            data() {
                return {
                    dataSet:false,
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
                    if(! page) {
                        let query = location.search.match(/page=(\d+)/);
                        page = query ? query[1] : 1;
                    }
                    return `${location.pathname}/comments?page=${page}`
                },

                refresh({data}) {
                    this.dataSet = data;
                    this.items = data.data
                },
            }
        }
    </script>
