<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/createquangcao', 'HomeController@getInsertQc')->name('createquangcao');
Route::get('/listquangcao', 'HomeController@getListQC')->name('listquangcao');
Route::post('/createquangcao', 'HomeController@postInsertQc');
Route::get('/listcategory','HomeController@getListCategory')->name('listcategory');
Route::get('/createCateggory','HomeController@getCreateCategory')->name('createCateggory');
Route::get('/listproduct','HomeController@getListProduct')->name('listproduct');
Route::get('/createproduct','HomeController@getCreateProduct')->name('createproduct');
Route::get('/createstore','HomeController@getCreateStore')->name('createstore');
Route::post('/createstore','HomeController@postCreteStore');
Route::get('/createstoreproduct','HomeController@getCreateStoreProduct')->name('createstoreproduct');
Route::get('/liststoreproduct','HomeController@getProductStore')->name('liststoreproduct');
Route::get('/getCustom','HomeController@getCustom')->name('getCustom');

Route::post('/createstoreproduct','HomeController@postCreateStoreProduct');

Route::post('/createproduct','HomeController@postCreateProduct');
Route::post('/createCateggory','HomeController@postCreateCategory');
Route::get('/deleteQC/{id}','HomeController@delete')->name('deleteQC/{id}');
Route::get('/deleteCategory/{id}','HomeController@deleteCategory')->name('deleteCategory/{id}');
Route::get('/delailproduct/{id}','HomeController@getDelailProduct')->name('delailproduct/{id}');
Route::get('/deleteproduct/{id}','HomeController@getDeleteProduct')->name('deleteproduct/{id}');
Route::get('/editproduct/{id}','HomeController@getEditProduct')->name('editproduct/{id}');
Route::post('/editproduct/{id}','HomeController@postEditProduct');
Route::get('/liststore','HomeController@getListStore')->name('liststore');
Route::get('editstore/{id}','HomeController@getEditStore')->name('editstore/{id}');
Route::post('editstore/{id}','HomeController@postEditStore');

Route::group(['prefix'=>'fonend'],function(){
   Route::get('/','FontendController@index');
   Route::get('stoteproduct/{id}','FontendController@getStoreProduct');
   Route::get('categoryproduct/{id}','FontendController@getCantegoryProduct');
   Route::get('addCart/{id}','FontendController@getAddCart');
   Route::get('stoteproduct/fonend/addCart/{id}','FontendController@getAddCart');
   Route::get('categoryproduct/fonend/addCart/{id}','FontendController@getAddCart');
   Route::get('deleteCart/{id}','FontendController@deleteCart');
   Route::get('getprodut/{id}','FontendController@getProdut');
   Route::get('getprodut/fonend/addCart/{id}','FontendController@getAddCart');
   Route::get('getprodut/fonend/deleteCart/{id}','FontendController@deleteCart');  
   Route::get('stoteproduct/fonend/deleteCart/{id}','FontendController@deleteCart');
   Route::get('categoryproduct/fonend/deleteCart/{id}','FontendController@deleteCart');
   Route::get('listCart','FontendController@listCart');
   Route::get('deleteListCart/{id}','FontendController@deleteListCart');
   Route::get('saveCart/{id}/{quanty}','FontendController@saveCart');
   Route::get('thanhtoan','FontendController@getThanhToan');
   Route::post('thanhtoan','FontendController@postThanhToan');
   Route::get('sanpham','FontendController@getListSanPham'); 
   Route::get('giamgia','FontendController@giamgia'); 
   Route::get('tanggia','FontendController@tanggia'); 
   Route::get('fonend/addCart/{id}','FontendController@getAddCart');  
   Route::get('fonend/deleteCart/{id}','FontendController@deleteCart');
   Route::post('SaveAll','FontendController@SaveAll');
   Route::get('DeleteAll','FontendController@DeleteAll');
   Route::get('search','FontendController@search');
    Route::get('lienhe','FontendController@lienhe');
   
   
});