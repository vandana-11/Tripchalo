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
    public function create() {
       return view('add_images');
    }
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
        $image = Image::find($id);
        return view('edit_images', ['image' => $image]);
    }

    /**
     * Update a given row based on given id
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */

    public function update(Request $request, $id)
    {
        $image = Image::find($id);
        $image->package_id = $request->package_id;
        $image->filename = $request->filename;
        $image->path = $request->path;
        $image->save();
        return $image;
    }

    /**
     * Delete a record based on given $id
     * @param  Package $page [description]
     * @return [type]        [description]
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        return $image->delete() ? 'True' : 'False';
    }

}
