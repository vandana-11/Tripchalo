<?php

namespace App\Http\Controllers;
use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        return Package::all();
    }
    public function create()
    {
        return Package::all();
    }
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
        return $page;
    }

    public function show($id)
    {
        return Package::find($id);
    }

    public function edit(Request $request, $id)
    {

        if ($request->has('delete')) {
        $package = Package::find($id);
        $package->delete();
        $package= Package::find($id);
        return $package;
    }

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

}
