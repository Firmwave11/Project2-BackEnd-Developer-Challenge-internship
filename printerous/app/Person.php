<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class person extends Model
{
    protected $table = 'person';

    public function customer() {
    	return $this->hasMany(Customer::class);
    }



 }