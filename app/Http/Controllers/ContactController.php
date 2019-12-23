<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::all();
        return view('Contact.index', ['contacts' => $contacts]);
    }

    public function store(Request $request)
    {
        if( Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'company' => $request->company,
            'message' => $request->message
        ])){
            return redirect()->route('contact');
        }
    }
}
