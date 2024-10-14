<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;  
use App\Models\Cart;  
use App\Models\Order;  
use Session;
use Stripe;
class HomeController extends Controller
{
    public function index(){

        $user = User::where('usertype','user')->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $delivered= Order::where('status','Delivered')->count();
        return view('admin.index',compact('user','product','order','delivered'));
    }

    public function home(){


        if(Auth::id()){
            $user= Auth::user();
            $userid = $user->id;
            $count = Cart ::where('user_id',$userid)->count();
        }else{
            $count = '';
        }
       
        $product=Product::all();
        return view('home.index',compact('product','count'));
    }

    public function login_home(){
        $product=Product::all();

        $user= Auth::user();
        $userid = $user->id;
        $count = Cart ::where('user_id',$userid)->count();
        

        return view('home.index',compact('product','count'));
    }

    public function product_details($id){

        if(Auth::id()){
            $user= Auth::user();
            $userid = $user->id;
            $count = Cart ::where('user_id',$userid)->count();
        }else{
            $count = '';
        }
        $data=Product::find($id);
        return view('home.product_details',compact('data','count'));
    }

    public function add_cart($id){
        
         
        $user= Auth::user();
        $userid = $user->id;
           
        $check = Cart ::where('user_id',$userid)
                    ->where('product_id',$id)->count();
        
        $count = Cart ::where('user_id',$userid)->count();
        $find=Product::find($id);
       
        if($check >= $find->quantity){
            $product=Product::all();
            toastr()->timeOut(10000)->closeButton()->error('Cannot Add to Cart Over Stock');
            return redirect()->back()->with(compact('product','count'));
        }else{
        
        $product_id=$id;

        $user = Auth::user();

        $user_id = $user->id;

        $data = new Cart;
        $data->user_id=$user_id;
        $data->product_id=$product_id;

        $data->save();
        toastr()->timeOut(10000)->closeButton()->success('Product Add to Cart Successfully');
        return redirect()->back()->with(compact('check'));
        }
    }

    public function mycart(){
        if(Auth::id()){
            $user= Auth::user();
            $userid = $user->id;
            $count = Cart ::where('user_id',$userid)->count();
            $cart =Cart::where('user_id',$userid)->get();
            $product= Product::all();
        }
        foreach($cart as $data){
            foreach($product as $products){
                if($products->quantity == 0){
                    $data->delete();
                    $cart =Cart::where('user_id',$userid)->get();
                }

            }

            

            
        }
        return view('home.mycart',compact('count','cart'));
    }

    public function delete_cart($id){
        if(Auth::id()){
            $user= Auth::user();
            $userid = $user->id;
            $count = Cart ::where('user_id',$userid)->count();
            $cart =Cart ::where('user_id',$userid)->get();

            $productId = $id; // ID produk yang ingin dicari

            // Mencari produk dalam keranjang
            $cartItem = Cart::where('product_id', $productId)->first();


         
            $cartItem->delete();
            toastr()->timeOut(10000)->closeButton()->success('Product Deleted Successfully');
            
        }

        return redirect()->back();
    }
       
    public function confirm_order(Request $request){
        

        $name= $request->name;
        $address=$request->address;
        $phone=$request->phone;
       
        $userid= Auth::user()->id;
        
        $cart=Cart::where('user_id',$userid)->get();

        foreach($cart as $carts){


            $order= new Order;

            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id=$userid;
            $order->product_id=$carts->product_id;
          
            $product=Product::find($carts->product_id);
            $product->quantity=$product->quantity-1;
            $product->save();
            $order->save();

            
        }
        $cart_remove= Cart::where('user_id',$userid)->get();

        foreach($cart_remove as $remove){
            $data= Cart::find($remove->id);
            $data->delete();
        }

        $cartCheck=Cart::all();
        $productCheck=Product::all();
        foreach($cartCheck as $data){
          foreach($productCheck as $products){

            if($products->quantity==0){
                $remove=Cart::where('product_id',$products->id);
                $remove->delete();
            }

          }
                     
        }

        toastr()->timeOut(10000)->closeButton()->success('Product Ordered Successfully');
            
        return redirect()->back();
    }

    public function myorders(){

        $user=Auth::user()->id;
        $count= Order::where('user_id',$user)->get()->count();
        $order= Order::where('user_id',$user)->get();
        return view('home.order',compact('count','order'));
    }

    public function stripe($value){
        return view('home.stripe',compact('value'));
    }

    public function stripePost(Request $request, $value)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => $value * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment Complete" 

        ]);

      

        $name= Auth::user()->name;
        $phone= Auth::user()->phone;
        $address=Auth::user()->address;
       
        $userid= Auth::user()->id;
        $cart=Cart::where('user_id',$userid)->get();

        foreach($cart as $carts){


            $order= new Order;

            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id=$userid;
            $order->payment_status="paid";
            $order->product_id=$carts->product_id;

            $order->save();

            
        }
        $cart_remove= Cart::where('user_id',$userid)->get();

        foreach($cart_remove as $remove){
            $data= Cart::find($remove->id);
            $data->delete();
        }

        toastr()->timeOut(10000)->closeButton()->success('Product Ordered Successfully');
            
        return redirect('mycart');

    }

    public function shop(){


        if(Auth::id()){
            $user= Auth::user();
            $userid = $user->id;
            $count = Cart ::where('user_id',$userid)->count();
        }else{
            $count = '';
        }
       
        $product=Product::all();
        return view('home.shop',compact('product','count'));
    }


    public function why(){


        if(Auth::id()){
            $user= Auth::user();
            $userid = $user->id;
            $count = Cart ::where('user_id',$userid)->count();
        }else{
            $count = '';
        }
       
        
        return view('home.why',compact('count'));
    }
    public function testimonial(){


        if(Auth::id()){
            $user= Auth::user();
            $userid = $user->id;
            $count = Cart ::where('user_id',$userid)->count();
        }else{
            $count = '';
        }
       
        
        return view('home.testimonial',compact('count'));
    }
    public function contact(){


        if(Auth::id()){
            $user= Auth::user();
            $userid = $user->id;
            $count = Cart ::where('user_id',$userid)->count();
        }else{
            $count = '';
        }
       
        
        return view('home.contact',compact('count'));
    }
}
