<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\News;
use App\Http\Requests;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;

session_start();

class CartController extends Controller
{
    public function save_cart(Request $Request)
    {
        $product_id = $Request->product_id;
        $product = DB::table('tbl_product')->where('product_id', $product_id)->first();

        $data['id'] = $product->product_id;
        $data['qty'] = $Request->quantity;
        $data['name'] = $product->product_name;
        $data['price'] = $product->product_price;
        $data['weight'] = $product->product_id;
        $data['options']['desc'] = $product->product_desc;
        $data['options']['image'] = $product->product_imge;
        Cart::add($data);
        Cart::setGlobalTax(0);

        return Redirect::to('welcome');
    }

    public function add_cart_ajax(Request $Request)
    {
        $data = $Request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        if ($cart == true) {
            
            $handleCart = false;
            $keyItem = null;
            foreach ($cart as $key => $val) {
                if ($val['product_id'] == $data['cart_product_id']) {
                    $handleCart = true;
                    $keyItem = $key;
                    
                } 
            }
            if ($handleCart == false) {
                $cart[count($cart)] = array(
                    'session_id' => $session_id,
                    'product_id' => $data['cart_product_id'],
                    'product_name' => $data['cart_product_name'],
                    'product_imge' => $data['cart_product_imge'],
                    'product_quantity' => $data['cart_product_quantity'],
                    'product_price' => $data['cart_product_price'],
                );
                
                Session::put('cart', $cart);
            Session::save();
            } else {
                $cart[$keyItem] = array(
                    'session_id' => $session_id,
                    'product_id' => $data['cart_product_id'],
                    'product_name' => $data['cart_product_name'],
                    'product_imge' => $data['cart_product_imge'],
                    'product_quantity' => $val['product_quantity']+ $data['cart_product_quantity'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart', $cart);
            Session::save();
            }
        } else {
            $cart[] = array(
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'],
                'product_name' => $data['cart_product_name'],
                'product_imge' => $data['cart_product_imge'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_price' => $data['cart_product_price'],
            );

            Session::put('cart', $cart);
            Session::save();
        }
    }
    public function delete_cart_ajax($session_id){
        $cart=Session::get('cart');
        if($cart==true){
            foreach($cart as $key=>$val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back();
        }
    }

    public function update_cart_ajax(Request $Request){
        $data=$Request->all();
        $cart=Session::get('cart');
        if($cart==true){
            foreach($data['cart_quantity'] as $key => $qty){
                foreach($cart as $session=>$val){
                    if($val['session_id']==$key){
                        $cart[$session]['product_quantity']=$qty;
                    }
                }
            }
            Session::put('cart',$cart);
            return redirect()->back();
        }
        else{
            Session::put('message',"Giỏ Hàng Đang Rỗng");
            return redirect()->back();

        }
    }

    public function show_cart_ajax()
    {

        return view('client/cart-ajax');
    }

    public function show_cart()
    {   
        return view('client/cart');
    }
    public function delete_cart($rowId)
    {
        Cart::remove($rowId);
        return Redirect::to('gio-hang');
    }
    public function update_cart_down($rowId)
    {
        $item = Cart::get($rowId);
        Cart::update($rowId, $item->qty - 1);
        return Redirect::to('gio-hang');
    }
    public function update_cart_up($rowId)
    {
        $item = Cart::get($rowId);
        Cart::update($rowId, $item->qty + 1);
        return Redirect::to('gio-hang');
    }
    public function update_cart_quantity(Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->quantity;
        Cart::update($rowId, $qty);
        return Redirect::to('gio-hang');
    }
}
