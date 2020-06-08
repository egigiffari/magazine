<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users',
            'type' => 'required'
        ]);

        $user_data = [
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type
        ];

        if ($request->input('password')) {
            $this->validate($request, ['password' => 'min:4']);
            $user_data['password'] = bcrypt($request->password);
        }else{
            $user_data['password'] = bcrypt('1234');
        }

        $user = User::create($user_data);
        return redirect()->back()->with('success', "User : $request->name Has Been Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('admin.users.edit', compact('user'));
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
        $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'type' => 'required'
        ]);
        
        $user_old = User::findorfail($id);
        $user_data = [
            'name' => $request->name,
            'type' => $request->type
        ];
        $status = 'Name and Type';

        if ($request->input('password')) {
            $this->validate($request, ['password' => 'min:4']);
            $user_data['password'] = bcrypt($request->password);
            $status = 'Name, Type And Password';
        }

        $user = User::whereId($id)->update($user_data);
        return redirect()->route('users.index')->with('success', "User : $user_old->name, Change $status");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', "User : $user->name Has Been Delete");
    }
}
