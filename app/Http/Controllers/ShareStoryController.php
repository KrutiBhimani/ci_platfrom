<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Mission_application;
use App\Models\Story;
use Carbon\Carbon;

class ShareStoryController extends Controller
{
    public function share_story()
    {
        $missions = Mission_application::leftJoin('mission', 'mission.mission_id', '=', 'mission_application.mission_id')
        ->where('user_id', Auth::user()->user_id)->where('approval_status', 'APPROVE')->get();

        $story = Story::where('user_id',Auth::user()->user_id)->where('status', 'DRAFT')->first();

        return view('share_story',compact('missions','story'));
    }

    public function story_share(Request $request){
        $story = Story::where('user_id',Auth::user()->user_id)->where('status', 'DRAFT')->first();
        $request->validate([
            'mission_id' => 'required',
            'title' => 'max:255',
            'description' => 'max:40000'
        ]);
        if($story){
            switch ($request->input('add')) {
                case 'draft':
                    Story::where('story_id', $story->story_id)->update([
                        'mission_id' => $request->mission_id, 
                        'title' => $request->title,
                        'description' => $request->description,
                        'published_at' => $request->published_at,
                    ]);
                    return back()->with('message', 'Story drafted');
                    break;
        
                case 'publish':
                    Story::where('story_id', $story->story_id)->update([
                        'mission_id' => $request->mission_id, 
                        'title' => $request->title,
                        'description' => $request->description,
                        'published_at' => $request->published_at,
                        'status' => 'PENDING',
                    ]);
                    return redirect("stories")->with('message', 'Story sended');
                    break;
            }
        }
        else{
            switch ($request->input('add')) {
                case 'draft':
                    Story::insert([
                        'mission_id' => $request->mission_id, 
                        'user_id' => Auth::user()->user_id, 
                        'title' => $request->title,
                        'description' => $request->description,
                        'published_at' => $request->published_at,
                        'status' => 'DRAFT',
                        'created_at' => Carbon::now()->toDateTimeString(),
                    ]);
                    return back()->with('message', 'Story drafted');
                    break;
            }
        }
    }
}
