<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use Mail;
use App\Cart;
use Session;
class FontendController extends Controller
{
    public function index()
    {   
    	$data = DB::table('img_advs')->get();
    	$cate = DB::table('categories')->get();
    	$store = DB::table('stores')->get();
        $product =  DB::table('products')->join('categories','products.category','=','categories.id_cat')->where('status',1)->get();
    	return view('fonend.index',compact('data','cate','product','store'));
    }
    public function getListSanPham()
    {
      $cate = DB::table('categories')->get();
      $store = DB::table('stores')->get();
      $product =  DB::table('products')->join('categories','products.category','=','categories.id_cat')->get();
  
      return view('fonend.sanpham',compact('cate','store','product'));
    }
    public function giamgia()
    {
        $product =  DB::table('products')->join('categories','products.category','=','categories.id_cat')->orderBy('price','desc')->get();
        return view('fonend.giam' , compact('product'));
    }
      public function tanggia()
    {
        $product =  DB::table('products')->join('categories','products.category','=','categories.id_cat')->orderBy('price','asc')->get();
        return view('fonend.tang' , compact('product'));
    }
    public function getStoreProduct($id)
    {
    	$cate = DB::table('categories')->get();
    	$store = DB::table('stores')->get();
    	$product =  DB::table('store_products')->join('products','store_products.product','=','products.id_product')->join('categories','products.category','=','categories.id_cat')->join('stores','store_products.store','=','stores.id')->where('store',$id)->get();
    		return view('fonend.storeproduct' ,compact('product','cate','store'));
    }
    public function getCantegoryProduct($id)
    {
      $cate = DB::table('categories')->get();
      $store = DB::table('stores')->get();
      $product =  DB::table('products')->join('categories','products.category','=','categories.id_cat')->where('category',$id)->get();
      return view('fonend.categoryproduct' ,compact('product','cate','store'));
    }
    public function getProdut($id)
    {
      $cate = DB::table('categories')->get();
      $store = DB::table('stores')->get();
       $product =  DB::table('products')->join('categories','products.category','=','categories.id_cat')->where('id_product',$id)->first();
       return view('fonend.product' ,compact('product','cate','store'));
    }
    public function getAddCart(Request $req,$id)
    {
        $product = DB::table('products')->where('id_product',$id)->first();
        if($product != null){
           $oldcart = Session('Cart') ? Session('Cart') : null;
           $newCart =  new Cart($oldcart);
           $newCart->addCart($product , $id);
     
           $req->Session()->put('Cart',$newCart);
         
        }
        return view('fonend.cart' , compact('newCart'));
    }
    public function deleteCart(Request $re , $id)
    {
          $oldcart = Session('Cart') ? Session('Cart') : null;
          $newCart =  new  Cart($oldcart);
          $newCart->deleteItemCart($id);
          if(count($newCart->product) > 0){
             $re->Session()->put('Cart',$newCart);
           }else{
             $re->Session()->forget('Cart');
           }
            return view('fonend.cart' , compact('newCart'));
    }
    public function listCart()
    {
        $cate = DB::table('categories')->get();
        $store = DB::table('stores')->get();
        return view('fonend.listCart',compact('cate','store'));
    }
    public function deleteListCart(Request $re , $id)
    {
       $oldcart = Session('Cart') ? Session('Cart') : null;
          $newCart =  new  Cart($oldcart);
          $newCart->deleteItemCart($id);
          if(count($newCart->product) > 0){
             $re->Session()->put('Cart',$newCart);
           }else{
             $re->Session()->forget('Cart');
           }
            return view('fonend.cartList');
    }
    public function saveCart($id , Request $re , $quanty)
    {
          $oldcart = Session('Cart') ? Session('Cart') : null;
          $newCart =  new  Cart($oldcart);
          $newCart->updateItemCart($id , $quanty);
          
          $re->Session()->put('Cart',$newCart);
          
            return view('fonend.cartList');
    }
    public function SaveAll( Request $re)
    {
       // dd($re->data);\
   
      $data = $re->data;
      foreach ($data as $key => $value) {
            $oldcart = Session('Cart') ? Session('Cart') : null;
            $newCart =  new  Cart($oldcart);
            $newCart->updateItemCart($value["key"] , $value["value"]);
             $re->Session()->put('Cart',$newCart);
      }

          
       
    }
    public  function DeleteAll(Request $re)
    {
         $data = $re->data;
      foreach ($data as $key => $value) {
            $oldcart = Session('Cart') ? Session('Cart') : null;
            $newCart =  new  Cart($oldcart);
            $newCart->deleteItemCart($value["key"]);
             $re->Session()->forget('Cart',$newCart);
      }
    }
    public function getThanhToan()
    {
      
      $cate = DB::table('categories')->get();
      $store = DB::table('stores')->get();
      return view('fonend.payment', compact('cate','store'));
      

   
    }
    public function postThanhToan(Request $re)
    {

          $data = Session()->get('Cart');
          $name_cus =  $re->name;
          $addre_cus = $re->address;
          $ema_cus  = $re->email;
          $phone_cus  = $re->phone;
          $arrayCus = array('name_cus' =>$name_cus , 'addse_cus'=>$addre_cus , 'email_cus' => $ema_cus , 'phone_cus'=>$phone_cus );
          // $insertCus = DB::table('customes')->insert($arrayCus);
          foreach ($data as  $value) {
            // # code...
            echo "<pre>";
             var_dump($value);
             echo "</pre>";
            // echo $value['product']->name_product;
            // echo $value->quanty;
          }
   
    }
}
