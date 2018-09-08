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

    public function show($id)
    {
        return Page::find($id);
    }

    public function edit(Request $request, $id)
    {

        if ($request->has('delete')) {
        $page = Page::find($id);
        $page->delete();
        $page= Page::find($id);
        return $page;
    }

    public function update(Request $request, $id)
    {
        $page = Page::find($id);
        $page->user_id = $request->user_id;
        $page->title = $request->title;
        $page->body = $request->body;
        $page->slug = $request->slug;
        $page->order_id = $request->order_id;
        $page->save();
        return Page::find($id);    
    }

    public function destroy(Page $page)
    {
        $page = Page::find($id);
        return $page->delete();
    }

}
