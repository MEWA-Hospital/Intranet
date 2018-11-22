<!--
  - Project: MEWA Hospital Intranet
  -  Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -  Last Modified: 10/27/18 4:19 PM.
  -
  -  Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0
  -   (https://opensource.org/licenses/AGPL-3.0).
  -->

<template>
    <form class="card" @submit.prevent="handleSubmit" @keydown="errors.clear()">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger small">* (Required)</span> </label>
                        <input type="text" class="form-control" v-validate="'required|max:255'" name="name" id="name"
                               v-model="name">
                        <span class="form-text text-danger"
                              v-if="errors.has('name')"
                              v-text="errors.first('name')"></span>
                    </div>

                </div>

                <div class="col-md-6">
                    <!-- Venue-->
                    <div class="form-group">
                        <label for="venue">Venue <span class="text-danger small">* (Required)</span> </label>
                        <input type="text" class="form-control" v-validate="'required|max:255'" name="venue" id="venue"
                               v-model="venue">
                        <span class="form-text text-danger"
                              v-if="errors.has('venue')"
                              v-text="errors.first('venue')"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <!-- Start Date -->
                    <div class="form-group">
                        <label for="start_date">Start date </label>
                        <input type="date" class="form-control " v-validate="'required'" name="start_date"
                               id="start_date" v-model="start_date">
                        <span class="form-text text-danger"
                              v-if="errors.has('start_date')"
                              v-text="errors.first('start_date')"></span>
                    </div>

                </div>

                <div class="col-md-6">

                    <!-- Start Date -->
                    <div class="form-group">
                        <label for="end_date">End date </label>
                        <input type="date" class="form-control " v-validate="'required'" name="end_date" id="end_date"
                               v-model="end_date">
                        <span class="form-text text-danger"
                              v-if="errors.has('end_date')"
                              v-text="errors.first('end_date')"></span>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Description -->
                    <div class="form-group">
                        <label for="body">Description<span class="text-danger small">* (Required)</span> </label>
                        <textarea class="form-control" v-validate="'required'" name="body" id="body" rows="8"
                                  v-model="body">
                      </textarea>
                        <span class="form-text text-danger"
                              v-if="errors.has('body')"
                              v-text="errors.first('body')">
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-between align-items-center">
            <a type="submit" class="btn btn-light btn-sm" href="">Cancel</a>
            <button type="submit" class="btn bg-blue btn-sm" :disabled="errors.any()">Submit<i
                    class="icon-paperplane ml-2"></i></button>
        </div>

    </form>
</template>

<script>
    // import Form from '../../utilities/Form';
    import {ValidationProvider} from 'vee-validate';

    export default {
        data() {
            return {
                name: '',
                body: '',
                venue: '',
                start_date: '',
                end_date: '',
            }
        },
        components: {
            ValidationProvider
        },
        methods: {
            handleSubmit(e) {
                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post('/Intranet/public/events', {
                            name: this.name,
                            body: this.body,
                            venue: this.venue,
                            start_date: this.start_date,
                            end_date: this.end_date
                        });
                    }
                }).then(flash('success'));
            }
        }
    }
</script>
