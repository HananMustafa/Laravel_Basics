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
            //Authentication passed, redirect to the dashboard
            return redirect()->route('dashboard');
        }

        //Authentication failed, redirect back with error message
        return redirect()->route('login.form')->with('error', 'Invalid credentials. Please try again.');
    }

    public function showDashboard()
    {
        if(Auth::check()){

            $customers = Customer::all();
            return view('dashboard', compact('customers'));
        }
        else{
            return redirect()->route('login.form');
        }
        
    }


    public function logout()
    {
            Auth::logout();
            return view('login');
        
    }

}
