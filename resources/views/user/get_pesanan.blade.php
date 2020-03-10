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
									<div class="card-body">
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
												<td><span class="h3 text-danger">Rp. {{ number_format($survey->harga, 2) }}</span></td>
											</tr>
											<tr>
												<td>
													<h3>Surat Keterangan</h3>
												</td>
												<td> @if($survey->upload!='null')
													<a href="
													{{URL::asset('upload/surat_ket/'.$survey->upload)}}
													" download>{{$survey->upload}}</a>
													@else
													-
													@endif
												</td>
											</tr>
											<tr>
												<td>
													<h3>Status</h3>
												</td>
												<td> @if($survey->status=='pending')
													<span class="badge badge-warning">Menunggu Pembayaran</span>
													@else
													<span class="badge badge-success"> Pembayaran di Terima</span>
													@endif
												</td>
											</tr>
											@if($survey->status=='pending')
											<tr>
												<td colspan="2" class="text-center">
													<h3 class="mt-4">Metode Pembayaran</h3>
													<br>
													<table class="table table-typo">
														<tbody>
															<tr>
																<td>Via</td>
																<td>Keterangan</td>
															</tr>
															<tr>
																<td><img src="{{asset('payment/dana.png')}}" class="img-fluid"></td>
																<td><b>081393558430</b> a.n <b>Khalid Abdurrahman</b></td>
															</tr>
															<tr>
																<td><img src="{{asset('payment/bca.png')}}" class="img-fluid"></td>
																<td>a.n DNID 081393558430<br>Virtual Account : <b>3901081393558430</b></td>
															</tr>
															<tr>
																<td><img src="{{asset('payment/bni.png')}}" class="img-fluid"></td>
																<td>a.n DNID 081393558430<br>Virtual Account : <b>8810081393558430</b></td>
															</tr>
															<tr>
																<td><img src="{{asset('payment/mandiri.png')}}" class="img-fluid"></td>
																<td>a.n DNID 081393558430<br>Virtual Account : <b>89508081393558430</b></td>
															</tr>
															<tr>
																<td><img src="{{asset('payment/btn.png')}}" class="img-fluid"></td>
																<td>a.n DNID 081393558430<br>Virtual Account : <b>8528081393558430</b></td>
															</tr>
															<tr>
																<td colspan="2" class="text-center table-info">
																	<input class="text-center" type="file" name="bukti_pembayaran">
																</td>
															</tr>
														</tbody>
													</table>
												</td>
												
											</tr>
											@endif
										</tbody>
									</table>
								</div>
								</div>
							</div>
						</div>
					
					</div>
				</div>
			</div>
			

		@endsection