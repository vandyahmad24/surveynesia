@extends('layouts.backend')
@section('title','Halaman Admin')
@section('content')
	<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Halaman Konfigurasi</h2>
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
									<div class="card-title">Daftar Konfigurasi</div>
										@if (session('success'))
					                    <div class="alert alert-success">
					                        {{ session('success') }}
					                    </div>
					                @endif
					                @if (session('delete'))
					                    <div class="alert alert-danger">
					                        {{ session('delete') }}
					                    </div>
					                @endif
									<button type="button" class="btn btn-success mt-2 edit-survey" data-toggle="modal" data-target="#tambahkonfigurasi">
									  Tambah Konfigurasi
									</button>
									<div class="table-responsive">
									<table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
										<thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col">Kategori</th>
												<th scope="col">Deskripsi </th>
												<th scope="col">Harga</th>
												<th scope="col">Aksi</th>
											</tr>
										</thead>
										<tbody>
											@foreach($konfigurasi as $konfig)
											<tr>
												<td>{{$loop->iteration}}</td>
												<td>{{$konfig->kategori}}</td>
												<td>{{$konfig->deskripsi}}</td>
												<td> @if($konfig->kategori=='perkerjaan') Tanpa Harga @else  {{$konfig->harga}} @endif</td>
												<td> <div class="d-flex">
													<button type="button" class="btn btn-warning mr-2 edit-konfigurasi" data-toggle="modal" data-target="#editkonfigurasi" data-id="{{$konfig->id}}">
													  Edit
													</button>
													 <a href="{{route('delete-konfigurasi',$konfig->id)}}" onclick="return confirm('Anda Yakin Menghapus Pesanan?')" class="btn btn-danger">Hapus</a>
													</div>

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
		<div class="modal fade" id="tambahkonfigurasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Tambah Konfigurasi</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			       <form action="{{route('tambah-konfigurasi')}}" method="POST">
        			@csrf    
			        <div class="form-group">
						<label for="deskripsi">Nama Konfigurasi</label>
						<input type="text" class="form-control" id="deskripsi" name="deskripsi">
					</div>
					<div class="form-group">
					<label for="status">Kategori Konfigurasi</label>
					<select class="form-control" name="kategori" id="kategori">
						<option value="jangka_waktu">Jangka Waktu</option>
						<option value="kategori">Kategori Survey</option>
						<option value="perkerjaan">Perkerjaan</option>
					</select>
					</div>
					 <div class="form-group">
						<label for="harga">Value Harga </label>
						<input type="number" class="form-control" id="harga" name="harga">
						<small id="icon" class="form-text text-muted">Value Harga Sesuai yang ditetapkan. untuk kategori perkerjaan 0</small>
					</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Save changes</button>
			      </div>
			      </form>
			    </div>
			  </div>
			</div>

			{{-- Modal Edit --}}
			<div class="modal fade" id="editkonfigurasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Tambah Konfigurasi</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			       <form action="{{route('put-konfigurasi')}}" method="POST">
        			@csrf    
			        <div class="form-group">
						<label for="deskripsi">Nama Konfigurasi</label>
						<input type="hidden" name="id" id="id">
						<input type="text" class="form-control" id="edit_deskripsi" name="deskripsi">
					</div>
					<div class="form-group">
					<label for="status">Kategori Konfigurasi</label>
					<select class="form-control" name="kategori" id="edit_kategori">
						<option value="jangka_waktu">Jangka Waktu</option>
						<option value="kategori">Kategori Survey</option>
						<option value="perkerjaan">Perkerjaan</option>
						<option value="primary">Primary</option>
					</select>
					</div>
					 <div class="form-group">
						<label for="harga">Value Harga </label>
						<input type="number" class="form-control" id="edit_harga" name="harga">
						<small id="icon" class="form-text text-muted">Value Harga Sesuai yang ditetapkan. untuk kategori perkerjaan 0</small>
					</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Save changes</button>
			      </div>
			      </form>
			    </div>
			  </div>
			</div>
		
	<script type="text/javascript">
	$(document).ready(function() {
		$(".edit-konfigurasi").on("click",function(){
			var id = $(this).attr("data-id");
			var url = "{{route('edit-konfigurasi')}}"+"?id="+id;
			console.log(url);
			 $.ajax({
	            type:"get",
	            url:url,
	            success:function(data){
	                console.log(data);
	               $("#id").val(data.id);
	               $("#edit_deskripsi").val(data.deskripsi);
	               $("#edit_kategori").val(data.kategori);
	               $("#edit_harga").val(data.harga);
	            }
	            
	        });
		});

	});
	</script>
		@endsection