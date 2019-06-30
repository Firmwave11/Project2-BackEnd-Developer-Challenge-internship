<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Person;
class CariController extends Controller
{   
	public function search(Request $request)
    {
        $query = $request->get('q');
        $hasil = Customer::where('name', 'LIKE', '%' . $query . '%')
        		->orWhere('email','like','%'.$query.'%')
        		->paginate(10);

        return view('dashboard.customer-result', compact('hasil', 'query'));
    }

    public function searching(Request $request)
    {
        $query = $request->get('q');
        $hasil = Person::where('name', 'LIKE', '%' . $query . '%')
        		->orWhere('email','like','%'.$query.'%')
        		->paginate(10);

        return view('dashboard.person-result', compact('hasil', 'query'));
    }

}