<!DOCTYPE html>

<html>

<head>

<title>Email</title>

</head>

<body >
  <div class="container">
  	<div class="col-sm-10">

    <img src="{{ $message->embed(public_path() . '/images/slide1.jpg') }}">

		<h4>A Basic-blog user has sent you a message.</h4>
		<p><b>Subject:</b> {{ $contact->subject }}</p>
		<p><b>Message:</b> {{ $contact->message }}</p>
		<p><b>E-mail:</b> {{ $contact->email }}</p>
		
    </div>
  </div>
</body>

</html>