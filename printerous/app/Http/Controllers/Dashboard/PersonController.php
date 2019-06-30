<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Person;
use App\Customer;
class PersonController extends Controller
{
    public function index()
    {
        $person = Person::all();
        $customer = Customer::all();
    	return view('dashboard.person',compact('person','customer'));
    }


    public function create(Person $person)
    {
    	$person = Person::all();
        $customer = Customer::all();
    	return view('dashboard.person-create',compact('person','customer'));
    }

    
    public function store(Request $request)
    {
    	$person = new Person;
    	$person->name = $request->name;
    	$person->phone = $request->phone;
    	$person->email = $request->email;
        $person->customer_id = $request->customer_id;

        $file = $request->file('avatar');
        $namaFile = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$namaFile;
        $file->move('uploadgambar', $newName);
        $person->avatar = $newName;
        $person->save();
        return redirect('/dashboard/person')->with('status', 'Data person telah ditambahkan.');
    }

    public function destroy(Person $person){
    	$person->delete();
    	return redirect('/dashboard/person')->with('status',' person berhasil dihapus.');
    }

    public function edit($id){
        $person= Person::find($id);
        $persons = person::all();
        $customer=Customer::all();
        return view('dashboard.person-edit',compact('person','customer','persons'));
    }

    public function update(Person $person , Request $request)
    {
        $person->name = $request->name;
        $person->phone = $request->phone;
        $person->email = $request->email;
        $person->customer_id = $request->customer_id;
        if(empty($request->file('avatar'))){
            $person->avatar = $person->avatar;
        }
        else{
            $file = $request->file('avatar');
            $namaFile = $file->getClientOriginalName();
            $newName = rand(100000,1001238912).".".$namaFile;
            $file->move('uploadgambar', $newName);
            $person->avatar = $newName;
            
        }
        $person->save();
        return redirect('/dashboard/person')->with('status', 'Data person telah diubah.');
    }


    

}
