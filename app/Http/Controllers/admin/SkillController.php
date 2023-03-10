<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
 
class SkillController extends Controller
{
    public function skill(Request $request)
    {
        $skills = Skill::where('deleted_at', null)->get();
        if ($request->get('search')) { 
            $skills = Skill::where('skill_name', 'LIKE', '%' . $request->get('search') . '%')->where('deleted_at', null)->get();
        }
        return view('admin.skill', compact('skills'));
    }
    public function add_skill()
    {
        return view('admin.add_skill');
    } 
    
    public function skill_add(Request $request)
    {
        $request->validate([
            'skill_name' => 'required'
        ]);
        $skills = new Skill([
            "skill_name" => $request->get('skill_name'),
            "status" => $request->get('status')
        ]);
        $skills->save();
        return redirect("admin/skill")->with('message', 'New skill added sucessfully');
    }

    public function edit_skill($skill_id)
    {
        $skill = Skill::where(['skill_id' => $skill_id])->first();
        return view('admin.edit_skill',compact('skill'));
    } 
 
    public function skill_edit(Request $request)
    {
        $request->validate([
            'skill_name' => 'required'
        ]);
        $skill = [
            "skill_name" => $request->get('skill_name'),
            "status" => $request->get('status')
        ];
        Skill::where('skill_id', $request->get('skill_id'))->update($skill);
        return redirect("admin/skill")->with('message', 'skill updated sucessfully');
    }

    public function delete_skill($skill_id)
    {
        Skill::where('skill_id', $skill_id)->update(['deleted_at' => Carbon::now()->toDateTimeString()]);
    }
    
}