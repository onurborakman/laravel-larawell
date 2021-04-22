<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'school',
        'location',
        'degree',
        'start_date',
        'end_date',
    ];
    //Retrieve the owner of the education history
    public function user(){
        return $this->belongsTo('App\User');
    }
}
