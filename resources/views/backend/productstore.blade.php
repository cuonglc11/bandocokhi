@extends('layouts.app')

@section('content')
 <a href="{{ url('/createstoreproduct')}}" class="btn btn-primary stretched-link">Thêm Hàng</a>
  <form method="get">
	<div class="form-group" >
	<label>Cửa Hàng</label>
	<select required name="stores" class="form-control">
      @foreach($stores  as $data)
    <option value="{{$data->id}}">{{$data->name_stores}}</option>
        @endforeach   
    </select>
</div>
<button type="submit" class="btn btn-primary">Kiểm tra hàng </button>
 {{csrf_field()}}
</form>
Số  Hàng của chí  nhánh  : {{$sumProduct}}
<table class="table table-bordered">
	<thead>
	<tr class="bg-primary">
		<th>Sản  Phẩm</th>
		<th>Ảnh</th>
		<th>Cửa  Hàng  bán</th>
		<th>Tiền</th>
		<th>Số  Lượng</th>
		
	</tr>
	</thead>
	<tbody>
		@foreach($product  as $data)
		<tr>
		<td>{{$data->name_product}}</td>
		<td><img src="{{asset('img/'.$data->img_product)}}" style="width: 35%;"></td>
		<td>{{$data->address}}</td>
	    <td>{{number_format($data->price,0,',','.')}}VND</td>
	    <td>{{$data->toulde}}</td>
		</tr>
	    @endforeach

@endsection