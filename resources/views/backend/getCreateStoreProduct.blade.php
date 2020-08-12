@extends('layouts.app')

@section('content')
<form method="post">
	<div class="form-group" >
	<label>Cửa Hàng</label>
	<select required name="stores" class="form-control">
      @foreach($stores  as $data)
    <option value="{{$data->id}}">{{$data->name_stores}}</option>
        @endforeach   
       
   </select>
   <div class="form-group" >
	<label> Sản  Phẩm</label><br>

      @foreach($product  as $data)
     <input type="checkbox" name="product[]" value="{{$data->id_product}}">
      <label for="vehicle1"> {{$data->name_product}}</label><br>
        @endforeach   
  </div>
  <button type="submit" class="btn btn-primary">Thêm hàng Bán </button>
 {{csrf_field()}}
</form>

</form>



@endsection