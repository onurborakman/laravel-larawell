<?php

namespace App\Http\Controllers;

use App\Services\Business\SecurityService;
use App\Services\Data\Utility\MyLogger;
use http\Exception;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    private $security;
    public function __construct()
    {
        $this->security = new SecurityService();
    }
    //Admin Page
    public function showAdmin()
    {
        MyLogger::info("Entering NavigationController showAdmin()");

        $listOfUsers = NULL;

        try {
            $listOfUsers = $this->security->getAllUsers();
        }catch(\Exception $e){
            MyLogger::error($e);
        }

        MyLogger::info("Exiting NavigationController showAdmin()");

        return view('admin\user_administration')
            ->with('list', $listOfUsers);
    }

    //Job Admin Page
    public function showJobAdmin()
    {
        MyLogger::info("Entering NavigationController showJobAdmin()");

        $listOfJobs = NULL;

        try {
            $listOfJobs = $this->security->getAllJobs();
        }catch(\Exception $e){
            MyLogger::error($e);
        }

        MyLogger::info("Exiting NavigationController showJobAdmin()");

        return view('admin\job_administration')
            ->with('list', $listOfJobs);
    }

    //Group Admin Page
    public function showGroupAdmin(){
        MyLogger::info("Entering NavigationController showGroupAdmin()");

        $listOfGroups = NULL;

        try {
            $listOfGroups = $this->security->getAllGroups();
        }catch(\Exception $e){
            MyLogger::error($e);
        }

        MyLogger::info("Exiting NavigationController showGroupAdmin()");
        return view('admin\group_administration')
            ->with('list', $listOfGroups);
    }

    //Profile Page
    public function showProfile()
    {
        MyLogger::info("Entering NavigationController showProfile()");

        $user = NULL;

        try {
            $user = $this->security->getUser();
        }catch(\Exception $e){
            MyLogger::error($e);
        }

        MyLogger::info("Exiting NavigationController showProfile()");
        return view('profile\profile')
            ->with('user', $user);
    }

    //Update Page
    public function showUpdate()
    {
        MyLogger::info("Entering NavigationController showUpdate()");

        $user = NULL;

        try{
            $user = $this->security->getUser();
        }catch(\Exception $e){
            MyLogger::error($e);
        }

        MyLogger::info("Exiting NavigationController showUpdate()");
        return view('profile\update')
            ->with('user', $user);
    }

    //Self portfolio
    public function showPortfolio()
    {
        MyLogger::info("Entering NavigationController showPortfolio()");

        $user = NULL;
        $skills = NULL;
        $education = NULL;
        $jobHistory = NULL;

        try{

        $user = $this->security->getUser();
        $skills = $this->security->getSkills();
        $education = $this->security->getEducations();
        $jobHistory = $this->security->getJobHistories();

        }catch(\Exception $e){
            MyLogger::error($e);
        }


        MyLogger::info("Exiting NavigationController showPortfolio()");


        return view('portfolio\portfolio')
            ->with('user', $user)
            ->with('skills', $skills)
            ->with('education', $education)
            ->with('jobHistory', $jobHistory);
    }

    //Someone else's portfolio
    public function visitPortfolio($id)
    {
        MyLogger::info("Entering NavigationController visitPortfolio()");

        $user = NULL;
        $skills = NULL;
        $education = NULL;
        $jobHistory = NULL;

        try {

            $user = $this->security->getOtherUser($id);
            $skills = $this->security->getOtherSkills($id);
            $education = $this->security->getOtherEducations($id);
            $jobHistory = $this->security->getOtherJobHistories($id);

        }catch(\Exception $e){
            MyLogger::error($e);
        }

        MyLogger::info("Exiting NavigationController visitPortfolio()");

        return view('search\visit_portfolio')
            ->with('user', $user)
            ->with('skills', $skills)
            ->with('education', $education)
            ->with('jobHistory', $jobHistory);
    }

    //Job Page
    public function visitJob($id)
    {
        MyLogger::info("Entering NavigationController visitJob()");

        $job = NULL;
        $apply = NULL;
        try {

            $job = $this->security->getJob($id);
            $apply = $this->security->checkApply($id);
        }catch(\Exception $e){
            MyLogger::error($e);
        }

        MyLogger::info("Exiting NavigationController visitJob()");

        return view('search\visit_job')
            ->with('job', $job)
            ->with('apply', $apply);
    }

    //Add Job History Page
    public function showJobHistory()
    {
        MyLogger::info("Entering NavigationController showJobHistory()");
        MyLogger::info("Exiting NavigationController showJobHistory()");

        return view('portfolio\add_job_history');
    }

    //Add Education Page
    public function showEducation()
    {
        MyLogger::info("Entering NavigationController showEducation()");
        MyLogger::info("Exiting NavigationController showEducation()");
        return view('portfolio\add_education');
    }

    //Add Skill Page
    public function showSkill()
    {
        MyLogger::info("Entering NavigationController showSkill()");
        MyLogger::info("Exiting NavigationController showSkill()");
        return view('portfolio\add_skill');
    }

    //Add Job Page
    public function showPostJob()
    {
        MyLogger::info("Entering NavigationController showPostJob()");
        MyLogger::info("Exiting NavigationController showPostJob()");
        return view('admin\post_job');
    }

    //Search Result Page
    public function showSearch(Request $request)
    {
        MyLogger::info("Entering NavigationController showSearch()");

        $jobs = NULL;
        $skills = NULL;
        $profiles = NULL;
        $groups = NULL;
        $search = NULL;

        try {
            $search = $request->input('search');
            $jobs = $this->security->searchJob($search);
            $skills = $this->security->searchSkill($search);
            $profiles = $this->security->searchProfile($search);
            $groups = $this->security->searchGroups($search);
        }catch(\Exception $e){
            MyLogger::error($e);
        }

        MyLogger::info("Exiting NavigationController showSearch()");

        return view('search\search')
            ->with('jobs', $jobs)
            ->with('skills', $skills)
            ->with('profiles', $profiles)
            ->with('search', $search)
            ->with('groups', $groups);
    }

    //Job Edit Page
    public function showJobUpdate(Request $request)
    {
        MyLogger::info("Entering NavigationController showJobUpdate()");

        $job = NULL;

        try {
            $id = $request->input('id');
            $job = $this->security->getJob($id);
        }catch(\Exception $e){
            MyLogger::error($e);
        }

        MyLogger::info("Exiting NavigationController showJobUpdate()");

        return view('admin\job_edit')
            ->with('job', $job);
    }

    //My Memberships Page
    public function showMemberships(){
        MyLogger::info("Entering NavigationController showMemberships()");

        $memberships = NULL;

        try {
            $memberships = $this->security->getMemberships();
        }catch(\Exception $e){
            MyLogger::error($e);
        }


        MyLogger::info("Exiting NavigationController showMemberships()");

        return view('groups\memberships')
            ->with('memberships', $memberships);
    }

    //Group Page
    public function showGroupPage($id){
        MyLogger::info("Entering NavigationController showGroupPage()");

        $group = NULL;
        $members = NULL;

        try{
            $group =$this->security->getGroupByID($id);
            $members = $this->security->getMembers($id);
        }
        catch(\Exception $e){
            MyLogger::error($e);
        }

        MyLogger::info("Exiting NavigationController showGroupPage()");

        return view('groups\group_page')
            ->with('group', $group)
            ->with('members', $members);
    }

    //Create Group Page
    public function showCreateGroup(){
        MyLogger::info("Entering NavigationController showCreateGroup()");
        MyLogger::info("Exiting NavigationController showCreateGroup()");

        return view('admin\create_group');
    }

    //Edit Group Page
    public function showEditGroup(Request $request){
        MyLogger::info("Entering NavigationController showEditGroup()");

        $group = NULL;

        try {
        $group = $this->security->getGroupByID($request->input('id'));
        }catch(\Exception $e){
        MyLogger::error($e);
        }

        MyLogger::info("Exiting NavigationController showEditGroup()");

        return view('admin\edit_group')
            ->with('group', $group);
    }
    //Applications Page
    public function showApplications(){
        MyLogger::info("Entering NavigationController showApplications()");

        $applications = NULL;

        try {
            $applications = $this->security->getApplications();
        }catch(\Exception $e){
            MyLogger::error($e);
        }


        MyLogger::info("Exiting NavigationController showApplications()");

        return view('profile\applications')
            ->with('applications', $applications);
    }
    //Applicants Page
    public function showApplicants($id){
        MyLogger::info("Entering NavigationController showApplicants()");
        $applicants = NULL;
        try{
            $applicants = $this->security->getApplicants($id);
        }catch (\Exception $e){
            MyLogger::error($e);
        }
        MyLogger::info("Exiting NavigationController showApplicants()");
        return view('admin\applicants')->with('applicants', $applicants);
    }
}
