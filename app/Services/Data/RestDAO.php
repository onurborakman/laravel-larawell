<?php
namespace App\Services\Data;

use App\Job;
use App\User;

class RestDAO{

    //Function to get all the users for REST API
    public function getAllUsersDAO(){
        return User::all();
    }
    //Function to get a user by id for REST API
    public function getUserDAO($id){
        return User::find($id);
    }
    //Function to get all the jobs for REST API
    public function getAllJobsDAO(){
        return Job::all();
    }
    //Function to get a job by id for REST API
    public function getJobDAO($id){
        return Job::find($id);
    }

}
