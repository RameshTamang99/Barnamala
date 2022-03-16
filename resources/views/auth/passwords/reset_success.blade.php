<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1" name="viewport" />

  <title>Hamro Barnamala</title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300|Montserrat' rel='stylesheet' type='text/css'><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
    <link href="{{ asset('public/assets/auths/style.css') }}" rel="stylesheet">
	  <!-- FAVICON -->
    <link href="{{ asset('public/assets/auths/logo.jpg') }}" rel="shortcut icon">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="background"></div>
<div class="container">
	<div class="row">
		<div class="modalbox success col-sm-8 col-md-6 col-lg-5 center animate">
			<div class="icon">
				<span class="glyphicon glyphicon-ok"></span>
			</div>
			<!--/.icon-->
			<h1>Password reset successfull !</h1>
			<p>Please login with your new password
				<br>from your login screen.</p>
			<!-- <button type="button" class="redo btn">Login</button> -->
			<button type="button" class="btn">Thank you</button>
			{{-- <span class="change">-- Thank you --</span> --}}
		</div>
		<!--/.success-->
	</div>
	<!--/.row-->
	<!-- <div class="row">
		<div class="modalbox error col-sm-12 col-12-6 col-lg-5 center animate" style="display: none;">
			<div class="icon">
				<span class="glyphicon glyphicon-thumbs-down"></span>
			</div> -->
			<!--/.icon-->
			<!-- <h1>Oh no!</h1>
			<p>Oops! Something went wrong,
				<br> you should try again.</p>
			<button type="button" class="redo btn">Try again</button>
			<span class="change">-- Click to see opposite state --</span>
		</div> -->
		<!--/.success-->
	</div>
	<!--/.row-->
</div>
<!--/.container-->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  {{-- <script  src="./script.js"></script> --}}
  <script>
	$(document).ready(function() {
		$('.redo').click(function() {
			$('.success, .error').toggle();
		});
	});
  </script>

</body>
</html>

