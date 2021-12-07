<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{


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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:255',
        ]);

        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'role' => 'client',
            'money' => 0,
            'room' => 0,
            'desk' => 0,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        Auth::attempt($request->only('email', 'password'));

        return $user->createToken('token-name', ['room:enter'])->plainTextToken;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (User::find($id)) {

            $user = User::find($id);
            return "Id: ".$user->id."\n Full name: ".$user->name." ".$user->last_name."\n Email: ".$user->email."\n Room: ".$user->room."\n Desk: ".$user->desk."\n Money: ".$user->money;

        } else {
            return "Error";
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
        //
    }


    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid login details');
        }

        $id = auth()->user()->id;

        return redirect()->route('profil', ['id' => $id]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
