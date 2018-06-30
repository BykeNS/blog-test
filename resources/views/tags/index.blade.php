@extends('main')
@section('title','Tags')
@section('content')
  <div class="container">
	<div class="row">
		<div class="col-sm-8">
			<h1>Tags</h1>
			 <div class="table-responsive">
			  <table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name:</th>
					</tr>

				</thead>

				<tbody>
					@foreach($tags as $tag)
					<tr>
						<td>{{$tag->id}}</td>
						<td>{{$tag->name}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		 </div>
		</div>
		<div class="col-sm-3">
			<div class="well" style="margin-top: 100px; ">
			    {!! Form::open(['route' => 'tags.store','method' => 'POST']) !!}
			  	{{Form::label('name','Name:')}}
			    {{Form::text('name','',['class' =>'form-control','required'=> '','maxlength' =>'100'])}}
			    {{Form::submit('Create Tag',['class' =>'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px;'])}}
			   {!! Form::close() !!}
			</div>
			
		</div>
	</div>
</div>
<br><br>
<br><br>
<br><br>
@endsection




