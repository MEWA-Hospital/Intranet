<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>
    <div class="card-body">
        <h6 class="mb-3">Add comment</h6>
        <div class="mb-3">
            <textarea class="form-control" name="comment_body" rows="5" id="body" required placeholder="Have something to say?"
                      v-model="comment_body"></textarea>
        </div>

        <div class="text-right">
            <button type="button" @click="addComment" class="btn bg-blue"><i class="icon-plus22 mr-1"></i> Add comment
            </button>
        </div>
    </div>

</template>

<script>
    import $ from 'jquery';
    import 'jquery.caret';
    import axios from 'axios';
    import 'at.js';

    export default {
        data() {
            return {
                comment_body: '',
            }
        },

        mounted() {
            $('#body').atwho({
                at: '@',
                delay: 750,
                callbacks: {
                    remoteFilter: function(query, callback) {
                       $.getJSON('/api/users', {name: query}, function (usernames) {
                           callback(usernames)
                       })
                    }
                }
            })
        },

        methods: {
            addComment() {
                axios.post(location.pathname, {body: this.comment_body})
                    .then(({data}) => {
                        this.comment_body = '';
                        this.$emit('created', data.data);
                    })
            }
        }
    }
</script>
