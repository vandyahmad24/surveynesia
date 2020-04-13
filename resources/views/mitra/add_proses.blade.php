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
					 @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
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
											<tr>
												<td>
													<h3> Nama Pembuat Survey </h3>

												</td>
												<td> 
													{{$user_pembuat->name}}
													<br>
													<a href="{{route('send-wa',$user_pembuat->profil_user->no_hp)}}" > {{$user_pembuat->profil_user->no_hp}}</a>

												</td>
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
											@else
											<li class="feed-item feed-item-primary">
											@endif
												<time class="date" >{{ \Carbon\Carbon::parse($aktif->created_at)->format('d-M-Y')}}</time>
												<span class="text">{{$aktif->deskripsi}}</a></span> 
											</li>
											@endforeach
											
											</ol>

											<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tambahlaporan">Tambah Laporan Harian</button>
									</div>
								</div>
								</div>
							</div>
						</div>
					
					</div>
				</div>
			</div>

			<div class="modal fade" id="tambahlaporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Buat Laporan Harian</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form action="{{route('add-proses-survey')}}" method="post">
			        	@csrf
			        	<div class="form-group">
					    <label for="exampleInputEmail1">Tanggal laporan</label>
					    <input type="hidden" name="survey_id" value="{{$survey->id}}">
					    <input type="date" class="form-control" readonly name="tanggal_sekarang" value='<?php echo date('Y-m-d');?>'>
					   <div class="form-group">
						    <label for="exampleFormControlTextarea1">Isi Laporan</label>
						    <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="5"></textarea>
						  </div>
					  </div>
			       
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			        <button type="submit" class="btn btn-primary">Tambah Laporan</button>
			      </div>
			       </form>
			    </div>
			  </div>
			</div>
			
			
		@endsection