<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use Carbon\Carbon;
use App\Models\Mission_theme;
use Illuminate\Support\Facades\Auth;
 
class ThemeController extends Controller
{
    public function theme(Request $request)
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
        return view('admin.theme', compact('themes', 'page','cnt'));
    }
    public function add_theme()
    {
        return view('admin.add_theme');
    }
    
    public function theme_add(Request $request)
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

    public function edit_theme($mission_theme_id)
    {
        $theme = Mission_theme::where(['mission_theme_id' => $mission_theme_id])->first();
        return view('admin.edit_theme',compact('theme'));
    } 
 
    public function theme_edit(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        $theme = [
            "title" => $request->get('title'),
            "status" => $request->get('status')
        ];
        Mission_theme::where('mission_theme_id', $request->get('mission_theme_id'))->update($theme);
        return redirect("admin/theme")->with('message', 'theme updated sucessfully');
    }

    public function delete_theme($mission_theme_id)
    {
        Mission_theme::where('mission_theme_id', $mission_theme_id)->update(['deleted_at' => Carbon::now()->toDateTimeString()]);
    }
    
}