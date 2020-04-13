@extends('layouts.backend')
@section('title','Halaman User')
@section('content')
	<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Halaman User</h2>
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
									<div class="card-title">Isi Profil</div>
									<div class="card-category">
									Isi Profil User
									</div>
								</div>
								<div class="card-body">
								 <form action="{{route('put-profil-user')}}" method="POST" enctype="multipart/form-data">
        						@csrf    
        						<input type="hidden" name="profil_id" value="{{$profil->id}}">
									<div class="form-group">
										<label for="">Nama </label>
										<input type="text" name="nama" class="form-control" value="{{Auth::user()->name}}" >
										  @error('nama')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
									</div>
									<div class="form-group">
										<label for="">Alamat </label>
										<textarea class="form-control" name="alamat" placeholder="Masukan Alamat" rows="5">{{$profil->alamat}}</textarea>
										 @error('alamat')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
									</div>
									<div class="form-group">
										<label for="">No KTP</label>
										<input type="text" name="no_ktp" class="form-control" value="{{ $profil->no_identitas}}" placeholder="3321550152442" readonly>
										<small id="no_hp" class="form-text text-muted">Masukkkan Nomer KTP / Nomer Identitas Anda</small>
										 @error('no_ktp')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
									</div>
									<div class="form-group">
										<label for="">Perkerjaan</label>
										<select class="form-control" name="perkerjaan">
											@foreach($perkerjaan as $item)
											<option value="{{$item->deskripsi}}" value="{{ $item->deskripsi }}" {{ ( $item->deskripsi == $profil->perkerjaan) ? 'selected' : '' }}>{{$item->deskripsi}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label for="">No HP</label>
										<input type="text" name="no_hp" class="form-control" value="{{ $profil->no_hp}}" placeholder="08xxxxxxxxxx" >
										<small id="no_hp" class="form-text text-muted">Masukkkan Nomer Handphone dengan format 08</small>
										 @error('no_hp')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
									</div>
									<div class="form-group">
										<label for="">Upload Foto</label>
										<input id="upload_foto" name="upload" class="form-control" type="file" accept="image/*" onchange="loadFile(event)">
										<img id="show_photo" width="500px" src="{{URL::asset('upload/foto_profil/'.Auth::user()->foto)}}">
										<img id="output"/ width="500px">
										<small id="upload" class="form-text text-muted">Upload Foto Maksimal 5 MB</small>
										 @error('upload')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
									</div>
									<button type="submit" class="btn btn-success">Submit</button>
									</form>
									
								</div>
								
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		
<script>
	$("#upload_foto").change(function(){
		$("#show_photo").remove();
	});
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
		@endsection