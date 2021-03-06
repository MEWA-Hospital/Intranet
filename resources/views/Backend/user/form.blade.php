<!-- Username-->
<div class="form-group">
    <label for="first_name">Username <span class="text-danger small">* (Required)</span> </label>
    <input type="text" class="form-control" name="username" id="username" value="{{$user->username}}" readonly>
</div>

{{--<!-- first_name-->--}}
{{--<div class="form-group">--}}
    {{--<label for="first_name">Full Name <span class="text-danger small">* (Required)</span> </label>--}}
    {{--<input type="text" class="form-control" name="first_name" id="first_name" value="{{$user->first_name}}">--}}
{{--</div>--}}


<!-- Email-->
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
</div>

<!-- Telephone -->
<div class="form-group">
    <label for="telephone">Telephone</label>
    <input type="text" class="form-control" name="telephone" id="telephone" value="{{$user->telephone}}">
</div>

<!-- Department -->
<div class="form-group">
    <label for="department_id">Department <span class="text-danger small">* (Required)</span> </label>
    <select name="department_id" class="form-control" data-dependent="group_id">
        @foreach($departments as $department)
            <option value="{{ $department->id }}" @if($user->department_id == $department->id) selected @endif>{{ $department->name }}</option>
        @endforeach
    </select>
</div>

<!-- Group -->
{{--<div class="form-group">--}}
    {{--<label for="group_id">Group </label>--}}
    {{--<select name="group_id" class="form-control" id="group_id">--}}
        {{--<option value="" ></option>--}}
    {{--</select>--}}
{{--</div>--}}

<!-- Designation -->

<div class="form-group">
    <label for="designation">Designation</label>
    <input type="text" class="form-control" name="designation" id="designation" value="{{ $user->designation }}">
</div>

<input type="hidden" name="password" value="{{ (config('intranet.default_password')) }}">

</div> <!-- card-body-->

<div class="card-footer d-flex justify-content-between align-items-center">
    <a type="submit" class="btn btn-light btn-sm" href="{{ route('users.index') }}">Cancel</a>
    <button type="submit" class="btn bg-blue btn-sm">{{ $action }}<i class="icon-paperplane ml-2"></i></button>
</div>