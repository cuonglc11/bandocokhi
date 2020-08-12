@extends('layouts.app')

@section('content')
 <a href="{{ url('/createCateggory')}}" class="btn btn-primary stretched-link">Thêm Loại</a>
<table class="table table-bordered">
	<thead>
	<tr class="bg-primary">
		<th>Tên Loại Công cụ</th>
		<th>Chức Năng</th>
		
	</tr>
	</thead>
	<tbody>
      	@foreach($data  as $data)
		<tr>
	    <td>{{$data->name_cat}}</td>
	    <td>
	    <a href="{{  url('/deleteCategory/'.$data->id_cat) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa hàng này?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
	    </td>
	    </tr>
	    @endforeach
		

	</tbody>
</table>

@endsection