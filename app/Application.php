<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //Which job this application belongs to
    public function job(){
        return $this->belongsTo('App\Job');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
