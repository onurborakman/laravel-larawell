<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];
    //Retrieve the members of the group
    public function members(){
        return $this->hasMany('App\Member');
    }
    //Retrieve who created this group
    public function owner(){
        return $this->hasOne('App\User');
    }
}
