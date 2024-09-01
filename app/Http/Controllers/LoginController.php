<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Customer; //to fetch customers

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
 
    public function processLogin(Request $request)
    {
        //Validate the login data
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        //Attempt to log the user in
        if (Auth::attempt($credentials)) {

            //TOKEN BASED AUTHENTICATION
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
    
            //PRINT TOKEN INFO ON THE SCREEN
            // return response()->json([
            //     'message' => 'Login successful',
            //     'token' => $token,
            //     'redirect' => route('dashboard'),
            // ]);




            //AUTH BASED AUTHENTICATION
            return redirect()->route('dashboard');
        }

        //AUTH BASED AUTHENTICATION
        return redirect()->route('login.form')->with('error', 'Invalid credentials. Please try again.');
    }

    public function showDashboard()
    {
        
        // if(Auth::check()){
        //     $customers = Customer::all();
        //     return view('dashboard', compact('customers'));
        // }
        // else{
        //     return redirect()->route('login.form');
        // }
        
        $customers = Customer::all();
        return view('dashboard', compact('customers'));
    }


    public function logout()
    {
            //TOKEN BASED AUTHENTICATION
            Auth::user()->tokens()->delete();

            //AUTH BASED AUTHENTICATION
            Auth::logout();

            return view('login');
        
    }

}
