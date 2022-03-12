<!-- theme -->
@extends('master.theme.theme')
<!-- navigation -->
@section('bank','active')
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
	<form class="form-horizontal" action="{{route('update_bank', ['kode_bank' => $data->kode_bank])}}" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="box-body">
			<div class="form-group">
				<label class="col-sm-2 control-label">Id Bank</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" readonly="true" name="kode_bank" id="kode_bank" value="{{$data->kode_bank}}">
				</div>
			</div>
            <div class="form-group">
				<label class="col-sm-2 control-label">Nama Bank</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama_bank" id="nama_bank" value="{{$data->nama_bank}}">
				</div>
			</div>
            <div class="form-group">
				<label class="col-sm-2 control-label">No Virtual Account Bank</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="no_virtual_account_bank" id="no_virtual_account_bank" value="{{$data->no_virtual_account_bank}}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Foto Bank</label>
				<div class="col-sm-10">
					<input type="file" name="foto_bank" value="{{$data->foto_bank}}" id="foto_bank">
					@if($data->foto_bank == "")
					<img class="img-thumbnail" width="100" height="100" src="{{asset('/images/default.png')}}" alt="">
					@else
					<img class="img-thumbnail" width="100" height="100" src="{{asset('/ximgnasboxyz/xbank/'. $data->foto_bank)}}" alt="">
					@endif
				</div>
			</div>
			<a href="{{route('bank')}}" type="button" class="btn btn-default pull-left">Cancel</a>
			<button type="submit" class="btn btn-primary pull-right">Save changes</button>
		</form>
	</div>
	@endsection
	<!-- end content -->