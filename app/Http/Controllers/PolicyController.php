<?php

namespace App\Http\Controllers;

use App\Models\Cms_page;

class PolicyController extends Controller
{
    public function index()
    {
        $pages = Cms_page::where('deleted_at', null)->get();
        return view('policy', compact('pages'));
    }

}