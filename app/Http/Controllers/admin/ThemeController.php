<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Mission_theme;

class ThemeController extends Controller
{
    public function index(Request $request)
    {
        $pagecount = 5;
        if (isset($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
        } else
            $page = 1;
        $cnts = Mission_theme::where('deleted_at', null)->get()->count();
        $cnt = ceil($cnts / $pagecount);
        $themes = Mission_theme::where('deleted_at', null)->paginate($pagecount);

        if ($request->get('search')) {
            $themes = Mission_theme::where('title', 'LIKE', '%' . $request->get('search') . '%')->where('deleted_at', null)->get();
        }
        return view('admin.theme', compact('themes', 'page', 'cnt'));
    }
    public function create()
    {
        return view('admin.add_theme');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        $themes = new Mission_theme([
            "title" => $request->get('title'),
            "status" => $request->get('status')
        ]);
        $themes->save();
        return redirect("admin/theme")->with('message', 'New theme added sucessfully');
    }

    public function edit($mission_theme_id)
    {
        $theme = Mission_theme::where(['mission_theme_id' => $mission_theme_id])->first();
        return view('admin.edit_theme', compact('theme'));
    }

    public function update(Request $request, $mission_theme_id)
    {
        $request->validate([
            'title' => 'required'
        ]);
        $theme = [
            "title" => $request->get('title'),
            "status" => $request->get('status')
        ];
        Mission_theme::where('mission_theme_id', $mission_theme_id)->update($theme);
        return redirect("admin/theme")->with('message', 'theme updated sucessfully');
    }

    public function destroy($mission_theme_id)
    {
        Mission_theme::where('mission_theme_id', $mission_theme_id)->update(['deleted_at' => Carbon::now()->toDateTimeString()]);
        return redirect("admin/theme")->with('message', 'Theme deleted sucessfully');
    }

}