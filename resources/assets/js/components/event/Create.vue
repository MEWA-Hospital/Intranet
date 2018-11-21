<!--
  - Project: MEWA Hospital Intranet
  -  Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -  Last Modified: 10/27/18 4:19 PM.
  -
  -  Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0
  -   (https://opensource.org/licenses/AGPL-3.0).
  -->

<template>
    <form class="card" @submit.prevent="onSubmit" @keydown="form.errors.clear()">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger small">* (Required)</span> </label>
                        <input type="text" class="form-control" name="name" id="name" v-model="form.name">
                        <span class="form-text text-muted"
                              v-if="form.errors.has('name')"
                              v-text="form.errors.get('name')"></span>
                    </div>

                </div>

                <div class="col-md-6">
                    <!-- Venue-->
                    <div class="form-group">
                        <label for="venue">Venue <span class="text-danger small">* (Required)</span> </label>
                        <input type="text" class="form-control" name="venue" id="venue" v-model="form.venue">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <!-- Start Date -->
                    <div class="form-group">
                        <label for="start_date">Start date </label>
                        <input type="date" class="form-control " name="start_date" id="start_date" v-model="form.start_date">
                    </div>

                </div>

                <div class="col-md-6">

                    <!-- Start Date -->
                    <div class="form-group">
                        <label for="end_date">End date </label>
                        <input type="date" class="form-control " name="end_date" id="end_date" v-model="form.end_date">
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Description -->
                    <div class="form-group">
                        <label for="body">Description<span class="text-danger small">* (Required)</span> </label>
                        <textarea class="form-control" name="body" id="body" rows="8"
                                  v-model="form.body"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-between align-items-center">
            <a type="submit" class="btn btn-light btn-sm" href="">Cancel</a>
            <button type="submit" class="btn bg-blue btn-sm" :disabled="form.errors.any()" >Submit<i class="icon-paperplane ml-2"></i></button>
        </div>

    </form>
</template>

<script>
    import Form from '../../utilities/Form';

    export default {
        props: ['endpoint'],
        data() {
            return {
                 form: new Form({
                    name: '',
                    venue: '',
                    body: '',
                    start_date: '',
                    end_date: ''
                }),
            }
        },
        methods: {
            onSubmit() {
                this.form.post('/' +this.endpoint).then(status => alert('Done'))
                .catch(errors=>console.log())
            }
        }
    }
</script>
