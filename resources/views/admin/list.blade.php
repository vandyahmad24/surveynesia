@extends('layouts.backend')
@section('title','Halaman Admin')
@section('content')
	<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Halaman List Aktifitas</h2>
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
									<div class="card-title">Daftar Aktifitas</div>
										<div class="card-body">
										<ol class="activity-feed">
											@foreach($activity as $aktif)
											@if($aktif->tipe_aktivity=='upload_pembayaran_awal')
											<li class="feed-item feed-item-success">
											@else
											<li class="feed-item feed-item-primary">
											@endif
												<time class="date" >{{ \Carbon\Carbon::parse($aktif->created_at)->format('d-M-Y')}}</time>
												<span class="text">{{$aktif->deskripsi}}</a></span> 
											</li>
											@endforeach
											
											</ol>
										</div>
									
								</div>
								
								
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endsection