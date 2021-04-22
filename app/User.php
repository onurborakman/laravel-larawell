<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //Retrieve the skills of this user
    public function skills(){
        return $this->hasMany('App\Skill');
    }
    //Retrieve the job histories of this user
    public function jobHistories(){
        return $this->hasMany('App\JobHistory');
    }
    //Retrieve the education histories of this user
    public function educations(){
        return $this->hasMany('App\Education');
    }
    //Retrieve the memberships of this user
    public function memberships(){
        return $this->hasMany('App\Member');
    }
    //Retrieve the groups this user owns/created
    public function groups(){
        return $this->hasMany('App\Group', 'owner');
    }
    //Retrieve the applied jobs list
    public function applications(){
        return $this->hasMany('App\Application');
    }

}
