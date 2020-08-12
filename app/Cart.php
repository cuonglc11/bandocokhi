<?php
namespace App;
class Cart{
	public  $product = null;
	public $totalPrice = 0;
	public $totalQuanty = 0;
	public $chinhanh  = null;
    public function  __construct($cart)
    {
    	if($cart){
    		$this->product = $cart->product;
    		$this->totalPrice = $cart->totalPrice;
    		$this->totalQuanty = $cart->totalQuanty;
    		$this->chinhanh = $cart->chinhanh;
    	}
    }
    public function addCart($product , $id)
    {
    	$newProduct  = ['quanty'=>0,'price'=>$product->price,'product' => $product];
    	if($this->product){
    		if(array_key_exists($id, $this->product)){
                $newProduct = $this->product[$id];
    		}
    	}
    	$newProduct['quanty']++;
    	$newProduct['price'] =  $newProduct['quanty'] * $product->price;
    	$this->product[$id] = $newProduct;
        $this->totalPrice += $product->price;
        $this->totalQuanty ++;
    }
    public function deleteItemCart($id)
    {
        $this->totalQuanty -= $this->product[$id]['quanty'];
        $this->totalPrice -= $this->product[$id]['price'];
        unset($this->product[$id]);
    }
     public function updateItemCart($id , $quanty)
    {
       $this->totalQuanty -=  $this->product[$id]['quanty'];
       $this->totalPrice -= $this->product[$id]['price'];
       $this->product[$id]['quanty'] = $quanty;
       $this->product[$id]['price'] = $quanty * $this->product[$id]['product']->price;
      $this->totalQuanty +=  $this->product[$id]['quanty'];
       $this->totalPrice += $this->product[$id]['price'];
    }
}
?>