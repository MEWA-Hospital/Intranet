<!-- first_name-->
<div class="form-group">
    <label for="title">Article title <span class="text-danger small">* (Required)</span> </label>
    <input type="text" class="form-control" name="title" id="title" value="{{$news->title}}">
</div>

<!-- Body -->
<div class="form-group">
    <label for="body">Article Body <span class="text-danger small">* (Required)</span> </label>
    <wysiwyg name="body"></wysiwyg>
</div>

</div> <!-- card-body-->

<div class="card-footer d-flex justify-content-between align-items-center">
    <a type="submit" class="btn btn-light btn-sm" href="{{ route('news.index') }}">Cancel</a>
    <button type="submit" class="btn bg-blue btn-sm">{{ $action }}<i class="icon-paperplane ml-2"></i></button>
</div>
