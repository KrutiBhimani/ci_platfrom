<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoryDetailController extends Controller
{
    public function story_detail($story_id)
    {
        return view('story_detail');
    }
}
