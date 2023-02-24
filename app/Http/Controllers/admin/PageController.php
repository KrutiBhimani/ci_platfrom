<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use App\Models\Cms_page;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
 
class PageController extends Controller
{
    public function page(Request $request)
    {
        if(Auth::check()){
            $pages = Cms_page::where('deleted_at', null)->get();
            if ($request->get('search')) { 
                $pages = Cms_page::where('title', 'LIKE', '%' . $request->get('search') . '%')->where('deleted_at', null)->get();
            }
            return view('admin.page', compact('pages'));
        }
        return redirect("login")->with('error', 'are not allowed to access');
    }

    public function add_page()
    {
        if(Auth::check()){
            return view('admin.add_page');
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    }

    public function page_add(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required'
        ]);
        $pages = new Cms_page([
            "title" => $request->get('title'),
            "description" => $request->get('description'),
            "slug" => $request->get('slug'),
            "status" => $request->get('status')
        ]);
        $pages->save();
        return redirect("admin/page")->with('message', 'New page added sucessfully');
    }

    public function edit_page($cms_page_id)
    {
        if(Auth::check()){
            $page = Cms_page::where(['cms_page_id' => $cms_page_id])->first();
            return view('admin.edit_page',compact('page'));
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    }
  
    public function page_edit(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required'
        ]);
        $page = [
            "title" => $request->get('title'),
            "description" => $request->get('description'),
            "slug" => $request->get('slug'),
            "status" => $request->get('status')
        ];
        Cms_page::where('cms_page_id', $request->get('cms_page_id'))->update($page);
        return redirect("admin/page")->with('message', 'page updated sucessfully');
    }

    public function delete_page($cms_page_id)
    {
        if(Auth::check()){
            Cms_page::where('cms_page_id', $cms_page_id)->update(['deleted_at' => Carbon::now()->toDateTimeString()]);
        }
        return redirect("admin/page")->with('message', 'Page deleted sucessfully');
    }
    
}