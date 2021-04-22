<?php

namespace App\Services\Data;

use App\Application;
use App\Education;
use App\Group;
use App\Job;
use App\JobHistory;
use App\Member;
use App\Skill;
use App\User;
use Illuminate\Support\Facades\Auth;

class SecurityDAO
{
    //Get all users
    public function getAllUsersDAO()
    {
        return User::withTrashed()->paginate(10);
    }
    //Get all jobs
    public function getAllJobsDAO()
    {
        return Job::paginate(10);
    }
    //Update the user with the target on DB and the updated value
    public function updateUserDAO($targetValue, $updatedValue)
    {
        $user = $this->getUserDAO();
        $user->$targetValue = $updatedValue;
        return $user->save();
    }
    //Update the job with the target on DB, id of the job and the updated value
    public function updateJobDAO($id, $targetValue, $updatedValue)
    {
        $job = $this->getJobDAO($id);
        $job->$targetValue = $updatedValue;
        return $job->save();
    }
    //Get the user (self)
    public function getUserDAO()
    {
        return Auth::User();
    }
    //FORCE delete a user
    public function deleteUserDAO($id)
    {
        $user = $this->getUserByIDDAO($id);
        return $user->forceDelete();
    }
    //Delete a job
    public function deleteJobDAO($id)
    {
        $job = $this->getJobDAO($id);
        return $job->delete();
    }
    //SOFT delete a user (suspend)
    public function suspendUserDAO($id)
    {
        $user = $this->getUserByIDDAO($id);
        return $user->delete();
    }
    //Get user by id
    public function getUserByIDDAO($id)
    {
        return User::withTrashed()->findOrFail($id);
    }
    //RESTORE a user (reactivate)
    public function reactivateUserDAO($id)
    {
        $user = $this->getUserByIDDAO($id);
        return $user->restore();
    }
    //Get the skills of a user (self)
    public function getSkillsDAO()
    {
        $user = $this->getUserDAO();
        return $user->skills;
    }
    //Get the education history of a user (self)
    public function getEducationsDAO()
    {
        $user = $this->getUserDAO();
        return $user->educations;
    }
    //Get the job history of a user (self)
    public function getJobHistoriesDAO()
    {
        $user = $this->getUserDAO();
        return $user->jobHistories;
    }
    //Get the skills of a user (other)
    public function getOtherSkillsDAO($id)
    {
        $user = $this->getUserByIDDAO($id);
        return $user->skills;
    }
    //Get the education history of a user (other)
    public function getOtherEducationsDAO($id)
    {
        $user = $this->getUserByIDDAO($id);
        return $user->educations;
    }
    //Get the job history of a user (other)
    public function getOtherJobHistoriesDAO($id)
    {
        $user = $this->getUserByIDDAO($id);
        return $user->jobHistories;
    }
    //Delete a skill
    public function deleteSkillDAO($id)
    {
        $skill = Skill::findOrFail($id);
        return $skill->delete();
    }
    //Delete an education history
    public function deleteEducationDAO($id)
    {
        $education = Education::findOrFail($id);
        return $education->delete();
    }
    //Delete job history
    public function deleteJobHistoryDAO($id)
    {
        $jobHistory = JobHistory::findOrFail($id);
        return $jobHistory->delete();
    }
    //Add skill
    public function addSkillDAO($name)
    {
        $skill = new Skill();
        $skill->name = $name;
        $skill->user_id = Auth::id();
        return $skill->save();
    }
    //Add job history
    public function addJobHistoryDAO($title, $location, $description, $start, $end)
    {
        $jobHistory = new JobHistory();
        $jobHistory->title = $title;
        $jobHistory->location = $location;
        $jobHistory->description = $description;
        $jobHistory->start_date = $start;
        $jobHistory->end_date = $end;
        $jobHistory->user_id = Auth::id();
        return $jobHistory->save();
    }
    //Add education history
    public function addEducationDAO($school, $location, $degree, $start, $end)
    {
        $education = new Education();
        $education->school = $school;
        $education->location = $location;
        $education->degree = $degree;
        $education->start_date = $start;
        $education->end_date = $end;
        $education->user_id = Auth::id();
        return $education->save();
    }
    //Create a job
    public function addJobDAO($title, $description, $location, $type, $pay, $company, $employment, $phone, $email)
    {
        $job = new Job();
        $job->title = $title;
        $job->description = $description;
        $job->location = $location;
        $job->pay_range = $pay;
        $job->type = $type;
        $job->company = $company;
        $job->employment = $employment;
        $job->phonenumber = $phone;
        $job->email = $email;
        return $job->save();
    }
    //Search for job
    public function searchJobDAO($title)
    {
        return Job::where('title', 'like', '%' . $title . '%')
            ->orWhere('description', 'like', '%' . $title . '%')
            ->paginate(5);
    }
    //Search for portfolio
    public function searchProfilesDAO($name)
    {
        return User::where('name', 'like', '%' . $name . '%')->paginate(5);
    }
    //Search for people with the searched skill
    public function searchSkillsDAO($name)
    {
        return Skill::where('name', 'like', '%' . $name . '%')->paginate(5);
    }
    //Retrieve the job
    public function getJobDAO($id)
    {
        return Job::findOrFail($id);
    }
    //Retrieve the memberships of a user(self)
    public function getMembershipsDAO()
    {
        $user = $this->getUserDAO();
        return $user->memberships;
    }
    //Retrieve the group by id
    public function getGroupByIDDAO($id)
    {
        return Group::findOrFail($id);
    }
    //Create a group
    public function createGroupDAO($title, $description)
    {
        $group = new Group();
        $group->title = $title;
        $group->description = $description;
        $group->owner = Auth::id();
        $group->save();
        $member = new Member();
        $member->user_id = Auth::id();
        $member->group_id = $group->id;
        return $member->save();
    }
    //Retrieve the group the logged in user created/owns
    public function getAllOwnedGroupsDAO()
    {
        $userID = Auth::id();
        return Group::where('owner', $userID)->get();
    }
    //Update group
    public function updateGroupDAO($id, $title, $description)
    {
        $group = $this->getGroupByIDDAO($id);
        $group->title = $title;
        $group->description = $description;
        $group->save();
    }
    //Delete group
    public function deleteGroupDAO($id)
    {
        $group = $this->getGroupByIDDAO($id);
        return $group->delete();
    }
    //Search group
    public function searchGroupsDAO($search)
    {
        return Group::where('title', 'like', '%' . $search . '%')->paginate(5);
    }
    //Get members of a group
    public function getMembersDAO($id)
    {
        $group = $this->getGroupByIDDAO($id);
        $members = $group->members;
        $users = [];
        foreach ($members as $member) {
            array_push($users, $member->user->id);
        }
        return $users;
    }
    //Join group
    public function joinGroupDAO($id)
    {
        $membership = new Member();
        $membership->user_id = Auth::id();
        $membership->group_id = $id;
        return $membership->save();
    }
    //Leave group
    public function leaveGroupDAO($id)
    {
        $membership = Member::where('user_id', Auth::id())->where('group_id', $id)->first();
        return $membership->delete();
    }
    //Get All Groups
    public function getAllGroupsDAO(){
        return Group::paginate(10);
    }
    //Get all applications
    public function getApplicationsDAO(){
        $user = $this->getUserDAO();
        return $user->applications;
    }
    //Apply for job
    public function applyJobDAO($id){
        $application = new Application();
        $application->user_id = Auth::id();
        $application->job_id = $id;
        $apps = Application::all();
        foreach($apps as $app){
            if($app->user_id == Auth::id() && $app->job_id == $id){
                return;
            }
        }
        return $application->save();
    }
    //Get Applicants
    public function getApplicantsDAO($id){
        $job = Job::findOrFail($id);
        return $job->applications;
    }
    //Approve an applicant
    public function approveApplicantDAO($id){
        $application = Application::findOrFail($id);
        $application->status = "Approved";
        return $application->save();
    }
    //Reject an applicant
    public function rejectApplicantDAO($id){
        $application = Application::findOrFail($id);
        $application->status = "Rejected";
        return $application->save();
    }
    //Check to see if already applied for the job
    public function checkApplyDAO($id){
        $job = $this->getJobDAO($id);
        $result = false;
        foreach($job->applications as $application){
            if($application->user_id == Auth::id()){
                $result = true;
            }
        }
        return $result;
    }
}
