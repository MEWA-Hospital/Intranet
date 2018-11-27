<template>
    <div class="d-md-flex align-items-md-start">
        <!-- Left content-->
        <div class=" sidebar-light sidebar-component sidebar-component-left wmin-300 shadow-5 sidebar-expand-md">
            <div class="card">
                <div class="card-body text-center card-img-top"
                     style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png); background-size: contain;">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid img-thumbnail" :src="avatar" width="350" height="170" alt="">
                    </div>

                    <h6 class="font-weight-semibold mb-0" v-text="user.username"></h6>
                    <span class="d-block opacity-75">Head of UX</span>
                </div>

                <div class="card-body p-0">
                    <ul class="nav nav-sidebar mb-2">
                        <li class="nav-item-header">Navigation</li>
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active" data-toggle="tab">
                                <i class="icon-user"></i>
                                My profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#schedule" class="nav-link" data-toggle="tab">
                                <i class="icon-touch"></i>
                                Biometric
                                <span class="font-size-sm font-weight-normal opacity-75 ml-auto">02:56pm</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings" class="nav-link" data-toggle="tab">
                                <i class="icon-wrench"></i>
                                Account Settings
                            </a>
                        </li>

                        <li class="nav-item-divider"></li>
                        <li class="nav-item">
                            <a href="login_advanced.html" class="nav-link" data-toggle="tab">
                                <i class="icon-switch2"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Left content -->

        <!-- Right content -->
        <div class="tab-content w-100 overflow-auto">
            <div class="tab-pane fade active show" id="profile">

                <!-- Profile info -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Profile information</h5>

                    </div>

                    <div class="card-body">
                        <form action="#">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Username</label>
                                        <input type="text" v-model="user.username" class="form-control"
                                               readonly="readonly">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Full name</label>
                                        <input type="text" value="Kopyov" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Address line 1</label>
                                        <input type="text" value="Ring street 12" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Address line 2</label>
                                        <input type="text" value="building D, flat #67" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>City</label>
                                        <input type="text" value="Munich" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>State/Province</label>
                                        <input type="text" value="Bayern" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>ZIP code</label>
                                        <input type="text" value="1031" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input type="text" readonly="readonly" v-model="user.email"
                                               class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Your country</label>
                                        <select class="form-control form-control-select2 select2-hidden-accessible"
                                                data-fouc="" tabindex="-1" aria-hidden="true">
                                            <option value="germany" selected="">Germany</option>
                                            <option value="france">France</option>
                                            <option value="spain">Spain</option>
                                            <option value="netherlands">Netherlands</option>
                                            <option value="other">...</option>
                                            <option value="uk">United Kingdom</option>
                                        </select><span class="select2 select2-container select2-container--default"
                                                       dir="ltr" style="width: 100%;"><span class="selection"><span
                                            class="select2-selection select2-selection--single" role="combobox"
                                            aria-haspopup="true" aria-expanded="false" tabindex="0"
                                            aria-labelledby="select2-9z52-container"><span
                                            class="select2-selection__rendered" id="select2-9z52-container"
                                            title="Germany">Germany</span><span class="select2-selection__arrow"
                                                                                role="presentation"><b
                                            role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                                                                                               aria-hidden="true"></span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone #</label>
                                        <input type="text" v-model="user.telephone" class="form-control" readonly="readonly">
                                        <span class="form-text text-muted">0707123456</span>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Upload profile image</label>
                                        <input type="file" name="avatar" accept="image/*" @change="onChange">
                                        <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /profile info -->

            </div>
            <div class="tab-pane fade" id="settings">

                <!-- Account settings -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Account settings</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="#">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Username</label>
                                        <input type="text" value="Kopyov" readonly="readonly" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Current password</label>
                                        <input type="password" value="password" readonly="readonly"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>New password</label>
                                        <input type="password" placeholder="Enter new password" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Repeat password</label>
                                        <input type="password" placeholder="Repeat new password" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /account settings -->
            </div>
        </div>
        <!-- Right content -->

    </div>
</template>

<script>
    export default {
        props: ['user', 'media'],
        data() {
            return {
                avatar: this.media,
            };
        },

        methods: {
            onChange(e) {
                if (!e.target.files.length) {
                    return
                }
                ;

                let profile = e.target.files[0];

                let reader = new FileReader();

                reader.readAsDataURL(profile);

                reader.onload = e => {
                    this.avatar = e.target.result;
                };

                this.uploadAvatar(profile);
            },

            uploadAvatar(profile) {
                let data = new FormData();

                data.append('avatar', profile);
                data.append('username', this.user.username)

                axios.post('/Intranet/public/profile/${this.user.username}/picture', data)
            }
        }
    }
</script>

<style scoped>

</style>
