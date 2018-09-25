<?php

namespace App\Http\Controllers;
use Auth;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    
    /**
     * Returns all data from pages table
     * @return [type] [description]
     */
    public function index()
    {
        return Page::all();
    }


    public function create() {
        $page = new Page;
        return view('add_pages',$page);
    }

      /**
     * Create a new record into pages table
     * @param  Request $request [description]
     * @return [type]           [description]
     */

    public function store(Request $request)
    {
        $page = new Page;
        $page->user_id = Auth::user()->id;
        $page->title = $request->title;
        $page->body = $request->body;
        $page->slug = $request->slug;
        $page->order_id = $request->order_id;
        $page->save();
        return $page;
    
      
    }

    /**
     * Return one row based on given id
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show($id)
    {
        $page = Page::find($id);
        return view('edit_pages', ['page' => $page]);
    }

    /**
     * Update a given row based on given id
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */

    public function update(Request $request, $id)
    {
        $page = Page::find($id);
        $page->user_id = Auth::user()->id;
        $page->title = $request->title;
        $page->body = $request->body;
        $page->slug = $request->slug;
        $page->order_id = $request->order_id;
        $page->save();
        return $page;

    }

    /**
     * Delete a record based on given $id
     * @param  Package $page [description]
     * @return [type]        [description]
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        return $page->delete() ? 'True': 'False';
    }


    

}


