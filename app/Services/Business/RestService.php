<?php
namespace App\Services\Business;

use App\Services\Data\RestDAO;

class RestService{

    private $restDAO;

    public function __construct(){
        $this->restDAO = new RestDAO();
    }
    //Function to get all the users for REST API
    public function getAllUsers(){
        return $this->restDAO->getAllUsersDAO();
    }
    //Function to get a user by id for REST API
    public function getUser($id){
        return $this->restDAO->getUserDAO($id);
    }
    //Function to get all the jobs for REST API
    public function getAllJobs(){
        return $this->restDAO->getAllJobsDAO();
    }
    //Function to get a job by id for REST API
    public function getJob($id){
        return $this->restDAO->getJobDAO($id);
    }

}
