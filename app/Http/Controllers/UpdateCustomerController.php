<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class UpdateCustomerController extends Controller
{
    //Show the form for editing the specified customer
    public function edit($id)
    {

        // if(Auth::check()){
        //     $customer = Customer::find($id);
        
        //     if ($customer) {
        //     return view('updateCustomer', compact('customer'));
        //     }
        //     return redirect()->route('dashboard')->with('error', 'Customer not found.');
        // }else{
        //     return redirect()->route('login.form');
        // }

        
        $customer = Customer::find($id);
        
        if ($customer) {
            return view('updateCustomer', compact('customer'));
        }

        return redirect()->route('dashboard')->with('error', 'Customer not found.');
        
    }

    //Update the specified customer in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
        ]);

        $customer = Customer::find($id);

        if ($customer) {
            $customer->name = $validatedData['name'];
            $customer->address = $validatedData['address'];
            $customer->age = $validatedData['age'];
            $customer->save();

            return redirect()->route('dashboard')->with('success', 'Customer updated successfully!');
        }

        return redirect()->route('dashboard')->with('error', 'Customer not found.');
    }
}
