@extends('layouts.backend')
@section('title','Halaman Operasional')
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

                	@if (session('danger'))
	                    <div class="alert alert-danger">
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
									<div class="card-category">Nama Pemesan : {{$user->name}}</div>
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
												<td><span class="h3 text-danger">Rp. {{ number_format($pembayaran_awal, 2) }}
													@if($survey->surveyor_id!=null)
													Lunas
													@endif
												</span></td>
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
												@if($survey->bukti_pembayaran2 !=null)
											<tr>
												<td>
													<h3>Bukti Pelunasan</h3>
												</td>
												<td> 
													<a href="
													{{URL::asset('upload/bukti_pembayaran/'.$survey->bukti_pembayaran2)}}
													" download>{{$survey->bukti_pembayaran2}}</a>
												</td>
											</tr>
											@endif
											@if($survey->surveyor_id!=null)
											<tr>
												<td>
													<h3> Nama Surveyor </h3>
												</td>
												<td> 
													{{$survey->Surveyor->name}}
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
													@elseif($survey->status=='tolak' && $survey->bukti_pembayaran != null)
													<span class="badge badge-danger"> Survey di Tolak</span>
													@else
													<span class="badge badge-success"> Pembayaran di Terima</span>
													@endif
												</td>
											</tr>
											<tr>
												@if($survey->status=='pending' && $survey->bukti_pembayaran!=null)
												<td colspan="2" class="text-center">
													<div class="d-flex"></div>
													<a href="{{route('pilih-surveyor',$survey->id)}}" onclick="return confirm('Pastikan Pembayaran sudah diterima?')" class="btn btn-primary">Konfirmasi Pembayaran</a>
													<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#tolaksurvey">
														Tolak Survey
													</button>

												</td>

												@endif
											</tr>
											
										</tbody>
									</table>	
										<div class="card-body">
										<ol class="activity-feed">
											@foreach($activity as $aktif)
											@if($aktif->tipe_aktivity=='upload_pembayaran_awal')
											<li class="feed-item feed-item-success">
											@elseif($aktif->tipe_aktivity=='laporan_harian')
											<li class="feed-item feed-item-warning">
											@elseif($aktif->tipe_aktivity=='survey_ditolak')
											<li class="feed-item feed-item-danger">
											@else
											<li class="feed-item feed-item-primary">
											@endif
												<time class="date" >{{ \Carbon\Carbon::parse($aktif->created_at)->format('d-M-Y')}}</time>
												<span class="text">{{$aktif->deskripsi}}</a></span> 
											</li>
											@endforeach
											
											</ol>
											@if($survey->bukti_pembayaran2 != null)
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
											 Konfirmasi Pelunasan
											</button>


			<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Pelunasan</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <h5>Sebelum melakukan konfirmasi pembayaran, Pastikan dana sudah masuk ke rekening sesuai dengan nominal <span class="text-success">Rp. {{ number_format($pembayaran_awal, 2) }} </span> , setelah melakukan konfirmasi, pastikan surveyor <b>{{$survey->Surveyor->name}} untuk mengirimkan hasil surveynya</b></h5>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			        <a href="#" class="btn btn-primary">Konfirmasi Pembayaran</a>
			      </div>
			    </div>
			  </div>
			</div>
											@endif

										
								</div>
								</div>
							</div>
						</div>
					
					</div>
				</div>
			</div>
				<!-- Modal -->
				<div class="modal fade" id="tolaksurvey" tabindex="-1" role="dialog" aria-labelledby="tolaksurveyTitle" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="tolaksurveyTitle">Tolak Survey</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			       <form action="{{route('tolak-survey')}}" autocomplete="off" method="POST">
			         	@csrf
		         	   
			         	 <div class="form-group">
	         	 	     Anda Yakin Akan Menolak Permintaan Survey <span class="text-success"><b>{{$survey->nama}}</b></span>
	         	 	     <br>
							<label for="name">Alasan Penolakan</label>
							 <textarea class="form-control" rows="3" name="alasan"></textarea>
						</div>
						<input type="hidden" name="id_survey" value="{{$survey->id}}">
			         
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			        <button type="submit" class="btn btn-danger">Buat Penolakan</button>
			      </div>
			      </form>
			    </div>
			  </div>
			</div>

		</div>
			
		@endsection