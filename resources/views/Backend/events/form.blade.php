<div class="row">
    <div class="col-md-6">
        <!-- Name -->
        <div class="form-group">
            <label for="Title">Title <span class="text-danger small">* (Required)</span> </label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $event->title }}">
        </div>

    </div>

    <div class="col-md-6">
        <!-- Venue-->
        <div class="form-group">
            <label for="Venue">Venue <span class="text-danger small">* (Required)</span> </label>
            <input type="text" class="form-control" name="venue" id="venue" value="{{ $event->venue }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">

        <!-- Start Date -->
        <div class="form-group">
            <label for="From">Date & Time </label>
            <input type="text" class="form-control daterange-time" name="date-range"  placeholder="Event date & time" value="{{ $event->start_date }}">
        </div>

    </div>

</div>

<!-- Description -->
<div class="form-group">
    <label for="Description">Description<span class="text-danger small">* (Required)</span> </label>
    <textarea type="text" class="form-control" name="description" id="description"
              value="{{ $event->description }}"></textarea>
</div>


{{--<!-- Department -->--}}
{{--<div class="form-group">--}}
{{--<label for="department_id">Department <span class="text-danger small">* (Required)</span> </label>--}}
{{--<select name="department_id" class="form-control" data-dependent="group_id">--}}
{{--@foreach($departments as $department)--}}
{{--<option value="{{ $department->id }}" @if($user->department_id == $department->id) selected @endif>{{ $department->name }}</option>--}}
{{--@endforeach--}}
{{--</select>--}}
{{--</div>--}}

<!-- Group -->
{{--<div class="form-group">--}}
{{--<label for="group_id">Group </label>--}}
{{--<select name="group_id" class="form-control" id="group_id">--}}
{{--<option value="" ></option>--}}
{{--</select>--}}
{{--</div>--}}

</div> <!-- card-body-->

<div class="card-footer d-flex justify-content-between align-items-center">
    <a type="submit" class="btn btn-light btn-sm" href="{{ route('events.index') }}">Cancel</a>
    <button type="submit" class="btn bg-blue btn-sm">{{ $action }}<i class="icon-paperplane ml-2"></i></button>
</div>
