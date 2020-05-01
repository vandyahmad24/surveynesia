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
			
				<div class="page-inner mt--5">
					<div class="row mt--2">
                     <div class="col-md-12">
							<div class="card full-height">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Daftar Survey Selesai</div>
									<div class="table-responsive">
									<table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4" id="tabelsurvey">
										<thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col">Nama Survey</th>
												<th scope="col">Jenis Survey </th>
												<th scope="col">Lokasi</th>
												<th scope="col">Hadiah Mengerjakan</th>
											</tr>
										</thead>
										<tbody>
											@foreach($survey_finish as $survey)
											<tr>
												<td>{{$loop->iteration}}</td>
												<td>{{$survey->nama}}</td>
												<td>{{$survey->Jenis->nama_survey}}</td>
												<td>{{$survey->lokasi}}</td>
												<td>
													@php 
			        $kompensasi = $survey->harga*70/100;
			        $surveyor_kompensasi = $survey->harga-$kompensasi;
			        @endphp
			        <b>Rp. {{ number_format($surveyor_kompensasi, 2)}}</b> 
												</td>
												
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
				    $('#tabelsurvey').DataTable();
				} );
			</script>
		
		@endsection