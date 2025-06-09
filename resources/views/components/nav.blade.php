<nav class="">
	<ul class="">
		<li>
			<div class="person-login">
				<div class="icon-container">
					<i class="fas fa-user"></i>	
				</div>
				Hi {{ Auth::user()->name }} [{{ Auth::user()->role }}]
			</div>
		</li>

		{{-- DASHBOARD --}}
		<li>
			<a href="">
				<div class="icon-container">
					<i class="fas fa-chart-bar"></i>	
				</div>
				Dashboard
			</a>
		</li>
 
		{{-- POSTS --}}
		<li>
			<a href="">
				<div class="icon-container">
					<i class="fas fa-file-alt"></i>	
				</div>
				Posts
			</a>
		</li>

		{{-- CATEGORIES --}}
		<li>
			<a href="">
				<div class="icon-container">
					<i class="fas fa-th-list"></i>	
				</div>
				Categories
			</a>
		</li>

		{{-- MEDIA LIBRARY --}}
		<li>
			<a href="">
				<div class="icon-container">
					<i class="fas fa-photo-video"></i>	
				</div>
				Media Library
			</a>
		</li>

		{{-- USERS --}}
		<li>
			<a href="">
				<div class="icon-container">
					<i class="fas fa-users"></i>	
				</div>
				Users
			</a>
		</li>

		{{-- PROFILE SETTINGS --}}
		<li>
			<a href="">
				<div class="icon-container">
					<i class="fas fa-user-cog"></i> 	
				</div>
				Profile Settings
			</a>
		</li>
	</ul>
	<div class="user-icons flex flex-col gap-[14px] pb-[20px]">
		{{-- SEPERATOR LINE --}}
		<hr class="mx-[18px]"> 

		<ul>
			{{-- LOG OUT --}}
			<li>
				<a href="">
					<div class="icon-container">
						<i class="fas fa-sign-out-alt"></i> 	
					</div>
					Logout
				</a>
			</li>
		</ul>
		<form action="{{ route('auth.user.logout') }}" method="POST">
			@csrf

			<button type="submit">
				<div class="icon-container">
					<i class="fas fa-sign-out-alt"></i> 	
				</div>
				Logout
			</button>
		</form>
	</div>
</nav>