<?php

namespace App\Http\Controllers;
use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Returns all data in packages table
     * @return [type] [description]
     */
    public function index()
    {
        return Package::all();
    }

    
    /**
     * Create a new record into packages table
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
        $package = new Package;
        $package->title = $request->title;
        $package->slug = $request->slug;
        $package->user_id = $request->user_id;
        $package->body = $request->body;
        $package->thumbnail = $request->thumbnail;
        $package->price = $request->price;
        $package->discount = $request->discount;
        $package->is_active = $request->is_active;
        $package->is_expired = $request->is_expired;
        $package->is_deleted = $request->is_deleted;
        $package->save();
        return $package;
    }

    /**
     * Return one row based on given id
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show($id)
    {
        return Package::find($id);
    }



    /**
     * Update a given row based on given id
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id)
    {
        $package = Package::find($id);
        $package->title = $request->title;
        $package->slug = $request->slug;
        $package->user_id = $request->user_id;
        $package->body = $request->body;
        $package->thumbnail = $request->thumbnail;
        $package->price = $request->price;
        $package->discount = $request->discount;
        $package->is_active = $request->is_active;
        $package->is_expired = $request->is_expired;
        $package->is_deleted = $request->is_deleted;
        $package->save();
        return Package::find($id);    
    }


    /**
     * Delete a record based on given $id
     * @param  Package $page [description]
     * @return [type]        [description]
     */
    public function destroy($id)
    {
        $package = Package::find($id);
        return $package->delete();
    }

}
