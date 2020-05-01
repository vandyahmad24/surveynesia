@extends('layouts.backend')
@section('title','Halaman Operasional')
@section('content')
	<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Halaman Operasional</h2>
								<h5 class="text-white op-7 mb-2">Surveynesia </h5>
							</div>
						</div>
					</div>
				</div>
			
				<div class="page-inner mt--5">
					<div class="row mt--2">
                     <div class="col-md-12">
							<div class="card full-height">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Info Pemesan </div>
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
													<h3>perkerjaan : </h3>
												</td>
												<td><span class="h5">{{$user->perkerjaan}}</span>
												</td>
											</tr>
											<tr>
												<td>
													<h3>No Handphone : </h3>
												</td>
												<td><span class="h5"> <a class="text-primary" href="{{route('send-wa',$user->no_hp)}}">{{$user->no_hp}}</a></span>
												</td>
											</tr>
											
										</tbody>
									</table>	
									<a href="{{URL::previous() }}">Kembali</a>
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