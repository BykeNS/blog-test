@extends('main')
@section('title','Categories')
@section('content')
  <div class="container">
	<div class="row">
		<div class="col-sm-8">
			<h2>Categories</h2>
			 <div class="table-responsive">
			  <table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name:</th>
					</tr>

				</thead>

				<tbody>
					@foreach($categories as $category)
					<tr>
						<td>{{$category->id}}</td>
						<td>{{$category->name}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		</div>
		<div class="col-md-3">
			<div class="well" style="margin-top: 100px; ">
			    {!! Form::open(['route' => 'category.store','method' => 'POST']) !!}
			  	{{Form::label('name','Name:')}}
			    {{Form::text('name','',['class' =>'form-control','required'=> '','maxlength' =>'100'])}}
			    {{Form::submit('Create Category',['class' =>'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px;'])}}
			   {!! Form::close() !!}
			</div>
			
		</div>
	</div>
</div>
<br><br>
<br><br>
<br><br>
@endsection




