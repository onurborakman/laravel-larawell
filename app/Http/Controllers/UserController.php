<?php

namespace App\Http\Controllers;

use App\Services\Business\SecurityService;
use App\Services\Data\Utility\MyLogger;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $security;
    public function __construct()
    {
        $this->security = new SecurityService();
    }
    //PROFILE: Do Update to User
    public function showUpdate(Request $request){

        MyLogger::info("Entering UserController showUpdate()");

        try {
            $this->validateForm($request);

            $user = $this->security->getUser();
            $name = $request->input('name');
            $email = $request->input('email');
            $gender = $request->input('gender');
            $birthdate = $request->input('birthdate');
            $phonenumber = $request->input('phonenumber');

            $this->security->updateUser('name', $name);
            $this->security->updateUser('email', $email);
            $this->security->updateUser('gender', $gender);
            $this->security->updateUser('birthdate', $birthdate);
            $this->security->updateUser('phonenumber', $phonenumber);

        }catch(\Exception $e){

            MyLogger::error($e);
        }
        MyLogger::info("Exiting UserController showUpdate()");

        return redirect()->route('profile');
    }
    //ADMINISTRATION: Delete User
    public function showDelete(Request $request){
        MyLogger::info("Entering UserController showDelete()");
        try {
        $id = $request->input('id');


            $this->security->deleteUser($id);
        } catch(\Exception $e){
            MyLogger::error($e);
        }

        MyLogger::info("Exiting UserController showDelete()");

        return redirect()->route('admin');
    }
    //ADMINISTRATION: Suspend User
    public function showSuspend(Request $request){
        MyLogger::info("Entering UserController showSuspend()");

        try {
            $id = $request->input('id');
            $this->security->suspendUser($id);
        }catch(\Exception $e){

            MyLogger::error($e);
        }

        MyLogger::info("Exiting UserController showSuspend()");

        return redirect()->route('admin');


    }
    //ADMINISTRATION: Reactivate Suspended User
    public function showReactivate(Request $request){
        MyLogger::info("Entering UserController showReactivate()");

        try {
            $id = $request->input('id');
            $this->security->reactivateUser($id);

        }catch(\Exception $e){

            MyLogger::error($e);
        }
        MyLogger::info("Exiting UserController showReactivate()");

        return redirect()->route('admin');


    }
    //PORTFOLIO: Delete Education
    public function deleteEducation(Request $request){
        MyLogger::info("Entering UserController deleteEducation()");

        try {
            $id = $request->input('id');
            $this->security->deleteEducation($id);
        }catch(\Exception $e){

            MyLogger::error($e);
        }
        MyLogger::info("Exiting UserController deleteEducation()");

        return redirect()->route('portfolio');

    }
    //PORTFOLIO: Delete Skill
    public function deleteSkill(Request $request){
        MyLogger::info("Entering UserController deleteSkill()");

        try {
            $id = $request->input('id');
            $this->security->deleteSkill($id);
        }catch(\Exception $e){

            MyLogger::error($e);
        }

        MyLogger::info("Exiting UserController deleteSkill()");

        return redirect()->route('portfolio');
    }
    //PORTFOLIO: Delete Job History
    public function deleteJobHistory(Request $request){
        MyLogger::info("Entering UserController deleteJobHistory()");

        try {
            $id = $request->input('id');
            $this->security->deleteJobHistory($id);
        }catch(\Exception $e){

            MyLogger::error($e);
        }
        MyLogger::info("Exiting UserController deleteJobHistory()");

        return redirect()->route('portfolio');
    }
    //PORTFOLIO: Add Education
    public function addEducation(Request $request){
        MyLogger::info("Entering UserController addEducation()");

        try {
            $school = $request->input('school');
            $location = $request->input('location');
            $degree = $request->input('degree');
            $start = $request->input('start_date');
            $end = $request->input('end_date');
            $this->security->addEducation($school, $location, $degree, $start, $end);
        }catch(\Exception $e){

            MyLogger::error($e);
        }

        MyLogger::info("Exiting UserController addEducation()");

        return redirect()->route('portfolio');
    }
    //PORTFOLIO: Add Skill
    public function addSkill(Request $request){
        MyLogger::info("Entering UserController addSkill()");

        try {
            $name = $request->input('name');
            $this->security->addSkill($name);
        }catch(\Exception $e){

            MyLogger::error($e);
        }
        MyLogger::info("Exiting UserController addSkill()");

        return redirect()->route('portfolio');
    }
    //PORTFOLIO: Add Job History
    public function addJobHistory(Request $request){
        MyLogger::info("Entering UserController addJobHistory()");

        try {
            $title = $request->input('title');
            $location = $request->input('location');
            $description = $request->input('description');
            $start = $request->input('start_date');
            $end = $request->input('end_date');
            $this->security->addJobHistory($title, $location, $description, $start, $end);
        }catch(\Exception $e){

            MyLogger::error($e);
        }

        MyLogger::info("Exiting UserController addJobHistory()");

        return redirect()->route('portfolio');
    }
    //VALIDATOR
    private function validateForm(Request $request)
    {
        MyLogger::info("Entering UserController validateForm() for phonenumber and email");

        try{
        $rules = [
            'phonenumber' => 'Integer',
            'email' => 'email:rfc'];

        $this->validate($request, $rules);

        }catch(\Exception $e){

           MyLogger::error($e);
        }

        MyLogger::info("Exiting UserController validateForm() for phonenumber and email");
    }
}
