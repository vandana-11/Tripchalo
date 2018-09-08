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

}
