<?php
// app/Http/Controllers/AddCustomerController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class AddCustomerController extends Controller
{
    public function showForm()
    {
        return view('addCustomer');
    }

    public function storeCustomer(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
        ]);

        // Create a new customer
        $customer = new Customer();
        $customer->name = $validatedData['name'];
        $customer->address = $validatedData['address'];
        $customer->age = $validatedData['age'];
        $customer->save();

        // Redirect back to the dashboard
        return redirect()->route('dashboard')->with('success', 'Customer added successfully!');
    }



    //DISPLAY CUSTOMERS
    public function showDashboard()
    {
        // Fetch all customers from the database
        $customers = Customer::all();

        // Pass the customers to the dashboard view
        return view('dashboard', compact('customers'));
    }
}

?>