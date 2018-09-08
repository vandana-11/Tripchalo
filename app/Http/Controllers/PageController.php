<?php

namespace App\Http\Controllers;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return Page::all();
    }

     public function create()
    {
        return Page::all();
    }

     public function store(Request $request)
    {
        $page = new Page;
        $page->user_id = $request->user_id;
        $page->title = $request->title;
        $page->body = $request->body;
        $page->slug = $request->slug;
        $page->order_id = $request->order_id;
        $page->save();
        return $page;
      
    }

}
