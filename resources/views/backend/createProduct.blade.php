@extends('layouts.app')

@section('content')
<form method="post" enctype="multipart/form-data">
	 <div class="form-group">
    <label for="exampleInputPassword1">Sản  Phẩm</label>
    <input type="text" name="product" class="form-control" placeholder="name Product" required>
  </div>
  <div class="form-group" >
	<label>Loại Hàng</label>
	<select required name="category" class="form-control">
		@foreach($cate  as $data)
		<option value="{{$data->id_cat}}">{{$data->name_cat}}</option>
        @endforeach		
   </select>
</div>
 <div class="form-group">
    <label for="exampleInputPassword1">Ảnh :</label>
    <input type="file" name="file" class="form-control" required>
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Tiền Sản Phẩm</label>
    <input type="number" name="price" class="form-control" placeholder="name price" required>
  </div>
  <div class="form-group" >
	<label>Tình Trạng</label>
	<select required name="status" class="form-control">
		<option value="1">Còn  Hàng</option>
		<option value="0">Hết  Hàng</option>
       
   </select>
</div>
<button type="submit" class="btn btn-primary">Thêm Hàng</button>
 {{csrf_field()}}
</form>




@endsection