@extends('main')
@section('title', $post->title)
@section('content')
	<div class="row">
		<div class="col-md-8 ">
			
			<img src="/uploads/avatar/{{ $post->user->avatar}}" id="avatar">
			<h1 style="text-align: left;">{{$post->title}}</h1>
			<p>{{$post->body}}</p>	
			<p><strong>Posted by:</strong> {{$post->user->name}}</p>
			<p><strong>Created:</strong> {{$post->created_at->diffForHumans()}}</p>
			<p><strong>Category:</strong> {{$post->category->name}}</p>
		</div>
		
		
		
	</div>
	<br><br><br><br><br>
@endsection
 <button onclick="topFunction()"  id="myBtn" title="Go to top">Top</button>