<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobHistory extends Model
{
    protected $fillable = [
        'title',
        'location',
        'description',
        'start_date',
        'end_date',
    ];
    //Retrieved the owner of this job history
    public function user(){
        return $this->belongsTo('App\User');
    }
}
