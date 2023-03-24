<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|max:255',
            'message' => 'required|max:60000'
        ]);
        Contact::insert([
            'message' => $request->message,
            'user_id' => Auth::user()->user_id,
            'subject' => $request->subject,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        return back()->with('message', 'message sended');
    }
}