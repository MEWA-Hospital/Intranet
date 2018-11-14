<comment :attributes="{{ $comment }}" inline-template v-cloak>
    <li class="media flex-column flex-md-row">
        <div class="mr-md-3 mb-2 mb-md-0">
            <a href="#"><img
                        src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"
                        class="rounded-circle" width="38" height="38" alt=""></a>
        </div>

        <div class="media-body">
            <div class="media-title">
                <a href="#"
                   class="font-weight-semibold">{{ $comment->user->fullname }}</a>
                <span class="text-muted ml-3">{{ $comment->created_at }}</span>
            </div>

            <div v-if="editing">
                <div class="form-group">
                    <textarea name="body" class="form-control" v-model="body"></textarea>
                </div>

                <button type="button" class="btn btn-link" @click="update">Update</button>
                <button class="btn btn-xs btn-link" @click="editing = false">Cancel</button>

            </div>
            <div v-else>
                <p v-text="body"></p>

            </div>

            <ul class="list-inline list-inline-dotted font-size-sm">
                <li class="list-inline-item">90 <a href="#"><i
                                class="icon-arrow-up22 text-success"></i></a><a
                            href="#"><i
                                class="icon-arrow-down22 text-danger"></i></a></li>
                <li class="list-inline-item" @click="editing = true">
                    <button type="button" class="btn btn-link">Edit</button>
                </li>
                <li class="list-inline-item">
                    <button type="button" class="btn btn-link" @click="deleteComment">Delete</button>
                </li>
            </ul>
        </div>
    </li>
</comment>