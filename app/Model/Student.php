<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $guarded=[];

    public function department(){
        return $this->belongsTo("App\Model\Departments","department_id");
    }

    public function program(){
        return $this->belongsTo("App\Model\Program");
    }

    public function session_type(){
        return $this->belongsTo("App\Model\SessionType");
    }
}
