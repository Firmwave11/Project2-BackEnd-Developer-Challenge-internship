<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Person;
class OrganizationController extends Controller
{
    public function index()
    {
    	$customer = Customer::all();
    	$person	= Person::all();
    	return view('dashboard.organization',compact('customer','person'));
    }
    
}