<?php

namespace App\Http\Controllers;

use App\Models\Depot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $depots = Depot::orderBy('id', 'DESC')->get();
        return view('backend.product.depots.index', compact('depots'));
    }


    public function depotStatus(Request $request){
        if($request->mode=='true'){
            DB::table('depots')->where('id', $request->id)->update(['statut'=>'activer']);
            return response()->json(['msg'=> 'Depot active avec succes', 'status'=>true]);
        }
        else{
            DB::table('depots')->where('id', $request->id)->update(['statut'=>'desactiver']);
            return response()->json(['msg'=> 'Depot active avec succes', 'status'=>true]);
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
        return view('backend.product.depots.create');
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
        $this->validate($request,[
            'reference'=>'string|required',
            'name'=>'string|nullable',
            'stock'=>'required|numeric',
            'price'=>'required|numeric',
            'photo'=>'nullable',
            'fournisseur_id'=>'required',
            'statut'=>'nullable|in:activer,desactiver'
        ]);

        $data=$request->all();


        // return $data;
        $status = Depot::create($data);
        if($status){
            return redirect()->route('depots.index')->with('success', 'Article ajouter dans le depot avec succes!');
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
        //
        $depots = Depot::find($id);
        if($depots){
            return view('backend.product.depots.edit',compact(['depots']));
        }
        else {
            return back()->with('error', 'Depot not found');
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
        //
        $depots = Depot::find($id);
        if($depots){
            $this->validate($request, [
                'reference'=>'string|required',
                'name'=>'string|nullable',
                'stock'=>'required|numeric',
                'price'=>'required|numeric',
                'photo'=>'nullable',
                'fournisseur_id'=>'required',
                'statut'=>'nullable|in:activer,desactiver'
            ]);

            $data = $request->all();
            $status = $depots->fill($data)->save();
            if($status){
                return redirect()->route('depots.index')->with('success', 'Depot modifier avec succes!');
            } else {
                return back()->while('error', 'Something went wrong!');
            }
        }
        else {
            return back()->with('error', 'Depot not found');
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
        //
        $depots = Depot::find($id);
        if($depots){
            $status = $depots->delete();

            if($status){
                return redirect()->route('depots.index')->with('success', 'Depot supprimer avec succes!');
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
