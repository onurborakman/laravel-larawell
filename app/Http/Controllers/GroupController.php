<?php

namespace App\Http\Controllers;

use App\Services\Business\SecurityService;
use App\Services\Data\Utility\MyLogger;
use Illuminate\Http\Request;
use Throwable;

class GroupController extends Controller
{
    private $security;
    public function __construct(){
        $this->security = new SecurityService();
    }
    //Create group
    public function createGroup(Request $request)
    {
        MyLogger::info("Entering GroupContoller creatGroup()");

        try {
            $title = $request->input('title');
            $description = $request->input('description');
            $this->security->createGroup($title, $description);
            return redirect()->route('group.create');
        } catch (\Exception $e) {
            MyLogger::info("Exiting GroupContoller creatGroup()");
            return redirect()->route('group.create');
        }
    }

    //Update group
    public function updateGroup(Request $request)
    {
        MyLogger::info("Entering GroupContoller updateGroup()");

        try {
            $id = $request->input('id');
            $title = $request->input('title');
            $description = $request->input('description');
            $this->security->updateGroup($id, $title, $description);
            return redirect()->route('admin.group');
        } catch (\Exception $e) {
            MyLogger::info("Exiting GroupContoller updateGroup()");

            return redirect()->route('admin.group');
        }
    }

    //Delete group
    public function deleteGroup(Request $request)
    {
        MyLogger::info("Entering GroupContoller deleteGroup()");
        try {
            $id = $request->input('id');
            $this->security->deleteGroup($id);
            return redirect()->route('admin.group');
        } catch (\Exception $e) {
            MyLogger::info("Exiting GroupContoller deleteGroup()");

            return redirect()->route('admin.group');
        }
    }

    //Join group
    public function joinGroup(Request $request)
    {
        MyLogger::info("Entering GroupContoller joinGroup()");
        $id = $request->input('id');
        try {
            $this->security->joinGroup($id);
            return redirect()->route('group.page', $id);
        } catch (\Exception $e) {
            MyLogger::info("Exiting GroupContoller joinGroup()");

            return redirect()->route('group.page', $id);
        }
    }

    //Leave group
    public function leaveGroup(Request $request)
    {
        MyLogger::info("Entering GroupContoller leaveGroup()");
        $id = $request->input('id');
        try {
            $this->security->leaveGroup($id);
            return redirect()->route('group.page', $id);
        } catch (\Exception $e){
            MyLogger::info("Exiting GroupContoller leaveGroup()");
            return redirect()->route('group.page', $id);
        }
    }
}
