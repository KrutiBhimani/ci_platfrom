<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Mission_application;
use App\Models\Story;
use App\Models\Story_media;
use Carbon\Carbon;

class ShareStoryController extends Controller
{
    public function index()
    {
        $missions = Mission_application::leftJoin('mission', 'mission.mission_id', '=', 'mission_application.mission_id')
            ->where('user_id', Auth::user()->user_id)->where('approval_status', 'APPROVE')->get();

        $story = Story::where('user_id', Auth::user()->user_id)->where('status', 'DRAFT')->first();
        $story_media = null;
        $story_url = null;
        if ($story) {
            $story_media = Story_media::where(['story_id' => $story->story_id])->where('type', '!=', 'video')->get();
            $story_url = Story_media::where(['story_id' => $story->story_id])->where('type', 'video')->get();
        }
        return view('share_story', compact('missions', 'story', 'story_media', 'story_url'));
    }

    public function store(Request $request)
    {
        $story = Story::where('user_id', Auth::user()->user_id)->where('status', 'DRAFT')->first();
        $request->validate([
            'mission_id' => 'required',
            'title' => 'max:255',
            'description' => 'max:40000'
        ]);
        if ($story) {
            switch ($request->input('add')) {
                case 'draft':
                    $status = 'DRAFT';
                    break;
                case 'publish':
                    $status = 'PENDING';
                    break;
            }
            Story::where('story_id', $story->story_id)->update([
                'mission_id' => $request->mission_id,
                'title' => $request->title,
                'description' => $request->description,
                'published_at' => $request->published_at,
                'status' => $status,
            ]);
            if ($request->url) {
                Story_media::where('story_id', $story->story_id)->where('type', 'video')->delete();
                $links_array = explode("\n", $request->url);
                foreach ($links_array as $url) {
                    Story_media::insert([
                        'story_id' => $story->story_id,
                        'type' => 'video',
                        'path' => $url,
                    ]);
                }
            }
            if ($request->hasFile('media_name')) {
                Story_media::where('story_id', $story->story_id)->where('type', '!=', 'video')->delete();
                foreach ($request->file('media_name') as $image) {
                    $name = $image->hashName();
                    $image->store('public/uplodes');
                    Story_media::insert([
                        "story_id" => $story->story_id,
                        "type" => $image->extension(),
                        "path" => '/storage/uplodes/' . $name,
                    ]);
                }
            }
            return redirect('/stories')->with('message', 'Story saved');
        } else {
            Story::insert([
                'mission_id' => $request->mission_id,
                'user_id' => Auth::user()->user_id,
                'title' => $request->title,
                'description' => $request->description,
                'published_at' => $request->published_at,
                'status' => 'DRAFT',
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
            $story_id = Story::max('story_id');
            if ($request->url) {
                $links_array = explode("\n", $request->url);
                foreach ($links_array as $url) {
                    Story_media::insert([
                        'story_id' => $story_id,
                        'type' => $url->extension(),
                        'path' => $url,
                    ]);
                }
            }
            if ($request->hasFile('media_name')) {
                foreach ($request->file('media_name') as $image) {
                    $name = $image->hashName();
                    $image->store('public/uplodes');
                    Story_media::insert([
                        "story_id" => $story_id,
                        "type" => $image->extension(),
                        "path" => '/storage/uplodes/' . $name,
                    ]);
                }
            }
            return redirect('/stories')->with('message', 'Story saved as draft');
        }
    }
}