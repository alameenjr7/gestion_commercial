<?php

namespace App\Http\Controllers\Seller;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Seller;
use App\Models\Seller as ModelsSeller;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function dashboard()
    {
        $user_role_id= auth('seller')->user()->id;
        $orders = Order::where('user_role','seller'.$user_role_id)->orderBy('id','DESC')->paginate(5);

        $order_total_week = Order::where(['condition'=>'delivered','user_role'=>'seller'.$user_role_id])->where('created_at','>',now()->subDays(7)->endOfDay())->sum('total_amount');
        return view('seller.index',compact(
            'orders',
            'order_total_week'
        ));
    }

    public function calendar()
    {
        $user = auth('seller')->user();
        return view('seller.pages.calendar',compact('user'));
    }

    public function messages()
    {
        $user = auth('seller')->user();
        return view('seller.pages.messages',compact('user'));
    }

    public function profile()
    {
        $user = auth('seller')->user();
        return view('seller.pages.profile',compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $seller = ModelsSeller::first();
        $status=$seller->update([
            'full_name'=>$request->full_name,
            'email'=>$request->email,
            'username'=>$request->username,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'photo'=>$request->photo,
            'date_of_birth'=>$request->date_of_birth,
            'genre'=>$request->genre,
            'city'=>$request->city,
            'country'=>$request->country,
            'state'=>$request->state,
        ]);

        $status=$seller->fill($request->all());
        
        if($status){
            return back()->with('success','Seller successfully updated');
        }
        else{
            return back()->with('error','Something went wrong');
        }
    }
}
