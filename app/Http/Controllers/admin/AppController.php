<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use App\Models\Admin;
use App\Models\Mission;
use App\Models\Mission_application;
use Auth;
 
class AppController extends Controller
{
    public function index(Request $request)
    {
        $pagecount = 5;
        if (isset($_REQUEST['page'])) {
          $page = $_REQUEST['page'];
        } else
          $page = 1;
        $cnts = Mission_application::join('user', 'mission_application.user_id', '=', 'user.user_id')->join('mission', 'mission_application.mission_id', '=', 'mission.mission_id')->where('mission_application.approval_status', 'PENDING')->get()->count();
        $cnt = ceil($cnts / $pagecount);
        $apps = Mission_application::join('user', 'mission_application.user_id', '=', 'user.user_id')->join('mission', 'mission_application.mission_id', '=', 'mission.mission_id')->where('mission_application.approval_status', 'PENDING')->paginate($pagecount);
  
        if ($request->get('search')) { 
            $apps = Mission_application::join('user', 'mission_application.user_id', '=', 'user.user_id')->join('mission', 'mission_application.mission_id', '=', 'mission.mission_id')->where('mission_application.approval_status', 'PENDING')->where('user.first_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('user.last_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('mission.title', 'LIKE', '%' . $request->get('search') . '%')->get();
        }
        return view('admin.app', compact('apps', 'page','cnt'));
    }
    
    public function approve_app($mission_application_id)
    {
        Mission_application::where('mission_application_id', $mission_application_id)->update(['approval_status' => 'APPROVE']);
        return redirect("admin/app")->with('message', 'Application Approved');
    }

    public function decline_app($mission_application_id)
    {
        Mission_application::where('mission_application_id', $mission_application_id)->update(['approval_status' => 'DECLINE']);
        return redirect("admin/app")->with('message', 'Application Decline');
    }
}