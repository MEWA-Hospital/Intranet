<!-- first_name-->
<div class="form-group">
    <label for="title">Article title <span class="text-danger small">* (Required)</span> </label>
    <input type="text" class="form-control" name="title" id="title" value="{{$news->title}}">
</div>

<!-- Department -->
<div class="form-group">
    <label for="email">Department</label>
    <input type="email" class="form-control" placeholder="choose the department publishing this article." name="email" id="email" value="{{ $news->department_id }}">
</div>

<!-- Author-->
<div class="form-group">
    <label for="email">Author  <span class="text-danger small">* (Required)</span> </label>
    <input type="email" class="form-control" placeholder="Choose an author" name="email" id="email" value="{{ $news->user_id }}">
</div>


<!-- Body -->
<div class="form-group">
    <label for="body">Article Body  <span class="text-danger small">* (Required)</span> </label>
    <textarea  class="form-control editor-full"  name="body" id="body">
        {!! $news->body !!}
    </textarea>
</div>

</div> <!-- card-body-->

<div class="card-footer d-flex justify-content-between align-items-center">
    <a type="submit" class="btn btn-light btn-sm" href="{{ route('news.index') }}">Cancel</a>
    <button type="submit" class="btn bg-blue btn-sm">{{ $action }}<i class="icon-paperplane ml-2"></i></button>
</div>