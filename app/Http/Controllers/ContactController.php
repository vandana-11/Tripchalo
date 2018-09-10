<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{   
    /**
     * Returns all data from contacts table
     * @return [type] [description]
     */

    public function index()
   	{
        return Contact::all();
    }

        /**
         * Create a new record into contacts table
         * @return [type] [description]
         */
    public function store(Request $request)
    {
        $contact = new Contact;

        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        return $contact;
    }

    /**
     * Return one row based on given id
     * @param  [type] $id [description]
     * @return [type]     [description]
     */

    public function show($id)
    {
        return Contact::find($id);
    }

    /**
     * Update a given row based on given id
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        return $contact;        
    }

    /**
     * Delete a record based on given $id
     * @param  Package $page [description]
     * @return [type]        [description]
     */

    public function destroy($id)
    {
        $contact = Contact::find($id);
        return $contact->delete() ? 'True' : 'False';
    }

}
