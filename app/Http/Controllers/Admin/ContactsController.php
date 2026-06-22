<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function contacts () {
        return view('admin.pages.contacts');
    }
    public function contactsSend(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = $request->all();

        Mail::to('hello@sora-dining.com')
            ->send(new ContactMail($data));

        return back()->with('success', 'Message sent successfully.');
    }
}
