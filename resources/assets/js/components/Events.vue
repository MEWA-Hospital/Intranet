<!--
  - Project: MEWA Hospital Intranet
  -  Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -  Last Modified: 10/27/18 4:19 PM.
  -
  -  Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0
  -   (https://opensource.org/licenses/AGPL-3.0).
  -->

<template>
    <div>
        <div v-for="(event, index) in items">
            <event :data="event" @deleted="remove(index)"></event>
        </div>

        <paginator :dataSet="dataSet" @changed="fetch"></paginator>


        <addComment @created="add"></addComment>
    </div>

    </template>

    <script>
        import event from './Event.vue';
        import addComment from './NewComment.vue';
        import collection from '../mixins/collection.js';

        export default {

            components: {event, addComment},

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
                    return `${location.pathname}/events?page=${page}`
                },

                refresh({data}) {
                    this.dataSet = data;
                    this.items = data.data
                },
            }
        }
    </script>
