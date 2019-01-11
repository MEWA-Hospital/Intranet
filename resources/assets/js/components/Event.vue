<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
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

        <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center" v-if="authorize('update', comment)">
            <span></span>

            <ul class="list-inline mb-0 mt-2 mt-sm-0">
                <li class="list-inline-item dropdown">
                    <a href="#" class="text-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu3"></i></a>

                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">

                        <button href="#" class="dropdown-item" @click="editing = true" ><i class="icon-pencil7"></i> Edit </button>
                        <button href="#" class="dropdown-item" @click="deleteComment" ><i class="icon-cross2"></i> Delete</button>
                    </div>
                </li>
            </ul>
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
                body: this.data.body,
                comment: this.data,
            };
        },

        computed: {
            ago() {
                return moment(this.data.created_at).fromNow() + '...';
            },
        },

        methods: {
            update() {
                axios.patch('/f/comment/' + this.data.id, {
                    body: this.body,
                });

                this.editing = false;
            },
            deleteComment() {
                axios.delete('/f/comment/' + this.id);

                this.$emit('deleted', this.id);
            }
        }
    }
</script>
