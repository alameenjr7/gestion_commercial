<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('backend.user.index', compact('users'));
    }

    public function userStatus(Request $request){
        if($request->mode=='true'){
            DB::table('users')->where('id', $request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('users')->where('id', $request->id)->update(['status'=>'inactive']);
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
        return view('backend.user.create');
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
            'username'=>'string|nullable|unique:users,username',
            'email'=>'email|required|unique:users,email',
            'password'=>'min:8|required',
            'phone'=>'string|nullable',
            'address'=>'string|nullable',
            'photo'=>'required',
            // 'role'=>'required|in:admin,vendor,customer',
            'status'=>'required|in:active,inactive',
        ]);
        $data=$request->all();

        $data['password']=Hash::make($request->password);
        // return $data;

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('public/photo');
        }

        $status=User::create($data);
        if($status){
            return redirect()->route('user.index')->with('success', 'User successfully created');
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
        $user=User::find($id);
        if($user){
            return view('backend.user.edit',compact(['user']));
        }
        else {
            return back()->with('error', 'User not found');
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
        $user=User::find($id);
        if($user){
            $this->validate($request, [
                'full_name'=>'string|required',
                'username'=>'string|nullable|exists:users,username',
                'email'=>'email|required|exists:users,email',
                'phone'=>'string|nullable',
                'address'=>'string|nullable',
                'photo'=>'required',
                // 'role'=>'required|in:admin,vendor,customer',
                'status'=>'nullable|in:active,inactive',
            ]);

            $data=$request->all();

            if ($request->hasFile('photo')) {
                if ($user->photo) {
                    Storage::delete($user->photo);
                }

                $validated['photo'] = $request->file('photo')->store('public');
            }

            $status=$user->fill($data)->save();
            if($status){
                return redirect()->route('user.index')->with('success', 'User successfully updated');
            } else {
                return back()->while('error', 'Something went wrong!');
            }
        }
        else {
            return back()->with('error', 'User not found');
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
        $user=User::find($id);
        if($user){
            $status = $user->delete();
            if($status){
                return redirect()->route('user.index')->with('success', 'User successfully deleted');
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
