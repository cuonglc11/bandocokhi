@extends('layouts.app')

@section('content')
<form method="post">
	 <div class="form-group">
    <label for="exampleInputPassword1">Category</label>
    <input type="text" name="category" class="form-control" placeholder="name Category" required>
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
 {{csrf_field()}}	
</form>

@endsection