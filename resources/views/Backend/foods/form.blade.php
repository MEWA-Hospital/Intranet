<!-- first_name-->
<div class="form-group">
    <label for="name">Food Name <span class="text-danger small">* (Required)</span> </label>
    <input type="text" class="form-control" name="name" placeholder="Food Name" id="name" value="{{$foods->name}}">
</div>

<!-- Email-->
<div class="form-group">
    <label for="description">Food Description</label>
    <input type="text" class="form-control" placeholder="Food Description" name="description" id="description" value="{{ $foods->description }}">
</div>

<div class="form-group">
    <label for="food_group">Food Category</label>
    <input type="text" class="form-control" placeholder="Enter Food Category" name="food_group" id="food_group" value="{{ $foods->food_group }}">
</div>

<div class="card-footer d-flex justify-content-between align-items-center">
    <a type="submit" class="btn btn-light btn-sm" href="{{ route('foods.index') }}">Cancel</a>
    <button type="submit" class="btn bg-blue btn-sm">{{ $action }}<i class="icon-paperplane ml-2"></i></button>
</div>