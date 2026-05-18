<?php

namespace App\Http\Controllers;
use App\Models\ContactMessage;

use Illuminate\Http\Request;

class ContactController extends Controller
{   
    public function index()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        ContactMessage::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'subscribe' => $request->has('subscribe'),
            'status' => 'unread',
        ]);

        return back()->with('success', 'Message sent successfully!');
    }

}
