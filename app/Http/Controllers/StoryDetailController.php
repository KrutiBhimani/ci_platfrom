<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Story_media;
use App\Models\User;
use App\Models\Story_invite;
use Mail;
use Auth;
use Illuminate\Http\Request;

class StoryDetailController extends Controller
{
    public function show($story_id)
    {
        Story::where('story_id',$story_id)->increment('view_count');

        $story=Story::select('*','story.description as story_desc','story.title as story_title')
        ->where('story.story_id',$story_id)
        ->leftJoin('user', 'user.user_id', '=', 'story.user_id')
        ->leftJoin('story_media', 'story_media.story_id', '=', 'story.story_id')
        ->groupby('story.story_id')
        ->first();
        
        $medias = Story_media::where('story_id',$story_id)->get();

        return view('story_detail',compact('story','medias'));
    }
    
    public function store(Request $request) //invite
    {
        $request->validate([
            'email' => 'required',
        ]);
        $user_id = User::where('email',$request->email)->first()->user_id;
        $title = Story::where('story_id', $request->story_id)->first()->title;
        Mail::send('email.story_invite', ['story_id' => $request->story_id, 'title' => $title], function($message) use($request){
            $message->to($request->email);
            $message->subject('Invited');
        });
        Story_invite::insert([
            'story_id' => $request->story_id, 
            'from_user_id' => Auth::user()->user_id,
            'to_user_id' => $user_id,
        ]);
        return back()->with('message', 'We have sended invite request!');
    }
}