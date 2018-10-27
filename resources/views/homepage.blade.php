@extends('layouts.master')
@section('page-header') Daashboard @stop

@section('content')

    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h6 class="card-title">This just in</h6>
                        </div>

                        <div class="card-body">
                            <div class="media">
                                <div class="mr-3">
                                    <a href="#">
                                        <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"
                                             class="rounded-circle" width="44" height="44" alt="">
                                    </a>
                                </div>

                                <div class="media-body">
                                    <h6 class="media-title">So alas some intriguing</h6>
                                    But darn discarded stubbornly far a after aboard well unimaginative ruthless and
                                    flamingo cow

                                    <div class="text-muted mt-1"><i class="icon-check"></i> Just now</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card-group-control card-group-control-right">
                        <div class="font-size-sm text-uppercase font-weight-semibold text-muted pt-2 mb-2">Department Updates</div>
                        <div class="card mb-2">
                            <div class="card-header">
                                <h6 class="card-title">
                                    <a class="text-default collapsed" data-toggle="collapse" href="#question6">
                                        <i class="icon-help mr-2 text-slate"></i> Their could can widen ten she any?
                                    </a>
                                </h6>
                            </div>

                            <div id="question6" class="collapse">
                                <div class="card-body">
                                    As so we smart those money in. Am wrote up whole so tears sense oh. Absolute
                                    required of reserved in offering no. How sense found our those gay again taken the.
                                    Had mrs outweigh desirous sex overcame. Improved property reserved disposal do
                                    offering me. Allow miles wound place the leave had. To sitting subject no improve
                                    studied limited indulgence connection.
                                </div>

                                <div class="card-footer bg-transparent d-sm-flex align-items-sm-center border-top-0 pt-0">
                                    <span class="text-muted">Latest update: May 2, 2015</span>

                                    <ul class="list-inline text-nowrap mb-0 ml-auto mt-2 mt-sm-0">
                                        <li class="list-inline-item"><a href="#" class="text-primary mr-2"><i
                                                        class="icon-thumbs-up2"></i></a> 832
                                        </li>
                                        <li class="list-inline-item"><a href="#" class="text-muted mr-2"><i
                                                        class="icon-thumbs-down2"></i></a> 32
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-2">
                            <div class="card-header">
                                <h6 class="card-title">
                                    <a class="text-default collapsed" data-toggle="collapse" href="#question7">
                                        <i class="icon-help mr-2 text-slate"></i> Her raising and himself pasture
                                        believe?
                                    </a>
                                </h6>
                            </div>

                            <div id="question7" class="collapse">
                                <div class="card-body">
                                    He unaffected sympathize discovered at no am conviction principles. Girl ham very
                                    how yet hill four show. Meet lain on he only size. Branched learning so subjects
                                    mistress do appetite jennings be in. Esteems up lasting no village morning do
                                    offices. Settled wishing ability musical may another set age. Diminution my
                                    apartments he attachment is entreaties.
                                </div>

                                <div class="card-footer bg-transparent d-sm-flex align-items-sm-center border-top-0 pt-0">
                                    <span class="text-muted">Latest update: May 1, 2015</span>

                                    <ul class="list-inline text-nowrap mb-0 ml-auto mt-2 mt-sm-0">
                                        <li class="list-inline-item"><a href="#" class="text-primary mr-2"><i
                                                        class="icon-thumbs-up2"></i></a> 453
                                        </li>
                                        <li class="list-inline-item"><a href="#" class="text-muted mr-2"><i
                                                        class="icon-thumbs-down2"></i></a> 30
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">Upcoming Events</h6>
                        </div>
                        <div class="card-body">
                            <table>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="mr-3">
                                            <a href="#">
                                                <img src="http://localhost/intranet/public/global_assets/images/placeholders/placeholder.jpg"
                                                     class="rounded-circle" width="44" height="44" alt="">
                                            </a>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="font-weight-semibold"><a href="task_manager_detailed.html">New blog
                                                layout</a></div>
                                        <div class="text-muted"><i class="icon-calendar"> </i> 25th January, 2019</div>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">Quick Poll</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="font-weight-semibold">Left stacked default</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="unstyled-radio-left"
                                               checked="">
                                        Selected default
                                    </label>
                                </div>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="unstyled-radio-left">
                                        Unselected default
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex ">
                                <button type="submit" class="btn bg-blue ml-3">Submit <i class="icon-check ml-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-success text-white header-elements-inline">
                    <h6 class="card-title">Compulsory read</h6>
                </div>
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold"><a href="#" class="text-teal-400">Snuffed the
                                    reproachful</a></h6>
                            Near one brightly some remade aside a concretely some or this and onto arch dear far gerbil
                            so great
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h6 class="card-title">Look Who's new</h6></div>
                <div class="card-body">
                    <li class="media">
                        <div class="mr-3">
                            <a href="#">
                                <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"
                                     class="rounded-circle" width="44" height="44" alt="">
                            </a>
                        </div>

                        <div class="media-body">
                            <h6 class="media-title">Ustadh Panadol</h6>
                            <p class="muted">Assistant Kikoto</p>
                        </div>
                    </li>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="card-title font-weight-semibold">Staff members</span>
                    <div class="header-elements">
                        <span class="badge badge-success badge-pill">12 online</span>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="media-list">
                        <li class="media">
                            <a href="#" class="mr-3">
                                <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"
                                     class="rounded-circle" width="36" height="36" alt="">
                            </a>
                            <div class="media-body">
                                <a href="#" class="media-title font-weight-semibold text-default">Will Jankins</a>
                                <span class="font-size-sm text-muted d-block"><span
                                            class="badge badge-mark border-success mr-1"></span> General questions</span>
                            </div>
                            <div class="align-self-center ml-3">
                                <div class="list-icons">
                                    <a href="#" class="list-icons-item"><i class="icon-comment-discussion"></i></a>
                                </div>
                            </div>
                        </li>

                        <li class="media">
                            <a href="#" class="mr-3">
                                <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"
                                     class="rounded-circle" width="36" height="36" alt="">
                            </a>
                            <div class="media-body">
                                <a href="#" class="media-title font-weight-semibold text-default">Margo Baker</a>
                                <span class="font-size-sm text-muted d-block"><span
                                            class="badge badge-mark border-danger mr-1"></span> Financial team</span>
                            </div>
                            <div class="align-self-center ml-3">
                                <div class="list-icons">
                                    <a href="#" class="list-icons-item"><i class="icon-comment-discussion"></i></a>
                                </div>
                            </div>
                        </li>

                        <li class="media">
                            <a href="#" class="mr-3">
                                <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"
                                     class="rounded-circle" width="36" height="36" alt="">
                            </a>
                            <div class="media-body">
                                <a href="#" class="media-title font-weight-semibold text-default">Beatrix Diaz</a>
                                <span class="font-size-sm text-muted d-block"><span
                                            class="badge badge-mark border-primary mr-1"></span> Item support</span>
                            </div>
                            <div class="align-self-center ml-3">
                                <div class="list-icons">
                                    <a href="#" class="list-icons-item"><i class="icon-comment-discussion"></i></a>
                                </div>
                            </div>
                        </li>

                        <li class="media">
                            <a href="#" class="mr-3">
                                <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"
                                     class="rounded-circle" width="36" height="36" alt="">
                            </a>
                            <div class="media-body">
                                <a href="#" class="media-title font-weight-semibold text-default">Richard Vango</a>
                                <span class="font-size-sm text-muted d-block"><span
                                            class="badge badge-mark border-grey-300 mr-1"></span> Intellectual property</span>
                            </div>
                            <div class="align-self-center ml-3">
                                <div class="list-icons">
                                    <a href="#" class="list-icons-item"><i class="icon-comment-discussion"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@stop
