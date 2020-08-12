@extends('fonend.app')

@section('main')
 <div class="row">
 	 <div class="col-sm-6">
        <div class="product-item">
            <div class="pi-pic">
                <img src="{{asset('img/'.$product->img_product)}}" alt="">
                
                <div class="icon">
                    <i class="icon_heart_alt"></i>
                </div>
                <ul>
                       <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
  <li class="quick-view"><a  onclick="AddCart({{$product->id_product}})" href="javascript:">+ Add Cart</a></li>
                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                </ul>
            </div>
          
        </div>
      </div>
         <div class="col-sm-6">
          <h3>Sản  Phẩm  :  {{$product->name_product}}</h3>
          <h4>Loại Hàng :  {{$product->name_cat}}</h4>
         <h4>Giá sản phẩm : {{number_format($product->price,0,',','.')}} VND</h4>
         </div>
 </div>

@endsection