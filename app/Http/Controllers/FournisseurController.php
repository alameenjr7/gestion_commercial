<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fournisseurs = Fournisseur::orderBy('id', 'DESC')->get();
        return view('backend.fournisseurs.index', compact('fournisseurs'));
    }

    public function fournisseurStatus(Request $request){
        //
        if($request->mode=='true'){
            DB::table('fournisseurs')->where('id', $request->id)->update(['statut'=>'activer']);

            return response()->json(['msg'=> 'Founisseur active avec success', 'status'=>true]);
        }
        else{
            DB::table('fournisseurs')->where('id', $request->id)->update(['statut'=>'desactiver']);

            return response()->json(['msg'=> 'Founisseur desactive avec success', 'status'=>true]);
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
        return view('backend.fournisseurs.create');
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
        $this->validate($request, [
            'nom_complet'=>'required|string',
            'email'=>'nullable|string',
            'telephone'=>'required|string',
            'adresse'=>'nullable|string',
            'status'=>'nullable|in:activer,desactiver',
        ]);
        $data=$request->all();

        // $slug=Str::slug($request->input('title'));
        // $slug_count=Fournisseur::where('slug', $slug)->count();
        // if($slug_count>0){
        //     $slug = time().'-'.$slug;
        // }
        // $data['slug']=$slug;

        $status = Fournisseur::create($data);
        if($status){
            return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur creer avec succes');
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
        $fournisseurs = Fournisseur::find($id);

        if($fournisseurs) {
            return view('backend.fournisseurs.edit', compact('fournisseurs'));
        }
        else{
            return back()->with('error', 'Data not found');
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
        $fournisseurs = Fournisseur::find($id);

        if($fournisseurs){
            $this->validate($request, [
                'nom_complet'=>'required|string',
                'email'=>'nullable|string',
                'telephone'=>'required|string',
                'adresse'=>'nullable|string',
                'status'=>'nullable|in:activer,desactiver',
            ]);

            $data=$request->all();

            $status=$fournisseurs->fill($data)->save();

            if($status){
                return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur modifier avec succes');
            } else {
                return back()->while('error', 'Something went wrong!');
            }
        }
        else{
            return back()->with('error', 'Data not found');
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
        $fournisseurs = Fournisseur::find($id);

        if($fournisseurs){
            $status = $fournisseurs->delete();
            if($status){
                return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur supprimer avec succes');
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
