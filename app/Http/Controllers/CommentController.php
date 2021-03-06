<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>'store']);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email',
            'comment'=> 'required|min:5|max:2000'
        ]);
        $post = Post::find($post_id);

        $comments = new Comment;
        $comments->name = $request->name;
        $comments->email = $request->email;
        $comments->comment = $request->comment;
        $comments->approved = true;
        $comments->post()->associate($post);

        $comments->save();
        
        return redirect()->route('blog.single',$post->slug)->with('success','Comment added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //  request()->validate([
        //     'name'=>'required|max:255',
        //     'email'=>'required|email',
        //     'comment'=> 'required|min:5|max:2000'
        // ]);

        $comments = Comment::findOrFail($id);
        
        
        return view('comments.edit',compact('comments'));

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comments = Comment::findOrFail($id);

        $this->validate($request,[
            'comment'=>'required'
        ]);

        $comments->comment = $request->comment;
        $comments->save();
        return redirect()->route('posts.show',$comments->post->id)->with('success','Post successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
     public function delete($id)
    {
        $comments = Comment::findOrFail($id);
        return view('comments.delete',compact('comments'));
    }

    public function destroy($id)
    {    
        $comments = Comment::findOrFail($id);
        $post_id = $comments->post->id;
        $comments->delete();

        return redirect()->route('posts.show',$post_id)->with('success',' Comment has been deleted!!!');
        
    }
}
