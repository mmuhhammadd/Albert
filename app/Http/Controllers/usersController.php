<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        return view('user.index', compact('user'));
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'birthdate' => 'required',
            'gender' => 'required',
            'role' => 'required'
        ]);
        $id = auth()->user()->id;
        $user = User::findOrFail($id);
        $user->update($request->all());
        return view('user.index', compact('user'))->with('updated', 'updated');
    }

    public function updatepassword(Request $request) {
        $oldpassword = $request['oldpassword'];
        $newpassword = $request['newpassword'];
        $confirmpassword = $request['confirmpassword'];

        if (Hash::check($oldpassword, auth()->user()->password) && $newpassword == $confirmpassword) {
            $user = User::findOrFail(auth()->user()->id);
            $request['name'] = auth()->user()->name;
            $request['email'] = auth()->user()->email;
            $request['gender'] = auth()->user()->gender;
            $request['birthdate'] = auth()->user()->birthdate;
            $request['role'] = auth()->user()->role;
            $request['password'] = bcrypt($newpassword);

            $user->update($request->all());

            return response()->json(['data'=> 'success']);
        }
        else if (!(Hash::check($oldpassword, auth()->user()->password))) {
            return response()->json(['data'=> 'wrong']);
        }
        else if ($newpassword != $confirmpassword) {
            return response()->json(['data'=> 'notmatch']);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $id)
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $user->courses()->delete();
        $user->delete();
        return redirect()->route('login');
    }
}
