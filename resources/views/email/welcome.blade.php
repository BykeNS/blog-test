<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8">
</head>
<body>
 <div class="container">
    <h1 style="text-align: center;">Learning Laravel APP!</h1>

  <div class="col-sm-12">
	<img src="{{ $message->embed(public_path() . '/images/slide8.jpg') }}" style="width: 200px; height: 200px">
		<p>Hello {{$contact->email }} ,<br>thank you for using our BLOG application!!!</p><br>

		<p>Best</p>
  </div>
</div>

</body>
</html>