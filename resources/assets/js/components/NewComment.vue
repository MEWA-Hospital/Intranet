<!--
  - Project: MEWA Hospital Intranet
  -  Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -  Last Modified: 10/27/18 4:19 PM.
  -
  -  Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0
  -   (https://opensource.org/licenses/AGPL-3.0).
  -->

<template>
    <div class="card-body">
        <h6 class="mb-3">Add comment</h6>
        <div class="mb-3">
            <textarea class="form-control" name="comment_body" rows="5" required placeholder="Have something to say?" v-model="comment_body"></textarea>
        </div>

        <div class="text-right">
            <button type="button" @click="addComment" class="btn bg-blue"><i class="icon-plus22 mr-1"></i> Add comment</button>
        </div>
    </div>

</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                comment_body: '',

            }
        },


        methods: {
            addComment() {
                axios.post(location.pathname, { body: this.comment_body })
                    .then(({data}) => {
                    this.comment_body = '';
                    this.$emit('created', data);
                    window.location.reload()
                })
            }
        }
    }
</script>
