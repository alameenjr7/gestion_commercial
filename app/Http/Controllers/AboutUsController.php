<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;


class AboutUsController extends Controller
{
    public function index()
    {
        $about=AboutUs::first();
        return view('backend.about.index',compact('about'));
    }


    public function aboutUpdate(Request $request)
    {
        $about=AboutUs::first();
        $status=$about->update([
            'heading'=>$request->heading,
            'content'=>$request->input('content'),
            'exp_years'=>$request->exp_years,
            'happy_customer'=>$request->happy_customer,
            'team_advisor'=>$request->team_advisor,
            'return_customer'=>$request->return_customer,
            'secure_payment_Gat'=>$request->secure_payment_Gat,
            'cashOn_delivery'=>$request->cashOn_delivery,
            'fast_delivery'=>$request->fast_delivery,
            'free_delivery'=>$request->free_delivery,
            'customer_support'=>$request->customer_support,
            'quality_products'=>$request->quality_products,
            'image'=>$request->image,
        ]);

        if($status){
            return redirect()->back()->with('success', 'Successfully updated AboutUs');
        } else {
            return back()->while('error', 'Something went wrong!');
        }
    }
}
