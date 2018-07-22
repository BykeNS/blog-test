@extends('main')
@section('title', 'Create')
@section('stylesheet')
  <link rel="stylesheet" type="text/css" href="{{asset('css/parsley.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea', menubar: 'false' });</script>
@endsection
@section('content')
   <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

       <h1>Create New Post</h1>
       
       {!! Form::open(['route' => 'posts.store','data-parsley-validate' =>'','files' => 'true']) !!}

          {{Form::label('title','Title:')}}
          {{Form::text('title','',['class' =>'form-control','required'=> '','maxlength' =>'100'])}}

          {{Form::label('body','Content:')}}
          {{Form::textarea('body','',['class' =>'form-control'])}}

           {{Form::label('category_id','Category:')}}
              <select class="form-control " name="category_id" >
                @foreach($categories as $category)
                 <option value="{{$category->id}}">{{$category->name}}</option>
                 @endforeach
              </select><br>

           {{Form::label('tag_id','Tags:')}}
              <select class="form-control select-2" name="tag_id"  multiple="multiple">
                @foreach($tags as $tag)
                 <option value="{{$tag->id}}">{{$tag->name}}</option>
                 @endforeach
              </select><br> <br>
              {{Form::label('image','Upload image:')}}
              {{ Form::file('image',null, ['class'=>'form-control']) }}<br>

          {{Form::submit('Create Post',['class' =>'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px;'])}}
	     {!! Form::close() !!}
      </div>
    </div>   
  </div>
<br><br>
@endsection
@section('scripts')
  
  <script type="text/javascript" src="{{asset('js/parsley.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/select2.min.js')}}"></script>
  <script>
      $(document).ready(function() {
      $('.select-2').select2();
     });
  </script>
@endsection
