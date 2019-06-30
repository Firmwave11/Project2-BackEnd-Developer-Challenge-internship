<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Person;
class CustomerController extends Controller
{

    public function index()
    {
        $persons = Person::all();
        $customer = Customer::all();
    	return view('dashboard.customer',compact('customer','persons'));
    }

    public function search(Request $request)
    {
        
        $search = Customer::when($request->q, function ($query) use ($request) {
            $query->where('name', 'LIKE', "%{$request->q}%")
             ->orWhere('email', 'LIKE', "%{$request->q}%");})->get();
        return view('dashboard.customer', compact('customer'));

   if(!$search->isEmpty()) {
      return view('dashboard.customer', ['customer' => $search, 'q' => $request->q]);
   }  else {
      abort(404);
   }
 
    }

    public function create(Customer $customer)
    {
    	$customer = Customer::all();
        $persons = Person::all();
    	return view('dashboard.customer-create',compact('customer','persons'));
    }

    public function store(Request $request)
    {
    	$customer = new Customer;
    	$customer->name = $request->name;
    	$customer->phone = $request->phone;
    	$customer->email = $request->email;
    	$customer->website = $request->website;
        $file = $request->file('logo');
        $namaFile = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$namaFile;
        $file->move('uploadgambar', $newName);
        $customer->logo = $newName;
        $customer->save();
        return redirect('/dashboard/customer')->with('status', 'Data customer telah ditambahkan.');
    }

    public function destroy(Customer $customer){
        $customer->delete();
        return redirect('/dashboard/customer')->with('status','Customer berhasil dihapus.');

    }
    public function edit($id){
        $customer = Customer::find($id);
        $person = person::all();
        $customers = Customer::all();
        return view('dashboard.customer-edit',compact('customer','person','customers'));
    }
    public function update(Request $request, Customer $customer)
    {
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->website = $request->website;
        if(empty($request->file('logo'))){
            $customer->logo = $customer->logo;
        }
        else{
            $file = $request->file('logo');
            $namaFile = $file->getClientOriginalName();
            $newName = rand(100000,1001238912).".".$namaFile;
            $file->move('uploadgambar', $newName);
            $customer->logo = $newName;
            
        }
        $customer->save();

        return redirect('/dashboard/customer')->with('status', 'Data customer telah diubah.');


    }

    public function show(Customer $customer)
    {
        $persons = Person::all();
        $customer = Customer::all();
        return view('dashboard.customer-edit', compact('customer', 'persons'));
    }



}
