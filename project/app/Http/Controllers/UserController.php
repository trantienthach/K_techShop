<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CateModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Redis;

// use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function homeIndex() {
        $cart = session()->get( key: 'cart');

        $cate = CateModel::all()->where('cateprod_is_status','on');


        $prodNew = ProductModel::all()->where('prod_is_status','on')->where('new','0');
        return view('user.home_index',compact('cate','prodNew','cart'));
    }
    public function detailProduct($id) {
        $cart = session()->get( key: 'cart');

        $cate = CateModel::all()->where('cateprod_is_status','on');
        $prodNew = ProductModel::all()->where('prod_is_status','on')->where('new','0');
        $prodDetail = ProductModel::find($id);
        return view('user.product_detail',compact('cate','prodDetail','prodNew','cart'));
    }
    public function cate_product($id ) {
        $cart = session()->get( key: 'cart');
        $cate = CateModel::all()->where('cateprod_is_status','on');
        $cateID = CateModel::find($id);
        $count = ProductModel::find($id)->where('prod_cate_id',$id)->count();
        $result = ProductModel::orderBy('prod_name','DESC')->where('prod_is_status','on')->where('new','0')->where('prod_cate_id',$id)->search()->paginate(4);
        return view('user.cate_product',compact('cate','cateID','result','count','cart'));
    }

    public function addToCart($id) {
        // session()->flush();
        $prod = ProductModel::find($id);
        $cart = session()->get( key: 'cart');
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
            // $cart[$id]['price'] = $cart[$id]['price'] + $cart[$id]['price' => $prod->prod_price_current] ;

        }
        else {
            $cart[$id] = [
                'name' => $prod->prod_name,
                'price' => $prod->prod_price_current,
                'quantity' => 1,
                'image' => $prod->prod_img,

            ];
        }
        session()->put('cart',$cart);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], status:200);
    }

    public function show_cart() {
        $cate = CateModel::all()->where('cateprod_is_status','on');
        $cart = session()->get( key: 'cart');
        // session()->flush();

        return view('user.cart',compact('cate','cart'));

    }

    public function update_cart(Request $request) {
        if($request->id && $request->quantity) {
            $cart = session()->get( key: 'cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart',$cart);
            $cart = session()->get( key: 'cart');
            // dd($cart);
            $viewcart = view('user.cart',compact('cate','cart'))->render();
            return response()->json(['viewcart' => $viewcart, 'code' => 200], status :200);
        }
    }

    public function delete_cart(Request $request) {
        if($request->id) {
            $cart = session()->get( key: 'cart');
            unset($cart[$request->id]);
            
            session()->put('cart',$cart);
            $cart = session()->get( key: 'cart');
            // dd($cart);
            $viewcart = view('user.cart',compact('cate','cart'))->render();
            return response()->json(['viewcart' => $viewcart, 'code' => 200], status :200);
        }
    }

    public function cart_store(Request $request) {
        
    }
}
