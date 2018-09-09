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
    public function show($id)
    {
        return Contact::find($id);
    }

    public function edit(Request $request, $id)
    {

        if ($request->has('delete')) {
        $contact = Contact::find($id);
        $contact->delete();
        $contact= Contact::find($id);
        return $contact;
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        return $contact;        
    }

    public function destroy(Contact $page)
    {
        $contact = Contact::find($id);
        return $contact->delete();
    }

}
