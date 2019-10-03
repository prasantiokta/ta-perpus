<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="{{ asset('style.css') }}">
	<!-- Datatables -->
	<!-- <link rel="stylesheet" href="{!! asset('DataTables/datatables.min.css') !!}" media="screen">
	<script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script> -->
	<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
	{{-- <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> --}}
	<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>

	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" defer></script>
	<!-- Scrollbar Custom CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

	<link rel="stylesheet" href="{{ asset('jquery.growl.css') }}">

	<!-- Font Awesome JS -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	<!-- jQuery Custom Scroller CDN -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script> -->
	<!-- uwu -->
	<script type="text/javascript" src="{{ asset('angular.js') }}"></script>
	<script type="text/javascript" src="{{ asset('jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('jqprint.js') }}"></script>
	<script type="text/javascript" src="{{ asset('jquery.growl.js') }}"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.8/angular-animate.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
	<!-- uwu -->
	<title>@yield('title')</title>



</head>

<body>
	<div class="wrapper">
		<!-- Sidebar  -->
		<nav id="sidebar">
			<div class="container">
				<ul class="list-unstyled">
					<div class="sidebar-header">

						<h3 class="mt-3"><i class="fas fa-school fa-fw"></i>&nbsp;<span>E - Library</span></h3>

					</div>
					<li>
						<br>
					</li>
					<li class="active">
						<a href="#"><i class="fas fa-home fa-fw"></i>&nbsp;Dashboard</a>
					</li>
					<li>
						<br>
					</li>
					<li class="list-unstyled components">
						<a href="#subMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-table"></i>&nbsp;Master</a>
						<ul class="collapse list-unstyled" id="subMenu">
							<li>
								<a href="{{ url('/viewBuku') }}">Koleksi Buku</a>
							</li>
							<li>
								<a href="#">Pustakawan</a>
							</li>
							<li>
								<a href="#">Anggota</a>
							</li>
						</ul>
					</li>
					<li>
						<br>
					</li>
					<li>
						<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-wrench"></i>&nbsp;Transaksi</a>
						<ul class="collapse list-unstyled" id="pageSubmenu">
							<li>
								<a href="#">Peminjaman</a>
							</li>
							<li>
								<a href="#">Pengembalian</a>
							</li>
							<li>
								<a href="#">Denda</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</div>

	<!-- Page -->
	<div id="content">

		<!-- nav -->
		<nav class="navbar navbar-expand-md navbar-light bg-red-gradient shadow-sm">
			<div class="container">
				<a class="navbar-brand">
					<i class="fas fa-school"></i>
				</a>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">

					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Authentication Links -->
						@guest
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
						@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
						</li>
						@endif
						@else
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								<i class="fas fa-user"></i>&nbsp;{{ Auth::user()->name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span>
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							</div>
						</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>

		@yield('page')

	</div>
	</div>
	@include('footer')
</body>

</html>