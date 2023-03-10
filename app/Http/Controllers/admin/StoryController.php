<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Mission;
use App\Models\Story;
use App\Models\Story_media;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
 
class StoryController extends Controller
{
    public function story(Request $request)
    {
        $stories = Story::join('user', 'story.user_id', '=', 'user.user_id')->join('mission', 'story.mission_id', '=', 'mission.mission_id')->where('story.deleted_at', null)->where('story.status', 'PENDING')->get((['*','story.title AS story_title']));
        if ($request->get('search')) { 
            $stories = Story::join('user', 'story.user_id', '=', 'user.user_id')->join('mission', 'story.mission_id', '=', 'mission.mission_id')->where('story.title', 'LIKE', '%' . $request->get('search') . '%')->orwhere('user.first_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('user.last_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('mission.title', 'LIKE', '%' . $request->get('search') . '%')->where('story.deleted_at', null)->where('story.status', 'PENDING')->get((['*','story.title AS story_title']));
        }
        return view('admin.story', compact('stories'));
    }

    public function delete_story($story_id)
    {
        Story::where('story_id', $story_id)->update(['deleted_at' => Carbon::now()->toDateTimeString()]);
        return redirect("admin/story")->with('message', 'Story deleted sucessfully');
    }
    
    public function approve_story($story_id)
    {
        Story::where('story_id', $story_id)->update(['status' => 'PUBLISHED']);
        return redirect("admin/story")->with('message', 'Story Approved');
    }

    public function decline_story($story_id)
    {
        Story::where('story_id', $story_id)->update(['status' => 'DECLINE']);
        return redirect("admin/story")->with('message', 'Story declined');
    }

    public function view_story($story_id)
    {
        $story = Story::join('user', 'story.user_id', '=', 'user.user_id')->join('mission', 'story.mission_id', '=', 'mission.mission_id')->where(['story_id' => $story_id])->first((['*','story.title AS story_title','story.description AS story_desc']));
        $medias = Story_media::where(['story_id' => $story_id])->get();
        return view('admin.view_story', compact('story','medias'));
    }
}