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
									<div class="card-title">Buat Survey</div>
									<div class="card-category">
									Anda membuat survey <span class="text-success">	</span> 
									</div>
								</div>
								
								
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
	
		@endsection