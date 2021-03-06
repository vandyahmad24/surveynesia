@extends('layouts.backend')
@section('title','Halaman Operasional')
@section('content')
	<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Pilih mitra untuk survey {{$survey->nama}}</h2>
								<h5 class="text-white op-7 mb-2">Surveynesia </h5>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
                       @forelse ($users as $user)
						<div class="col-md-4">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title d-flex justify-content-center">
										<img src="{{asset('upload/foto_profil/'.$user->foto)}}" class="img-responsive" width="110px">
										<br>
									</div>
									<div class="card-title d-flex justify-content-center mt-2">
										<h3>{{$user->name}}</h3>
									</div>
									<div class="card-category">
										<div class="table-responsive-sm">
										<table class="table">
											<tbody>
												<tr>
													<td>Alamat : </td>
													<td>{{$user->alamat}}</td>
												</tr>
												<tr>
													<td>Provinsi : </td>
													<td>{{$user->provinsi}}</td>
												</tr>
												<tr>
													<td>Kota / Kabupaten : </td>
													<td>{{$user->kabupaten}}</td>
												</tr>
												<tr>
													<td>Instansi : </td>
													<td>{{$user->instansi}}</td>
												</tr>
												<tr>
													<td>Jumlah Anggota : </td>
													<td>{{$user->jumlah_anggota}}</td>
												</tr>
												<tr>
													<td>No Hp : </td>
													<td> <a href="{{route('send-wa',$user->no_hp)}}" target="_blank"> {{$user->no_hp}}</a></td>
												</tr>
												<tr>
													<td colspan="2">
														<a href="/operasional/put-surveyor/{{$survey->id}}/{{$user->user_id}}" onclick="return confirm('Pilih {{$user->name}} Sebagai Surveyor?')" class="btn btn-info text-center">Piliih {{$user->name}}</a>
													</td>
												</tr>
											</tbody>
										</table>
										</div>
									</div>
									
									
									

								</div>
							</div>
						</div>
						@empty
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
									Maaf belum ada Surveyor tersedia
								</div>
							</div>
						</div>
						@endforelse
						
					</div>
				</div>
			</div>
			

		@endsection