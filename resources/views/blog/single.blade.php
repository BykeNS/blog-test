@extends('main')
@section('title', $post->title)
@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
			
			@if($post->image)
	         <img src="/images/{{$post->image}}" class="img-thumbnail">
	          @else
	          @endif
			<h1 style="text-align: left;">{{$post->title}}</h1>
			<p>{!!$post->body!!}</p>
			<p><img src="/uploads/avatar/{{ $post->user->avatar}}" id="avatar"></p>	
			<p><strong>Posted by:</strong> {{$post->user->name}}</p>
			<p><strong>Created:</strong> {{$post->created_at->diffForHumans()}}</p>
			<p><strong>Category:</strong> {{$post->category->name}}</p>
		</div>
	</div><br><br>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<h3>{{$post->comments->count()}} Comments:</h3>
			
			@forelse ($post->comments as $comment)

			<div class="well">
           	
			  <img src={{"https://www.gravatar.com/avatar/".  md5( strtolower( trim($comment->email)))}}?d={{ "https://www.qualiscare.com/wp-content/uploads/2017/08/default-user.png"}} style="width: 40px; height: 40px; float: left; border-radius:50%;">
			 <div class="comment" style="margin-left: 48px">
			   <h4>by {{ucfirst($comment->name)}}</h4>
			   <p style="font-style: italic;"><small>{{$comment->created_at->diffForHumans()}}</small></p>
				<p > {{$comment->comment}}</p><br>
				</div>
				</div>
				@empty
				 <p>No comments for this post...</p>  	
			@endforelse

		</div>
	</div><br><br>
	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2">
			<h3>Add a Comment:</h3>
			{{ Form::open(['route'=> ['comments.store',$post->id],'method'=> 'post']) }}
			<div class="row">
				<div class="col-md-6">
					 {{Form::label('name','Name:')}}
                     {{Form::text('name','',['class' =>'form-control'])}}
				</div>
				<div class="col-md-6">
					 {{Form::label('email','Email:')}}
                     {{Form::text('email','',['class' =>'form-control'])}}
				</div>
				<div class="col-md-12">
					 {{Form::label('comment','Comment:')}}
                     {{Form::textarea('comment','',['class' =>'form-control','rows'=> '5'])}}
                     {{Form::submit('Add Comment',['class' =>'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px;'])}}
				</div>
			</div>
            {{ Form::close() }}
			
		</div>
	</div>
	<br><br><br><br><br>
@endsection
 <button onclick="topFunction()"  id="myBtn" title="Go to top">Top</button>
