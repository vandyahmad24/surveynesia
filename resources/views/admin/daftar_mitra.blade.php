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
									<div class="card-title">Daftar Mitra</div>
									<div class="table-responsive">
									<button type="button" class="btn btn-secondary mt-2 edit-survey" data-toggle="modal" data-target="#tambahmitra">
									  Tambah Mitra
									</button>
									<table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
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
											@foreach($mitra as $user)
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
									{{ $mitra->links() }}
								</div>
								
								
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="tambahmitra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Tambah Mitra</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			       <form action="{{route('add-mitra')}}" autocomplete="off" method="POST">
        			@csrf    
			        <div class="form-group">
						<label for="name">Nama Mitra</label>
						<input type="text" class="form-control" id="name" name="name">
						@error('name')
						  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
	                     @enderror
					</div>
					 <div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" autocomplete="off" id="email" name="email">
						<small  class="form-text text-muted">Password akan diset default surveynesia123 mitra akan menganti password setelah aktifasi</small>
						@error('email')
						  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
	                    @enderror
					</div>
					<div class="form-group">
						<label for="instansi">Instansi / UKM</label>
						<input type="text" class="form-control" autocomplete="off" id="instansi" name="instansi">
					</div>
					@error('instansi')
						  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
	                 @enderror
					<div class="form-group">
						<label for="jumlah_anggota">Jumlah Anggota </label>
						<input type="number" class="form-control" autocomplete="off" id="jumlah_anggota" name="jumlah_anggota">
					</div>
					@error('jumlah_anggota')
					  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                    @enderror

					<div class="form-group">
						<label for="no_hp">No Handphone </label>
						<input type="number" class="form-control" autocomplete="off" id="no_hp" name="no_hp">
					</div>
					@error('no_hp')
						  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
	                 @enderror
					<div class="form-group">
						<label for="alamat">Alamat </label>
						<input type="text" class="form-control" autocomplete="off" id="alamat" name="alamat">
					</div>
					@error('alamat')
						  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
	                    @enderror
					<div class="form-group">
						<label for="">Provinsi</label>
						<select class="form-control" name="provinsi" id="provinsi">
							<option value="">Pilih Provinsi</option>
							@foreach($provinsi as $item)
							<option value="{{$item->id}}">{{$item->name}}</option>
							@endforeach
						</select>
						@error('provinsi')
						  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
	                    @enderror
					</div>
					<div class="form-group">
						<label for="">Kota</label>
						<select class="form-control" name="kota" id="kota">
							<option value="">Pilih Provinsi Terlebih Dahulu</option>
						</select>
						@error('kota')
						  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
	                    @enderror
					</div>
					
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Save changes</button>
			      </div>
			      </form>
			    </div>
			  </div>
			</div>



			<script type="text/javascript">
				$( document ).ready(function() {
					$("#provinsi").change(function(){
	                var prov_id = $(this).val();
	                console.log(prov_id);
	                   $.ajax({
	                    url: "{{route('get-kabupaten')}}",
	                    type: 'post',
	                    data: {
	                        _token: "{{ csrf_token() }}",
	                        prov_id:prov_id
	                    },
	                    success: function(data) {
	                        $('#kota').empty()
	                        $.each(data, function (key, val) {
	                                $('#kota').append(`<option value="${val.id}"> 
	                                       ${val.name} 
	                                  </option>`); 
	                            });
	                    }
	                       
	                   });
	                });
				});


			</script>
		@endsection