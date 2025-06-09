<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	@vite(['resources/css/app.css'])
</head>
<body>
	<form class="" action="{{ route('auth.user.login') }}" method="POST">
		@csrf

		<div class="input-container">
			<label>Email/Username</label>
			<input type="text" name="login" placeholder="Enter your email or username">
		</div>

		<div class="input-container">
			<label>Password</label>
			<input type="password" name="password" placeholder="Enter your password">
		</div>

		<div class="button-container">
			<button>
				Reset
			</button>
			<button>
				Login
			</button>
		</div>
	</form>
</body>
</html>