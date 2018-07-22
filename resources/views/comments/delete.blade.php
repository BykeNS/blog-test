@extends('main')
@section('title', 'Delete')

@section('content')

   <div class="row">
   	<div class="col-md-8 col-md-offset-2">
   		<h1>Delete this comment?</h1>

   		<p>Name:{{$comments->name}}</p>
   		<p>Email:{{$comments->email}}</p>
   		<p>Name:{{$comments->comment}}</p>

   		{{ Form::open(['method' => 'DELETE', 'route' => ['comments.destroy',$comments->id]]) }}
	    {{ Form::submit('Yes,Delete this comment', ['class' => 'btn btn-lg btn-danger']) }}
	    {{ Form::close() }}
   	</div>
   </div>

@endsection