@extends('main')
@section('title', 'Contact')
@section('content')
  
    <div class="row">
      <div class="col-md-8">
       <h1>Contact Us</h1>
        
       <form action="/contact/store" method="POST">
         {{ csrf_field() }}  
      
          <div class="form-group">
            <label for="email">Email:</label>
            <input name="email" class="form-control" placeholder="Enter your email" >
          </div>
          <div class="form-group">
            <label for="subject">Subject:</label>
            <input name="subject" class="form-control" placeholder="Enter your subject" >
          </div>
          <div class="form-group">
            <label for="message">Message:</label>
            <textarea name="message" class="form-control" rows="5" id="message" >
          </textarea>
        </div>
          <br>
          <button type="submit" class="btn btn-success">Submit Message</button>
     </form>
       
      </div>
    </div>   
   
<br><br><br><br>
@endsection
 <button onclick="topFunction()"  id="myBtn" title="Go to top">Top</button>
