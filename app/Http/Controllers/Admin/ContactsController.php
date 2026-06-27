<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function contacts () {
        $contacts = Contacts::latest()->get();
        return view('admin.pages.contacts', compact('contacts'));
    }
    public function contactsSend(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        try {

            // Save to database
            $contact = Contacts::create([
                'name'    => $request->name,
                'email'   => $request->email,
                'phone'   => $request->phone, // optional
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            // Data for email
            $data = [
                'name'    => $contact->name,
                'email'   => $contact->email,
                'subject' => $contact->subject,
                'message' => $contact->message,
            ];

            // Send email
            Mail::to('shivanigodhani7210@gmail.com')
                ->send(new ContactMail($data));

            return back()->with('success', 'Message sent successfully.');

        } catch (\Exception $e) {

            return back()->with('error', $e->getMessage());

        }
    }
}
