@extends('layouts.app')

@section('content')

 <a href="{{ url('/createstore')}}" class="btn btn-primary stretched-link">Mở Cửa  Hàng</a>
<table class="table table-bordered">
	<thead>
	<tr class="bg-primary">
		<th>Tên Cửa Hàng</th>
		<th>Địa Chỉ Cửa Hàng</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Chức Năng</th>
		
	</tr>
	</thead>
	<tbody>
		@foreach($data  as $data)
		<tr>
		<td>{{$data->name_stores}}</td>
		<td>{{$data->address}}</td>
		<td>{{$data->email}}</td>
		<td>{{$data->phone}}</td>
		<td>
		<a href="{{asset('editstore/'.$data->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
		<a href="{{asset('deleteproduct/.$data->id')}}" onclick="return confirm('Bạn có chắc chắn muốn đóng cửa hàng này?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
		<a href="{{asset('delailproduct/'.$data->id)}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span> Chi tiết</a>
	     </td>

		</tr>
	    @endforeach
        

	</tbody>
</table>
@endsection