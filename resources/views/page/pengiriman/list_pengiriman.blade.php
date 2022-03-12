<!-- theme -->
@extends('master.theme.theme')
<!-- navigation -->
@section('status_pengiriman','active')
<!-- title -->
@section('title','List Pengiriman')
<!-- content -->
@section('content')
<!-- /.row -->
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				List Pemesanan
				<div class="box-tools">
						<form method="GET" action="{{route('list_pengiriman')}}">
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
						<th>Kode Transaksi</th>
						<th>Nama Mitra</th>
						<th>No HP</th>
						<th>Waktu Transaksi</th>
						<th>Diantar</th>
						<th>Ongkir</th>
						<th>total</th>
						<th>Pemesan </th>
						<th>Alamat</th>
						<th>Kategori</th>
					</tr>						
					@foreach ($data as $menu)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$menu->kode_transaksi}}</td>
						<td>{{$menu->nama_mitra}}</td>
						<td>{{$menu->no_hp_mitra}}</td>
						<td>{{$menu->waktu_transaksi}}</td>
						<td>{{$menu->diantar_waktu_transaksi}}</td>
						<td>{{$menu->ongkos_kirim_transaksi}}</td>
						<td>{{$menu->total_transaksi}}</td>
						<td>{{$menu->nama_customer}}</td>
						<td>{{$menu->alamat_customer}}</td>
						<td>{{$menu->kategori_layanan }}</td>
						<td>
							<a href="{{route('aksi_kirim', ['kode_transaksi' => $menu->kode_transaksi])}}" class="btn btn-block btn-info btn-xs">detail</a>
                            
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



<!-- /.modal -->
@endsection
<!-- end content -->