<!-- theme -->
@extends('master.theme.theme')
<!-- navigation -->
@section('bank','active')
<!-- title -->
@section('title','Bank')
<!-- content -->
@section('content')
<!-- /.row -->
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<button type="button" class="box-title btn btn-primary" data-toggle="modal"data-target="#modal-bank">
				Tambah Bank
				</button>
				<div class="box-tools">
						<form method="GET" action="{{route('bank')}}">
					<div class="input-group input-group-sm hidden-xs" style="width: 150px;">
						<!-- <input type="text" value="{{old('cari')}}" name="cari"  class="form-control pull-right" placeholder="Search" aria-label="search" aria-describedby="basic-addon2" > -->
						<input type="text" class="form-control shadow-sm small" value="{{$cari}}" name="cari" placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2">
						<div class="input-group-btn">
							<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table text-center table-bordered table-hover">
					<tr>
						<th>Kode Bank</th>
						<th>Nama Bank</th>
						<th>No Virtual</th>
					</tr>						
					@foreach ($data as $bank)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$bank->nama_bank}}</td>
						<td>{{$bank->no_virtual_account_bank}}</td>
						<td>
							@if($bank->foto_bank == "")
								<img class="img-thumbnail" width="100" height="100" src="{{asset('/images/default.png')}}" alt="">
								<!-- <img src="{{asset('images/default.png')}}" width="50px"> -->

							@else
								<a href="{{asset('/ximgnasboxyz/xbank/'. $bank->foto_bank)}}">
									<img class="img-thumbnail" width="100" height="100" src="{{asset('/ximgnasboxyz/xbank/'. $bank->foto_bank)}}" alt="">
								</a>
							@endif
						</td>
						<td>	
							<a href="{{route('edit_bank', ['kode_bank' => $bank->kode_bank])}}" class="btn btn-block btn-info btn-xs">edit</a>
                            <a href="{{route('hapus_bank', ['kode_bank' => $bank->kode_bank])}}" class="btn btn-block btn-danger btn-xs" >Hapus</a>	
						</td>

					</tr>
					@endforeach
				</table><br>
				<div class="pull-left">
					{{$data->links()}}
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>
<div class="modal fade" id="modal-bank">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah </h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{route('tambah_bank')}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Bank</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nama_bank" id="nama_bank" placeholder="Nama Bank" required="true">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Pengguna Mitra</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="no_virtual_account_bank" id="no_virtual_account_bank" placeholder="No Virtual Account Bank">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Foto Bank</label>
							<div class="col-sm-10">
								<input type="file" name="foto_bank" id="foto_bank">
							</div>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<script>
  function konfirmasi(){
         var tanya = confirm("Apakah Anda Akan Menghapus Data Ini ?");
		if {(tanya ===true)

		}else{

		}
        //  document.getElementById("pesan").innerHTML = pesan;
      }
</script>

<!-- /.modal -->
@endsection
<!-- end content -->