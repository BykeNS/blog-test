@extends('main')

@section('title', 'Posts')

@section('content')

  <div class="row">
   <div class="col-md-10" >
      <h1>All Posts:</h1>
   </div>

 <div class="col-md-2">
     <p><a class="btn btn-primary btn-lg" href="{{route('posts.create')}}" id="lg-button" role="button">Create New Post</a></p>
 </div><br>
  {{-- @if ($posts->isEmpty())
        <h3 style="text-align: center">No Posts</h3>
  @else --}}
  @forelse($posts as $post)

  <div class="container">
   <div class="row" id="media">

    
    <div class="col-lg-12">
      <div class="media">
      <div class="media-left">
      <img src="/uploads/avatar/{{ $post->user->avatar}}" style="width: 60px; height: 60px; border-radius:50%;" class="media-object"> 
     </div>
  <div class="media-body">
    <h4 class="media-heading"><a href="{{ route('profile',$post->user->id) }}">{{$post->user->name}}</a></h4>

    <p>{{substr($post->body,0,80)}} {{ strlen($post->body)> 80 ? "..." : ""}}<a href="{{ route('blog.single',$post->slug) }}">Read more</a></p>
    <p><strong>Created :</strong> {{$post->date}}</p>
 
     @if(Auth::user()->id == $post->user_id)
               
            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary  " >Edit</a>  
            <a href="{{route('posts.destroy', $post->id)}}" class="btn btn-info  " >View</a>       
      @endif
      </div> 
    </div>
    <hr>
  </div>
 </div>
</div>
 <br>
 @empty 
     <h3 style="text-align: center">No Posts</h3>
 
  
@endforelse
{{-- @endif
 --}}  
 <br><br>
     
     <div class="text-center">
     <p>{{ $posts->links() }}</p>
     </div> 
   </div>
@endsection
