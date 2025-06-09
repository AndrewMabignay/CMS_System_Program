<x-layout>
	<section class="user-management-section">
		<div class="user-management-container flex flex-col gap-[20px]">
			
			{{-- SEARCH | ADD | REFRESH --}}
			<div class="search-add-refresh-container h-[60px] flex flex-col items-center">
				<h2 class="w-full px-[30px]">User Management</h2>

				<div class="button-container bg-white w-full">
					<div class="search-container">
						<input type="" name="">
						<button>
							
						</button>
					</div>

					<button id="addUserButton">
						<i class="fas fa-plus"></i>
					</button>

					<button>
						<i class="fas fa-sync-alt"></i>
					</button>
				</div>
			</div>

			<div class="table-wrapper">
				<table class="w-full px-[20px] border-seperate rounded-[8px] text-center">
					<thead>
						<tr>
							<th>Name</th>
							<th>Username</th>
							<th>Email</th>
							<th>Role</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
							<tr>
								<td>{{ $user->name }}</td>
								<td>{{ $user->username }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ ucfirst($user->role) }}</td>
								<td>{{ ucfirst($user->status) }}</td>
								<td>
									<button id="editUserButton"
										data-id="{{ $user->id }}"
										data-name="{{ $user->name }}"
										data-username="{{ $user->username }}"
										data-email="{{ $user->email }}"
										data-role="{{ $user->role }}"
										data-status="{{ $user->status }}"
									>
										Edit
									</button>
								</td>
							</tr>

						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		{{-- EDIT USER --}}
		<div class="edit-user-container">
			<input type="hidden" id="editUserId">

			{{-- NAME --}}
			<div class="input-container">
				<label for="name">Full Name</label>
				<input type="text" name="name" id="editName">
			</div>

			{{-- USERNAME --}}
			<div class="input-container">
				<label for="username">Username</label>
				<input type="text" name="username" id="editUsername">
			</div>

			{{-- EMAIL --}}
			<div class="input-container">
				<label for="email">Email</label>
				<input type="text" name="email" id="editEmail">
			</div>

			{{-- PASSWORD --}}
			<div class="input-container">
				<label for="password">Password</label>
				<input type="password" name="password" id="editPassword">
			</div>

			{{-- PASSWORD CONFIRMATION --}}
			<div class="input-container">
				<label for="password_confirmation">Confirm Password</label>
				<input type="password" name="password_confirmation" id="editPasswordConfirm">
			</div>

			{{-- ROLE --}}
			<div class="input-container">
				<label for="role">Role</label>
				<select name="role" id="editRole">
					<option value="admin">Admin</option>
					<option value="author">Author</option>
					<option value="editor">Editor</option>
				</select>
			</div>

			{{-- STATUS --}}
			<div class="input-container">
				<label for="status">Status</label>
				<select name="status" id="editStatus">
					<option value="inactive">Inactive</option>
					<option value="active">Active</option>
					<option value="banned">Banned</option>
				</select>
			</div>

			<button id="saveEditUser">Update User</button>
		</div>
	</section>
</x-layout>