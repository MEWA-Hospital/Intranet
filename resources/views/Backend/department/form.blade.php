<!-- first_name-->
<div class="form-group">
    <label for="first_name">Department Name <span class="text-danger small">* (Required)</span> </label>
    <input type="text" class="form-control" name="name" id="name" value="{{$department->name}}">
</div>

<!-- Email-->
<div class="form-group">
    <label for="email">Department Email</label>
    <input type="email" class="form-control" placeholder="Department email address" name="email" id="email" value="{{ $department->email }}">
</div>


<!-- Email-->
<div class="form-group">
    <label for="mailing_list">Department Mailing Email</label>
    <input type="email" class="form-control" placeholder="Mailing address that will be used to mail all users" name="mailing_list" id="mailing_list" value="{{ $department->mailing_list }}">
</div>

</div> <!-- card-body-->

<div class="card-footer d-flex justify-content-between align-items-center">
    <a type="submit" class="btn btn-light btn-sm" href="{{ route('departments.index') }}">Cancel</a>
    <button type="submit" class="btn bg-blue btn-sm">{{ $action }}<i class="icon-paperplane ml-2"></i></button>
</div>