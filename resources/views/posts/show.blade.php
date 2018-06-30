@extends('main')
@section('title', 'View Post')
<br><br><br>
@section('content')
<div class="row">
<div class="col-md-7">    
    
          <h1>{{$post->title}}</h1>
          <p>{{$post->body}}</p>
         <div class="tags">
           @foreach ($post->tags as $tag)
             <span class="label label-default">{{$tag->name}}</span>
           @endforeach
         </div>
    </div>
    <div class="col-md-5">
    	<div class="well">
      <p><b>Url:</b> <a href="{{ route('blog.single',$post->slug) }}">{{ route('blog.single',$post->slug) }}</a></p>  
      <p><b>Category:</b> {{$post->category->name}}</p>
    	<p><b>Created at:</b> {{$post->created_at->diffForHumans()}}</p>
      <p><b>Updated at:</b> {{$post->updated_at->diffForHumans()}}</p>
    
    	<hr>
    	<div class="row">
    		<div class="col-sm-6" id="button">
    	 <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary btn-block">Edit</a>
    	 </div>
    	 <div class="col-sm-6">
        {{ Form::open(['method' => 'DELETE', 'route' => ['posts.destroy' , $post->id]]) }}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
        {{ Form::close() }}
        
         </div>
     </div>
     <br>
     <div class="row">
       <div class="col-md-12">
          <a href="{{route('posts.index')}}" class="btn btn-default btn-block"><< See All Posts</a>
       </div>
     </div>
    </div>
  </div>
</div> 
<br><br><br><br><br>
@endsection