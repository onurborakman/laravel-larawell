<?php

namespace App\Http\Controllers;

use App\DTO;
use App\Services\Business\RestService;
use App\Services\Data\Utility\MyLogger;
use Illuminate\Http\Request;

class RestController extends Controller
{
    private $restService;

    public function __construct(){
        $this->restService = new RestService();
    }
    //REST API: All Users
    public function userIndex(){
        MyLogger::info("Entering RestController userIndex()");


            $users = $this->restService->getAllUsers();
            $result = NULL;
            if ($users) {
                $result = new DTO("200", "Users Found", $users);
            } else {
                $result = new DTO("404", "No User Found", NULL);
            }


        MyLogger::info("Exiting RestController userIndex()");

        return json_encode($result);
    }
    //REST API: User by ID
    public function userShow($id){
        MyLogger::info("Entering RestController userShow()");


            $user = $this->restService->getUser($id);
            $result = NULL;
            if ($user) {
                $result = new DTO("200", "User Found", $user);
            } else {
                $result = new DTO("404", "No User Found", NULL);
            }


        MyLogger::info("Exiting RestController userShow()");

        return json_encode($result);
    }
    //REST API: All jobs
    public function jobIndex(){
        MyLogger::info("Entering RestController jobIndex()");


            $job = $this->restService->getAllJobs();
            $result = NULL;
            if ($job) {
                $result = new DTO("200", "Jobs Found", $job);
            } else {
                $result = new DTO("404", "No Job Found", NULL);
            }


        MyLogger::info("Exiting RestController jobIndex()");

        return json_encode($result);
    }
    //REST API: Job by ID
    public function jobShow($id){
        MyLogger::info("Entering RestController jobShow()");

        $job = $this->restService->getJob($id);
        $result = NULL;
        if($job){
            $result = new DTO("200", "Job Found", $job);
        }else{
            $result = new DTO("404", "No Job Found", NULL);
        }

        MyLogger::info("Exiting RestController jobShow()");

        return json_encode($result);
    }

}
