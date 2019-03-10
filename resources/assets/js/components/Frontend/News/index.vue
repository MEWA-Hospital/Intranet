<!--
  -   Project: MEWA Hospital Intranet
  -   Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -
  -    Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0 (https://opensource.org/licenses/AGPL-3.0).
  -
  -->

<template>

    <div class="d-flex align-items-start flex-column flex-md-row">

        <div class="row">
            <div class="col-md-9 overflow-auto order-1 order-md-1">
                <!-- Post grid -->
                <div class="row ">
                    <div class="col-md-4" v-for="article in items">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-img-actions mb-3">
                                    <img class="card-img img-fluid"
                                         src="/global_assets/images/placeholders/placeholder.jpg" alt="">
                                    <div class="card-img-actions-overlay card-img">
                                        <a v-bind:href="'/f/news/'+article.id+''"
                                           class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                            <i class="icon-link"></i>
                                        </a>
                                    </div>
                                </div>

                                <h5 class="font-weight-semibold mb-1">
                                    <a v-bind:href="'/f/news/'+article.id+''" class="text-default">{{ article.title}}</a>
                                </h5>

                                <ul class="list-inline list-inline-dotted text-muted mb-3">
                                    <li class="list-inline-item">By <a href="#" class="text-muted">{{ article.user.username}}</a></li>
                                    <li class="list-inline-item">{{ article.created_at}}</li>
                                </ul>

                                How proceed offered her offence shy forming. Returned peculiar pleasant but appetite
                                differed she. Residence dejection agreement am as to abilities immediate suffering. Ye
                                am depending propriety sweetness distrusts belonging collected. Smiling mention he
                            </div>

                            <div class="card-footer d-flex">
                                <a href="#" class="text-default"><i class="icon-heart6 text-pink mr-2"></i> 29</a>
                                <a href="#" class="ml-auto">Read more <i class="icon-arrow-right14 ml-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /post grid -->


                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-3 mb-3">
                    <ul class="pagination">
                        <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-small-right"></i></a>
                        </li>
                        <li class="page-item active"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-small-left"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- /pagination -->

            </div>

            <div class="col-md-3 order-2 order-md-2">
                <!-- Search -->
                <div class="card">
                    <div class="card-header bg-transparent header-elements-inline">
                        <span class="card-title font-weight-semibold">Search articles</span>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="#">
                            <div class="form-group-feedback form-group-feedback-right">
                                <input type="search" class="form-control" placeholder="Search...">
                                <div class="form-control-feedback">
                                    <i class="icon-search4 font-size-base text-muted"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /search -->


                <!-- Categories -->
                <div class="card">
                    <div class="card-header bg-transparent header-elements-inline">
                        <span class="card-title font-weight-semibold">Categories</span>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="nav nav-sidebar my-2">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="icon-wordpress"></i>
                                    Wordpress
                                    <span class="text-muted font-size-sm font-weight-normal ml-auto">12</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="icon-film2"></i>
                                    Video
                                    <span class="text-muted font-size-sm font-weight-normal ml-auto">26</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="icon-images2"></i>
                                    Images
                                    <span class="text-muted font-size-sm font-weight-normal ml-auto">83</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="icon-certificate"></i>
                                    Articles
                                    <span class="text-muted font-size-sm font-weight-normal ml-auto">43</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="icon-camera"></i>
                                    Photography
                                    <span class="text-muted font-size-sm font-weight-normal ml-auto">72</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="icon-bookmark"></i>
                                    Books
                                    <span class="text-muted font-size-sm font-weight-normal ml-auto">97</span>
                                </a>
                            </li>
                        </div>
                    </div>
                </div>
                <!-- /categories -->


                <!-- Share -->
                <div class="card">
                    <div class="card-header bg-transparent header-elements-inline">
                        <span class="card-title font-weight-semibold">Share</span>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pb-0">
                        <ul class="list-inline list-inline-condensed text-center mb-0">
                            <li class="list-inline-item">
                                <a href="#" class="btn bg-indigo btn-icon btn-lg rounded-round mb-3">
                                    <i class="icon-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn bg-danger btn-icon btn-lg rounded-round mb-3">
                                    <i class="icon-youtube3"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn bg-info btn-icon btn-lg rounded-round mb-3">
                                    <i class="icon-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn bg-orange btn-icon btn-lg rounded-round mb-3">
                                    <i class="icon-feed3"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /share -->


                <!-- Tags -->
                <div class="card">
                    <div class="card-header bg-transparent header-elements-inline">
                        <span class="card-title font-weight-semibold">Tags</span>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pb-2">
                        <ul class="list-inline list-inline-condensed mb-0">
                            <li class="list-inline-item">
                                <a href="#">
                                    <span
                                        class="badge badge-light badge-striped badge-striped-left border-left-success mb-2">Audio</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <span
                                        class="badge badge-light badge-striped badge-striped-left border-left-warning mb-2">Gallery</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <span
                                        class="badge badge-light badge-striped badge-striped-left border-left-indigo mb-2">Image</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <span
                                        class="badge badge-light badge-striped badge-striped-left border-left-teal mb-2">Music</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <span
                                        class="badge badge-light badge-striped badge-striped-left border-left-pink mb-2">Blog</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <span
                                        class="badge badge-light badge-striped badge-striped-left border-left-purple mb-2">Learn</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <span
                                        class="badge badge-light badge-striped badge-striped-left border-left-blue mb-2">Youtube</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <span
                                        class="badge badge-light badge-striped badge-striped-left border-left-slate mb-2">Twitter</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <span
                                        class="badge badge-light badge-striped badge-striped-left border-left-orange mb-2">Eugene</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <span
                                        class="badge badge-light badge-striped badge-striped-left border-left-brown mb-2">Limitless</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /tags -->


                <!-- Archive -->
                <div class="card">
                    <div class="card-header bg-transparent header-elements-inline">
                        <span class="card-title font-weight-semibold">Archive</span>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div class="nav nav-sidebar my-2">
                            <li class="nav-item">
                                <a href="#" class="nav-link">January 2018</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">December 2017</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">November 2017</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">October 2017</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">September 2017</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">August 2017</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">July 2017</a>
                            </li>
                        </div>
                    </div>
                </div>
                <!-- /archive -->


            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['news', 'action'],

        data() {
            return {
                items: this.news,
            }
        }

    }
</script>

<style scoped>

</style>
