<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Favourite_mission;
use App\Models\Mission_skill;
use App\Models\Mission_document;
use App\Models\Mission_rating;
use App\Models\Mission_application;
use App\Models\Mission_media;
use App\Models\Comment;
use App\Models\Timesheet;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VolunteeringController extends Controller
{
    public function show($mission_id)
    {
        $mission = Mission::select('*', 'mission.title AS mission_title', 'mission.mission_id as missionid', 'country.name as country_name', DB::raw('ROUND(AVG(mission_rating.rating)) as rating'))
            ->leftJoin('mission_theme', 'mission.theme_id', '=', 'mission_theme.mission_theme_id')
            ->leftJoin('country', 'mission.country_id', '=', 'country.country_id')
            ->leftJoin('city', 'mission.city_id', '=', 'city.city_id')
            ->leftJoin('mission_media', 'mission.mission_id', '=', 'mission_media.mission_id')
            ->leftJoin('goal_mission', 'mission.mission_id', '=', 'goal_mission.mission_id')
            ->leftJoin('time_mission', 'mission.mission_id', '=', 'time_mission.mission_id')
            ->leftJoin('mission_rating', 'mission.mission_id', '=', 'mission_rating.mission_id')
            ->where('mission.mission_id', $mission_id)
            ->first();

        $applications = Mission::select('*', 'mission.mission_id as missionid', DB::raw('COUNT(mission_application.mission_id) as count'))
            ->leftJoin('mission_application', 'mission.mission_id', '=', 'mission_application.mission_id')
            ->where('mission.deleted_at', null)
            ->where('mission_application.approval_status', 'APPROVE')
            ->groupby('mission.mission_id')
            ->get();

        $favs = Favourite_mission::where('user_id', Auth::user()->user_id)->get();

        $documents = Mission_document::where('mission_id', $mission_id)->get();

        $medias = Mission_media::where('mission_id', $mission_id)->get();

        $comments = Comment::select('*', 'comment.created_at AS comment_date')
            ->join('user', 'comment.user_id', '=', 'user.user_id')
            ->where('mission_id', $mission_id)->where('approval_status', 'PUBLISHED')->get();

        $comment_count = $comments->count();

        $rate_count = Mission_rating::where('mission_id', $mission_id)->get()->count();

        $rateduser = Mission_rating::where('mission_id', $mission_id)->where('user_id', Auth::user()->user_id)->count();

        $rating = Mission_rating::where('mission_id', $mission_id)->where('user_id', Auth::user()->user_id)->first();

        $skills = Mission_skill::join('skill', 'mission_skill.skill_id', '=', 'skill.skill_id')->where('mission_id', $mission_id)->get();

        $pagecount = 9;
        if (isset($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
        } else
            $page = 1;
        if ($page == "" || $page == 1) {
            $postno = 0;
        } else
            $postno = ($page * $pagecount) - $pagecount;
        $cnts = Mission_application::join('user', 'mission_application.user_id', '=', 'user.user_id')->where('mission_id', $mission_id)->get()->count();
        $cnt = ceil($cnts / $pagecount);
        $vols = Mission_application::join('user', 'mission_application.user_id', '=', 'user.user_id')->where('mission_id', $mission_id)->paginate($pagecount);

        $goal_count = 0;
        $goal_achieved = 0;
        if ($mission->mission_type == 'GOAL') {
            $goal_value = $mission->goal_value;
            $times = Timesheet::where('mission_id', $mission_id)->get();
            foreach ($times as $time) {
                $goal_achieved = $goal_achieved + $time->action;
            }
            $goal_count = ($goal_achieved) * (100) / ($goal_value);
        }

        // for releted mission
        $applies = Mission_application::where(function ($query) {
            $query->where('mission_application.approval_status', 'APPROVE')->orWhere('mission_application.approval_status', 'PENDING');
        })->get();

        $m_count = 1;

        $missions = Mission::select('*', 'mission.title AS mission_title', 'mission.mission_id as missionid', DB::raw('ROUND(AVG(mission_rating.rating)) as rating'))->leftJoin('mission_theme', 'mission.theme_id', '=', 'mission_theme.mission_theme_id')->leftJoin('country', 'mission.country_id', '=', 'country.country_id')->leftJoin('city', 'mission.city_id', '=', 'city.city_id')->leftJoin('mission_media', 'mission.mission_id', '=', 'mission_media.mission_id')->leftJoin('mission_skill', 'mission.mission_id', '=', 'mission_skill.mission_id')->leftJoin('skill', 'mission_skill.skill_id', '=', 'skill.skill_id')->leftJoin('goal_mission', 'mission.mission_id', '=', 'goal_mission.mission_id')->leftJoin('time_mission', 'mission.mission_id', '=', 'time_mission.mission_id')->leftJoin('mission_rating', 'mission.mission_id', '=', 'mission_rating.mission_id')->where('mission.deleted_at', null)->where('mission.mission_id', '!=', $mission->missionid)->where('city.name', $mission->name)->groupby('mission.mission_id')->limit(3)->get();
        if ($missions->isEmpty()) {
            $missions = Mission::select('*', 'mission.title AS mission_title', 'mission.mission_id as missionid', DB::raw('ROUND(AVG(mission_rating.rating)) as rating'))->leftJoin('mission_theme', 'mission.theme_id', '=', 'mission_theme.mission_theme_id')->leftJoin('country', 'mission.country_id', '=', 'country.country_id')->leftJoin('city', 'mission.city_id', '=', 'city.city_id')->leftJoin('mission_media', 'mission.mission_id', '=', 'mission_media.mission_id')->leftJoin('mission_skill', 'mission.mission_id', '=', 'mission_skill.mission_id')->leftJoin('skill', 'mission_skill.skill_id', '=', 'skill.skill_id')->leftJoin('goal_mission', 'mission.mission_id', '=', 'goal_mission.mission_id')->leftJoin('time_mission', 'mission.mission_id', '=', 'time_mission.mission_id')->leftJoin('mission_rating', 'mission.mission_id', '=', 'mission_rating.mission_id')->where('mission.deleted_at', null)->where('mission.mission_id', '!=', $mission->missionid)->where('country.name', $mission->country_name)->groupby('mission.mission_id')->limit(3)->get();
            if ($missions->isEmpty()) {
                $missions = Mission::select('*', 'mission.title AS mission_title', 'mission.mission_id as missionid', DB::raw('ROUND(AVG(mission_rating.rating)) as rating'))->leftJoin('mission_theme', 'mission.theme_id', '=', 'mission_theme.mission_theme_id')->leftJoin('country', 'mission.country_id', '=', 'country.country_id')->leftJoin('city', 'mission.city_id', '=', 'city.city_id')->leftJoin('mission_media', 'mission.mission_id', '=', 'mission_media.mission_id')->leftJoin('mission_skill', 'mission.mission_id', '=', 'mission_skill.mission_id')->leftJoin('skill', 'mission_skill.skill_id', '=', 'skill.skill_id')->leftJoin('goal_mission', 'mission.mission_id', '=', 'goal_mission.mission_id')->leftJoin('time_mission', 'mission.mission_id', '=', 'time_mission.mission_id')->leftJoin('mission_rating', 'mission.mission_id', '=', 'mission_rating.mission_id')->where('mission.deleted_at', null)->where('mission.mission_id', '!=', $mission->missionid)->where('mission_theme.title', $mission->title)->groupby('mission.mission_id')->limit(3)->get();
                if ($missions->isEmpty()) {
                    $m_count = 0;
                }
            }
        }

        $times = Timesheet::get();

        return view('volunteering_mission', compact('mission', 'applications', 'favs', 'documents', 'comments', 'comment_count', 'skills', 'rate_count', 'vols', 'cnt', 'cnts', 'postno', 'page', 'medias', 'rating', 'rateduser', 'applies', 'missions', 'm_count', 'goal_achieved', 'goal_count', 'times'));
    }

    public function edit_rating($rating, $mission_id)
    {
        Mission_rating::where('mission_id', $mission_id)->where('user_id', Auth::user()->user_id)->update(['rating' => $rating]);
        return back()->with('message', 'Rating updated');
    }

    public function add_rating($rating, $mission_id)
    {
        Mission_rating::insert([
            'mission_id' => $mission_id,
            'user_id' => Auth::user()->user_id,
            'rating' => $rating,
        ]);
        return back()->with('message', 'Rating inserted');
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment_text' => 'required|max:600'
        ]);
        Comment::insert([
            'mission_id' => $request->mission_id,
            'user_id' => Auth::user()->user_id,
            'comment_text' => $request->comment_text,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        return back()->with('message', 'Comment inserted');
    }
}