
@extends('layouts.app')

@section('content')
<form method="get">
	<div class="form-group" >
	<label>Cửa Hàng</label>
	<select required name="custom" class="form-control">
      @foreach($cus  as $data)
    <option value="{{$data->id_cus}}">{{$data->id_cus}} -- {{$data->name_cus}}</option>
      @endforeach   
    </select>
    <button type="submit" class="btn btn-primary">Kiểm tra đơn hàng </button>
 {{csrf_field()}}
</div>
</form>
Số đặt hàng :  
 @foreach($phone  as $data)
 {{$data->phone_cus}}
 @endforeach  
 <br>
 Email khách Hàng:
  @foreach($phone  as $data)
 {{$data->email_cus}}
 @endforeach 
 <br>
 tổng tiền thanh toán : {{number_format($sumPrice,0,',','.')}} VND
 <br>
 số lượng mua hàng : {{$sumProduct}}
<table class="table table-bordered">
	<thead>
	<tr class="bg-primary">
		<th>Sản  Phẩm</th>
		<th>Ảnh</th>
		<th>Giá</th>
	
		<th>Số  Lượng</th>
		
	</tr>
	</thead>
	<tbody>

		@foreach($product  as $data)
		<tr>
		<td>{{$data->name_product}}</td>
		<td><img src="{{asset('img/'.$data->img_product)}}" style="width: 35%;"></td>
	
	    <td>{{number_format($data->price,0,',','.')}}VND</td>
	    <td>{{$data->quanty}}</td>
		</tr>
	    @endforeach
@endsection