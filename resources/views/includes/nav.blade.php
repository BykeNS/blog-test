<nav class="navbar navbar-inverse navbar-fixed-top " style="margin-bottom: 0 !important;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{'/'}}">S.neT</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::path() === '/' ? "active" : ""}}"><a href="/">Home </a></li>
        <li class="{{ Request::path() === 'blog' ? "active" : ""}}"><a href="/blog">Blog</a></li>
        <li class="{{ Request::path() === 'about' ? "active" : ""}}"><a href="/about">About</a></li>
        <li class="{{ Request::path() === 'contact' ? "active" : ""}}"><a href="/contact">Contact</a></li>
       
     </ul>

     @if(Auth::check())
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <img src="/uploads/avatar/{{ Auth::user()->avatar }}" style="border-radius:50%; width: 25px; height: 18px; "> {{ ucfirst(Auth::user()->name )}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('/posts') }}">Posts</a></li>
            <li><a href="{{ url('/posts/create') }}">Create New Post</a></li>
            <li><a href="{{ url('/profile') }}">Profile</a></li>
            <li><a href="{{ url('/category') }}">Category</a></li>
             <li><a href="{{ url('/tags') }}">Tags</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
          </ul>
        </li>
      </ul>    

      @else
       <ul class="nav navbar-nav navbar-right">
      <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
      @endif
    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
