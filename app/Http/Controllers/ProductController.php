<?php

namespace App\Http\Controllers;

use App\Models\Depot;
use App\Models\Product;
use App\Models\ProductAttributes;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('backend.product.index', compact('products'));
    }

    public function productStatus(Request $request){
        if($request->mode == 'true'){
            DB::table('products')->where('id', $request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('products')->where('id', $request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=> 'Successfully updated status', 'status'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'string|required',
            'reference'=>'string|required',
            'type'=>'string|nullable',
            'description'=>'string|nullable',
            'buying_price'=>'required|numeric',
            'stock'=>'required|numeric',
            'price'=>'required|numeric',
            'discount'=>'required|numeric',
            'photo'=>'nullable',
            'cat_id'=>'required|exists:categories,id',
            'child_cat_id'=>'nullable|exists:categories,id',
            'size'=>'nullable|in:S,M,L,XL',
            'conditions'=>'nullable',
            'status'=>'nullable|in:active,inactive'
        ]);

        $data = $request->all();
// dd($data);
        $slug = Str::slug($request->input('title'));
        $slug_count = Product::where('slug', $slug)->count();
        if($slug_count>0){
            $slug = time().'-'.$slug;
        }
        $data['slug'] = $slug;

        $depots = Depot::where('reference',$request->input('reference'))->first();

        if($depots){
            
            $stock = $depots->stock;
            if($stock > 0){
                $stock -= $request->input('stock');
                // dd($stock);
                $depots->update(['stock'=>$stock]);
            } else{
                return back()->with('error','Le stock est terminé!');
            }
        }
            
        
        $num = auth('admin')->user()->id;
        $data['added_by']='admin'.$num;
        $data['user_id']=auth('admin')->user()->id;

        $data['offer_price']=($request->price-(($request->price*$request->discount)/100));

        $status = Product::create($data);

        if($status){
            return redirect()->route('product.index')->with('success', 'Product successfully created');
        } else {
            return back()->while('error', 'Something went wrong!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);
        $productattribute=ProductAttributes::where('product_id',$id)->orderBy('id','DESC')->get();
        if($product){
            return view('backend.product.product-attribute',compact(['product','productattribute']));
        }
        else {
            return back()->with('error', 'Product not found');
        }
    }

    public function showProdById(Request $request, $id)
    {
        // dd($request->all());
        $product = Product::find($request->id);
        // dd($product);
        if($product){
            $product_id = Product::showProdById($request->id);
            if(count($product_id)<=0){
                return response()->json(['status'=>false,'data'=>null,'msg'=>'']);
            }
            return response()->json(['status'=>true,'data'=>$product_id,'msg'=>'']);
        }
        else {
            return response()->json(['status'=>false,'data'=>null,'msg'=>'Category not found']);
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
        $product=Product::find($id);
        if($product){
            return view('backend.product.edit',compact(['product']));
        }
        else {
            return back()->with('error', 'Product not found');
        }
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
        $product = Product::find($id);
        if($product){
            $this->validate($request, [
                'title'=>'string|required',
                'type'=>'string|nullable',
                'description'=>'string|nullable',
                'buying_price'=>'required|numeric',
                'stock'=>'required|numeric',
                'price'=>'required|numeric',
                'discount'=>'required|numeric',
                'photo'=>'nullable',
                'cat_id'=>'required|exists:categories,id',
                'child_cat_id'=>'nullable|exists:categories,id',
                'size'=>'nullable|in:S,M,L,XL',
                'conditions'=>'nullable',
                'status'=>'nullable|in:active,inactive'
            ]);

            $data = $request->all();


            if($request->is_parent == 1){
                $data['parent_id'] = null;
            }

            $data['is_parent'] = $request->input('is_parent', 0);

            $depots = Depot::where('reference',$data['reference'])->first();
            // dd($depots);
            if($depots){
                $stock = $depots->stock;
                if($stock > 0){
                    $stock -= ($data['stock']-$product->stock);
                    // dd($stock);
                    $depots->update(['stock'=>$stock]);
                } else{
                    return back()->with('error','Le stock est terminé!');
                }
            }

            $status = $product->fill($data)->save();

            if($status){
                return redirect()->route('product.index')->with('success', 'Product successfully updated');
            } else {
                return back()->while('error', 'Something went wrong!');
            }
        }
        else {
            return back()->with('error', 'Product not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        if($product){
            $status = $product->delete();
            if($status){
                return redirect()->route('product.index')->with('success', 'Product successfully deleted');
            }
            else {
                return back()->with('error', 'Something went wrong');
            }
        }
        else{
            return back()->with('error', 'Data not found');
        }
    }

    public function destroyProductAttribute($id)
    {
        $productattribute = ProductAttributes::find($id);
        if($productattribute){
            $status = $productattribute->delete();
            if($status){
                return redirect()->back()->with('success', 'Product Attribute successfully deleted');
            }
            else {
                return back()->with('error', 'Something went wrong');
            }
        }
        else{
            return back()->with('error', 'Data not found');
        }
    }


    public function addProductAttribute(Request $request,$id)
    {
        $data=$request->all();

        foreach($data['original_price'] as $key=>$val)
        {
            if(!empty($val)){
                $attribute = new ProductAttributes;
                $attribute['original_price']=$val;
                $attribute['offer_price']=$data['offer_price'][$key];
                $attribute['stock']=$data['stock'][$key];
                $attribute['product_id']=$id;
                $attribute['size']=$data['size'][$key];
                $attribute->save();
            }
        }
        return redirect()->back()->with('success', 'Product attribute successfully added!');
    }
}
