<?php

namespace App\Http\Controllers;

use Auth;
use App\Tag;
use App\Post;
use App\Category;
use App\Http\Requests\PostRequest;
use Intervention\Image\Facades\Image;
class PostController extends Controller
{

    public function __construct()
    {   
        $this->middleware('auth'); 
        $this->middleware('preventBackHistory');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   
        $posts = Post::latest('created_at','desc')->simplePaginate(5);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //dd($request);
       // $posts= Post::create([
       //      'title' => $request->title, 
       //      'body' => $request->body,
       //      'slug' => str_slug($request->title),
       //      'category_id' => $request->category_id,
       //      'user_id' => Auth::user()->id
       //  ]);
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = str_slug($request->title);
        $post->category_id = $request->category_id;
        $post ->user_id = Auth::user()->id;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(400, 200)->save( public_path('/images/' . $filename ) );
            $post->image = $filename;
        }
       
        $post->save();
        $post->tags()->sync($request->tag_id,false);

        return redirect('/posts')->with('success','Post submited');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    
        $post = Post::findOrFail($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $posts = Post::findOrFail($id);
        $categories = Category::all();
       
        //Looping through categories
        $cats = [];
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        $tags = Tag::all();
        $tagz = [];
        foreach ($tags as $tag) {
            $tagz[$tag->id] = $tag->name;
        }
        return view('posts.edit',compact('posts','cats','tagz'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {  
          
        $post = Post::findOrFail($id);
         
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = str_slug($request->title);
        $post ->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;

        $post->save();
        $post->tags()->sync($request->tag_id,false);

         return redirect()->route('posts.show',$post->id)->with('success','Post  updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
         $posts=Post::findOrFail($id);
         $posts->delete();
         return redirect('/posts')->with('success',' Post  has been deleted!!!');
         
    }
    
}
