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

	<main class="w-full">
		{{ $slot }}
	</main>

	<script type="text/template" id="addUserTemplate">
		<div class="overlay"></div>
		{{-- ADD USER --}}
		<div class="add-user-container">
			<h3>
				<i class="fas fa-user"></i>
				Add User
			</h3>

			<div class="input-list-container">
				{{-- NAME --}}
				<div class="input-container">
					<label for="name">Full Name</label>
					<input type="text" id="name" placeholder="Last Name, First Name M.I.">
				</div>

				{{-- USERNAME --}}
				<div class="input-container">
					<label for="username">Username</label>
					<input type="text" id="username" placeholder="Enter your username">
				</div>

				{{-- EMAIL --}}
				<div class="input-container">
					<label for="email">Email</label>
					<input type="text" id="email" placeholder="Ex. example@domain.com">
				</div>

				{{-- PASSWORD --}}
				<div class="input-container">
					<label for="password">Password</label>
					<input type="password" id="password" placeholder="Enter your password">
				</div>

				{{-- ROLE --}}
				<div class="input-container">
					<label for="role">Role</label>
					<select name="role" id="role">
						<option value="">Select a role</option>
						<option value="admin">Admin</option>
						<option value="author">Author</option>
						<option value="editor">Editor</option>
					</select>
				</div>

				{{-- STATUS --}}
				<div class="input-container">
					<label for="status">Status</label>
					<select name="status" id="status">
						<option value="active">Active</option>
						<option value="inactive">Inactive</option>
						<option value="banned">Banned</option>
					</select>
				</div>
			</div>

			<div class="add-button-container">
				<button id="cancelAddUser">
					<i class="fas fa-times"></i>
					Cancel
				</button>
				<button id="addUser">
					<i class="fas fa-plus"></i>
					Add User
				</button>
			</div>
		</div>
	</script>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
  const addUserButton = document.getElementById('addUserButton');

  addUserButton.addEventListener('click', function () {
    const container = document.querySelector('.user-management-section');
    const template = document.getElementById('addUserTemplate');
    container.insertAdjacentHTML('beforeend', template.innerHTML);

    const addUserContainer = container.querySelector('.add-user-container');

    // Force reflow so transition works on adding class
    addUserContainer.offsetHeight;

    // Add active class to trigger transition
    addUserContainer.classList.add('add-user-container-active');

    // Cancel button listener
    const cancelButton = document.getElementById('cancelAddUser');
    cancelButton.addEventListener('click', () => {
      // Remove with reverse transition
      addUserContainer.classList.remove('add-user-container-active');
      setTimeout(() => {
        document.querySelector('.overlay').remove();
        addUserContainer.remove();
      }, 300); // same as duration
    });
  });
});

	</script>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		{{-- ADD USER --}}
		// ADD USER - Event Delegation
		$(document).on('click', '#addUser', function(e) {
			e.preventDefault();

			// LOADING
			$('#addUser').prop('disabled', true).text('Adding...');

			let name = $('#name').val();
			let username = $('#username').val();
			let email = $('#email').val();
			let password = $('#password').val();
			let role = $('#role').val();
			let status = $('#status').val();

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
					$('#addUser').prop('disabled', false).text('Add User');
				}
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

		{{-- ADD FORM DISPLAY --}}
		$(document).ready(function() {
			$('#addUserButton').click(function() {
				$('.add-user-container').removeClass('add-user-container-hidden');
			});
		});
	</script>
</body>
</html>