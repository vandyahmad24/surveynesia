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
								 <form action="{{route('add-profil')}}" method="POST" enctype="multipart/form-data">
        						@csrf    
									<div class="form-group">
										<label for="">Nama </label>
										<input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" >
									</div>
									<div class="form-group">
										<label for="">Alamat </label>
										<input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" >
									</div>
									<div class="form-group">
										<label for="">No KTP</label>
										<input type="number" name="no_ktp" class="form-control" placeholder="3321550152442" >
									</div>
									<div class="form-group">
										<label for="">Perkerjaan</label>
										<input type="text" name="perkerjaan" class="form-control" placeholder="Masukan Perkerjaan Anda" >
									</div>
									<div class="form-group">
										<label for="">No HP</label>
										<input type="number" name="no_hp" class="form-control" placeholder="08xxxxxxxxxx" >
									</div>
									<div class="form-group">
										<label for="">Upload Foto</label>
										<input type="file" name="upload" class="form-control" >
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
			

		@endsection