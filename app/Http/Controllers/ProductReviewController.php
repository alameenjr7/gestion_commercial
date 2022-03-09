<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use Illuminate\Support\Facades\DB;

class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productReview = ProductReview::orderBy('id', 'DESC')->get();
        return view('backend.review.index', compact('productReview'));
    }

    public function reviewStatus(Request $request){
        if($request->mode=='true'){
            DB::table('product_reviews')->where('id', $request->id)->update(['status'=>'accept']);
        }else{
            DB::table('product_reviews')->where('id', $request->id)->update(['status'=>'reject']);
        }
        return response()->json(['msg'=> 'Successfully updated status', 'status'=>true]);
    }


    public function productReview(Request $request)
    {
        $this->validate($request,[
            'rate'=>'required|numeric',
            'reason'=>'nullable|string',
            'review' =>'nullable|string',

        ]);
        $data=$request->all();
        $status=ProductReview::create($data);
        if($status){
            return back()->with('success','Thanks for your feedback');
        }
        else{
            return back()->with('error','Please try again');
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
        //
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
        $reviews=ProductReview::find($id);
        if($reviews){
            $status = $reviews->delete();
            if($status){
                return redirect()->route('review.index')->with('success', 'Product review successfully deleted');
            }
            else {
                return back()->with('error', 'Something went wrong');
            }
        }
        else{
            return back()->with('error', 'Data not found');
        }
    }
}
