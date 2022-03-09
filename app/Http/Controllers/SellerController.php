<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::orderBy('id', 'DESC')->get();
        return view('backend.seller.index', compact('sellers'));
    }

    public function sellerStatus(Request $request){
        if($request->mode=='true'){
            DB::table('sellers')->where('id', $request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('sellers')->where('id', $request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=> 'Successfully updated status', 'status'=>true]);
    }

    public function sellerVerified(Request $request){
        if($request->mode=='true'){
            DB::table('sellers')->where('id', $request->id)->update(['is_verified'=>1]);
        }
        else{
            DB::table('sellers')->where('id', $request->id)->update(['is_verified'=>0]);
        }
        return response()->json(['msg'=> 'Successfully updated verified', 'status'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.seller.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name'=>'string|required',
            'username'=>'string|nullable|unique:sellers,username',
            'email'=>'email|required|unique:sellers,email',
            'password'=>'min:8|required',
            'phone'=>'string|nullable',
            'address'=>'string|nullable',
            'date_of_birth'=>'string|nullable',
            'genre'=>'string|nullable',
            'city'=>'string|nullable',
            'state'=>'string|nullable',
            'country'=>'string|nullable',
            'photo'=>'required',
            'status'=>'required|in:active,inactive',
        ]);

        $data=$request->all();

        $data['password']=Hash::make($request->password);
        // return $data;
        $sel_count = (Seller::count()+1);
        $data['role'] = 'seller'.$sel_count;

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public/photo');
        }

        $status=Seller::create($data);

        if($status){
            return redirect()->route('seller.index')->with('success', 'Seller successfully created');
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
        $seller=Seller::find($id);
        if($seller){
            return view('backend.seller.edit',compact(['seller']));
        }
        else {
            return back()->with('error', 'Seller not found');
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
        $seller=Seller::find($id);
        if($seller){
            $this->validate($request, [
                'full_name'=>'string|required',
                'username'=>'string|nullable|exists:sellers,username',
                'email'=>'email|required|exists:sellers,email',
                'phone'=>'string|nullable',
                'address'=>'string|nullable',
                'photo'=>'required',
                'date_of_birth'=>'string|nullable',
                'genre'=>'string|nullable',
                'city'=>'string|nullable',
                'state'=>'string|nullable',
                'country'=>'string|nullable',
                'status'=>'nullable|in:active,inactive',
            ]);

            $data=$request->all();

            if ($request->hasFile('photo')) {
                if ($seller->photo) {
                    Storage::delete($seller->photo);
                }

                $validated['photo'] = $request->file('photo')->store('public');
            }

            $status=$seller->fill($data)->save();
            if($status){
                return redirect()->route('seller.index')->with('success', 'Seller successfully updated');
            } else {
                return back()->while('error', 'Something went wrong!');
            }
        }
        else {
            return back()->with('error', 'Seller not found');
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
        $seller=Seller::find($id);
        if($seller){
            $status = $seller->delete();
            if($status){
                return redirect()->route('seller.index')->with('success', 'Seller successfully deleted');
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
