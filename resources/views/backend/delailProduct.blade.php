@extends('layouts.app')

@section('content')

 <a href="{{ url('/createproduct')}}" class="btn btn-primary stretched-link">Thêm Sản  Phẩm</a>
<table class="table table-bordered">
	<thead>
	<tr class="bg-primary">
		<th>Tên Sản Phẩm</th>
		<th>Loại Sản  Phẩm</th>
		<th>Ảnh Sản  Phẩm</th>
		<th>Giá Trị</th>
		<th>Chức Năng</th>
		
	</tr>
	</thead>
	<tbody>
		@foreach($data  as $data)
		<tr>
		<td>{{$data->name_product}}</td>
		<td>{{$data->name_cat}}</td>
		<td><img src="{{asset('img/'.$data->img_product)}}" style="width: 35%;"></td>
		<td>{{number_format($data->price,0,',','.')}}VND</td>
		<td>
		<a href="{{asset('editproduct/'.$data->id_product)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
		<a href="{{asset('deleteproduct/'.$data->id_product)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa hàng này?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
		
	     </td>

		</tr>
	    @endforeach
        

	</tbody>
</table>

@endsection