<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    // Show Create Form
    public function create(){
    	die('PHOTO/CREATE');
    }

    // Store Photo
    public function store(Request $request){

    }

    // Show Photo Details
    public function details($id){
    	die($id);
    }
}
