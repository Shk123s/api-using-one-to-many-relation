<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class employe extends Model
{    
    protected $table = 'emptable';
    public function attendance()
   {     
       return $this->hasMany(attendance::class, 'emp_id');
   }
   
}
