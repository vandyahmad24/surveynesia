@extends('layouts.backend')
@section('title','Halaman Admin')
@section('content')
	<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Detail User </h2>
								<h5 class="text-white op-7 mb-2">Surveynesia </h5>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
                   	<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Detail User : {{$user->name}}</div>
									<div class="card-body col-md-12">
									<table class="table table-typo">
										<tbody>
											<tr>
												<td>
													<h3>Nama User</h3>

												</td>
												<td><span class="h4">{{$user->name}}</span></td>
											</tr>
											<tr>
												<td>
													<h3>Email </h3>
												</td>
												<td><span class="h4">{{$user->email}}</span></td>
											</tr>
											<tr>
												<td>
													<h3>Level </h3>
												</td>
												<td><span class="h4">{{$user->level}}</span></td>
											</tr>
											<tr>
												<td>
													<h3>Alamat User </h3>
												</td>
												<td><span class="h4">{{$user->alamat}}</span></td>
											</tr>
											<tr>
												<td>
													<h3>No Identitas </h3>
												</td>
												<td><span class="h4">{{$user->no_identitas}}</span></td>
											</tr>
											<tr>
												<td>
													<h3>Perkerjaan </h3>
												</td>
												<td><span class="h4">{{$user->perkerjaan}}</span></td>
											</tr>
											<tr>
												<td>
													<h3>No Hp </h3>
												</td>
												<td><span class="h4">{{$user->no_hp}}</span></td>
											</tr>
											<tr>
												<td>
													<h3>Foto </h3>
												</td>
												<td><img src="{{URL::asset('upload/foto_profil/'.$user->foto)}}" class="img-fluid" width="50%"  alt="{{$user->name}}"></td>
											</tr>
										</tbody>
									</table>	
								</div>
								<a href="{{route('daftar-user')}}">Kembali</a>
								</div>
							</div>
						</div>
					
					
					</div>
				</div>
			</div>
			
			
		@endsection