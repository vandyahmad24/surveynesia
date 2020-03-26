<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('logo_survey.png')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{asset('backend/assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script src="https://kit.fontawesome.com/b4dca489a8.js" crossorigin="anonymous"></script>
	<script src="{{asset('backend/assets/js/core/jqueryku.js')}}"></script>
	<script src="{{asset('backend/assets/ckeditor/ckeditor.js')}}"></script>
	<!-- CSS Files -->

	<link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('backend/assets/css/atlantis.min.css')}}">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.5.6/cleave.min.js"></script>

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset('backend/assets/css/demo.css')}}">
</head>

<?php
	$profil = Auth::user();
?>

<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="" class="logo">
					<img src="{{asset('logo_samping.png')}}" alt="navbar brand" class="navbar-brand" width="200px">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fas fa-ellipsis-h"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fas fa-ellipsis-v"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class=""></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									@if($profil->foto==null)
									<img src="{{asset('logo_survey.png')}}" alt="..." class="avatar-img  rounded-circle">
									@else
									<img src="{{URL::asset('upload/foto_profil/'.$profil->foto)}}" alt="..." class="avatar-img  rounded-circle">
									@endif
									
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg">
											
											@if($profil->foto==null)
											<img src="{{asset('logo_survey.png')}}" alt="..." class="avatar-img  rounded-circle">
											@else
											<img src="{{URL::asset('upload/foto_profil/'.$profil->foto)}}" alt="..." class="avatar-img  rounded-circle">
											@endif
											
											

											</div>
											<div class="u-text">
												<h4>{{Auth::user()->name}}</h4>
												<p class="text-muted">{{Auth::user()->email}}</p>
											</div>
										</div>
										@if($profil->foto!=null)
									<li><a href="{{route('edit-profil-user')}}" class="dropdown-item">
										Edit Profil
										</a>
										<hr>
										@endif
									</li>
									</li>
									 <a class="dropdown-item" href="{{ route('logout') }}"
	               onclick="event.preventDefault();
	                             document.getElementById('logout-form').submit();">
	                {{ __('Logout') }} 
	            </a>

	            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                @csrf
	            </form>
									</li>

									
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
						
						@if($profil->foto==null)
						<img src="{{asset('logo_survey.png')}}" alt="..." class="avatar-img  rounded-circle">
						@else
						<img src="{{URL::asset('upload/foto_profil/'.$profil->foto)}}" alt="..." class="avatar-img  rounded-circle">
						@endif
						
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{Auth::user()->name}}
									<span class="user-level">{{Auth::user()->level}}</span>
									
								</span>
							</a>
							<div class="clearfix"></div>

						
						</div>
					</div>
					<ul class="nav nav-primary">
						@if(Auth::user()->level=='user')
						<li class="nav-item">
							<a href="{{route('user')}}">
								<i class="fas fa-layer-group"></i>
								<p>Beranda</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('list-pesanan')}}">
								<i class="fas fa-shopping-cart"></i>
								<p>Daftar Pesanan <span class="badge badge-primary"> {{$jumlah_survey}}</span></p>
							</a>
						</li>
						@elseif(Auth::user()->level=='admin')
						<li class="nav-item">
							<a href="{{route('admin')}}">
								<i class="fas fa-layer-group"></i>
								<p>Beranda</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('jenis-survey')}}">
								<i class="fas fa-layer-group"></i>
								<p>Jenis Survey</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('konfigurasi')}}">
								<i class="fas fa-layer-group"></i>
								<p>Konfigurasi</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('daftar-user')}}">
								<i class="fas fa-layer-group"></i>
								<p>Daftar User</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('daftar-mitra')}}">
								<i class="fas fa-layer-group"></i>
								<p>Daftar Mitra</p>
							</a>
						</li>
						@elseif(Auth::user()->level=='operasional')
						<li class="nav-item">
							<a href="{{route('operasional')}}">
								<i class="fas fa-layer-group"></i>
								<p>Daftar Survey</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('daftar-mitra-aktif')}}">
								<i class="fas fa-layer-group"></i>
								<p>Daftar Mitra</p>
							</a>
						</li>
						@elseif(Auth::user()->level=='mitra')
						<li class="nav-item">
							<a href="{{route('mitra')}}">
								<i class="fas fa-layer-group"></i>
								<p>Home</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('proses-survey')}}">
								<i class="fas fa-layer-group"></i>
								<p>Proses Survey</p>
							</a>
						</li>

						@endif

						
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		@yield('content')
		
		<!-- End Custom template -->
		<footer class="footer">
				<div class="container-fluid">
					<div class="copyright ml-auto">
						2020, Created <i class="fa fa-heart heart text-danger"></i> by <a href="#">Asdosku Guna Bangsa</a>
					</div>				
				</div>
			</footer>
		</div>
	</div>
	<!--   Core JS Files   -->
	
	<script src="{{asset('backend/assets/js/core/popper.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/core/bootstrap.min.js')}}"></script>

	<!-- jQuery UI -->
	<script src="{{asset('backend/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{asset('backend/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


	<!-- Chart JS -->
	<script src="{{asset('backend/assets/js/plugin/chart.js/chart.min.js')}}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{asset('backend/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

	<!-- Chart Circle -->
	<script src="{{asset('backend/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

	<!-- Datatables -->
	<script src="{{asset('backend/assets/js/plugin/datatables/datatables.min.js')}}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{asset('backend/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
	<!-- Sweet Alert -->
	<script src="{{asset('backend/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

	<!-- Atlantis JS -->
	<script src="{{asset('backend/assets/js/atlantis.min.js')}}"></script>

</body>
</html>