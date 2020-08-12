@extends('fonend.app')

@section('main')

    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" id="listCart">
                    <div class="cart-table">
                        <table>
                            <thead>
                               
                                 <tr>
                                    <th>Ảnh</th>
                                    <th class="p-name">Tên Sản  Phẩm</th>
                                    <th>Giá Sản Phẩm</th>
                                    <th>Số  Lượng</th>
                                    <th>Tổng Tiền</th>
                                    <th>Xóa</th>
                                    <th>Lưu</th>
                                </tr>
                                 <tr>
                                    <th></th>
                                    <th class="p-name"></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th class="close-td first-row delete-all" onclick="delete_all()"><i class="ti-close"></i></th>
                                    <th class="close-td first-row edit-all" onclick="editall()" ><i class="ti-save"></i></th>
                                </tr>
                            </thead>
                    <tbody>
                         @if(Session::has("Cart")!= null)
                        @foreach(Session::get("Cart")->product as $data)
                        <tr>
                            <td class="cart-pic first-row"><img src="{{asset('img/'.$data['product']->img_product)}}" alt=""></td>
                            <td class="cart-title first-row">
                                <h5>{{$data['product']->name_product}}</h5>
                            </td>
                            <td class="p-price first-row">₫{{number_format($data['product']->price,0,',','.')}}</td>
                            <td class="qua-col first-row">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" data-id="{{$data['product']->id_product}}" id="quanty-item-{{$data['product']->id_product}}" value="{{$data['quanty']}}">
                                    </div>
                                </div>
                            </td>
                            <td class="total-price first-row">₫{{number_format($data['price'],0,',','.')}}</td>
                            <td class="close-td first-row"><i class="ti-close" data-product="$data['product']->id_product" onclick="DeleteListItem({{$data['product']->id_product}})"></i></td>
							<td class="close-td first-row"><i  id="save-cart-{{$data['product']->id_product}}" data-id="$data['product']->id_product" onclick="SaveListItem({{$data['product']->id_product}})" class="ti-save"></i></td>
                        </tr>
                     @endforeach   
                 
                    </tbody>
                </table>
            </div>
                    <div class="row">
                        <div class="col-lg-4 offset-lg-8">
                            <div class="proceed-checkout">
                                <ul>
                                     @if(Session::get("Cart")->totalQuanty == 0 )
                                      <li class="subtotal">Số Lượng <span>
                                      0</span></li>
                                      @else
                                    <li class="subtotal">Số Lượng <span>
                                      {{Session::get("Cart")->totalQuanty}}</span></li>
                                      @endif
                                    <li class="cart-total">Tổng Tiền <span>₫{{number_format(Session::get("Cart")->totalPrice ,0,',','.')}}</span></li>
                                </ul>
                                <a href="{{asset('fonend/thanhtoan')}}" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
           @endif
           <h5> <a href="{{asset('fonend/')}}">Cửa hàng</a></h5>
    </section>
<script type="text/javascript">
	  function DeleteListItem(id) {
       $.ajax({
                url : 'deleteListCart/'+id,
                type:  'GET',
           }).done(function(req){
              RenderListCart(req);
              
              
                alertify.success('<h>Đã Xóa  Sản  Phẩm</h1>');
           });
       // console.log(id);
    }
    
    function SaveListItem(id){
          $.ajax({
                url : 'saveCart/'+id +'/'+$("#quanty-item-"+id).val(),
                type:  'GET',
           }).done(function(req){
              RenderCart(req);
              
                console.log($("#quanty-item-"+id).val());
                $("#totalq").text($("#totalquanty").val());
                alertify.success('<h>Đã Cap Nhat Sản  Phẩm</h1>');
           });
    
    }
       function RenderListCart(req){
               $('#listCart').empty();
               $('#listCart').html(req);
              
        }
        function editall()
      {
        var list =  [];
        $("table tbody tr td").each(function(){
          $(this).find("input").each(function(){
                  var element  ={key  : $(this).data("id"), value: $(this).val()};
              list.push(element);
          });
        });
      
         $.ajax({
                url : 'SaveAll',
                type:  'POST',
                data : {
                  "_token" : "{{ csrf_token() }}",
                  "data"  : list

                }
           }).done(function(req){
             
               location.reload();
              
           });
      }
      function  delete_all()
      {
       var list =  [];
        $("table tbody tr td").each(function(){
          $(this).find("input").each(function(){
                  var element  ={key  : $(this).data("id"), value: $(this).val()};
              list.push(element);
          });
        });
        $.ajax({
                url : 'DeleteAll',
                type:  'get',
                data : {
                  "_token" : "{{ csrf_token() }}",
                  "data"  : list

                }
           }).done(function(req){
             
               location.reload();
              
           });
      }
     
   </script>
@endsection