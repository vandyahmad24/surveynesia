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
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
			
				<div class="page-inner mt--5">
					<div class="row mt--2">
                     <div class="col-md-12">
							<div class="card full-height">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Perbarui Profil</div>
								</div>
								<div class="card-body">
								 <form action="{{route('put-profil-mitra')}}" method="POST" enctype="multipart/form-data">
        						@csrf    
									<div class="form-group">
										<label for="">Nama </label>
										<input type="hidden" name="id" value="{{$user->user_id}}">
										<input type="text" name="name" class="form-control" value="{{$user->name}}" >
										  @error('nama')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
									</div>
									<div class="form-group">
										<label for="">Password Baru </label>
										<input type="password" name="password" class="form-control" >
										  @error('password')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
									</div>
									<div class="form-group">
										<label for="">Alamat </label>
										<input type="text" name="alamat" class="form-control" value="{{$user->alamat}}" >
										 @error('alamat')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
									</div>
									<div class="form-group">
										<label for="">Instansi / UKM </label>
										<input type="text" name="instansi" class="form-control" value="{{$user->instansi}}" >
										 @error('instansi')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
									</div>
									<div class="form-group">
										<label for="">Jumlah Anggota</label>
										<input type="text" name="jumlah_anggota" class="form-control" value="{{$user->jumlah_anggota}}" >
										 @error('jumlah_anggota')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
									</div>
									<div class="form-group">
										<label for="">No Hp </label>
										<input type="text" name="no_hp" class="form-control" value="{{$user->no_hp}}" >
										<small id="no_hp" class="form-text text-muted">Masukkkan Nomer Handphone dengan format 08</small>
										 @error('instansi')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
									</div>
									<div class="form-group">
										<label for="">No Rekening </label>
										<div class="d-flex">
										<div class="col-md-3">
										<select class="form-control" name="nama_bank" id="nama_bank">
											<option value="BNI">BNI</option>
											<option value="BRI">BRI</option>
											<option value="BCA">BCA</option>
											<option value="MANDIRI">MANDIRI</option>
											<option value="BTN">BTN</option>
										</select>
										</div>
										<div class="col-md-6">
										<input type="text" name="no_rek" class="form-control" value="{{$user->no_rek}}" >
										</div>
										 @error('instansi')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
                                          </div>
									</div>
									<div class="form-group">
										<label for="">Provinsi</label>
										<select class="form-control" name="provinsi" id="provinsi">
											<option value="">Pilih Provinsi</option>
											@foreach($provinsi as $item)
											<option data-id="{{$item->id}}" value="{{ $item->name }}" {{$item->name == $user->provinsi  ? 'selected' : ''}}>{{ $item->name}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label for="">Kabupaten / Kota</label>
										<select class="form-control" name="kota" id="kota">
											<option value="{{$user->kabupaten}}">{{$user->kabupaten}}</option>
										</select>
									</div>
									<div class="form-group">
										<label for="">Upload Foto</label>
										<input id="upload_foto" name="upload" class="form-control" type="file" accept="image/*" onchange="loadFile(event)">
										<img id="show_photo" src="{{URL::asset('upload/foto_profil/'.Auth::user()->foto)}}">
										<img id="output"/ width="500px">
										<small id="upload" class="form-text text-muted">Upload Foto Maksimal 5 MB</small>
										 @error('upload')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
									</div>

									
									<button type="submit" class="btn btn-success ml-2">Submit</button>
									</form>
									
								</div>
								
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				$("#upload_foto").change(function(){
						$("#show_photo").remove();
					});
				  var loadFile = function(event) {
				    var output = document.getElementById('output');
				    output.src = URL.createObjectURL(event.target.files[0]);
				  };



				$( document ).ready(function() {
					 $("#provinsi").change(function(){
		                // var prov_id = $(this).attr("data-id");
		                var prov_id = $('option:selected', this).attr('data-id');
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
		                                $('#kota').append(`<option value="${val.name}"> 
		                                       ${val.name} 
		                                  </option>`); 
		                            });
		                    }
		                       
		                   });
		                });
				});



			</script>

		@endsection