@extends('main')
@section('title', 'Blog')
@section('content')
    <div class="row">
    	<div class="col-md-8 col-md-offset-2">
    	
           <h1>Blog</h1>
        
      </div>
     
    </div>
    @if(count($posts) > 0)
     @foreach ($posts as $post)
    <div class="row">
    	<div class="col-md-6 col-md-offset-2">
    		<h2>{{$post->title}}</h2>
    		<h5>Published at: {{$post->created_at->diffForHumans()}}</h5>

    		<p>{!!substr($post->body,0,150)!!} {{ strlen($post->body)> 150 ? "..." : ""}}</p>

    		<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
    		<hr>

    	</div>
    </div>
    @endforeach
    @else
    <h3>There is no posts !!!</h3>
    @endif
    
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
  <br><br>
     <div class="text-center">
           <p>{{ $posts->links() }}</p>
     </div>
      
   
   @endsection
