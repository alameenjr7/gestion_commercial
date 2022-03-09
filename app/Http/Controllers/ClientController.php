<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'DESC')->get();
        return view('backend.clients.index', compact('clients'));
    }

    public function clientstatus(Request $request){
        if($request->mode=='true'){
            DB::table('clients')->where('id', $request->id)->update(['statut'=>'activer']);
            
            return response()->json(['msg'=> 'Client active avec succes', 'status'=>true]);
        }
        else{
            DB::table('clients')->where('id', $request->id)->update(['statut'=>'desactiver']);
            
            return response()->json(['msg'=> 'Client desactive avec succes', 'status'=>true]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.clients.create');
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
            // 'reference'=>'string|required|unique:clients,reference',
            'nom'=>'string|required',
            'prenom'=>'string|required',
            'note'=>'string|nullable',
            'adresse'=>'string|nullable',
            'telephone'=>'string|nullable',
            'photo'=>'nullable',
            'statut'=>'nullable|in:activer,desactiver',
        ]);
        
        
        // dd($data['reference']);
        $data = $request->all();
        $reference = generateRefClient();
        $data['reference'] = $reference;
        
        $status = Client::create($data);
        if($status){
            return redirect()->route('client.index')->with('success', 'Client creer avec succes');
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
        $client = Client::find($id);
        if($client){
            return view('backend.clients.edit', compact('client'));
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
        $client = Client::find($id);
        if($client){
            $this->validate($request, [
                // 'reference'=>'string|required|unique:clients,reference',
                'nom'=>'string|required',
                'prenom'=>'string|required',
                'note'=>'string|nullable',
                'adresse'=>'string|nullable',
                'telephone'=>'string|nullable',
                'photo'=>'nullable',
                'statut'=>'nullable|in:activer,desactiver',
            ]);

            $data=$request->all();

            $status=$client->fill($data)->save();
            if($status){
                return redirect()->route('client.index')->with('success', 'Client modifier avec succes');
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
        $client = Client::find($id);
        if($client){
            $status = $client->delete();
            if($status){
                return redirect()->route('client.index')->with('success', 'Client supprimer avec succes');
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
