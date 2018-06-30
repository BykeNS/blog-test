<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{


    public function __construct()
    {   
        $this->middleware('preventBackHistory');
        //$this->middleware('auth'); 
    }

    public function getIndex()
    {
    	$posts= Post::latest('created_at','desc')->simplePaginate(5);
    	return view('blog.index',compact('posts'));
    }


    public function getSingle($slug)
    {
    	$post= Post::whereSlug($slug)->first();
    	return view('blog.single',compact('post'));
        
    }

}
