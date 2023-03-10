<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use Carbon\Carbon;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
 
class BannerController extends Controller
{
    public function banner(Request $request)
    {
        $banners = Banner::where('deleted_at', null)->get();
        if ($request->get('search')) { 
            $banners = Banner::where('title', 'LIKE', '%' . $request->get('search') . '%')->where('deleted_at', null)->get();
        }
        return view('admin.banner', compact('banners'));
    }

    public function add_banner()
    {
        return view('admin.add_banner');
    }
    
    public function banner_add(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'sort_order' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png'
        ]);
        $request->image->store('public/uplodes');
        $banner = new Banner([
            "title" => $request->get('title'),
            "text" => $request->get('text'),
            "sort_order" => $request->get('sort_order'),
            "image" => $request->image->hashName(),
        ]);
        $banner->save();
        return redirect("admin/banner")->with('message', 'New banner added sucessfully');
    }

    public function edit_banner($banner_id)
    {
        $banner = Banner::where(['banner_id' => $banner_id])->first();
        return view('admin.edit_banner',compact('banner'));
    }
    
    public function banner_edit(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'sort_order' => 'required',
            'image' => 'mimes:jpeg,bmp,png'
        ]);
        $banner = Banner::where(['banner_id' => $request->get('banner_id')])->first();
        $image = $banner->image;
        if($request->hasFile('image')){ 
            $image = $request->image->hashName();
            $request->image->store('public/uplodes');
        }
        $banner = [
            "title" => $request->get('title'),
            "text" => $request->get('text'),
            "sort_order" => $request->get('sort_order'),
            "image" => $image,
        ];
        Banner::where('banner_id', $request->get('banner_id'))->update($banner);
        return redirect("admin/banner")->with('message', 'Banner updated sucessfully');
    }

    public function delete_banner($banner_id)
    {
        Banner::where('banner_id', $banner_id)->update(['deleted_at' => Carbon::now()->toDateTimeString()]);
    }
}