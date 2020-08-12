@extends('fonend.app')

@section('main')


<table class="table table-bordered">
	<thead>
	<tr class="bg-primary">
		<th>Tên Cửa Hàng </th>
		<th>Địa Chỉ Cửa Hàng</th>
	    <th>Email Cửa Hàng</th>
	    <th>Phone Cửa Hàng</th>

		
	</tr>
	</thead>
	<tbody>
    @foreach($store  as $data)
		<tr>
		<td>{{$data->name_stores}}</td>
		<td>{{$data->address}}</td>
		<td>{{$data->email}}</td>
		<td>{{$data->phone}}</td>
		</tr>
	    @endforeach
        

	</tbody>

</table>

@endsection