<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //
    protected $guarded=[];

    public function department(){
        return $this->belongsTo("App\Model\Departments");
    }
}
