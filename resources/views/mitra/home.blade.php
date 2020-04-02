@extends('layouts.backend')
@section('title','Halaman Mitra')
@section('content')
	<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Halaman Mitra</h2>
								<h5 class="text-white op-7 mb-2">Surveynesia </h5>
							</div>
						</div>
					</div>
				</div>
					 @if (session('status'))
                    <div class="alert alert-primary">
                        {{ session('status') }}
                    </div>
               		 @endif
               		  @if (session('success'))
                    <div class="alert alert-primary">
                        {{ session('success') }}
                    </div>
               		 @endif
			
				<div class="page-inner mt--5">
					<div class="row mt--2">
                     <div class="col-md-12">
							<div class="card full-height">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Selamat Datang, {{$user->name}}</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
									<div class="col-md-6">	
											<table class="table table-typo">
										<tbody>
											<tr>
												<td>
													<h3>Nama Lengkap : </h3>
												</td>
												<td><span class="h4">{{$user->name}}</span></td>
											</tr>
											<tr>
												<td>
													<h3>Alamat Lengkap : </h3>
												</td>
												<td><span class="h5">{{$user->alamat}}</span>
												</td>
											</tr>
											<tr>
												<td>
													<h3>Provinsi : </h3>
												</td>
												<td><span class="h5">{{$user->provinsi}}</span>
												</td>
											</tr>
											<tr>
												<td>
													<h3>Kabupaten/Kota : </h3>
												</td>
												<td><span class="h5">{{$user->kabupaten}}</span>
												</td>
											</tr>
											<tr>
												<td>
													<h3>Instansi/UKM : </h3>
												</td>
												<td><span class="h5">{{$user->instansi}}</span>
												</td>
											</tr>
											<tr>
												<td>
													<h3>Jumlah Anggota : </h3>
												</td>
												<td><span class="h5">{{$user->jumlah_anggota}}</span>
												</td>
											</tr>
											<tr>
												<td>
													<h3>No Handphone : </h3>
												</td>
												<td><span class="h5">{{$user->no_hp}}</span>
												</td>
											</tr>
											<tr>
												<td>
													<h3>Saldo Saat ini : </h3>
												</td>
												<td><span class="h5">Rp. {{ number_format($user->saldo, 2) }}</span>
												</td>
											</tr>
											<tr>
												<td>
													<h3>Status : </h3>
												</td>
												<td><span class="h5"> @if($user->status=='available')
														<span class="text-success">{{$user->status}}</span>
														@elseif($user->status=='nonavailable')
														<span class="text-primary">{{$user->status}}</span>
														@else
														<span class="text-danger">{{$user->status}}</span>
														@endif
												 </span>
												</td>
											</tr>
											
										</tbody>
									</table>	
									</div>
									<div class="col-md-6">	
										<img class="img-responsive" src="{{asset('upload/foto_profil/'.$user->foto)}}" width="50%">
									</div>
									</div>
								
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		@endsection