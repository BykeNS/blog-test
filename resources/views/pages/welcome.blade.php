@extends('main')
@section('title', 'Home')
@section('slide')
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/slide5.jpg" alt="Los Angeles" style="width:100%;">
          <div class="carousel-caption">
          <h3>Landscape</h3>
          <p>It is always so much fun!</p>
        </div>
      </div>

      <div class="item">
        <img src="images/slide9.jpg" alt="Chicago" style="width:100%;">
          <div class="carousel-caption">
          <h3>Nature</h3>
          <p>It is always so much fun!</p>
         </div>
      </div>
    
      <div class="item">
        <img src="images/slide7.jpg" alt="New york" style="width:100%;">
          <div class="carousel-caption">
            <h3>Breathtaking</h3>
            <p>It is always so much fun!</p>
         </div>
      </div>
      <div class="item">
        <img src="images/slide8.jpg" alt="New fork" style="width:100%;">
          <div class="carousel-caption">
            <h3>Sunset</h3>
            <p>It is always so much fun!</p>
       </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
 @endsection

 @section('content') 
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        @foreach($posts as $post)
        
        <div class="post">
          <h3>{{$post->title}}</h3>
          <h5><strong>Posted by:</strong> <i style="color: #0730B0;">{{$post->user->name}}</i></h5>
          <p>{{substr($post->body, 0,100)}}{{ strlen($post->body)> 100 ? "..." : ""}}</p>
          <a href="{{ route('blog.single',$post->slug) }}" class="btn btn-primary" id="homeBut">Read more</a><br>
           <p><i class="fa fa-comments"></i><a href="#"> All {{$post->user->name}} posts:{{$post->user->posts->count()}}</a></p>
        </div>
        <hr>

        @endforeach
      </div>
     
        <div class="row">
           <div class="col-md-3 col-md-offset-1">
          
          <a href="https://www.facebook.com/rozalia.berta" target="blank" ><img src="/img/facebook.png" ></a>
          <a href="https://twitter.com/vladimirbajic5" target="blank"><img src="/img/twiter.png" ></a>
          <a href="https://www.instagram.com/?hl=sr" target="blank"><img src="/img/instagram.png" ></a>
          <br>
          <h3>Sidebar</h3>
          <p><i class="fa fa-comments"></i><a href="#">All posts:{{$post->count()}}</a></p>
          <p>Bootstrap uses Autoprefixer to deal with CSS vendor prefixes. If you're compiling Bootstrap from its Less/Sass source and not using our Gruntfile, you'll need to integrate Autoprefixer into your build proces</p>
      </div>
    </div> 
  </div>

    
   

     <div class="text-center">
     <p>{{ $posts->links() }}</p>
     </div>
     
  </div>

   @endsection

 