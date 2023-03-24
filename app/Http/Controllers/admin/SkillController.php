<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use Carbon\Carbon;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        $pagecount = 5;
        if (isset($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
        } else
            $page = 1;
        $cnts = Skill::where('deleted_at', null)->get()->count();
        $cnt = ceil($cnts / $pagecount);
        $skills = Skill::where('deleted_at', null)->paginate($pagecount);

        if ($request->get('search')) {
            $skills = Skill::where('skill_name', 'LIKE', '%' . $request->get('search') . '%')->where('deleted_at', null)->get();
        }
        return view('admin.skill', compact('skills', 'page', 'cnt'));
    }
    public function create()
    {
        return view('admin.add_skill');
    }

    public function store(Request $request)
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

    public function edit($skill_id)
    {
        $skill = Skill::where(['skill_id' => $skill_id])->first();
        return view('admin.edit_skill', compact('skill'));
    }

    public function update(Request $request, $skill_id)
    {
        $request->validate([
            'skill_name' => 'required'
        ]);
        $skill = [
            "skill_name" => $request->get('skill_name'),
            "status" => $request->get('status')
        ];
        Skill::where('skill_id', $skill_id)->update($skill);
        return redirect("admin/skill")->with('message', 'skill updated sucessfully');
    }

    public function destroy($skill_id)
    {
        Skill::where('skill_id', $skill_id)->update(['deleted_at' => Carbon::now()->toDateTimeString()]);
        return redirect("admin/skill")->with('message', 'Skill deleted sucessfully');
    }

}