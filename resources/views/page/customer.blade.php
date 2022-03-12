<!-- theme -->
@extends('master.theme.theme')
<!-- navigation -->
@section('dashboard','active')
<!-- title -->
@section('title','List User')
<!-- content -->
@section('content')
<!-- /.row -->
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				List User
				<div class="box-tools">
						<form method="GET" action="{{route('customer')}}">
					<div class="input-group input-group-sm hidden-xs" style="width: 150px;">
						<input type="text" name="cari" value="{{$cari}}" class="form-control pull-right" placeholder="Search">
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
						<th>No</th>
						<th>ID</th>
						<th>Nama Customer</th>
						<th>No HP</th>
						<th>Foto Costumer</th>
						<th>Alamat</th>
						<th>Email</th>
						<th>Saldo</th>
					</tr>						
					@foreach ($data as $custom)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$custom->id_customer}}</td>
						<td>{{$custom->nama_customer}}</td>
						<td>{{$custom->no_hp_customer}}</td>
						<td>{{$custom->foto_custumer}}</td>
						<td>{{$custom->alamat_customer}}</td>
						<td>{{$custom->email_customer}}</td>
						<td>{{$custom->saldo_customer }}</td>
						
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



<!-- /.modal -->
@endsection
<!-- end content -->