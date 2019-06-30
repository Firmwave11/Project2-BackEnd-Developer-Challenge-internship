<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;

class customer extends Model
{
    protected $table = 'customer';


    public function person() {
    	return $this->hasMany(Person::class);
 }
}
