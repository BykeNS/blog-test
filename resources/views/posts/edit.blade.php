@extends('main')
@section('title', 'Edit')
<br><br>
@section('stylesheet')
  
  <link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">
@endsection
@section('content')
  <h1>Edit Post:</h1>
  <div class="row">
{!! Form::model($posts,['route' => ['posts.update', $posts->id],'method' => 'PUT','data-parsley-validate' =>'']) !!}
<div class="col-md-8">   

          {{ Form::label('title','Title:')}}
          {{ Form::text('title',null,['class' =>'form-control','required'=> '']) }}<br>

          {{ Form::label('body','Content:')}}
          {{ Form::textarea('body',null,['class' =>'form-control','required'=> '']) }}<br>
          
          {{ Form::label('category_id','Category:')}}
          {{ Form::select('category_id',$cats,null,['class' =>'form-control','required'=> '']) }}

           {{Form::label('tags','Tags:',['class'=>'form-spacing-top'])}}
           {{ Form::select('tags[]', $tagz, null, ['class' =>'form-control select-2','multiple' =>'multiple']) }}

    </div>
    <div class="col-md-4">
      <div class="well">
      <p><b>Created at:</b> {{$posts->created_at->diffForHumans()}}</p>
      <p><b>Updated at:</b> {{$posts->updated_at->diffForHumans()}}</p>
    
      <hr>
      <div class="row">
        <div class="col-sm-6">
       <a href="{{route('posts.index')}}"
       class="btn btn-danger btn-block">Cancel</a>
       </div>
       <div class="col-sm-6">
        {{Form::submit('Save Post',['class'=>'btn btn-primary form-control'])}}
         </div>
     </div>
    </div>
  </div>
</div>
<br><br><br>

{!! Form::close() !!}

@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('js/select2.min.js')}}"></script>
    <script>
       $(document).ready(function() {
        $('.select-2').select2();
       });
    </script>
@endsection

