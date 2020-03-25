@extends('layouts.backend')
@section('title','Halaman User')
@section('content')
	<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Detail Pesanan </h2>
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
								<div class="card-body">
									<div class="card-title">Nama Survey : {{$survey->nama}}</div>
									<div class="card-category">Jenis Survey : {{$survey->Jenis->nama_survey}}</div>
									<hr>
									<div class="card-body col-md-12">
									<table class="table table-typo">
										<tbody>
											<tr>
												<td>
													<h3>Lokasi Survey</h3>

												</td>
												<td><span class="h4">{{$survey->lokasi}}</span></td>
											</tr>
											<tr>
												<td>
													<h3>Deskripsi</h3>
												</td>
												<td><span class="h4">{!!$survey->deskripsi_survey!!}</span></td>
											</tr>
											<tr>
												<td>
													<h3>Target Survey</h3>

												</td>
												<td><span class="h4">{{$survey->kategori}}</span></td>
											</tr>
											<tr>
												<td>
													<h3>Waktu Survey</h3>

												</td>
												<td><span class="h4">{{$survey->waktu}}</span>
													<br>
													<span class="h4"> Perkiraan Selesai : {{ \Carbon\Carbon::parse($survey->tgl_selesai)->format('d-M-Y')}}</span></td>
											</tr>
											<tr>
												<td>
													<h3>Biaya</h3>

												</td>
												<td><span class="h3 text-success">Rp. {{ number_format($survey->harga, 2) }}</span></td>
											</tr>
											<tr>
												<td>
													<h3>Pembayaran Awal</h3>
													<?php $pembayaran_awal = $survey->harga/2; ?>
												</td>
												<td><span class="h3 text-danger">Rp. {{ number_format($pembayaran_awal, 2) }}</span></td>
											</tr>
											<tr>
												<td>
													<h3>Surat Keterangan</h3>
												</td>
												<td> @if($survey->upload!=null)
													<a href="
													{{URL::asset('upload/surat_ket/'.$survey->upload)}}
													" download>{{$survey->upload}}</a>
													@else
													<span class="h4">Tanpa Surat Keterangan</span>
													@endif
												</td>
											</tr>
											@if($survey->bukti_pembayaran !=null)
											<tr>
												<td>
													<h3>Bukti Pembayaran</h3>
												</td>
												<td> 
													<a href="
													{{URL::asset('upload/bukti_pembayaran/'.$survey->bukti_pembayaran)}}
													" download>{{$survey->bukti_pembayaran}}</a>
												</td>
											</tr>
											@endif
											<tr>
												<td>
													<h3>Status</h3>
												</td>
												<td>
												 @if($survey->status=='pending' && $survey->bukti_pembayaran==null)
													<span class="badge badge-warning">Menunggu Pembayaran</span>
													@elseif($survey->status=='pending' && $survey->bukti_pembayaran !=null)
													<span class="badge badge-info">Menunggu Konfirmasi Pembayaran</span>
													@else
													<span class="badge badge-success"> Pembayaran di Terima</span>
													@endif
												</td>
											</tr>
										</tbody>
									</table>	
								</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-header">
									<div class="card-title">Status Survey</div>
								</div>
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
			
			
		@endsection