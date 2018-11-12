@extends('layouts.master')
@section('page-header')  Dashboard @stop
@section('page-header-desc')
    <small>Welcome</small>, @stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn bg-green btn-block btn-float">
                                        <i class="icon-phone icon-2x"></i>
                                        <span>Extensions</span>
                                    </button>

                                </div>
                                <div class="col">
                                    <button type="button" class="btn bg-warning-400 btn-block btn-float">
                                        <i class="icon-help icon-2x"></i>
                                        <span>Tickets</span>
                                    </button>

                                </div>
                                <div class="col">
                                    <button type="button" class="btn bg-blue btn-block btn-float">
                                        <i class="icon-cog3 icon-2x"></i>
                                        <span>Settings</span>
                                    </button>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn bg-primary btn-block btn-float">
                                        <i class="icon-people icon-2x"></i>
                                        <span>Employees corner</span>
                                    </button>

                                </div>
                                <div class="col">
                                    <button type="button" class="btn bg-pink-400 btn-block btn-float">
                                        <i class="icon-pointer icon-2x"></i>
                                        <span>Biometric clocking</span>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-center mb-1 ">
                                <h4 class="font-weight-semibold mb-1">Open Tickets</h4>
                            </div>
                            <div class="card border-left-3 border-left-success rounded-left-0">
                                <div class="card-body">
                                    <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                        <div>
                                            <h6 class="font-weight-semibold">Internet connection problem @ MCH</h6>
                                            <ul class="list list-unstyled mb-0">
                                                <li>Ticket #: <a href="#">0027</a></li>
                                                <li>created by: <span
                                                            class="font-weight-semibold">Feiruz Mohamed </span></li>
                                            </ul>
                                        </div>

                                        <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                                            <ul class="list list-unstyled mb-0">

                                                <li class="dropdown">
                                                    Status: &nbsp;
                                                    <a href="#" class="badge bg-success-400 align-top dropdown-toggle"
                                                       data-toggle="dropdown">open</a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item"><i class="icon-alert"></i>
                                                            Overdue</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-alarm"></i>
                                                            Pending</a>
                                                        <a href="#" class="dropdown-item active"><i
                                                                    class="icon-checkmark3"></i> Paid</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item"><i
                                                                    class="icon-spinner2 spinner"></i> On hold</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-cross2"></i>
                                                            Canceled</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
										<span>
											<span class="badge badge-mark border-success mr-2"></span>
											Created:
											<span class="font-weight-semibold">2018/03/24</span>
										</span>

                                    <ul class="list-inline list-inline-condensed mb-0 mt-2 mt-sm-0">
                                        <li class="list-inline-item">
                                            <a href="#" class="text-default" data-toggle="modal" data-target="#invoice"><i
                                                        class="icon-eye8"></i></a>
                                        </li>
                                        <li class="list-inline-item dropdown">
                                            <a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"><i
                                                        class="icon-menu7"></i></a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item"><i class="icon-eye"></i> View tickets</a>
                                                <a href="#" class="dropdown-item"><i class="icon-close2"></i> Close
                                                    ticket</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card border-left-3 border-left-success rounded-left-0">
                                <div class="card-body">
                                    <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                        <div>
                                            <h6 class="font-weight-semibold">Internet connection problem @ MCH</h6>
                                            <ul class="list list-unstyled mb-0">
                                                <li>Ticket #: <a href="#">0027</a></li>
                                                <li>created by: <span
                                                            class="font-weight-semibold">Feiruz Mohamed </span></li>
                                            </ul>
                                        </div>

                                        <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                                            <ul class="list list-unstyled mb-0">

                                                <li class="dropdown">
                                                    Status: &nbsp;
                                                    <a href="#" class="badge bg-success-400 align-top dropdown-toggle"
                                                       data-toggle="dropdown">open</a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item"><i class="icon-alert"></i>
                                                            Overdue</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-alarm"></i>
                                                            Pending</a>
                                                        <a href="#" class="dropdown-item active"><i
                                                                    class="icon-checkmark3"></i> Paid</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item"><i
                                                                    class="icon-spinner2 spinner"></i> On hold</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-cross2"></i>
                                                            Canceled</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
										<span>
											<span class="badge badge-mark border-success mr-2"></span>
											Created:
											<span class="font-weight-semibold">2018/03/24</span>
										</span>

                                    <ul class="list-inline list-inline-condensed mb-0 mt-2 mt-sm-0">
                                        <li class="list-inline-item">
                                            <a href="#" class="text-default" data-toggle="modal" data-target="#invoice"><i
                                                        class="icon-eye8"></i></a>
                                        </li>
                                        <li class="list-inline-item dropdown">
                                            <a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"><i
                                                        class="icon-menu7"></i></a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item"><i class="icon-eye"></i> View tickets</a>
                                                <a href="#" class="dropdown-item"><i class="icon-close2"></i> Close
                                                    ticket</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card border-left-3 border-left-success rounded-left-0">
                                <div class="card-body">
                                    <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                        <div>
                                            <h6 class="font-weight-semibold">Internet connection problem @ MCH</h6>
                                            <ul class="list list-unstyled mb-0">
                                                <li>Ticket #: <a href="#">0027</a></li>
                                                <li>created by: <span
                                                            class="font-weight-semibold">Feiruz Mohamed </span></li>
                                            </ul>
                                        </div>

                                        <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                                            <ul class="list list-unstyled mb-0">

                                                <li class="dropdown">
                                                    Status: &nbsp;
                                                    <a href="#" class="badge bg-success-400 align-top dropdown-toggle"
                                                       data-toggle="dropdown">open</a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item"><i class="icon-alert"></i>
                                                            Overdue</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-alarm"></i>
                                                            Pending</a>
                                                        <a href="#" class="dropdown-item active"><i
                                                                    class="icon-checkmark3"></i> Paid</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item"><i
                                                                    class="icon-spinner2 spinner"></i> On hold</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-cross2"></i>
                                                            Canceled</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
										<span>
											<span class="badge badge-mark border-success mr-2"></span>
											Created:
											<span class="font-weight-semibold">2018/03/24</span>
										</span>

                                    <ul class="list-inline list-inline-condensed mb-0 mt-2 mt-sm-0">
                                        <li class="list-inline-item">
                                            <a href="#" class="text-default" data-toggle="modal" data-target="#invoice"><i
                                                        class="icon-eye8"></i></a>
                                        </li>
                                        <li class="list-inline-item dropdown">
                                            <a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"><i
                                                        class="icon-menu7"></i></a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item"><i class="icon-eye"></i> View tickets</a>
                                                <a href="#" class="dropdown-item"><i class="icon-close2"></i> Close
                                                    ticket</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="text-center mb-1 ">
                                <span class="text-muted d-block text-capitalize">NEWS & Announcements</span>
                            </div>
                            <!-- Announcement -->
                            <div class="card blog-horizontal blog-horizontal-xs">
                                <div class="card-header bg-transparent header-elements-inline">
                                    <span class="badge badge-flat badge-icon border-pink text-pink-600 rounded-circle"><i
                                                class="icon-bell3"></i></span>
                                    <span class="card-title font-weight-semibold"><span class="badge badge-success">Important</span>  Announcement</span>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <h5 class="font-weight-semibold my-1">
                                            <a href="#" class="text-default">Blog with mini media</a>
                                        </h5>
                                    </div>

                                    <p>The bedding was hardly able to cover it and seemed ready to slide off any moment.
                                        The bedding was hardly able to cover it.</p>
                                    His many legs, pitifully thin compared with the size of the rest of him, waved about
                                    helplessly as he looked <a href="#">[...]</a>
                                </div>
                                <div class="card-footer bg-transparent d-sm-flex justify-content-sm-between align-items-sm-center border-top-0 pt-0 pb-3">
                                    <ul class="list-inline list-inline-dotted text-muted mb-3 mb-sm-0">
                                        <li class="list-inline-item">By <a href="#" class="text-muted">HRM</a></li>
                                        <li class="list-inline-item">July 5th, 2016</li>
                                        <li class="list-inline-item"><a href="#" class="text-muted">12 comments</a></li>
                                    </ul>

                                    <a href="#" class="text-muted"><i class="icon-eye text-green mr-2"></i> 281</a>
                                </div>
                            </div>
                            <!-- Announcement -->

                            <!-- Announcement -->
                            <div class="card blog-horizontal blog-horizontal-xs">
                                <div class="card-header bg-transparent header-elements-inline">
                                    <span class="badge badge-flat badge-icon border-pink text-pink-600 rounded-circle"><i
                                                class="icon-bell3"></i></span>
                                    <span class="card-title font-weight-semibold"><span class="badge badge-success">Important</span>  Announcement</span>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <h5 class="font-weight-semibold my-1">
                                            <a href="#" class="text-default">Blog with mini media</a>
                                        </h5>
                                    </div>

                                    <p>The bedding was hardly able to cover it and seemed ready to slide off any moment.
                                        The bedding was hardly able to cover it.</p>
                                    His many legs, pitifully thin compared with the size of the rest of him, waved about
                                    helplessly as he looked <a href="#">[...]</a>
                                </div>
                                <div class="card-footer bg-transparent d-sm-flex justify-content-sm-between align-items-sm-center border-top-0 pt-0 pb-3">
                                    <ul class="list-inline list-inline-dotted text-muted mb-3 mb-sm-0">
                                        <li class="list-inline-item">By <a href="#" class="text-muted">HRM</a></li>
                                        <li class="list-inline-item">July 5th, 2016</li>
                                        <li class="list-inline-item"><a href="#" class="text-muted">12 comments</a></li>
                                    </ul>

                                    <a href="#" class="text-muted"><i class="icon-eye text-green mr-2"></i> 281</a>
                                </div>
                            </div>
                            <!-- Announcement -->

                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="mr-3">
                                <a href="#">
                                    <img src="../../../../global_assets/images/placeholders/placeholder.jpg"
                                         class="rounded" width="38" height="38" alt="">
                                </a>
                            </div>

                            <div class="media-body">
                                <div class="media-title font-weight-semibold">Barbara Walden</div>
                                <span class="badge bg-indigo">SEO specialist</span>
                            </div>

                            <div class="ml-3 align-self-center">
                            </div>
                        </div>
                    </div>

                    <div class="card ">
                        <div class="card-body">
                            <div class="form-group pt-2">
                                <label class="font-weight-semibold">What Do You think of the intranet?</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <div class="uniform-choice"><span class="checked"><input type="radio"
                                                                                                 class="form-check-input-styled"
                                                                                                 name="stacked-radio-left"
                                                                                                 checked=""
                                                                                                 data-fouc=""></span>
                                        </div>
                                        Awesome
                                    </label>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <div class="uniform-choice"><span><input type="radio"
                                                                                 class="form-check-input-styled"
                                                                                 name="stacked-radio-left" data-fouc=""></span>
                                        </div>
                                        Ok
                                    </label>
                                </div>

                                <div class="form-check ">
                                    <label class="form-check-label">
                                        <div class="uniform-choice "><span><input type="radio"
                                                                                  class="form-check-input-styled"
                                                                                  disabled="" data-fouc=""></span></div>
                                        Bad
                                    </label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-sm ">Vote <i class="icon-paperplane"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-1 ">
                        <h4 class="font-weight-semibold mb-1">Upcoming Events</h4>
                        <span class="text-muted d-block">calendar of events</span>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg"
                                             class="rounded-circle" width="36" height="36" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">Isak Temes</a>
                                            <span class="font-size-sm text-muted">19:58</span>
                                        </div>

                                        Reasonable palpably rankly expressly grimy...
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg"
                                             class="rounded-circle" width="36" height="36" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">Vittorio Cosgrove</a>
                                            <span class="font-size-sm text-muted">16:35</span>
                                        </div>

                                        Arguably therefore more unexplainable fumed...
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg"
                                             class="rounded-circle" width="36" height="36" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">Hilary Talaugon</a>
                                            <span class="font-size-sm text-muted">12:16</span>
                                        </div>

                                        Nicely unlike porpoise a kookaburra past more...
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg"
                                             class="rounded-circle" width="36" height="36" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="#">Bobbie Seber</a>
                                            <span class="font-size-sm text-muted">09:20</span>
                                        </div>

                                        Before visual vigilantly fortuitous tortoise...
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header bg-transparent header-elements-inline">
                            <span class="card-title font-weight-semibold">Latest updates</span>
                            <div class="header-elements">
                                <a href="#">See all</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="mr-3">
                                        <a href="#"
                                           class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon">
                                            <i class="icon-spinner11"></i>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="#">David Linner</a> requested money back for a double debit card charge
                                        <div class="font-size-sm text-muted mt-1">12 minutes ago</div>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <a href="#"
                                           class="btn bg-transparent border-danger text-danger rounded-round border-2 btn-icon">
                                            <i class="icon-infinite"></i>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        User <a href="#">Christopher Wallace</a> is on hold and awaiting for staff reply
                                        <div class="font-size-sm text-muted mt-1">16 minutes ago</div>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <a href="#"
                                           class="btn bg-transparent border-info text-info rounded-round border-2 btn-icon">
                                            <i class="icon-cash3"></i>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        All sellers have received monthly payouts
                                        <div class="font-size-sm text-muted mt-1">4 hours ago</div>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <a href="#"
                                           class="btn bg-transparent border-success text-success rounded-round border-2 btn-icon">
                                            <i class="icon-checkmark3"></i>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        Ticket #43683 has been closed by <a href="#">Victoria Wilson</a>
                                        <div class="font-size-sm text-muted mt-1">Apr 28, 21:39</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop