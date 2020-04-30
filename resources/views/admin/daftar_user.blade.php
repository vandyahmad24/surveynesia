@extends('layouts.backend')
@section('title','Halaman Admin')
@section('content')
	<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Halaman Admin</h2>
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
									<div class="card-title">Daftar User</div>
									<div class="table-responsive">
									<table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4" id="tableuser">
										<thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col">Nama</th>
												<th scope="col">Email </th>
												<th scope="col">Level</th>
												<th scope="col">Status</th>
												<th scope="col">Tanggal Aktifasi</th>
											</tr>
										</thead>
										<tbody>
											@foreach($users as $user)
											<tr>
												<td>{{$loop->iteration}}</td>
												<td>@if($user->is_active==1) <a href="{{route('show-profil',$user->id)}}" target="_blank">{{$user->name}}</a> @else {{$user->name}} @endif</td>
												<td>{{$user->email}}</td>
												<td>{{$user->level}}</td>
												@if($user->is_active==0) <td  class="table-danger">Tidak Aktif</td> @else <td class="table-primary"> Aktif </td> @endif
												<td>{{$user->email_verified_at}}</td>
											</tr>
											@endforeach


											
										</tbody>
									</table>
									</div>
								
								</div>
								
								
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<script type="text/javascript">
				$(document).ready( function () {
				    $('#tableuser').DataTable();
				} );
			</script>
		
		@endsection