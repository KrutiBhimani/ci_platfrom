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
        $pagecount = 5;
        if (isset($_REQUEST['page'])) {
          $pag = $_REQUEST['page'];
        } else
          $pag = 1;
        $cnts = Cms_page::where('deleted_at', null)->get()->count();
        $cnt = ceil($cnts / $pagecount);
        $pages = Cms_page::where('deleted_at', null)->paginate($pagecount);

        if ($request->get('search')) { 
            $pages = Cms_page::where('title', 'LIKE', '%' . $request->get('search') . '%')->where('deleted_at', null)->get();
        }
        return view('admin.page', compact('pages', 'pag','cnt'));
    }

    public function add_page()
    {
        return view('admin.add_page');
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
        $page = Cms_page::where(['cms_page_id' => $cms_page_id])->first();
        return view('admin.edit_page',compact('page'));
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
        Cms_page::where('cms_page_id', $cms_page_id)->update(['deleted_at' => Carbon::now()->toDateTimeString()]);
    }
    
}