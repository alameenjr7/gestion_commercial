<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Mail\OrderMail;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\APIPayment\OrangeMoney;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\RazorpayController;
use App\Models\Client;

class CheckoutController extends Controller
{
    public function checkout1()
    {
        $client = Auth::user('admin');
        
        return view('backend.order.cart.checkout_1',compact('client'));
    }

    public function checkout2()
    {
        $client = Auth::user();
        return view('backend.order.cart.checkout_2',compact('client'));
    }

    // public function checkout3()
    // {
    //     $client = Auth::user();
    //     return view('frontend.pages.checkout.checkout3',compact('client'));
    // }

    // public function checkout4()
    // {
    //     $client = Auth::user();
    //     return view('frontend.pages.checkout.checkout4',compact('client'));
    // }

    public function checkoutComplete($order)
    {
        $client = Auth::user();
        $order = $order;
        // dd($order);
        return redirect()->route('order.show',$order)->with('success','Facture enregistrer avec succes');
        // view('backend.order.show',compact(['client','order']));
    }
   

    public function checkout1Store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'client_id'=>'string|nullable',
            'date'=>'string|required',
            'n_piece'=>'numeric|required',
            'statut'=>'string|nullable',
            'dateLive'=>'string|nullable',
            'reference'=>'string|nullable',
            'sub_total'=>'required',
            'total_amount'=>'required',
            //
            'payment_method'=>'string|required',
            'payment_status'=>'string|in:paid,unpaid',
            // 'delivery_charge'=>'nullable|numeric',
        ]);

        Session::put('checkout',[
            'client_id'=>$request->client_id,
            'date'=>$request->date,
            'n_piece'=>$request->n_piece,
            'statut'=>$request->statut,
            'dateLive'=>$request->dateLive,
            'reference'=>$request->reference,
            'sub_total'=>$request->sub_total,
            'total_amount'=>$request->total_amount,
            // 'quantity'=>$request->quantity,
        ]);

        Session::push('checkout',[
            'payment_method'=>$request->payment_method,
            // 'delivery_charge'=>$request->delivery_charge,
            'payment_status'=>'unpaid',
        ]);
        // $shippings=Shipping::where('status','active')->orderBy('shipping_address','ASC')->get();

        return view('backend.order.cart.checkout_4');
        // ,compact('shippings')
    }

    // public function checkout2Store(Request $request)
    // {
    //     // dd($request->all());
    //     $this->validate($request,[
    //         'delivery_charge'=>'nullable|numeric',
    //     ]);

    //     Session::push('checkout',[
    //         'delivery_charge'=>$request->delivery_charge,
    //     ]);
        
    //     return view('backend.order.cart.checkout_3');
    // }

    // public function checkout3Store(Request $request)
    // {
    //     $this->validate($request,[
    //         'payment_method'=>'string|required',
    //         'payment_status'=>'string|in:paid,unpaid',
    //     ]);

    //     Session::push('checkout',[
    //         'payment_method'=>$request->payment_method,
    //         'payment_status'=>'paid',
    //     ]);
    //     // dd(Session::get('checkout'));
    //     return view('frontend.pages.checkout.checkout4');
    // }

    public function checkoutStore(Request $request)
    {
        $order = new Order();
        $user_id = auth('admin')->user()->id;
        $order['user_id'] = $user_id;
        $order['user_role'] = 'admin'.$user_id;
        $order['order_number'] = Str::upper('FACT-'.Str::random(5));
        $order['sub_total'] = (float) str_replace(',','',Session::get('checkout')['sub_total']);
        if(Session::has('coupon')){
            $order['coupon'] = Session::get('coupon')['value'];
        }
        else{
            $order['coupon'] = 0;
        }

        $order['total_amount']=(float) str_replace(',','',Session::get('checkout')['sub_total'])-$order['coupon'];


        $order['payment_method'] = Session::get('checkout')['0']['payment_method'];
        $order['payment_status'] = Session::get('checkout')['0']['payment_status'];
        $order['condition']='pending';
        // $order['delivery_charge'] = Session::get('checkout')['0']['delivery_charge'];
        if(Session::get('checkout')['client_id'] != null){
            $order['client_id'] = Session::get('checkout')['client_id'];
        }
        else{
            $order['client_id'] = null;
        }
        $order['date'] = Session::get('checkout')['date'];
        $order['n_piece'] = Session::get('checkout')['n_piece'];
        $order['statut'] = Session::get('checkout')['statut'];
        $order['dateLive'] = Session::get('checkout')['dateLive'];
        $order['reference'] = Session::get('checkout')['reference'];

        // dd($order->all());
 
        $status = $order->save();

        if($status){
            session()->put('order_id',$order->id);
        }

        foreach(Cart::instance('shopping')->content() as $item)
        {
            $product_id[]=$item->id;
            $product=Product::find($item->id);
            $quantity=$item->qty;
            $order->products()->attach($product,['quantity'=>$quantity]);
        }
        
        if($status){
            // Mail::to($order['email'])->bcc($order['n_email'])->cc('ngomalameen90@gmail.com')->send(new OrderMail($order));
            Cart::instance('shopping')->destroy();
            Session::forget('coupon');
            Session::forget('checkout');
            return redirect()->route('checkout.complete',$order['id'])->with('success','Successfully completed order - Can you verified your email address');
        }
        else{
            return redirect()->route('checkout1')->with('error','Please try again');
        }
    }

    // public function checkout_done($order_id,$payment)
    // {
    //     $order=Order::findOrFail($order_id);
    //     $order->payment_status='paid';
    //     $order->payment_details=$payment;
    //     $status=$order->save();
    //     if($status){
    //         Mail::to($order['email'])->bcc($order['n_email'])->cc('babangom673@gmail.com')->send(new OrderMail($order));
    //         Cart::instance('shopping')->destroy();
    //         Session::forget('coupon');
    //         Session::forget('checkout');
    //         return redirect()->route('checkout.complete',$order['order_number'])->with('success','Successfully completed order - Can you verified your email address');
    //     }
    // }

    // public function razorPaymentDone($order_id,$payment)
    // {
    //     $order=Order::findOrFail($order_id);
    //     $order->payment_status='paid';
    //     $order->payment_details=$payment;
    //     $status=$order->save();
    //     if($status){
    //         Mail::to($order['email'])->bcc($order['n_email'])->cc('babangom673@gmail.com')->send(new OrderMail($order));
    //         Cart::instance('shopping')->destroy();
    //         Session::forget('coupon');
    //         Session::forget('checkout');
    //         return redirect()->route('checkout.complete',$order['order_number'])->with('success','Successfully completed order - Can you verified your email address');
    //     }
    //     else{
    //         return redirect()->route('checkout4')->with('error','Please try again');
    //     }
    // }

    // public function complete($order){
    //     $order=$order;
    //     return view('frontend.pages.checkout.checkout-complete',compact('order'));
    // }
}
