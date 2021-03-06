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
                @if (session('delete'))
                    <div class="alert alert-danger">
                        {{ session('delete') }}
                    </div>
                @endif
			
				<div class="page-inner mt--5">
					<div class="row mt--2">
                       @forelse ($survey as $item)
						<div class="col-md-4">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title d-flex justify-content-center">
										<i class="{{$item->Jenis->icon}}" style="font-size: 5.73em;">
										</i>
										<br>
									</div>
									<div class="card-title d-flex justify-content-center">
										<h3>{{$item->nama}}</h3>
									</div>
									
									<div class="card-category">
										<div class="table-responsive-sm">
										<table class="table">
											<tbody>
												<tr>
													<td>Jenis Survey</td>
													<td>{{$item->Jenis->nama_survey}}</td>
												</tr>
												@if($item->status=='pending' && $item->bukti_pembayaran ==null && $item->surveyor_id == null && $item->bukti_pembayaran2 == null)
												<tr class="table-warning">
													<td>Status</td>
													<td>Pending, Menunggu Pembayaran</td>
												</tr>

												@elseif($item->status=='pending' && $item->bukti_pembayaran !== null && $item->surveyor_id == null && $item->bukti_pembayaran2 == null)
												<tr class="table-info">
													<td>Status</td>
													<td>Pesanan Dalam Proses, Menunggu konfirmasi Pembayaran</td>
												</tr>

												@elseif($item->status=='tolak' && $item->bukti_pembayaran != null && $item->surveyor_id == null && $item->bukti_pembayaran2 == null)
												<tr class="table-danger">
													<td>Status</td>
													<td>Survey di Tolak</td>
												</tr>
												

												@elseif($item->status=='proses' && $item->bukti_pembayaran !== null && $item->surveyor_id != null && $item->bukti_pembayaran2 == null)
												<tr class="table-success">
													<td>Status</td>
													<td>Survey dalam Proses Pengerjaan</td>
												</tr>
												@elseif($item->status=='proses' && $item->bukti_pembayaran !== null && $item->surveyor_id != null && $item->bukti_pembayaran2 !== null)
												<tr class="table-primary">
													<td>Status</td>
													<td>Menunggu Konfirmasi Pelunasan</td>
												</tr>
												@elseif($item->status=='finish' && $item->bukti_pembayaran != null && $item->surveyor_id != null && $item->bukti_pembayaran2 !=null)
												<tr class="table-primary">
													<td>Status</td>
													<td>Survey Selesai di Kerjakan</td>
												</tr>
												

												@endif
												<tr>
													<td>Tgl Pemesanan</td>
													<td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-M-Y')}}</td>
												</tr>
												<tr>
													<td>Terakhir Status Berubah</td>
													<td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-M-Y H:s')}}</td>
												</tr>
												<tr>
													<td>Total Biaya</td>
													<td>Rp. {{ number_format($item->harga, 2) }}</td>
												</tr>
												<tr class="table-danger">
													<?php
													$pembayaran_awal = $item->harga/2;
													?>
													<td>Pembayaran Awal </td>
													<td>Rp. {{ number_format($pembayaran_awal) }}</td>
												</tr>
												

											</tbody>
										</table>
										</div>
									</div>
									<hr>
									@if($item->status=='pending' && $item->bukti_pembayaran ==null )
									<div class="btn mx-auto btn-primary btn-block btn-xs">
										<a href="{{route('get-pesanan',$item->id)}}" class="btn btn-primary">Bayar Sekarang</a>
									</div>
									<div class="btn mx-auto btn-warning btn-block btn-xs">
										<a href="{{route('delete-pesanan',$item->id)}}" onclick="return confirm('Anda Yakin Menghapus Pesanan?')" class="btn btn-warning">Batalkan Pesanan</a>
									</div>
									@else
									<div class="btn mx-auto btn-success btn-block btn-xs">
										<a href="{{route('detail-pesanan',$item->id)}}" class="btn btn-success">Lihat Status Pesanan</a>
									</div>
									@endif

								</div>
							</div>
						</div>
						@empty	
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
									<h2>Anda Belum membuat survey</h2>
								</div>
							</div>
						</div>



						@endforelse
						
					</div>
				</div>
			</div>
			

		@endsection