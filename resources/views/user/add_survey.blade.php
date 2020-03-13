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
			
				<div class="page-inner mt--5">
					<div class="row mt--2">
                     <div class="col-md-12">
							<div class="card full-height">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Buat Survey</div>
									<div class="card-category">
									Anda membuat survey <span class="text-success">	{{$jenis_survey->nama_survey}}</span> 
									</div>
								</div>
								<div class="card-body">
								 <form action="{{route('post-survey')}}" method="POST" enctype="multipart/form-data">
        						@csrf    
        						<input type="hidden" name="jenis_survey_id" value="{{$jenis_survey->id}}">
									<div class="form-group">
										<label for="">Nama Survey </label>
										<input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" >
										 @error('nama')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
									</div>
									<div class="form-group">
										<label for="">Deskripsi Survey </label>
										<textarea class="form-control" id="deskripsi_survey" name="deskripsi" rows="5">
										</textarea>
										<small id="deskripsi_survey" class="form-text text-muted">Isikan Deskripsi Mengenai Survey yang anda inginkan</small>
										 @error('deskripsi')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
									</div>
									<hr>
									<div class="card-title">Detail Survey</div>
									<div class="d-flex flex-row">
									<div class="form-group">
										<label for="">Provinsi</label>
										<select class="form-control" name="provinsi" id="provinsi">
											<option value="0">Pilih Provinsi</option>
											@foreach($provinsi as $item)
											<option value="{{$item->id}}">{{$item->name}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label for="">Kota</label>
										<select class="form-control" name="kota" id="kota">
											<option value="0">Pilih Provinsi Terlebih Dahulu</option>
										</select>
									</div>
									</div>
									<div class="form-group">
										<label class="form-check-label">
											<input type="checkbox" id="wilayah_bebas">
											<span class="form-check-sign">Wilayah bebas</span>
										</label>
									</div>
									<div class="form-group">
										<label for="">Jumlah Data</label>
										<input type="number" id="jumlah_data" name="jumlah_data" class="form-control" placeholder="99" >
										@error('jumlah_data')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
									</div>
									<div class="form-check">
										<label>Target Data</label><br>
										@foreach($kategori as $item)
										<label class="form-radio-label ml-3">
											<input class="form-radio-input kategori_survey" type="radio" name="kategori_survey" data-price="{{$item->harga}}" value="{{$item->id}}">
											<span class="form-radio-sign">{{$item->deskripsi}}</span>
										</label>
										@endforeach
										@error('kategori_survey')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
									</div>
									<div class="form-group">
										<label for="">Jangka Waktu</label>
										<select class="form-control" name="jangka_waktu" id="jangka_waktu">
											<option value="0">Pilih Jangka Waktu</option>
											@foreach($waktu as $item)
											<option value="{{$item->id}}" data-price="{{$item->harga}}">{{$item->deskripsi}}</option>
											@endforeach
										</select>
										<small id="jangka_waktu_ket" class="form-text text-muted">Jangka Waktu Default Kami adalah 4 Minggu, tapi kami dapat menyediakan hasil survey lebih cepat.</small>
										@error('jangka_waktu')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
									</div>
									<div class="form-group">
										<label for="">Upload Surat Ijin Survey</label>
										<input type="file" name="upload" class="form-control" id="upload">
										<small id="upload" class="form-text text-muted">Upload Surat Ijin Survey jika anda memiliki surat ijin resmi. (Extensi pdf / doc)</small>
										@error('upload')
										  <small class="form-text text-muted text-danger" role-alert>{{ $message }}</small>
                                          @enderror
									</div>
									<div class="d-inline-flex">

									<button type="submit" class="ml-3 btn btn-success">Submit</button>
									<h1 class="ml-4 mt-2"><span>Rp </span><span id="harga"></span> </h1>
									</form>
									</div>
									
								</div>
								
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		<script>
		$( document ).ready(function() {

			var harga_dasar = {{$harga_dasar->harga}};
			var total = 0;
               $("#provinsi").change(function(){
                var prov_id = $(this).val();
                console.log(prov_id);
                   $.ajax({
                    url: "{{route('get-kabupaten')}}",
                    type: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        prov_id:prov_id
                    },
                    success: function(data) {
                        $('#kota').empty()
                        $.each(data, function (key, val) {
                                $('#kota').append(`<option value="${val.id}"> 
                                       ${val.name} 
                                  </option>`); 
                            });
                    }
                       
                   });
                });
      function toCommas(value) {
    	return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	  }	
	   var update_wilayah = function () {
	    if ($("#wilayah_bebas").is(":checked")) {
	    	$('#provinsi').prop('disabled', 'disabled');
	    	$('#provinsi').val("");
	    	$('#kota').val("");
	        $('#kota').prop('disabled', 'disabled');
	    }
	    else {
	    	$('#provinsi').prop('disabled', false);
	        $('#kota').prop('disabled', false);
	    }
	  };
	  $(update_wilayah);
	  $("#wilayah_bebas").change(update_wilayah);
  
	  var konten = document.getElementById("deskripsi_survey");
	    CKEDITOR.replace(konten,{
	    language:'en-gb'
	  });
	  CKEDITOR.config.allowedContent = true;
	 var total_survey = 0;
	  $("#jumlah_data").keyup(function(){
	  	 var jumlah_data = $(this).val();
	  	 var harga_data = (jumlah_data*harga_dasar);
	  	 $("#harga").text(toCommas(harga_data)+" Pilih Target Data dan Jangka Waktu");
	  	 $(".kategori_survey").prop('checked', false);
	  	 $("#jangka_waktu").val("0");
	  	 total = harga_data;
	  	 console.log(total);
	  });

	  $(".kategori_survey").on("click",function(){
	  	var kategori_survey = $(this).attr("data-price");
	  	var harga_survey = (kategori_survey/100*total);
	  	total_survey = harga_survey+total;
	  	$("#jangka_waktu").val("0");
	  	$("#harga").text(toCommas(total_survey)+ " Pilih Jangka Waktu");
	  	 console.log(total_survey);
	  	
	  });
	  $("#jangka_waktu").on("change",function(){
	  	var jangka_waktu = $('#jangka_waktu option:selected').attr('data-price');
	  	var harga_waktu = (jangka_waktu/100*total);
	  	console.log('harga_waktu '+harga_waktu);
	  	total_semua = harga_waktu + total_survey;	
	  	$("#harga").text(toCommas(total_semua));
	  	console.log(total_semua);
	  	
	  });
	 
	  	   
}); 
		</script>
		@endsection