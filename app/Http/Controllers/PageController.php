<?php

namespace App\Http\Controllers;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Cart;
use App\Models\BillDetail;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\User;
use Session;
use Hash;
use Auth;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function GetIndex(){
        $slide = Slide::all();
        $new_product = Product::where('new',1)->paginate(4);
        $sale_product = Product::where('promotion_price','<>',0)->paginate(8);
        $product = ProductType::all();
        return view('page.trangchu',compact('slide','new_product','sale_product', 'product'));
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

    public function GetCheckOut(){
        return view('page.dathang');
    }

    public function GetLogin(){
        return view('page.dangnhap');
    }

    public function GetSignUp(){
        return view('page.dangky');
    }

    public function GetPaymentMethod(){
        return view('page.huongdanthanhtoan');
    }

    public function GetAddToCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function DeleteCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) > 0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function PostCheckOut(Request $req){
        $cart = Session::get('cart');

        $customer = new Customer();
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone_number;
        $customer->note = $req->note;
        $customer->save();

        $bill = new Bill();
        $bill->id_customer = $customer->id;
        $bill->date_order = date('y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->note;
        $bill->save();

        foreach($cart->items as $key => $value){
            $billDetail = new BillDetail();
            $billDetail->id_bill = $bill->id;
            $billDetail->id_product = $key;
            $billDetail->quantity = $value['qty'];
            $billDetail->unit_price = $value['price']/$value['qty'];
            $billDetail->save();
        }

        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }

    public function PostLogin(Request $req){
        $this->validate($req,
        [
            'email'=>'required',
            'password'=>'required'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không đúng định dạng',
            'password.required'=>'Vui lòng nhập mật khẩu'
        ]
        );
        $credentials = array('email'=>$req->email,
                            'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect()->route('trangchu')->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập thất bại']);
        }
    }

    public function PostSignUp(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không khớp nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu tối đa 20 kí tự'
            ]
            );
            $user = new User();
            $user->full_name = $req->fullname;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->phone = $req->phone;
            $user->address = $req->address;
            $user->save();
            
            return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

    public function LogOut(){
        Auth::logout();
        Session::forget('cart');
        return redirect()->route('trangchu');
    }

    public function Search(Request $req){
        $product = Product::where('name','like','%'.$req->search_key.'%')
                                    ->orWhere('unit_price',$req->search_key)->get();
        return view('page.timkiem',compact('product'));
    }
}
