<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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

        $user = new User([
            'name' => $UserRequest->name,
            'email' => $UserRequest->email,
            'password' => $UserRequest->password,
            'firstname' => $UserRequest->firstname,
            'phone' => $UserRequest->phone,
            'address_line_1' => $UserRequest->address,
            'address_line_2' => $UserRequest->addressComp,
            'zipcode' => $UserRequest->zipcode,
            'city' => $UserRequest->city,
        ]);

        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $UserUptadeRequest
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255', 'bail', 'string'],
            'email' => ['required', 'max:255', 'bail', 'email', Rule::unique('users')->ignore($user->id)],
            'firstname' => ['required', 'max:255', 'bail', 'string'],
            'phone' => ['min:8', 'max:12', 'bail', 'string', 'nullable'],
            'address' => ['required', 'string', 'max:80', 'bail'],
            'addressComp' => ['max:80', 'bail', 'string', 'nullable'],
            'zipcode' => ['required', 'max:5', 'bail', 'string'],
            'city' => ['required', 'max:255', 'bail', 'string'],
            'password' => ['required', 'max:255', 'bail', 'string'],
        ]);
        $user->update($request->all());

        return redirect()->route('users.index');
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

    public function search(Request $request)
    {
        $type = $request->input('type');
        $searchInput = $request->input('searchinput');
        $users = DB::select('select * from users where ' .$type. ' like "%'.$searchInput.'%"');
        return view('user.index', ['users' => $users]);
    }
}
