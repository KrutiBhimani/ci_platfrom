<?php

namespace App\Http\Controllers;

use App\Models\Story;

class StoriesController extends Controller
{
    public function index()
    {
        $stories = Story::select('*', 'story.title as story_title', 'story.description as story_description', 'mission_theme.title as theme_title')
            ->where('story.status', 'PUBLISHED')
            ->leftJoin('mission', 'mission.mission_id', '=', 'story.mission_id')
            ->leftJoin('mission_theme', 'mission.theme_id', '=', 'mission_theme.mission_theme_id')
            ->leftJoin('user', 'user.user_id', '=', 'story.user_id')
            ->leftJoin('story_media', 'story_media.story_id', '=', 'story.story_id')
            ->groupby('story.story_id');

        $pagecount = 9;
        if (isset($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
        } else
            $page = 1;
        if ($page == "" || $page == 1) {
            $postno = 0;
        } else
            $postno = ($page * $pagecount) - $pagecount;
        $cnts = $stories->get()->count();
        $cnt = ceil($cnts / $pagecount);

        $stories = $stories->skip($postno)->take($pagecount)->get();

        return view('story', compact('stories', 'cnt', 'page'));
    }
}