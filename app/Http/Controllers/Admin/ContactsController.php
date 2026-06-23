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
        // dd($request->all());
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required',
        ]);

        $data = $request->only([
            'name',
            'email',
            'subject',
            'message'
        ]);

        try {

            Mail::to('shivanigodhani7210@gmail.com')
                ->send(new ContactMail($data));

            return back()->with('success','Message sent successfully.');

        } catch (\Exception $e) {

            return back()->with('error',$e->getMessage());

        }
    }
}
