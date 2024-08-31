<?php

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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
        ]);

        $customer = new Customer();
        $customer->name = $validatedData['name'];
        $customer->address = $validatedData['address'];
        $customer->age = $validatedData['age'];
        $customer->save();

        return redirect()->route('dashboard')->with('success', 'Customer added successfully!');
    }



    public function destroy($id)
    {
        $customer = Customer::find($id);

        if ($customer) {
            $customer->delete();
            return redirect()->route('dashboard')->with('success', 'Customer deleted successfully.');
        }

        return redirect()->route('dashboard')->with('error', 'Customer not found.');
    }
}

?>