@extends('layouts.app')

@section('content')


<form method="post">
	    @foreach($data  as $data)
	<div class="form-group">
    <label for="exampleInputPassword1">Tên Cửa  Hàng</label>
    <input type="text" name="name" class="form-control" placeholder="name store" value="{{$data->name_stores}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Địa Chỉ Cửa  Hàng</label>
    <input type="text" name="address" class="form-control" placeholder="name address" value="{{$data->address}}">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Email Cửa  Hàng</label>
    <input type="email" name="email" class="form-control" placeholder="name email" value="{{$data->email}}">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Số Điện Thoại Cửa  Hàng</label>
    <input type="text" name="phone" class="form-control" placeholder="name phone" value="{{$data->phone}}">
  </div>
   @endforeach
  <button type="submit" class="btn btn-primary">Sửa Cửa Hàng</button>
 {{csrf_field()}}
</form>
@endsection