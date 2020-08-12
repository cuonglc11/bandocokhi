@extends('fonend.app')

@section('main')
<form method="post">
	<div class="form-group" >
	<label>Cửa Hàng</label>
	<select required name="stores" class="form-control">
      @foreach($store as $data)
    <option value="{{$data->id}}">{{$data->name_stores}}</option>
        @endforeach   
    </select>
    </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Tên Khách  Hàng</label>
    <input type="text" name="name" class="form-control" placeholder="Tên Khách Hàng" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Địa Chỉ Khách Hàng</label>
    <input type="text" name="address" class="form-control" placeholder="Địa Chỉ Khách  Hàng" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email Cửa  Hàng</label>
    <input type="email" name="email" class="form-control" placeholder="Email" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Số Điện Thoại Cửa  Hàng</label>
    <input type="text" name="phone" class="form-control" placeholder="Phone" required>
  </div>
   <button type="submit" class="btn btn-primary">Thanh Toán</button>
 {{csrf_field()}}	
</form>

@endsection