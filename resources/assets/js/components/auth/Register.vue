<template>

    <!-- Registration form -->
    <form @submit.prevent="handleSubmit" @keydown="errors.clear()" class="flex-fill">
        <div class="row">
            <div class="col-lg-6 offset-lg-3" v-if="completed">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Request Submitted</h5>
                        <p class="card-text">You request has been submitted and is waiting approval from the ICT
                            Department.
                            Once done, your account confirmation details will be emailed to the provided email.</p>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <span class="text-muted">ICT Department</span>
                    </div>
                </div>
            </div>
            <div class="col-md-5 offset-md-3" v-else>
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                            <h5 class="mb-0">Account Request form</h5>
                            <span class="d-block text-muted"><span
                                    class="text-danger">All fields are required</span> </span>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-right">
                            <input type="text" class="form-control" name="username" placeholder="Choose username"
                                   v-model="username" v-validate="'required|max:50'">
                            <div class="form-control-feedback">
                                <i class="icon-user-plus text-muted"></i>
                            </div>
                            <span class="form-text text-danger"
                                  v-if="errors.has('username')"
                                  v-text="errors.first('username')"></span>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="text" class="form-control" name="first_name" v-model="first_name"
                                           v-validate="'required'"
                                           placeholder="First name">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="text" class="form-control" name="last_name" v-model="last_name"
                                           v-validate="'required'"
                                           placeholder="Last name">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="email" class="form-control" name="email" v-model="email"
                                           v-validate="'required'"
                                           placeholder="Your MEWA domain email">
                                    <div class="form-control-feedback">
                                        <i class="icon-mention text-muted"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="text" class="form-control" name="telephone" v-model="telephone"
                                           v-validate="'required'"
                                           placeholder="0712345678">
                                    <div class="form-control-feedback">
                                        <i class="icon-phone-plus text-muted"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="password" class="form-control" name="password" v-model="password"
                                           v-validate="'required'"
                                           placeholder="Create password">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock text-muted"></i>
                                    </div>
                                    <span class="form-text text-danger"
                                          v-if="errors.has('password')"
                                          v-text="errors.first('password')"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <select class="form-control" name="department_id" id="department" v-model="department_id">
                                        <option v-for="item in items" v-bind:value="item.id">{{item.name}}</option>
                                    </select>
                                    <div class="form-control-feedback">
                                        <i class="icon-users text-muted"></i>
                                    </div>

                                    <span class="form-text text-danger"
                                          v-if="errors.has('department')"
                                          v-text="errors.first('department')"></span>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-4 offset-md-4 mb-2">
                            <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right btn-block">
                                <b><i
                                        class="icon-plus3"></i></b> Submit request
                            </button>

                        </div>
                    </div>

                    <div class="form-group text-center text-muted content-divider">
                        <span class="px-2">Have an account?</span>
                    </div>
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <div class="form-group">
                                <a href="login" class="btn btn-light btn-block">Sign in</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- /registration form -->

</template>

<script>
    import {ValidationProvider} from 'vee-validate';

    export default {
        components: {
            ValidationProvider
        },

        data() {
            return {
                completed: false,
                username: '',
                password: '',
                first_name: '',
                last_name: '',
                email: '',
                telephone: '',
                department_id: '',
                items: [],
            }
        },

        computed: {
            completedForm() {
                return this.completed = true;
            }
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch() {
                axios.get('/Intranet/public/getDepartments').then(this.refresh);
            },

            refresh({data}) {
                this.items = data.data
            },

            handleSubmit(e) {
                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post('/Intranet/public/accountRequest', {
                            username: this.username,
                            password: this.password,
                            first_name: this.first_name,
                            last_name: this.last_name,
                            email: this.email,
                            department_id: this.department_id,
                            telephone: this.telephone
                        });
                    }
                }).then(this.completedForm);
            }
        }


    }
</script>

