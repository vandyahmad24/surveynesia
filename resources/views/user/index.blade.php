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
										<a href="user/add-survey/" class="btn btn-danger">Ajukan Survey</a>
									</div>
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			

		@endsection