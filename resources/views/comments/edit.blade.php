@extends('main')
@section('title', 'Delete')

@section('content')

   <h1>Edit comment</h1>

   {!! Form::model($comments, ['route'=>['comments.update',$comments->id],'method'=>'PUT']) !!}
   {{ Form::label('name','Name:')}}
   {{ Form::text('name',null,['class' =>'form-control','required'=> '']) }}<br>

   {{ Form::label('email','Email:')}}
   {{ Form::text('email',null,['class' =>'form-control','required'=> '']) }}<br>

   {{ Form::label('comment','Comment:')}}
   {{ Form::textarea('comment',null,['class' =>'form-control','required'=> '']) }}<br>

   {{Form::submit('Edit Comment',['class'=>'btn btn-primary form-control'])}}
   {!! Form::close() !!}
@endsection