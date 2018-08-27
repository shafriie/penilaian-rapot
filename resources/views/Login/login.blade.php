<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="{{ asset('image/icon.png') }}">
	<title>Login Sistem Penilaian Rapot</title>
</head>
<body style="background: url('https://assets.awwwards.com/awards/images/2015/04/pattern.jpg')">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<div class="container-fluid">
	<div class="row" style="margin-top: 50px">
		<div class="col-md-4">
			
		</div>
		<div class="col-md-4">
			<div style="background-color: #e63900;padding: 60px;color: white;border-radius: 10px">
				<h2 class="text-center">Silahkan Login</h2>
				<hr>
				<form action="{{ url('login/submit') }}" method="POST">
					{{ csrf_field() }}
				  @if (Session::has('message'))
				  <p class="alert alert-info" style="font-weight:bold;background-color: white;color:{{ Session::get('color') }}">{{ Session::get('message') }}</p>		
				  @endif
				  <div class="form-group">
				    <label for="username">Username:</label>
				    <input type="text" class="form-control" id="username" name="username" required autofocus>
				  </div>
				  <div class="form-group">
				    <label for="password">Password:</label>
				    <input type="password" class="form-control" id="password" name="password" required>
				  </div>
				  <br>
				  <div align="center">
					  <button type="submit" class="btn" style="width:100px;color: black;font-weight: bold;background-color: white">Submit</button>
					  <button type="reset" class="btn" style="width:100px;color: black;font-weight: bold;background-color: white">Clear</button>	
				  </div>
				</form>
			</div>
		</div>
		<div class="col-md-4">
			
		</div>
	</div>	
</div>


</body>
</html>