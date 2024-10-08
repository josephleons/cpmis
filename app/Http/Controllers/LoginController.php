<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view("Auth/login.php");
        return view('Auth.login');
    }
    public function login(Request $request){
       
        if(Auth::attempt([
            'username'=>$request->username,
            'password'=>$request->password,
        ]))
        {
            // select data from table users ,email 
            $user= User::where('username',$request->username)->first();
            // check user roles
            if($user->superadmin()){
                return redirect()->intended('admin');  
            
            }elseif($user->facilityadmin()){
                return redirect()->intended('facility');  
            
            }elseif($user->hod()){
                return redirect()->intended('hod');  
            }

            return redirect()->intended('coordinator');
        }
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    // custom function
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
