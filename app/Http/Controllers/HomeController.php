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
use App\Models\Mission_invite;   
use App\Models\Timesheet; 
use DB;  
use Mail; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
 
class HomeController extends Controller
{
    public function home(Request $request)
    {
        $applications = Mission::select('*','mission.mission_id as missionid', DB::raw('COUNT(mission_application.mission_id) as count'))
        ->leftJoin('mission_application', 'mission.mission_id', '=', 'mission_application.mission_id')
        ->where('mission.deleted_at', null)
        ->where('mission_application.approval_status', 'APPROVE')
        ->groupby('mission.mission_id')
        ->get();

        $applies = Mission_application::where(function ($query) { 
            $query->where('mission_application.approval_status', 'APPROVE')->orWhere('mission_application.approval_status', 'PENDING');   
        })->get();

        $favs = Favourite_mission::where('user_id', Auth::user()->user_id)->get();

        $themes = Mission::leftJoin('mission_theme', 'mission.theme_id', '=', 'mission_theme.mission_theme_id')
        ->groupby('mission_theme.mission_theme_id')
        ->get();

        $cities = Mission::leftJoin('city', 'mission.city_id', '=', 'city.city_id')
        ->groupby('city.city_id')
        ->get();

        $countries = Mission::leftJoin('country', 'mission.country_id', '=', 'country.country_id')
        ->groupby('country.country_id')
        ->get();

        $skills = Mission::leftJoin('mission_skill', 'mission.mission_id', '=', 'mission_skill.mission_id')
        ->leftJoin('skill', 'mission_skill.skill_id', '=', 'skill.skill_id')
        ->groupby('skill.skill_id')
        ->get();

        $listing = Mission::select('*','mission.title AS mission_title','mission.mission_id as missionid', DB::raw('ROUND(AVG(mission_rating.rating)) as rating'))
        ->leftJoin('mission_theme', 'mission.theme_id', '=', 'mission_theme.mission_theme_id')
        ->leftJoin('country', 'mission.country_id', '=', 'country.country_id')
        ->leftJoin('city', 'mission.city_id', '=', 'city.city_id')
        ->leftJoin('mission_media', 'mission.mission_id', '=', 'mission_media.mission_id')
        ->leftJoin('mission_skill', 'mission.mission_id', '=', 'mission_skill.mission_id')
        ->leftJoin('skill', 'mission_skill.skill_id', '=', 'skill.skill_id')
        ->leftJoin('goal_mission', 'mission.mission_id', '=', 'goal_mission.mission_id')
        ->leftJoin('time_mission', 'mission.mission_id', '=', 'time_mission.mission_id')
        ->leftJoin('mission_rating', 'mission.mission_id', '=', 'mission_rating.mission_id');
        
        if ($request->get('sort') == 'Sort by my favourite') {
            $listing->join('favourite_mission', 'mission.mission_id', '=', 'favourite_mission.mission_id')->where('favourite_mission.user_id', Auth::user()->user_id);
        }
        
        $listing->where('mission.deleted_at', null);
        if($request->get('country') && $request->get('country') != 'none'){
            $listing->where('country.name',$request->get('country'));
        }

        if($request->get('theme')){
            $theme = $request->get('theme');
            $listing->where(function ($query) use ($theme) { 
                foreach ($theme as $item)
                {
                    $query->orWhere('mission_theme.title',$item);
                }
            });
        }
        
        if($request->get('city')){
            $city = $request->get('city');
            $listing->where(function ($query) use ($city) { 
                foreach ($city as $item)
                {
                    $query->orWhere('city.name',$item);
                }
            });
        }

        if($request->get('skill')){
            $skill = $request->get('skill');
            $listing->where(function ($query) use ($skill) { 
                foreach ($skill as $item)
                {
                    $query->orWhere('skill.skill_name',$item);
                }
            });
        }

        if($request->get('search')){
            $listing->where('mission.title', 'LIKE', '%' . $request->get('search') . '%');
        }

        if($request->get('sort')){
            switch ($request->get('sort')) {
                case 'Newest':
                    $listing->orderBy('mission.mission_id', 'desc');
                    break;
                case 'Oldest':
                    $listing->orderBy('mission.mission_id', 'asc');
                    break;
                case 'Lowest available seats':
                    $listing->orderBy('time_mission.total_seat', 'asc');
                    break;
                case 'Highest available seats':
                    $listing->orderBy('time_mission.total_seat', 'desc');
                    break;
                case 'sort by deadline':
                    $listing->orderBy('time_mission.deadline', 'asc');
                    break;
                default:
                    $listing->orderBy('mission.mission_id', 'asc');
                    break;
            }
        }
        
        $listing->groupby('mission.mission_id');
        
        $pagecount = 9;
        if (isset($_REQUEST['page'])) {
          $page = $_REQUEST['page'];
        } else
          $page = 1;
        if ($page == "" || $page == 1) {
          $postno = 0;
        } else
          $postno = ($page * $pagecount) - $pagecount;
        $cnts = $listing->get()->count();
        $cnt = ceil($cnts / $pagecount);
        $missions = $listing->skip($postno)->take($pagecount)->get();
        $mission_count = $missions->count();

        $times = Timesheet::get();

        return view('home',compact('missions','applications','favs','applies','themes','cities','countries','skills','mission_count','page','cnt','times'));
        
    }

    public function like($mission_id){
        Favourite_mission::insert([
            "mission_id" => $mission_id,
            "user_id" => Auth::user()->user_id,
        ]);
        return back()->with('message', 'Mission Liked');
    }

    public function unlike($mission_id){
        Favourite_mission::where(['mission_id' => $mission_id , 'user_id'=> Auth::user()->user_id])->delete();
        return back()->with('message', 'Mission Disliked');
    }

    public function invite(Request $request)
    {
        $user_id = User::where('email',$request->email)->first()->user_id;
        $title = Mission::where('mission_id', $request->mission_id)->first()->title;
        Mail::send('email.invite', ['title' => $title], function($message) use($request){
            $message->to($request->email);
            $message->subject('Invited');
        });
        Mission_invite::insert([
            'mission_id' => $request->mission_id, 
            'from_user_id' => Auth::user()->user_id, 
            'to_user_id' => $user_id,
        ]);
        return back()->with('message', 'We have sended invite request!');
    }

    public function apply($mission_id){
        Mission_application::insert([
            "mission_id" => $mission_id,
            "user_id" => Auth::user()->user_id,
            "applied_at" => Carbon::now()->toDateTimeString()
        ]);
        return back()->with('message', 'Applied Successfully');
    }
}