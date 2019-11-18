<!DOCTYPE html>
<html>

<head>
	<!-- template -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!--   -->

	<!-- fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

	<!-- uwu -->

	<!-- jquery -->
	<script type="text/javascript" src="{{ asset('addens/jquery.min.js') }}"></script>
	<!-- chart js -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
	<!-- angular -->
	<script type="text/javascript" src="{{ asset('addens/angularjs/angular.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('addens/angularjs/angular-animate.min.js') }}"></script>
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{ asset('addens/bootstrap/bootstrap.min.css') }}">
	<script type="text/javascript" src="{{ asset('addens/bootstrap/bootstrap.min.js') }}"></script>
	<!-- datatables -->
	<link rel="stylesheet" href="{{ asset('addens/DataTables/datatables.min.css') }}">
	<script type="text/javascript" src="{{ asset('addens/DataTables/datatables.min.js') }}" defer="screen"></script>
	<!-- fontawesome -->
	<link rel="stylesheet" href="{{ asset('addens/fontawesome/all.min.css') }}">
	<script type="text/javascript" src="{{ asset('addens/fontawesome/all.min.js') }}"></script>
	<!-- jquery growl -->
	<link rel="stylesheet" href="{{ asset('addens/growl/jquery.growl.css') }}">
	<script type="text/javascript" src="{{ asset('addens/growl/jquery.growl.js') }}"></script>
	<!-- sidebar style -->
	<link rel="stylesheet" href="{{ asset('addens/sidebar-style.css') }}">
	<!-- select2 -->
	<link rel="stylesheet" href="{{ asset('addens/select2/select2.min.css') }}">
	<script type="text/javascript" src="{{ asset('addens/select2/select2.min.js') }}"></script>
	<!-- momentjs -->
	<script type="text/javascript" src="{{ asset('addens/momentjs/momentjs.min.js') }}"></script>

	<!-- uwu -->

	<!-- template -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!--   -->

	<title>@yield('title')</title>



</head>

<body>
	<div class="wrapper">
		<!-- Sidebar  -->
		<nav id="sidebar">
			<div class="container">
				<ul class="list-unstyled">
					<div class="sidebar-header">

						<h4 class="mt-3"><b><i class="fas fa-school fa-fw"></i>&nbsp;&nbsp;&nbsp;<span>E - Library</span></b></h4>

					</div>
					<li>
						<br>
					</li>
					<li class="active">
						<a href="{{ url('/home') }}"><i class="fas fa-home fa-fw"></i>&nbsp;&nbsp;&nbsp;Dashboard</a>
					</li>
					<li>
						<br>
					</li>
					<li class="list-unstyled components">
						<a href="#subMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-table"></i>&nbsp;&nbsp;&nbsp;Master</a>
						<ul class="collapse list-unstyled" id="subMenu">
							<li>
								<a href="{{ url('/viewKategori') }}">Kategori</a>
							</li>
							<li>
								<a href="{{ url('/viewBuku') }}">Koleksi Buku</a>
							</li>
							<li>
								<a href="{{ url('/viewUser') }}">Pustakawan</a>
							</li>
							<li>
								<a href="{{ url('/viewAnggota') }}">Anggota</a>
							</li>
						</ul>
					</li>
					<li>
						<br>
					</li>
					<li>
						<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-wrench"></i>&nbsp;&nbsp;&nbsp;Transaksi</a>
						<ul class="collapse list-unstyled" id="pageSubmenu">
							<li>
								<a href="{{ url('/vPeminjaman') }}">Peminjaman</a>
							</li>
							<li>
								<a href="{{ url('/vPengembalian') }}">Pengembalian</a>
							</li>
							<li>
								<a href="{{ url('/vRekapan') }}">Rekapan</a>
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