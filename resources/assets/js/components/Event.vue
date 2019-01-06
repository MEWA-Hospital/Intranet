<!--
  -  Project: MEWA Hospital Intranet
  -  Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -  Last Modified: 10/27/18 4:19 PM.
  -
  -   Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -->

<template>
    <div class="card">
        <div class="card-header bg-white header-elements-sm-inline border-bottom-1 border-bottom-indigo">
            <h6 class="card-title"><i class="icon-user-tie text-muted"></i> <span class="text-success">{{ data.user.username }}</span> said</h6>
            <div class="header-elements">
                <div class="d-flex justify-content-center">
                    <div class="text-muted mr-2" v-text="ago"></div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div v-if="editing">
                <div class="form-group">
                    <textarea name="body" class="form-control" v-model="body"></textarea>
                </div>

                <button type="button" class="btn btn-link" @click="update">Update</button>
                <button class="btn btn-xs btn-link" @click="editing=false">Cancel</button>

            </div>
            <div v-else>
                <span v-text="body"></span>
            </div>
        </div>

        <div class="card-footer bg-white d-flex justify-content-between align-items-center" v-if="canUpdate">
            <button type="button" class="btn btn-outline bg-indigo-400 text-indigo-400 border-indigo-400"
                    @click="editing = true" v-if="canUpdate">Edit</button>
            <button type="button" class="btn bg-blue" @click="deleteComment" v-if="canUpdate">Delete</button>
        </div>
    </div>



</template>

<script>
    import moment from 'moment';
    import axios from 'axios';

    export default {
        props: ['data'],

        data() {
            return {
                editing: false,
                id: this.data.id,
                body: this.data.body
            };
        },

        computed: {
            ago() {
                return moment(this.data.created_at).fromNow() + '...';
            },
            signedIn() {
                return window.App.signedIn;
            },
            canUpdate() {
                return this.authorize(user => this.data.user_id == user.id);
            }
        },

        methods: {
            update() {
                axios.patch('/events/' + this.data.id, {
                    body: this.body,
                });

                this.editing = false;
            },
            deleteComment() {
                axios.delete('/events/' + this.id);

                this.$emit('deleted', this.id);
            }
        }
    }
</script>
