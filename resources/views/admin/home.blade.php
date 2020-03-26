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
			
				<div class="page-inner mt--5">
					<div class="row mt--2">
                     <div class="col-md-12">
							<div class="card full-height">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Daftar Jenis Survey</div>
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
									<table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
										<thead>
											<tr>
												<th scope="col">No</th>
												<th scope="col">Nama Survey</th>
												<th scope="col">Deskripsi </th>
												<th scope="col">Icon</th>
												<th scope="col">Status</th>
												<th scope="col">Aksi</th>
											</tr>
										</thead>
										<tbody>
											@foreach($jenis_survey as $jenis)
											<tr>
												<td>{{$loop->iteration}}</td>
												<td>{{$jenis->nama_survey}}</td>
												<td>{{$jenis->deskripsi}}</td>
												<td><i class="{{$jenis->icon}}"></i></td>

												@if($jenis->is_active==0) <td  class="table-danger">Tidak Aktif</td> @else <td class="table-primary"> Aktif </td> @endif
												<td> <div class="d-flex">
													<button type="button" class="btn btn-warning mr-2 edit-survey" data-toggle="modal" data-target="#exampleModal" data-id="{{$jenis->id}}">
													  Edit
													</button>
													 <a href="{{route('delete-jenis-survey',$jenis->id)}}" onclick="return confirm('Anda Yakin Menghapus Pesanan?')" class="btn btn-danger">Hapus</a>
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
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Survey</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			       <form action="{{route('put-jenis-survey')}}" method="POST">
        			@csrf    
			        <div class="form-group">
						<label for="nama_survey">Nama Survey</label>
						<input type="hidden" name="id" id="id">
						<input type="text" class="form-control" id="nama_survey" name="nama_survey" placeholder="Mohon Tunggu">
					</div>
					<div class="form-group">
						<label for="deskripsi">Deskripsi Survey</label>
						<textarea class="form-control" id="deskripsi" rows="5" name="deskripsi">
							Mohon Tunggu
						</textarea>
					</div>
					<div class="form-group">
						<label for="deskripsi">Icon Survey</label>
						<input type="text" class="form-control" id="icon" name="icon" placeholder="Mohon Tunggu">
						<small id="icon" class="form-text text-muted">Icon Survey di dapat dari class di website fontawesome.</small>
					</div>
					<div class="form-group">
					<label for="status">Status Survey</label>
					<select class="form-control" name="is_active" id="status">
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
					</select>
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
		$(".edit-survey").on("click",function(){
			var id = $(this).attr("data-id");
			var url = "{{route('edit-jenis-survey')}}"+"?id="+id;
			console.log(url);
			 $.ajax({
	            type:"get",
	            url:url,
	            success:function(data){
	                console.log(data);
	               $("#id").val(data.id);
	               $("#nama_survey").val(data.nama_survey);
	               $("#deskripsi").text(data.deskripsi);
	               $("#icon").val(data.icon);
	               $("#status").val(data.is_active);
	            }
	            
	        });
		});

	});
	</script>
		@endsection