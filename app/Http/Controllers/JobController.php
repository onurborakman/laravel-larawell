<?php

namespace App\Http\Controllers;

use App\Services\Business\SecurityService;
use App\Services\Data\Utility\MyLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    private $security;
    public function __construct()
    {
        $this->security = new SecurityService();
    }

    //Create Job
    public function addJob(Request $request)
    {
        MyLogger::info("Entering JobController addJob()");
        $this->validateForm($request);
        try {


            $title = $request->input('title');
            $description = $request->input('description');
            $location = $request->input('location');
            $type = $request->input('type');
            $pay = $request->input('pay_range');
            $company = $request->input('company');
            $employment = $request->input('employment');
            $phone = $request->input('phonenumber');
            $email = $request->input('email');
            $this->security->addJob($title, $description, $location, $type, $pay, $company, $employment, $phone, $email);
        }catch(\Exception $e){

            MyLogger::error($e);
        }
        MyLogger::info("Exiting JobController addJob()");
            return redirect()->route('post.job');
    }

    //Update Job
    public function updateJob(Request $request)
    {
        MyLogger::info("Entering JobController updateJob()");

            $this->validateForm($request);
        try {
            $title = $request->input('title');
            $description = $request->input('description');
            $location = $request->input('location');
            $type = $request->input('type');
            $pay = $request->input('pay_range');
            $company = $request->input('company');
            $employment = $request->input('employment');
            $id = $request->input('id');
            $phone = $request->input('phonenumber');
            $email = $request->input('email');

            $this->security->updateJob($id, 'title', $title);
            $this->security->updateJob($id, 'description', $description);
            $this->security->updateJob($id, 'location', $location);
            $this->security->updateJob($id, 'type', $type);
            $this->security->updateJob($id, 'pay_range', $pay);
            $this->security->updateJob($id, 'company', $company);
            $this->security->updateJob($id, 'employment', $employment);
            $this->security->updateJob($id, 'phonenumber', $phone);
            $this->security->updateJob($id, 'email', $email);

        }catch(\Exception $e){

            MyLogger::error($e);
        }
        MyLogger::info("Exiting JobController updateJob()");
        return redirect()->route('admin.job');
    }

    //Delete Job
    public function deleteJob(Request $request)
    {
        MyLogger::info("Entering JobController deleteJob()");

        $id = $request->input('id');
        $this->security->deleteJob($id);

        MyLogger::info("Exiting JobController deleteJob()");

        return redirect()->route('admin.job');
    }
    //Function to apply for a job
    public function applyJob($id){
        MyLogger::info("Entering JobController applyJob()");
        $this->security->applyJob($id);
        MyLogger::info("Exiting JobController applyJob()");
        return back();
    }
    //Function to approve an applicant
    public function approveApplicant(Request $request){
        MyLogger::info("Entering JobController approveApplicant()");
        try{
            $id = $request->input('id');
            $this->security->approveApplicant($id);
            MyLogger::info("Exiting JobController approveApplicant()");
        }catch(\Exception $e){
            MyLogger::error($e);
        }
        return back();
    }
    //Function to reject an applicant
    public function rejectApplicant(Request $request){
        MyLogger::info("Entering JobController rejectApplicant()");
        try{
            $id = $request->input('id');
            $this->security->rejectApplicant($id);
            MyLogger::info("Exiting JobController rejectApplicant()");
        }catch(\Exception $e){
            MyLogger::error($e);
        }
        return back();
    }
    //Validator
    private function validateForm(Request $request)
    {

        MyLogger::info("Entering JobController validateForm() for pay range, phonenumber and email");
        $rules = [
            'email'=>'email:rfc',
            'phonenumber' => 'Integer',
            'pay_range' => 'Integer'
            ];
        $this->validate($request, $rules);
        MyLogger::info("Exiting JobController validateForm() for pay range, phonenumber and email");

    }
}
