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
        <div v-for="(comment, index) in items">
            <comment :data="comment" @deleted="remove(index)"></comment>
        </div>

        <addComment :endpoint="endpoint" @created="add"></addComment>
    </div>

    </template>

    <script>
        import comment from './CommentComponent.vue';
        import addComment from './NewComment.vue';

        export default {
            props: ['data'],

            components: {comment, addComment},

            data() {
                return {
                    items: this.data,
                    endpoint: location.pathname
                }
            },

            methods: {
                add(comment) {
                    this.items.push(comment);
                },

                remove(index) {
                    this.items.splice(index, 1);
                }
            }
        }
    </script>
