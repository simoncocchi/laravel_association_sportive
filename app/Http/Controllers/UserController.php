<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\User as UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('userlist', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $UserRequest
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $UserRequest)
    {
        $validated = $UserRequest->validated();

        $User = new User([
            'name' => $UserRequest->name,
            'firstname' => $UserRequest->firstname,
            'email' => $UserRequest->email,
            'password' => $UserRequest->password,
            'phone' => $UserRequest->phone,
            'address_line_1' => $UserRequest->address,
            'address_line_2' => $UserRequest->addressComp,
            'zipcode' => $UserRequest->zipcode,
            'city' => $UserRequest->city,
        ]);

        $User->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view('edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $UserRequest
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $UserRequest, User $user)
    {
        $validated = $UserRequest->validated();
        $user->update($UserRequest->all());

        return back();//redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $user->delete();
        return back();
    }
}
