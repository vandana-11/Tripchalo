<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function index()
    {
        return Contact::all();
    }
    public function create()
    {
        return Contact::all();
    }

    public function store(Request $request)
    {
        $contact = new Contact;

        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        return $contact;
    }
}
