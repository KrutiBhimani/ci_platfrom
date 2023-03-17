<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoryDetailController extends Controller
{
    public function show($story_id)
    {
        return view('story_detail');
    }
}
