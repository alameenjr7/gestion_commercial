<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Order;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use App\Http\Controllers\Frontend\CheckoutController;

class RazorpayController extends Controller
{
    public function razorpay()
    {
        $order=Order::findOrFail(session()->get('order_id'));
        return view('frontend.pages.payment.razor',compact('order'));
    }

    public function razorPayment(Request $request)
    {
        $input=$request->all();
        $api=new Api(env('RAZOR_KEY'),env('RAZOR_SECRET'));
        $payment=$api->payment->fetch($input['razorpay_payment_id']);
        if(count($input) && !empty($input['razorpay_payment_id'])){
            $payment_details=null;
            try{
                $response=$api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
                $payment_details=json_encode(array('id'=>$response['id'],'method'=>$response['method'],'amount'=>$response['amount'],'currency'=>$response['currency']));
            }
            catch(Exception $e){
                return $e->getMessage();
                return redirect()->back()->with('error',$e->getMessage());
            }
        }

        $checkoutController=new CheckoutController;
        return $checkoutController->razorPaymentDone(Session::get('order_id'),$payment_details);
    }
}
