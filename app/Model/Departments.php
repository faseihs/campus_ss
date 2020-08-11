<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    //

    protected $guarded=[];

    public function programs(){
        return $this->hasMany("App\Model\Program","department_id");
    }
}
