<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use App\Models\Mission;
use App\Models\Goal_mission;
use App\Models\Mission_document;
use App\Models\Mission_media;
use App\Models\Mission_skill;
use App\Models\Time_mission;
use App\Models\Country;
use App\Models\City;
use App\Models\Mission_theme;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
 
class MissionController extends Controller
{
    public function mission(Request $request)
    {
        if(Auth::check()){
            $missions = Mission::where('deleted_at', null)->get();
            if ($request->get('search')) { 
                $missions = Mission::where('title', 'LIKE', '%' . $request->get('search') . '%')->where('deleted_at', null)->get();
            }
            return view('admin.mission', compact('missions'));
        }
        return redirect("login")->with('error', 'are not allowed to access');
    }
    
    public function add_mission()
    {
        if(Auth::check()){
            $countries = Country::get();
            $cities = City::get();
            $themes = Mission_theme::where('deleted_at', null)->get();
            $skills = Skill::where('deleted_at', null)->get();
            return view('admin.add_mission',compact('countries','cities','themes','skills'));
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    }

    public function mission_add(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'mission_type' => 'required',
            'theme_id' => 'required',
            'media_name' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        $mission = new Mission([
            "theme_id" => $request->get('theme_id'),
            "country_id" => $request->get('country_id'),
            "city_id" => $request->get('city_id'),
            "title" => $request->get('title'),
            "short_description" => $request->get('short_description'),
            "description" => $request->get('description'),
            "start_date" => $request->get('start_date'),
            "end_date" => $request->get('end_date'),
            "mission_type" => $request->get('mission_type'),
            "organization_name" => $request->get('organization_name'),
            "organization_detail" => $request->get('organization_detail'),
            "availability" => $request->get('availability')
        ]);
        $mission->save();

        $mission_id = Mission::max('mission_id');

        if ($request->get('skill_id')) { 
            $skil = $request->get('skill_id');
            foreach ($skil as $item) {
                $skill = new Mission_skill([
                    "skill_id" => $item,
                    "mission_id" => $mission_id
                ]);
                $skill->save();
            }
        }

        if($request->hasFile('media_name')){
            foreach ($request->file('media_name') as $image) {
                $name = $image->hashName();
                $image->store('public/uplodes');
                $media = new Mission_media([
                    "mission_id" => $mission_id,
                    "media_name" => $name,
                    "media_type" => $image->extension(),
                    "media_path" => '/storage/uplodes/'.$name,
                ]);
                $media->save();
            }
        }

        if($request->hasFile('document_name')){
            foreach ($request->file('document_name') as $file) {
                $name = $file->hashName();
                $file->store('public/uplodes');
                $document = new Mission_document([
                    "mission_id" => $mission_id,
                    "document_name" => $name,
                    "document_type" => $file->extension(),
                    "document_path" => '/storage/uplodes/'.$name,
                ]);
                $document->save();
            }
        }

        if($request->get('mission_type')=='TIME'){
            $time = new Time_mission([
                "mission_id" => $mission_id,
                "total_seat" => $request->get('total_seat'),
                "deadline" => $request->get('deadline'),
            ]);
            $time->save();
        }

        if($request->get('mission_type')=='GOAL'){
            $request->validate([
                'goal_value' => 'required'
            ]);
            $goal = new Goal_mission([
                "mission_id" => $mission_id,
                "goal_objective_text" => $request->get('goal_objective_text'),
                "goal_value" => $request->get('goal_value'),
            ]);
            $goal->save();
        }
        return redirect("admin/mission")->with('message', 'New mission added sucessfully');
    }

    public function edit_mission($mission_id)
    {
        if(Auth::check()){
            $mission = Mission::where(['mission_id' => $mission_id])->first();
            $countries = Country::get();
            $cities = City::get();
            $themes = Mission_theme::where('deleted_at', null)->get();
            $skills = Skill::where('deleted_at', null)->get();
            $selected_skills = Mission_skill::where(['mission_id' => $mission_id])->get();
            $goal = Goal_mission::where(['mission_id' => $mission_id])->first();
            $time = Time_mission::where(['mission_id' => $mission_id])->first();
            return view('admin.edit_mission',compact('mission','countries','cities','themes','skills','goal','time','selected_skills'));
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    }

    public function mission_edit(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'mission_type' => 'required',
            'theme_id' => 'required'
        ]);
        $mission = [
            "theme_id" => $request->get('theme_id'),
            "country_id" => $request->get('country_id'),
            "city_id" => $request->get('city_id'),
            "title" => $request->get('title'),
            "short_description" => $request->get('short_description'),
            "description" => $request->get('description'),
            "start_date" => $request->get('start_date'),
            "end_date" => $request->get('end_date'),
            "mission_type" => $request->get('mission_type'),
            "organization_name" => $request->get('organization_name'),
            "organization_detail" => $request->get('organization_detail'),
            "availability" => $request->get('availability')
        ];
        Mission::where('mission_id', $request->get('mission_id'))->update($mission);

        if ($request->get('skill_id')) {
            Mission_skill::where(['mission_id' => $request->get('mission_id')])->delete();
            $skil = $request->get('skill_id');
            foreach ($skil as $item) {
                $skill = new Mission_skill([
                    "skill_id" => $item,
                    "mission_id" => $request->get('mission_id')
                ]);
                $skill->save();
            }
        }

        if($request->hasFile('media_name')){
            Mission_media::where(['mission_id' => $request->get('mission_id')])->delete();
            foreach ($request->file('media_name') as $image) {
                $name = $image->hashName();
                $image->store('public/uplodes');
                $media = new Mission_media([
                    "mission_id" => $request->get('mission_id'),
                    "media_name" => $name,
                    "media_type" => $image->extension(),
                    "media_path" => '/storage/uplodes/'.$name,
                ]);
                $media->save();
            }
        }

        if($request->hasFile('document_name')){
            Mission_document::where(['mission_id' => $request->get('mission_id')])->delete();
            foreach ($request->file('document_name') as $file) {
                $name = $file->hashName();
                $file->store('public/uplodes');
                $document = new Mission_document([
                    "mission_id" => $request->get('mission_id'),
                    "document_name" => $name,
                    "document_type" => $file->extension(),
                    "document_path" => '/storage/uplodes/'.$name,
                ]);
                $document->save();
            }
        }

        if($request->get('mission_type')=='TIME'){
            $update = Time_mission::where(['mission_id' => $request->get('mission_id')])->first();
            if($update){
                $time = [
                    "total_seat" => $request->get('total_seat'),
                    "deadline" => $request->get('deadline'),
                ];
                Time_mission::where('mission_id', $request->get('mission_id'))->update($time);
            }
            else{
                $time = new Time_mission([
                    "mission_id" => $request->get('mission_id'),
                    "total_seat" => $request->get('total_seat'),
                    "deadline" => $request->get('deadline'),
                ]);
                $time->save();
            }
        }

        if($request->get('mission_type')=='GOAL'){
            $request->validate([
                'goal_value' => 'required'
            ]);
            $update = Goal_mission::where(['mission_id' => $request->get('mission_id')])->first();
            if($update){
                $goal = [
                    "goal_objective_text" => $request->get('goal_objective_text'),
                    "goal_value" => $request->get('goal_value'),
                ];
                Goal_mission::where('mission_id', $request->get('mission_id'))->update($goal);
            }
            else{
                $goal = new Goal_mission([
                    "mission_id" => $request->get('mission_id'),
                    "goal_objective_text" => $request->get('goal_objective_text'),
                    "goal_value" => $request->get('goal_value'),
                ]);
                $goal->save();
            }
        }
        return redirect("admin/mission")->with('message', 'mission updated sucessfully');
    }

    public function delete_mission($mission_id)
    {
        if(Auth::check()){
            Mission::where('mission_id', $mission_id)->update(['deleted_at' => Carbon::now()->toDateTimeString()]);
        }
        return redirect("admin/mission")->with('message', 'Mission deleted sucessfully');
    }
}