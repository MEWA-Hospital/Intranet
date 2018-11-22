<!--
  - Project: MEWA Hospital Intranet
  -  Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -  Last Modified: 10/27/18 4:19 PM.
  -
  -  Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0
  -   (https://opensource.org/licenses/AGPL-3.0).
  -->

<template>
    <div >
        <li class="media flex-column flex-md-row">
            <div class="mr-md-3 mb-2 mb-md-0">
                <!--<a href="#"><img-->
                        <!--src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"-->
                        <!--class="rounded-circle" width="38" height="38" alt="">-->
                <!--</a>-->
            </div>

            <div class="media-body">
                <div class="media-title">
                    <a href="#"
                       class="font-weight-semibold">{{ data.user_id }}
                    </a>
                    <span class="text-muted ml-3" v-text="ago"></span>
                </div>

                <div v-if="editing">
                    <div class="form-group">
                        <textarea name="body" class="form-control" v-model="body"></textarea>
                    </div>

                    <button type="button" class="btn btn-link" @click="update">Update</button>
                    <button class="btn btn-xs btn-link" @click="editing=false">Cancel</button>

                </div>
                <div v-else>
                    <p v-text="body"></p>
                </div>

                <ul class="list-inline list-inline-dotted font-size-sm">
                    <!--<li class="list-inline-item">90 <a class="list-icons-item btn-link"><i-->
                            <!--class="icon-heart6 text-pink-300"></i></a></li>-->
                    <li class="list-inline-item" @click="editing = true" v-if="canUpdate">
                        <button type="button" class="btn btn-link" >Edit</button>
                    </li>
                    <li class="list-inline-item" v-if="canUpdate">
                        <button type="button" class="btn btn-link" @click="deleteComment" >Delete</button>
                    </li>
                </ul>
            </div>
        </li>
    </div>

</template>

<script>
    import moment from 'moment';

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
