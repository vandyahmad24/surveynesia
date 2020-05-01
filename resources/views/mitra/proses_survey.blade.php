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
												@if($item->status=='pending' && $item->bukti_pembayaran ==null && $item->surveyor_id == null)
												<tr class="table-warning">
													<td>Status</td>
													<td>Pending, Menunggu Pembayaran</td>
												</tr>
												@elseif($item->status='pending' && $item->bukti_pembayaran !== null && $item->surveyor_id == null)
												<tr class="table-info">
													<td>Status</td>
													<td>Pesanan Dalam Proses, Menunggu konfirmasi Pembayaran</td>
												</tr>
												@elseif($item->status='proses' && $item->bukti_pembayaran !== null && $item->surveyor_id != null)
												<tr class="table-success">
													<td>Status</td>
													<td>Survey dalam Proses Pengerjaan</td>
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
											</tbody>
										</table>
										<div class="btn mx-auto btn-secondary btn-block btn-xs">
										<a href="{{route('detail-laporan-harian',$item->id)}}" class="btn btn-secondary">Lihat Detail</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						@empty
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
									<h2>Belum Mendapatkan Tugas Survey</h2>
								</div>
							</div>
						</div>
						@endforelse
						
					</div>
				</div>
			</div>
			

		@endsection