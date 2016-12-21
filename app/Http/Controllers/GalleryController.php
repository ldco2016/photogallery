<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class GalleryController extends Controller
{
	// // Set Tablename
	private $table = 'galleries';

    // List Galleries
    public function index(){
    	// Get All Galleries
    	$galleries = DB::table($this->table)->get();
    	
    	// Render View
    	return view('gallery/index', compact('galleries'));
    }

    // Show Create Form
    public function create(){
        // Check if Logged In
        if(!Auth::check()){
            return \Redirect::route('gallery.index');
        }
    	// Render View
    	return view('gallery/create');
    }

    // Store Gallery
    public function store(Request $request){
    	// Request input
    	$name = $request->input('name');
    	$description = $request->input('description');
    	$cover_image = $request->file('cover_image');
    	$owner_id = 1;

    	// Check Image upload
    	if($cover_image){
    		$cover_image_filename = $cover_image->getClientOriginalName();
    		$cover_image->move(public_path('images'), $cover_image_filename);
    	} else {
    		$cover_image_filename = 'noimage.png';
    	}

    	// Insert gallery
    	DB::table($this->table)->insert(
    		[
    			'name' => $name,
    			'description' => $description,
    			'cover_image' =>$cover_image_filename,
    			'owner_id' => $owner_id
    		]
    	);

    	// Set Message
    	\Session::flash('message', 'Gallery added');

    	// Redirect
    	return \Redirect::route('gallery.index');
    }

    // Show Gallery Photos
    public function show($id){
    	// // Get Gallery
    	$gallery = DB::table($this->table)->where('id', $id)->first();
    	// // Get Photos
    	$photos = DB::table('photos')->where('gallery_id', $id)->get();
    	// // Render View
    	return view('gallery/show', compact('gallery', 'photos'));
    }
}
