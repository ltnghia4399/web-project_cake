<?php

namespace App\Http\Controllers;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\BillDetail;
use App\Models\Cart;
use Session;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function GetIndex(){
        $slide = Slide::all();
        $new_product = Product::where('new',1)->paginate(4);
        $sale_product = Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.trangchu',compact('slide','new_product','sale_product'));
    }

    public function GetProductType($type){
        $product_type = Product::where('id_type',$type)->get();
        $another_product = Product::where('id_type','<>',$type)->paginate(3);
        $product = ProductType::all();
        $product_typeName = ProductType::where('id',$type)->first();
        return view('page.loai_sanpham', compact('product_type','another_product','product', 'product_typeName'));
    }

    public function GetProductDetail($id){
        $product_detail = Product::where('id',$id)->first();
        $relative_product = Product::where('id_type',$product_detail->id_type)->paginate(3);
        $new_product = Product::where('new',1)->paginate(4);
        //$bestSell_product = BillDetail::where('id_product',$id)->first();
        return view('page.chitiet_sanpham', compact('product_detail','relative_product','new_product'));
    }

    public function GetContact(){
        return view('page.lienhe');
    }

    public function GetAboutUs(){
        return view('page.gioithieu');
    }

    public function GetAddToCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
}
