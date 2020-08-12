<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function getListQC()
    {
     $data = DB::table('img_advs')->get();
     return view('backend.listQuangCao' , compact('data'));   
    }
    public function getInsertQc()
    {
        return  view('backend.quangcao');
    }
    public function postInsertQc(Request $re)
    {
        $file  =  $re->file('file');
        $fileName  = $file->getClientOriginalName('file');
        $file->move('img',$fileName);
        $imgInsert = array('name_img' =>$fileName);
        $insert = DB::table('img_advs')->insert($imgInsert);
        return redirect('listquangcao');

    }
    public  function delete($id)
    {
        $deleteQc = DB::table('img_advs')->where('id',$id)->delete();
        return redirect('listquangcao');
    } 
    public function getListCategory()
    {
        $data =  DB::table('categories')->get();
        return view('backend.category' , compact('data'));
    }
    public function getCreateCategory()
    {
        return view('backend.createcategory');
    }
    public function postCreateCategory(Request $re)
    {
        $arrayCate = array('name_cat' => $re->category );
        $insert = DB::table('categories')->insert($arrayCate);
        return redirect('listcategory');
    }
    public function getListProduct()
    {
        $prduct  = DB::table('products')->join('categories','products.category','=','categories.id_cat')->get();

        return view('backend.listproduct' ,compact('prduct'));
    }
    public function getCreateProduct()
    {
        $cate =  DB::table('categories')->get();
        return view('backend.createProduct',compact('cate'));
    }
    public function postCreateProduct(Request $re)
    {
        $nameProduct =  $re->product;
        $category =  $re->category;
        $file  =  $re->file('file');
        $fileName  = $file->getClientOriginalName('file');
        $file->move('img',$fileName);
        $price =  $re->price;
        $status = $re->status;
        $arrayProduct = array('name_product' => $nameProduct , 'category'=> $category ,  'img_product'=>$fileName , 'status'=>$status ,'price'=>$price );
        $insert =  DB::table('products')->insert($arrayProduct);

        return redirect('listproduct');


    }
    public function deleteCategory($id)
    {
        $data =  DB::table('products')->where('category',$id)->count();
        if($data == 0){
           $deleteCate = DB::table('categories')->where('id_cat',$id)->delete(); 
        }else{
           
        }
        return redirect('listcategory');
    }
    public function  getEditProduct($id)
    {
         $product  = DB::table('products')->join('categories','products.category','=','categories.id_cat')->where('id_product',$id)->get();
         $cate =  DB::table('categories')->get();
         return view('backend.editProduct',compact('product','cate'));

    }
    public function postEditProduct(Request $re , $id)
    {   
        $nameProduct =  $re->product;
        $category =  $re->category;
         $price =  $re->price;
        $status = $re->status;
        $file  =  $re->file('file');
        if($file ==  null){
           $arrayProduct = array('name_product' => $nameProduct , 'category'=> $category , 'status'=>$status ,'price'=>$price );
           $update =  DB::table('products')->where('id_product',$id)->update($arrayProduct);
        }
        else{
            $fileName  = $file->getClientOriginalName('file');
            $file->move('img',$fileName); 
            $arrayProductImg = array('name_product' => $nameProduct , 'category'=> $category ,  'img_product'=>$fileName , 'status'=>$status ,'price'=>$price );
            $update =  DB::table('products')->where('id_product',$id)->update($arrayProductImg);
        }
         return redirect('listproduct');
    }
    public function getDelailProduct($id)
    {
         $data =  DB::table('products')->join('categories','products.category','=','categories.id_cat')->where('id_product',$id)->get();
         return view('backend.delailProduct', compact('data'));
    }
    public function getDeleteProduct($id)
    {
         $deleteProduct = DB::table('products')->where('id_product',$id)->delete(); 
         return redirect('listproduct');
    }
    public function getListStore()
    {
        $data = DB::table('stores')->get();
        return view('backend.liststore',compact('data'));
    }
    public function getCreateStore()
    {
        return view('backend.createstore');
    }
    public function postCreteStore(Request $re)
    {  
       $name_store = $re->name;
       $address =  $re->address;
       $email = $re->email;
       $phone =  $re->phone ;
       $arrayName = array('name_stores' =>$name_store ,'address' => $address , 'email' => $email ,  'phone' => $phone);
       $data = DB::table('stores')->insert($arrayName);
       return redirect('liststore');


    }
    public function getEditStore($id)
    {
        $data = DB::table('stores')->where('id',$id)->get();
        return view('backend.editstore' , compact('data'));
    }
    public function postEditStore(Request $re , $id)
    {
        $name_store = $re->name;
       $address =  $re->address;
       $email = $re->email;
       $phone =  $re->phone ;
       $arrayName = array('name_stores' =>$name_store ,'address' => $address , 'email' => $email ,  'phone' => $phone);
       $data = DB::table('stores')->where('id',$id)->update($arrayName);
       return redirect('liststore');
    }
    public  function getListProductStore()
    {

    }
    public function  getCreateStoreProduct()
    {
         $product =  DB::table('products')->get();
         $stores =  DB::table('stores')->get();
         return  view('backend.getCreateStoreProduct' , compact('product','stores'));
         
    }
    public function getProductStore(Request $re)
    {   
         $stores =  DB::table('stores')->get();
         $product =  DB::table('store_products')->join('products','store_products.product','=','products.id_product')->join('stores','store_products.store','=','stores.id')->where('store',$re->stores)->get();
                $sumProduct =  DB::table('store_products')->where('store',$re->stores)->sum('toulde');
        return view('backend.productstore' , compact('stores','product','sumProduct'));   
    }
    
    public function postCreateStoreProduct(Request $re)
    {
       $arrayName = $re->product; 
       for($i=0;$i<sizeof($arrayName);$i++){
           $check =  DB::table('store_products')->where('product',$arrayName[$i])->where('store',$re->stores)->count();
           if($check != 0){
                 $checkProduct =  DB::table('store_products')->where('product',$arrayName[$i])->where('store',$re->stores)->get();
                 foreach ($checkProduct as  $value) {
                    $arrayUpdate = array('toulde' =>  $value->toulde+1); 
                   $checkProduct =  DB::table('store_products')->where('product',$arrayName[$i])->where('store',$re->stores)->update($arrayUpdate);
                 }

           }else{
             $arrayProduct =  array('product'=>$arrayName[$i],'store'=>$re->stores);
              $insert =  DB::table('store_products')->insert($arrayProduct);
           }
            
        }
        return redirect('liststoreproduct');
       
    }
    public function getCustom(Request $re)
    {
        $product =  DB::table('bills')->join('products','bills.product','=','products.id_product')->join('stores','bills.stores','=','stores.id')->join('customes','bills.custom','=','customes.id_cus')->where('custom',$re->custom)->get();
        $cus = DB::table('customes')->get();
         $phone =  DB::table('customes')->where('id_cus',$re->custom)->get();
         // dd($phone);
          $sumPrice =  DB::table('bills')->where('custom',$re->custom)->sum('price');
         $sumProduct =  DB::table('bills')->where('custom',$re->custom)->sum('quanty');

        return view('backend.customs',compact('product','cus','phone','sumProduct','sumPrice'));
            
    }
}
