<!-- theme -->
@extends('master.theme.theme')
<!-- navigation -->
@section('mitra','active')
<!-- title -->
@section('title','Edit Mitra')
<!-- content -->
@section('content')
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Edit Mitra</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form class="form-horizontal" action="{{route('update_mitra', ['id_mitra' => $data->id_mitra])}}" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="box-body">
			<div class="form-group">
				<label class="col-sm-2 control-label">Id Mitra</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" readonly="true" name="id_mitraa" id="id_mitra" value="{{$data->id_mitra}}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama Mitra</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="nama_mitra" id="nama_mitra" value="{{$data->nama_mitra}}">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">Kata Sandi Mitra</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="kata_sandi_mitra" id="kata_sandi_mitra" value="{{$data->kata_sandi_mitra}}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Isi Toko Mitra</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="isi_toko_mitra" id="isi_toko_mitra" value="{{$data->isi_toko_mitra}}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">No. HP. Mitra</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="no_hp_mitra" id="no_hp_mitra" value="{{$data->no_hp_mitra}}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Alamat Mitra</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="alamat_mitra" id="alamat_mitra" value="{{$data->alamat_mitra}}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Foto Mitra</label>
				<div class="col-sm-10">
					<input type="file" name="foto_mitra" value="{{$data->foto_mitra}}" id="foto_mitra">
					@if($data->foto_mitra == "")
					<img class="img-thumbnail" width="100" height="100" src="{{asset('/images/default.png')}}" alt="">
					@else
					<img class="img-thumbnail" width="100" height="100" src="{{asset('ximgnasboxyz/xmitra/'. $data->foto_mitra)}}" alt="">
					@endif
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tanggal Buat Mitra</label>
				<div class="col-sm-9">
					<input type="date" class="form-control" name="tgl_buat_mitra" id="tgl_buat_mitra" value="{{$data->tgl_buat_mitra}}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kapasitas Mitra</label>
				<div class="col-sm-9">
					<input type="number" class="form-control" name="kapasitas_mitra" id="kapasitas_mitra" value="{{$data->kapasitas_mitra}}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Batas Waktu Mitra</label>
				<div class="col-sm-9">
					<input type="number" class="form-control" name="batas_waktu_mitra" id="batas_waktu_mitra" value="{{$data->batas_waktu_mitra}}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Rating Mitra</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="rating_mitra" id="rating_mitra" value="{{$data->rating_mitra}}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status Buka Mitra</label>
				<div class="col-sm-9">
					<select name="status_buka_mitra" id="status_buka_mitra" class="form-control">
                    	<option value="Buka">Buka</option>
                        <option value="Tutup">Tutup</option>			
                	</select>
				</div>
			</div>
			<a href="{{route('mitra')}}" type="button" class="btn btn-default pull-left">Cancel</a>
			<button type="submit" class="btn btn-primary pull-right">Save changes</button>
		</form>
	</div>
	@endsection
	<!-- end content -->