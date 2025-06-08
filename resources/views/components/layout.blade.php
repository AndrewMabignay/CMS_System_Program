<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title></title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="">
	<x-nav />

	<main class="">
		{{ $slot }}
	</main>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		{{-- ADD USER --}}
		$(document).ready(function() {
			$('#addUser').click(function(e) {
				e.preventDefault();

				{{-- LOADING --}}
				$('#addUser').prop('disabled', true).text('Adding...');

				let name = $('#name').val();
				let username = $('#username').val();
				let email = $('#email').val();
				let password = $('#password').val();
				let role = $('#role').val();
				let status = $('#status').val();

				console.log(name + username + email + password + role + status);

				$.ajax({
					url: '/users',
					method: 'POST',
					data: {
						name: name,
						username: username,
						email: email,
						password: password,
						role: role,
						status: status,
						_token: $('meta[name="csrf-token"]').attr('content')
					},
					success: function(response) {
						alert('User added successfully!');

						$('#name, #username, #email, #password').val('');
						$('#role').val('admin');
						$('#status').val('inactive');

						{{-- ENABLE ADD BUTTON WITH PREVIOUS TEXT --}}
						$('#addUser').prop('disabled', false).text('Add User');

						let newRow = `
							<tr>
								<td>${response.name}</td>
								<td>${response.username}</td>
								<td>${response.email}</td>
								<td>${response.role.charAt(0).toUpperCase() + response.role.slice(1)}</td>
								<td>${response.status.charAt(0).toUpperCase() + response.status.slice(1)}</td>
							</tr>
						`;

						$('table tbody').append(newRow);
					},
					error: function(response) {
						alert('Error: ' + (response.responseJSON?.message || 'Something went wrong.'));

						{{-- ENABLE ADD BUTTON WITH PREVIOUS TEXT --}}
						$('#addUser').prop('disabled', false).text('Add User');
					}
				});
			});
		});

		{{-- EDIT FORM DISPLAY --}}
		$(document).on('click', '#editUserButton', function() {
			let id = $(this).data('id');
			let name = $(this).data('name');
			let username = $(this).data('username');
			let email = $(this).data('email');
			let role = $(this).data('role');
			let status = $(this).data('status');

			$('#editUserId').val(id);
			$('#editName').val(name);
			$('#editUsername').val(username);
			$('#editEmail').val(email);
			$('#editRole').val(role);
			$('#editStatus').val(status);
		});
	</script>
</body>
</html>