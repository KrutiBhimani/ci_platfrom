<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use App\Models\Admin;
use App\Models\Cms_page;
use Carbon\Carbon;
use Auth;
 
class PageController extends Controller
{
    public function index(Request $request)
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

    public function create()
    {
        return view('admin.add_page');
    }

    public function store(Request $request)
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

    public function edit($cms_page_id)
    {
        $page = Cms_page::where(['cms_page_id' => $cms_page_id])->first();
        return view('admin.edit_page',compact('page'));
    }
  
    public function update(Request $request, $cms_page_id)
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
        Cms_page::where('cms_page_id', $cms_page_id)->update($page);
        return redirect("admin/page")->with('message', 'page updated sucessfully');
    }

    public function destroy($cms_page_id)
    {
        Cms_page::where('cms_page_id', $cms_page_id)->update(['deleted_at' => Carbon::now()->toDateTimeString()]);
        return redirect("admin/page")->with('message', 'Page deleted sucessfully');
    }
    
}