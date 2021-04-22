<?php
namespace App\Services\Business;

use App\Services\Data\SecurityDAO;

class SecurityService{
    /*
    |--------------------------------------------------------------------------
    | SECURITY DAO
    |--------------------------------------------------------------------------
    */
    private $securityDAO;
    /*
    |--------------------------------------------------------------------------
    | CONSTRUCTOR
    |--------------------------------------------------------------------------
    */
    public function __construct(){
        $this->securityDAO = new SecurityDAO();
    }
    /*
    |--------------------------------------------------------------------------
    | PERSONAL FUNCTIONS (SELF)
    |--------------------------------------------------------------------------
    */
    //Function to get the user (self)
    public function getUser(){
        return $this->securityDAO->getUserDAO();
    }
    //Function to update the user
    public function updateUser($targetValue, $updatedValue){
        return $this->securityDAO->updateUserDAO($targetValue, $updatedValue);
    }
    //Function to get the Skills of the user
    public function getSkills(){
        return $this->securityDAO->getSkillsDAO();
    }
    //Function to get the Education History of the user
    public function getEducations(){
        return $this->securityDAO->getEducationsDAO();
    }
    //Function to get the Job History of the user
    public function getJobHistories(){
        return $this->securityDAO->getJobHistoriesDAO();
    }
    //Function to get the Memberships of the user
    public function getMemberships(){
        return $this->securityDAO->getMembershipsDAO();
    }
    /*
    |--------------------------------------------------------------------------
    | ADMINISTRATION FUNCTIONS
    |--------------------------------------------------------------------------
    */
    //Function to get the all users (including soft deleted ones)
    public function getAllUsers(){
        return $this->securityDAO->getAllUsersDAO();
    }
    //Function to FORCE delete a user
    public function deleteUser($id){
        return $this->securityDAO->deleteUserDAO($id);
    }
    //Function to SOFT delete a user (suspension)
    public function suspendUser($id){
        return $this->securityDAO->suspendUserDAO($id);
    }
    //Function to RESTORE a SOFT deleted user
    public function reactivateUser($id){
        return $this->securityDAO->reactivateUserDAO($id);
    }
    //Function to get the list of all jobs available
    public function getAllJobs(){
        return $this->securityDAO->getAllJobsDAO();
    }
    //Function to edit a job
    public function updateJob($id, $targetValue, $updatedValue){
        return $this->securityDAO->updateJobDAO($id, $targetValue, $updatedValue);
    }
    //Function to delete a job (no soft delete)
    public function deleteJob($id){
        return $this->securityDAO->deleteJobDAO($id);
    }
    //Function to create a job
    public function addJob($title, $description, $location, $type, $pay, $company, $employment, $phone, $email){
        return $this->securityDAO->addJobDAO($title, $description, $location, $type, $pay, $company, $employment, $phone, $email);
    }
    //Function to retrieve the job
    public function getJob($id){
        return $this->securityDAO->getJobDAO($id);
    }
    //Function to get all groups
    public function getAllGroups(){
        return $this->securityDAO->getAllGroupsDAO();
    }
    //Function to get all applicants
    public function getApplicants($id){
        return $this->securityDAO->getApplicantsDAO($id);
    }
    //Function to approve an applicant
    public function approveApplicant($id){
        return $this->securityDAO->approveApplicantDAO($id);
    }
    //Function to reject an applicant
    public function rejectApplicant($id){
        return $this->securityDAO->rejectApplicantDAO($id);
    }
    /*
    |--------------------------------------------------------------------------
    | VISITING FUNCTIONS (OTHER USER)
    |--------------------------------------------------------------------------
    */
    //Function to get the target user (in order to visit their portfolio)
    public function getOtherUser($id){
        return $this->securityDAO->getUserByIDDAO($id);
    }
    //Function to get the target user's skills
    public function getOtherSkills($id){
        return $this->securityDAO->getOtherSkillsDAO($id);
    }
    //Function to get the target user's education history
    public function getOtherEducations($id){
        return $this->securityDAO->getOtherEducationsDAO($id);
    }
    //Function to get the target user's job history
    public function getOtherJobHistories($id){
        return $this->securityDAO->getOtherJobHistoriesDAO($id);
    }
    /*
    |--------------------------------------------------------------------------
    | PORTFOLIO FUNCTIONS
    |--------------------------------------------------------------------------
    */
    //Function to delete a skill
    public function deleteSkill($id){
        return $this->securityDAO->deleteSkillDAO($id);
    }
    //Function to delete an education
    public function deleteEducation($id){
        return $this->securityDAO->deleteEducationDAO($id);
    }
    //Function to delete job history
    public function deleteJobHistory($id){
        return $this->securityDAO->deleteJobHistoryDAO($id);
    }
    //Function to add skill
    public function addSkill($name){
        return $this->securityDAO->addSkillDAO($name);
    }
    //Function to add job history
    public function addJobHistory($title, $location, $description, $start, $end){
        return $this->securityDAO->addJobHistoryDAO($title, $location, $description, $start, $end);
    }
    //Function to add education
    public function addEducation($school, $location, $degree,$start,$end){
        return $this->securityDAO->addEducationDAO($school, $location, $degree,$start,$end);
    }
    //Function to search for a job with TITLE
    public function searchJob($title){
        return $this->securityDAO->searchJobDAO($title);
    }
    //Function to search for a profile with FULL NAME
    public function searchProfile($name){
        return $this->securityDAO->searchProfilesDAO($name);
    }
    //Function to search for a skill
    public function searchSkill($name){
        return $this->securityDAO->searchSkillsDAO($name);
    }
    /*
    |--------------------------------------------------------------------------
    | GROUP FUNCTIONS
    |--------------------------------------------------------------------------
    */
    //Function to retrieve group with ID
    public function getGroupByID($id){
        return $this->securityDAO->getGroupByIDDAO($id);
    }
    //Function to create a group
    public function createGroup($title, $description){
        return $this->securityDAO->createGroupDAO($title, $description);
    }
    //Function to retrieve all the owned groups
    public function getAllOwnedGroups(){
        return $this->securityDAO->getAllOwnedGroupsDAO();
    }
    //Function to update a group
    public function updateGroup($id, $title, $description){
        return $this->securityDAO->updateGroupDAO($id, $title, $description);
    }
    //Function to delete a group
    public function deleteGroup($id){
        return $this->securityDAO->deleteGroupDAO($id);
    }
    //Function to search for groups with TITLE
    public function searchGroups($search){
        return $this->securityDAO->searchGroupsDAO($search);
    }
    //Function to get the members of a group
    public function getMembers($id){
        return $this->securityDAO->getMembersDAO($id);
    }
    //Function to join a group
    public function joinGroup($id){
        return $this->securityDAO->joinGroupDAO($id);
    }
    //Function to leave a group
    public function leaveGroup($id){
        return $this->securityDAO->leaveGroupDAO($id);
    }
    /*
    |--------------------------------------------------------------------------
    | USER JOB FUNCTIONS
    |--------------------------------------------------------------------------
    */
    //Function to get all applications
    public function getApplications(){
        return $this->securityDAO->getApplicationsDAO();
    }
    //Function to apply for a job
    public function applyJob($id){
        return $this->securityDAO->applyJobDAO($id);
    }
    //Function to check if already applied for the job
    public function checkApply($id){
        return $this->securityDAO->checkApplyDAO($id);
    }
}
