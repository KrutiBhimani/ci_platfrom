<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use App\Models\Mission;
use App\Models\Mission_application;
use Illuminate\Support\Facades\Auth;
 
class AppController extends Controller
{
    public function app(Request $request)
    {
        $apps = Mission_application::join('user', 'mission_application.user_id', '=', 'user.user_id')->join('mission', 'mission_application.mission_id', '=', 'mission.mission_id')->where('mission_application.approval_status', 'PENDING')->get();
        if ($request->get('search')) { 
            $apps = Mission_application::join('user', 'mission_application.user_id', '=', 'user.user_id')->join('mission', 'mission_application.mission_id', '=', 'mission.mission_id')->where('mission_application.approval_status', 'PENDING')->where('user.first_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('user.last_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('mission.title', 'LIKE', '%' . $request->get('search') . '%')->get();
        }
        return view('admin.app', compact('apps'));
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