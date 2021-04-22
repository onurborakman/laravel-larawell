<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
    ];
    //Retrieve the owner of this skill
    public function user(){
        return $this->belongsTo('App\User');
    }
}
