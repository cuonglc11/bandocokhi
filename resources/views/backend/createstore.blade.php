@extends('layouts.app')

@section('content')

<form method="post">
	<div class="form-group">
    <label for="exampleInputPassword1">Tên Cửa  Hàng</label>
    <input type="text" name="name" class="form-control" placeholder="name store" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Địa Chỉ Cửa  Hàng</label>
    <input type="text" name="address" class="form-control" placeholder="name address" required>
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Email Cửa  Hàng</label>
    <input type="email" name="email" class="form-control" placeholder="name email" required>
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Số Điện Thoại Cửa  Hàng</label>
    <input type="text" name="phone" class="form-control" placeholder="name phone" required>
  </div>
  <button type="submit" class="btn btn-primary">Thêm Cửa Hàng</button>
 {{csrf_field()}}
</form>


@endsection