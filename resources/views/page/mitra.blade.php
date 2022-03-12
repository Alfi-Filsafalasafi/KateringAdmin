<!-- theme -->
@extends('master.theme.theme')
<!-- navigation -->
@section('mitra','active')
<!-- title -->
@section('title','Mitra')
<!-- content -->
@section('content')
<!-- /.row -->
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<button type="button" class="box-title btn btn-primary" data-toggle="modal"data-target="#modal-mitra">
				Tambah Mitra
				</button>
				<div class="box-tools">
						<form method="GET" action="{{route('mitra')}}">
					<div class="input-group input-group-sm hidden-xs" style="width: 150px;">
						<input type="text" name="cari" class="form-control pull-right" placeholder="Search" value="{{ $cari }}" >
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
						<th>ID Mitra</th>
						<th>Nama Mitra</th>
						<th>Kata Sandi Mitra</th>
						<th>Isi Toko Mitra</th>
						<th>No. Hp. Mitra</th>
						<th>Alamat Mitra</th>
						<th>Foto Mitra</th>
						<th>Tanggal Buat Mitra</th>
						<th>Kapasitas Mitra</th>
						<th>Batas Waktu Mitra</th>
						<th>Rating Mitra</th>
						<th>Status Buka Mitra</th>
						<th>Aksi</th>
					</tr>						
					@foreach ($data as $mitra)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$mitra->nama_mitra}}</td>
						<td>{{$mitra->kata_sandi_mitra}}</td>
						<td>{{$mitra->isi_toko_mitra}}</td>
						<td>{{$mitra->no_hp_mitra}}</td>
						<td>{{$mitra->alamat_mitra}}</td>
						<td>
							@if($mitra->foto_mitra == "")
								<img class="img-thumbnail" width="100" height="100" src="{{asset('/images/default.png')}}" alt="">
							@else
								<img class="img-thumbnail" width="100" height="100" src="{{asset('ximgnasboxyz/xmitra/'. $mitra->foto_mitra)}}" alt="">
							@endif
						</td>
						<td>{{$mitra->tgl_buat_mitra}}</td>
						<td>{{$mitra->kapasitas_mitra}}</td>
						<td>{{$mitra->batas_waktu_mitra}}</td>
						<td>{{$mitra->rating_mitra}}</td>
						<td>{{$mitra->status_buka_mitra}}</td>
						<td>
							<a href="{{route('edit_mitra', ['id_mitra' => $mitra->id_mitra])}}" class="btn btn-block btn-info btn-xs">edit</a>
                            <a href="{{route('hapus_mitra', ['id_mitra' => $mitra->id_mitra])}}" class="btn btn-block btn-danger btn-xs">Hapus</a>
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
<div class="modal fade" id="modal-mitra">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Mitra</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{route('tambah_mitra')}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-3 control-label">Nama Mitra</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="nama_mitra" id="nama_mitra" placeholder="Nama Mitra" required="true">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Kata Sandi Mitra</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="kata_sandi_mitra" id="kata_sandi_mitra" placeholder="Nama Pengguna Mitra">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Isi Toko Mitra</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="isi_toko_mitra" id="isi_toko_mitra" placeholder="Isi Toko Mitra">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">No. HP. Mitra</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="no_hp_mitra" id="no_hp_mitra" placeholder="No. Hp. Mitra">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Alamat Mitra</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="alamat_mitra" id="alamat_mitra" placeholder="Alamat Mitra">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Foto Mitra</label>
							<div class="col-sm-9">
								<input type="file" name="foto_mitra" id="foto_mitra">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Tanggal Buat Mitra</label>
							<div class="col-sm-9">
								<input type="date" class="form-control" name="tgl_buat_mitra" id="tgl_buat_mitra" placeholder="Tanggal Buat Mitra">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Kapasitas Mitra</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" name="kapasitas_mitra" id="kapasitas_mitra" placeholder="Kapasitas Mitra">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Batas Waktu Mitra</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" name="batas_waktu_mitra" id="batas_waktu_mitra" placeholder="Batas Waktu Mitra">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Rating Mitra</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="rating_mitra" id="rating_mitra" placeholder="Rating Mitra">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Status Buka Mitra</label>
							<div class="col-sm-9">
								<select name="status_buka_mitra" id="status_buka_mitra" class="form-control">
                    			
                        			<option value="BUKA">BUKA</option>
                        			<option value="TUTUP">TUTUP</option>
                    			
                				</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Status Layanan</label>
							<div class="col-sm-9">
								<select name="status_layanan" id="status_layanan" class="form-control">
                    			
                        			<option value="1">Catering</option>
                        			<option value="2">Food Express</option>
                        			<option value="3">Grocery</option>
                    			
                				</select>
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

<!-- /.modal -->
@endsection
<!-- end content -->