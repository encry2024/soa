
	<nav class="top-bar" data-topbar role="navigation">
		<ul class="title-area">
			<li class="name">
			<h1><a href="#">STI - Statement Of Account</a></h1>
			</li>
		</ul>

	@if (Auth::user()->type != "student")
		<section class="top-bar-section">
		<!-- Right Nav Section -->
			<ul class="right">
				<li class="divider"></li>
				<li><a href="#">Welcome : {{ Auth::user()->lastname }}, {{ Auth::user()->firstname }} </a></li>
				<li class="divider"></li>
				<li>{{ link_to('action/logs', ' Action Logs', ["class" => "fi-thumbnails"]) }}</li>
				<li class="divider"></li>
				<li>{{ link_to('user/change_password', ' Change Password', ["class" => "fi-key"]) }}</li>
				<li class="divider"></li>
				<li>{{ link_to('logout', ' Logout', ["class" => "fi-power"]) }}</li>
			</ul>
		</section>
	@else
		<ul class="right">
				<li class="divider"></li>
				<li><a href="#">Welcome :: {{ Auth::user()->lastname }}, {{ Auth::user()->firstname }} </a></li>
				<li class="divider"></li>
				<li>{{ link_to('user/change_password', ' Change Password', ["class" => "fi-key"]) }}</li>
				<li class="divider"></li>
				<li>{{ link_to('logout', ' Logout', ["class" => "fi-power"]) }}</li>
			</ul>
		</section>
	@endif
	</nav>

<div class="panel">
	<h3 class="info-fnt" style="margin-left: 10rem;">{{ $user->lastname }}, {{ $user->firstname }} Profile</h3>
</div>