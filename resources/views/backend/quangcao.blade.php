@extends('layouts.app')

@section('content')
<form method="POST" enctype="multipart/form-data">
	  <div class="form-group">
    <label for="exampleInputPassword1">Ảnh :</label>
    <input type="file" name="file" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
 {{csrf_field()}}	
</form>

@endsection