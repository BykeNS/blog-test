@extends('main')

@section('title', 'User')

@section('content')

   <div class="row">
      <div class="col-md-12" id="profile">
    @if(Auth::check())
      
       <h2>Welcome <i>{{ ucfirst($profiles->user->name) }}</i> </h2>
        <img src="/uploads/avatar/{{ $profiles->user->avatar }}" style="border-radius:50%; margin-top: 10px; ">
        <h5> {{$profiles->user->email}}</h5>
      </div>

    </div>


    <br><br><br><br>
   
    {{-- {{ Form::open(['url' => '/profile','files'=> 'true']) }}
       {{ Form::file('avatar',null, ['class'=>'form-control']) }}<br>
       {{Form::submit('Upload picture',['class'=>'btn btn-primary '])}}
    {!! Form::close() !!} --}}
   @else
    <h4 style="text-align: center; margin-top:30px; margin-b">No activity within 120 min,please <a href="{{ route('login') }}">Login</a> again</h4>
    @endif
    
     
    
   

@endsection()
 <button onclick="topFunction()"  id="myBtn" title="Go to top">Top</button>
 