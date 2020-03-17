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
					 @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
			
				<div class="page-inner mt--5">
					<div class="row mt--2">
                       @foreach($jenis_survey as $item)
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title d-flex justify-content-center">
										<i class="{{$item->icon}}" style="font-size: 5.73em;"></i>
									</div>
									<div class="card-title d-flex justify-content-center">
										<h3>{{$item->nama_survey}}</h3>
									</div>
									
									<div class="card-category text-center">Deskripsi : <br>{{$item->deskripsi}}
									</div>
									<hr>
									<div class="d-flex justify-content-center">
										<a href="{{route('add-survey',$item->id)}}" class="btn btn-primary">Buat Survey</a>
									</div>
								
								</div>
							</div>
						</div>
						@endforeach
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title d-flex justify-content-center">
										<i class="fas fa-plus" style="font-size: 5.73em;"></i>
									</div>
									<div class="card-title d-flex justify-content-center">
										<h3>Buat Survey</h3>
									</div>
									
									<div class="card-category text-center">Deskripsi : <br>Tidak Menemukan Survey yang anda butuhkan? Ajukan survey di sini
									</div>
									<hr>
									<div class="d-flex justify-content-center">
										<button class="btn btn-danger" data-toggle="modal" data-target="#ajukan_survey">Ajukan Survey</button>
									</div>
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="ajukan_survey" tabindex="-1" role="dialog" aria-labelledby="ajukan_survey" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Ajukan Survey</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form method="post" action="{{route('add-jenis-survey')}}">
			        	@csrf
					  <div class="form-group">
					    <label for="nama_survey">Judul Survey</label>
					    <input type="name" class="form-control" name="nama_survey" id="nama_survey" aria-describedby="nama_survey_dec" placeholder="Masukan Nama Survey">
					  </div>
					   <div class="form-group">
					    <label for="deskripsi">Deskripsi Survey</label>
					    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
					  </div>
					
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			        <button type="submit" class="btn btn-primary">Tambah Survey</button>
			      </div>
			      </form>
			    </div>
			  </div>
			</div>

		@endsection