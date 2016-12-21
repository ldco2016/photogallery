<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class PhotoController extends Controller
{
    private $table = 'photos';

    // Show Create Form
    public function create($gallery_id){
        // Check if Logged In
        if(!Auth::check()){
            return \Redirect::route('gallery.index');
        }
    	// Render View
        return View('photo/create', compact('gallery_id'));
    }

    // Store Photo
    public function store(Request $request){
        // Get Request Input
        $gallery_id = $request->input('gallery_id');
        $title = $request->input('title');
        $description = $request->input('description');
        $location = $request->input('location');
        $image = $request->file('image');
        $owner_id = 1;

        // Check Image Upload
        if($image){
            $image_filename = $image->getClientOriginalName();
            $image->move(public_path('images'), $image_filename);
        } else {
            $image_filename = 'noimage.jpg';
        }

        // Insert Photo
        DB::table($this->table)->insert(
            [
                'title'          =>  $title,
                'description'   =>  $description,
                'location'      =>  $location,
                'gallery_id'    =>  $gallery_id,
                'image'         =>  $image_filename,
                'owner_id'      =>  $owner_id
            ]
        );

        // Set Message
        \Session::flash('message', 'Photo Added');

        // Redirect
        return \Redirect::route('gallery.show', array('id' => $gallery_id));

    }

    // Show Photo Details
    public function details($id){
    	// Get Photo
        $photo = DB::table($this->table)->where('id', $id)->first();

        // Render Template
        return view('photo/details', compact('photo'));
    }
}
