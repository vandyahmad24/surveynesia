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
			
				<div class="page-inner mt--5">
					<div class="row mt--2">
                   	<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-body col-md-12">
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