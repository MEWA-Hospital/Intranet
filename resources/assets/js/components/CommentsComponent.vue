<!--
  - Project: MEWA Hospital Intranet
  -  Developed by: Muhyadin Abdullahi (muhidin.rashid@mewa.or.ke) & Salim Juma (salim.silaha@mewa.or.ke).
  -  Last Modified: 10/27/18 4:19 PM.
  -
  -  Copyright (c) 2018: This project is open-sourced software licensed under the GNU Affero General Public License v3.0
  -   (https://opensource.org/licenses/AGPL-3.0).
  -->

<template>
    <li class="media flex-column flex-md-row">
        <div class="mr-md-3 mb-2 mb-md-0">
            <a href="#"><img
                    src="../../../../global_assets/images/placeholders/placeholder.jpg"
                    class="rounded-circle" width="38" height="38" alt=""></a>
        </div>

        <div class="media-body">
            <div class="media-title">
                <a href="#" class="font-weight-semibold">{{ $comment->user->fullname }}</a>
                <span class="text-muted ml-3">{{ $comment->created_at }}</span>
            </div>

            <p>{!! $comment->body !!}</p>

            <ul class="list-inline list-inline-dotted font-size-sm">
                <li class="list-inline-item">90 <a href="#"><i
                        class="icon-arrow-up22 text-success"></i></a><a href="#"><i
                        class="icon-arrow-down22 text-danger"></i></a></li>
                {{--<li class="list-inline-item"><a href="#">Reply</a></li>--}}
                <li class="list-inline-item"><a href="#">Edit</a></li>
                <li class="list-inline-item"><a href="#">Delete</a></li>
            </ul>
        </div>
    </li>
</template>

<script>
    export default {
        props: ['data'],
        data() {
            return {
                items: this.data
            }
        },
        methods() {
        },

    }
</script>
