@extends('layouts.app')

@section('content')
<form method="post" enctype="multipart/form-data">
    @foreach($product  as $product)
	 <div class="form-group">
    <label for="exampleInputPassword1">Sản  Phẩm</label>
    <input type="text" name="product" class="form-control" placeholder="name Product" value="{{$product->name_product}}">
  </div>
  <div class="form-group" >
	<label>Loại Hàng</label>
	<select required name="category" class="form-control">

	
		<option value="{{$product->id_cat}}" checked>{{$product->name_cat}}</option>
      @foreach($cate  as $data)
    <option value="{{$data->id_cat}}">{{$data->name_cat}}</option>
        @endforeach   
       
   </select>
</div>
 <div class="form-group">
    <label for="exampleInputPassword1">Ảnh :</label><br>
    <img src="{{asset('img/'.$product->img_product)}}" style="width: 8%;">
    <input type="file" name="file" class="form-control" value="{{$product->img_product}}">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Tiền Sản Phẩm</label>
    <input type="number" name="price" value="{{$product->price}}" class="form-control" placeholder="name price" required>
  </div>
  <div class="form-group" >
	<label>Tình Trạng</label>
	<select required name="status" class="form-control">
		<option value="1">Còn  Hàng</option>
		<option value="0">Hết  Hàng</option>
       
   </select>
</div>

      @endforeach
<button type="submit" class="btn btn-primary">Sửa Sản  Phẩm  </button>
 {{csrf_field()}}
</form>




@endsection