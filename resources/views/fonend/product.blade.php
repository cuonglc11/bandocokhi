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
 </div>

@endsection