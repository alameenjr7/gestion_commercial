<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth('seller')->user()->is_verified)
        { 
            $user_role_id= auth('seller')->user()->id;
            $orders = Order::where('user_role','seller'.$user_role_id)->orderBy('id','DESC')->paginate(10);
            return view('seller.order.index',compact('orders'));
        }
        else
        {
            return back()->with('error','Vous avez besoin d\'acces pour votre compte');
        }
    }


    public function orderStatus(Request $request)
    {
        if(auth('seller')->user()->is_verified)
        { 
            $order = Order::find($request->input('order_id'));
        // dd($order);
            if($order)
            {
                if($request->input('condition')=='delivered')
                {
                    foreach($order->products as $item)
                    {
                        $product = Product::where('id',$item->pivot->product_id)->first();
                        $stock = $product->stock;
                        $stock -= $item->pivot->quantity;
                        if($stock <= 0){
                            return back()->with('error','Le stock de l\'article '.$product->reference.' est terminé!');
                        } else{
                            $product->update(['stock'=>$stock]);
                            Order::where('id',$request->input('order_id'))->update(['payment_status'=>'paid']);
                        }
                    }
                }
                $status = Order::where('id',$request->input('order_id'))->update(['condition'=>$request->input('condition')]);
                // dd($status);
                if($status)
                {
                    return back()->with('success','Facture mise à jour avec succès!');
                }
                else
                {
                    return back()->with('error','Parfois mal tourné!');
                }
            }
            abort(404);
            }
        else
        {
            return back()->with('error','Vous avez besoin d\'acces pour votre compte');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth('seller')->user()->is_verified)
        { 
            $order = Order::find($id);
            if($order){
                return view('seller.order.show',compact('order'));
            }
            else{
                abort(404);
            }
        }
        else
        {
            return back()->with('error','Vous avez besoin d\'acces pour votre compte');
        }
    }

    public function showFacture($id)
    {

        if(auth('seller')->user()->is_verified)
        { 
            
            $order = Order::find($id);
            if($order){
                return view('seller.order.order-facture',compact('order'));
            }
            else{
                abort(404);
            }
        }
        else
        {
            return back()->with('error','Vous avez besoin d\'acces pour votre compte');
        }
    }


    public function showArticle()
    {
        if(auth('seller')->user()->is_verified)
        { 
            $products = Product::where('status','active')->orderBy('id', 'DESC')->get();
            return view('seller.order.vente', compact('products'));
        }
        else
        {
            return back()->with('error','Vous avez besoin d\'acces pour votre compte');
        }
    }

    public function venteSimple()
    {
        if(auth('seller')->user()->is_verified)
        { 
            $products = Product::where('status','active')->orderBy('id', 'DESC')->get();
            return view('seller.order.vente-simple',compact('products'));
        }
        else
        {
            return back()->with('error','Vous avez besoin d\'acces pour ce service');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth('seller')->user()->is_verified)
        { 
            $order = Order::find($id);
            if($order){
                $status = $order->delete();
                if($status){
                    return redirect()->route('order.index')->with('success', 'Facture supprimée avec succès');
                }
                else {
                    return back()->with('error', 'Parfois mal tourné!');
                }
            }
            else{
                return back()->with('error', 'Données introuvables');
            }
        }
        else
        {
            return back()->with('error','Vous avez besoin d\'acces pour votre compte');
        }
    }

    public  function orderPDF($id)
    {
        // $order = Order::find($id);
        // $file_name = $order->order_number.'-'.$order->first_name.'.pdf';
        // $pdf = PDF::loadView("backend.order.pdf",compact('order'));

        // return $pdf->stream($file_name);

        // $order = Order::find($id);
        // $file_name = $order->order_number.'-'.$order->first_name.'.pdf';
        // $pdf = PDF::loadView('backend.order.pdf',compact('order'));
        // return $pdf->download($file_name);

        $order = Order::find($id);
        $pdf = PDF::loadView('seller.order.pdf',compact('order'));
        return $pdf->download('contrat.pdf');
    }
}
