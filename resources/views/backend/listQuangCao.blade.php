@extends('layouts.app')

@section('content')
 <a href="{{ url('/createquangcao')}}" class="btn btn-primary stretched-link">Thêm Ảnh</a>

<table class="table table-bordered">
	<thead>
	<tr class="bg-primary">
		<th>Ảnh</th>
		<th>Chức Năng</th>
		
	</tr>
	</thead>
	<tbody>

		@foreach($data  as $data)
		<tr>
	    <td><img src="{{asset('img/'.$data->name_img)}}" style="width: 35%;"></td>
	    <td>
	    <a href="{{  url('/deleteQC/'.$data->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa hàng này?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
	    </td>
	    </tr>
	    @endforeach
        

	</tbody>
</table>


@endsection