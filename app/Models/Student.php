<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function guardian(){
        return $this->hasOne('App\Models\Guardian');
    }
}
