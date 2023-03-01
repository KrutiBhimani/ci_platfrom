<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use App\Models\Mission; 
use App\Models\Mission_application; 
use App\Models\Favourite_mission; 
use DB; 
use Illuminate\Support\Facades\Auth;
 
class HomeController extends Controller
{
    public function home()
    {
        if(Auth::check()){
            $missions = Mission::select('*','mission.title AS mission_title','mission.mission_id as missionid', DB::raw('ROUND(AVG(mission_rating.rating)) as rating'))
            ->leftJoin('mission_theme', 'mission.theme_id', '=', 'mission_theme.mission_theme_id')
            ->leftJoin('city', 'mission.city_id', '=', 'city.city_id')
            ->leftJoin('mission_media', 'mission.mission_id', '=', 'mission_media.mission_id')
            ->leftJoin('goal_mission', 'mission.mission_id', '=', 'goal_mission.mission_id')
            ->leftJoin('time_mission', 'mission.mission_id', '=', 'time_mission.mission_id')
            ->leftJoin('mission_rating', 'mission.mission_id', '=', 'mission_rating.mission_id')
            ->where('mission.deleted_at', null)
            ->groupby('mission.mission_id')
            ->get();
            $applications = Mission::select('*','mission.mission_id as missionid', DB::raw('COUNT(mission_application.mission_id) as count'))
            ->leftJoin('mission_application', 'mission.mission_id', '=', 'mission_application.mission_id')
            ->where('mission.deleted_at', null)
            ->where('mission_application.approval_status', 'APPROVE')
            ->groupby('mission.mission_id')
            ->get();
            $applies = Mission_application::where('approval_status', 'APPROVE')->get();
            $favs = Favourite_mission::where('user_id', Auth::user()->user_id)->get();
            return view('home',compact('missions','applications','favs','applies'));
        }
        
        return redirect('/login')->with('error', 'you are not allowed to access please try login!');
    }
}