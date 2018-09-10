<?php

namespace App\Http\Controllers;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Returns all data from images table
     * @return [type] [description]
     */
    public function index()
    {
        return Image::all();
    }

      /**
     * Create a new record into images table
     * @param  Request $request [description]
     * @return [type]           [description]
     */

    public function store(Request $request)
    {
        $image = new Image;
        $image->package_id = $request->package_id;
        $image->filename = $request->filename;
        $image->path = $request->path;
        $image->save();
        return $image;
      
    }

    /**
     * Return one row based on given id
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show($id)
    {
        return Page::find($id);
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
        $page->user_id = $request->user_id;
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
        return $page->delete() ? 'True' : 'False';
    }

}
