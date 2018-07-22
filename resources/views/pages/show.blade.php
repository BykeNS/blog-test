@extends('main')

@section('title', ucfirst($profiles->user->name))

@section('content')

   <div class="row">
      <div class="col-md-12" id="profile">
      
       <h2>Welcome <i>{{ ucfirst($profiles->user->name) }}</i> </h2>
        <img src="/uploads/avatar/{{ $profiles->user->avatar }}" style="border-radius:50%; margin-top: 10px; ">
        <h5> {{$profiles->user->email}}</h5>
      </div>

    </div>


    <br><br><br><br>

@endsection
 <button onclick="topFunction()"  id="myBtn" title="Go to top">Top</button>
 