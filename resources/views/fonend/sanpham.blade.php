@extends('fonend.app')

@section('main')
<div class="container">
  <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" onclick="tang()" name="optradio">Tăng dần
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" onclick="giam()" name="optradio">Giảm Đân
  </label>
</div>

</div>
  <section class="product-shop spad" id="productList">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="product-list">
                        <div class="row">

                           @foreach($product  as $data)
                       <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                       <a href="{{asset('fonend/getprodut/'.$data->id_product)}}"> <img src="{{asset('img/'.$data->img_product)}}" alt=""></a>
                                        <div class="sale pp-sale">Hot</div>
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                          <li class="quick-view"><a  onclick="AddCart({{$data->id_product}})" href="javascript:">+ Add Cart</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">{{$data->name_cat}}</div>
                                        <a href="#">
                                            <h5>{{$data->name_product}}</h5>
                                        </a>
                                        <div class="product-price">
                                            ₫{{number_format($data->price,0,',','.')}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                          @endforeach
                       
                           
                        
                         
                        
                        
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script type="text/javascript">
	function giam() {
		    $.ajax({
                url : 'giamgia',
                type:  'GET',
           }).done(function(req){
               $('#productList').empty();
               $('#productList').html(req);
     
           });

	}
	function tang(){
		 $.ajax({
                url : 'tanggia',
                type:  'GET',
           }).done(function(req){
            
               $('#productList').empty();
               $('#productList').html(req);
     
           });
	}
	   
</script>


@endsection