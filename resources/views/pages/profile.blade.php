@extends('main')
@section('title', 'Profile')
@section('content')
  
    <div class="row">
      <div class="col-md-12" id="profile">
    @if(Auth::check())
       <h1> Profile</h1> 
       <h4>Welcome <i>{{ ucfirst(Auth::user()->name) }}</i> </h4>
        <img src="/uploads/avatar/{{ Auth::user()->avatar }}" style="border-radius:50%; margin-top: 10px; ">
      </div>
    </div>

    <br><br><br>
   
    {{ Form::open(['url' => '/profile','files'=> 'true']) }}
       {{ Form::file('avatar',null, ['class'=>'form-control']) }}<br>
       {{Form::submit('Upload picture',['class'=>'btn btn-primary '])}}
    {!! Form::close() !!}
   
   <br><br>
   @endsection
    <button onclick="topFunction()"  id="myBtn" title="Go to top">Top</button>
    @else
    <h4 style="text-align: center; margin-top:30px; margin-b">No activity within 120 min,please <a href="{{ route('login') }}">Login</a> again</h4>
    @endif

  