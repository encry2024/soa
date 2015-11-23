
	<nav class="top-bar" data-topbar role="navigation">
		<ul class="title-area">
			<li class="name">
			<div style="  margin-left: 0.5rem; margin-top: 0.4rem;">
				{{ HTML::image('packages/img/logo.png') }}<h1><a href="#" style="margin-top: -6rem; margin-left: 8rem;">Statement Of Account</a></h1>
			</div>
			</li>
		</ul>

		<section class="top-bar-section">
		<!-- Right Nav Section -->
			<ul class="right">
				<li class="divider"></li>
				<li><a href="#">Welcome :: {{ Auth::user()->lastname }}, {{ Auth::user()->firstname }}</a></li>
				<li class="divider"></li>
				@if (Auth::user()->type != "student")
				<li>{{ link_to('logs', ' Action Logs', ["class" => "fi-thumbnails"]) }}</li>
				@endif
				<li class="divider"></li>
				<li>{{ link_to('change_password', ' Change Password', ["class" => "fi-key"]) }}</li>
				<li class="divider"></li>
				<li>{{ link_to('logout', ' Logout', ["class" => "fi-power"]) }}</li>
			</ul>
		</section>
	</nav>

<div class="panel" style="background-color: White;">
	<h3 class="info-fnt" style="margin-left: 10rem;">HOMEPAGE</h3>
</div>