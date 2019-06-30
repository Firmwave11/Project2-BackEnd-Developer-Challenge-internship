<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Person;

class HomeController extends Controller
{
    public function index() {
    	return view('dashboard.home');
    }
    public function organization()
    {
        return view('dashboard.organization');
    }
       
    public function person()
    {
        $person = Person::all();
    	return view('dashboard.person',compact('person'));
    }

    public function customer()
    {
    	$customer = Customer::all();
    	return view('dashboard.customer', compact('customer'));

    }
    public function search()
    {
        $customer = DB::table('customer')->paginate(10);
        return view('dashboard.customer',compact('customer'));
    }
}
