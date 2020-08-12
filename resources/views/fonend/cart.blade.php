 @if(Session::has("Cart")!= null)
<div class="select-items">
<table>
    <tbody>
       @foreach(Session::get("Cart")->product as $data)
        <tr>

            <td class="si-pic"><img src="{{asset('img/'.$data['product']->img_product)}}" style="width: 60%;" alt=""></td>
            <td class="si-text">
                <div class="product-selected">
                    <p>₫{{number_format($data['product']->price,0,',','.')}} x {{$data['quanty']}}</p>
                    <h6>{{$data['product']->name_product}}</h6>
                </div>
            </td>
            <td class="si-close">
                <i class="ti-close" data-id="{{$data['product']->id_product}}"></i>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="select-total">
<span>total:</span>
<h5>₫{{number_format(Session::get("Cart")->totalPrice,0,',','.')}}</h5>
<input hidden id="totalquanty" type="number" name="" value="{{Session::get('Cart')->totalQuanty}}">
</div>
 @endif
<script type="text/javascript">
      $("#change-item-cart").on("click",".si-close i",function(){
             
                $.ajax({
                url : 'fonend/deleteCart/'+$(this).data("id"),
                type:  'GET',
           }).done(function(req){
                  RenderCart(req);
                   console.log($("#totalquanty").val());
                      $("#totalq").text($("#totalquanty").val());
                   alertify.success('<h>Đã Xoa Sản  Phẩm</h1>');
           });
              
        });
         function RenderCart(req){
               $('#change-item-cart').empty();
               $('#change-item-cart').html(req);
        }
</script>