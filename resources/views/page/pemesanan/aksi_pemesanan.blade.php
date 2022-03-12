<!-- theme -->
@extends('master.theme.theme')
<!-- navigation -->
@section('pemesanan','active')
<!-- title -->
@section('title','Detail Pemesanan')
<!-- content -->
@section('content')
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Detail Pemesanan </h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form class="form-horizontal" action="{{route('aksi_pesan', ['kode_transaksi' => $data->kode_transaksi])}}" method="POST" enctype="multipart/form-data" >
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
    
		<div class="box-body">
			<div class="form-group">
				<label class="col-sm-2 control-label">Kode Transaksi &nbsp &nbsp &nbsp=</label>
				<label class="col-sm-2 control-label" >{{$data->kode_transaksi}}</label>
				<label class="col-sm-3 control-label">Nama Pemesan &nbsp &nbsp &nbsp=</label>
				<label class="col-sm-4 control-label">{{$data->nama_customer}}</label>
				<label class="col-sm-2 control-label">Nama Driver &nbsp &nbsp &nbsp=</label>
				<label class="col-sm-2 control-label">{{$data->nama_driver}}</label>
				<label class="col-sm-3 control-label">Nama Penerima &nbsp &nbsp &nbsp=</label>
				<label class="col-sm-4 control-label">{{$data->nama_penerima}}</label>
				<label class="col-sm-2 control-label">Kategori Layanan &nbsp &nbsp &nbsp=</label>
				<label class="col-sm-2 control-label">{{$data->kategori_layanan}}</label>
				<label class="col-sm-3 control-label">No HP Penerima &nbsp &nbsp &nbsp=</label>
				<label class="col-sm-4 control-label">{{$data->no_hp_penerima}}</label>
				<label class="col-sm-2 control-label">Metode Pembayaran  &nbsp=</label>
				<label class="col-sm-2 control-label">{{$data->metode_pembayaran}}</label>
				<label class="col-sm-3 control-label">Bank &nbsp &nbsp &nbsp=</label>
				<label class="col-sm-4 control-label">{{$data->nama_bank}}</label>	
				<label class="col-sm-2 control-label">--------------------------------</label>
				<label class="col-sm-2 control-label">--------------------------------</label>
				<label class="col-sm-3 control-label">----------------------------------------------------</label>
				<label class="col-sm-4 control-label">------------------------------------------------------------------------</label>
				<label class="col-sm-2 control-label">Waktu Transaksi &nbsp &nbsp &nbsp=</label>
				<label class="col-sm-2 control-label">{{$data->waktu_transaksi}}</label>
				<label class="col-sm-3 control-label">Waktu Pengantaran &nbsp &nbsp &nbsp=</label>
				<label class="col-sm-4 control-label">{{$data->diantar_waktu_transaksi}}</label>
				<label class="col-sm-2 control-label">--------------------------------</label>
				<label class="col-sm-2 control-label">--------------------------------</label>
				<label class="col-sm-3 control-label">----------------------------------------------------</label>
				<label class="col-sm-4 control-label">------------------------------------------------------------------------</label>
				
				

				<div class="col-sm-12">
				
					<div class="box-body table-responsive no-padding">
						<table class="table text-center table-bordered table-hover ">
							<tr>
								<th>Nomor</th>
								<th>Menu</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Promo</th>
								<th>Kode Voucher</th>
								<th>Sub Total</th>
							</tr>
							@foreach ($detail as $menu)
							<tr>
								<td>{{$loop->iteration}}</td>
								<!-- <td>{{$menu->nama_menu}}</td> -->

								<td>{{$menu->nama_menu}}</td>
								<td>{{$menu->harga_menu}}</td>
								<td>{{$menu->jumlah_detail}}</td>
								<td>{{$menu->promo_transaksi}}</td>
								<td>{{$menu->kode_voucher}}</td>
								<td>{{$menu->total_transaksi}}</td>
							</tr>
							@endforeach				
						</table><br>
						<div class="pull-left">
						</div>
					</div>
				</div>
				<label class="col-sm-2 control-label">--------------------------------</label>
				<label class="col-sm-2 control-label">--------------------------------</label>
				<label class="col-sm-3 control-label">----------------------------------------------------</label>
				<label class="col-sm-4 control-label">------------------------------------------------------------------------</label>
				<label class="col-sm-2 control-label">Ongkos Kirim &nbsp &nbsp &nbsp=</label>
				<label class="col-sm-2 control-label">{{$data->ongkos_kirim_transaksi}}</label>
				<label class="col-sm-3 control-label">Total  &nbsp &nbsp &nbsp=</label>
				<label class="col-sm-4 control-label">{{$data->total_transaksi}}</label>
				<label class="col-sm-2 control-label">--------------------------------</label>
				<label class="col-sm-2 control-label">--------------------------------</label>
				<label class="col-sm-3 control-label">----------------------------------------------------</label>
				<label class="col-sm-4 control-label">------------------------------------------------------------------------</label>
				
			</div>
			
            <a href="{{route('terima_pesan',['kode_transaksi' =>$data->kode_transaksi])}}" type="button" class="btn btn-blue  " style="background-color:blue; color:white; " >Terima Pesanan</a>
			<a href="{{route('batal_pesan',['kode_transaksi' =>$data->kode_transaksi])}}" type="button" class="btn btn-danger  ">Batalkan Pesanan</a>
			<a href="{{route('list_pemesanan')}}" type="button" class="btn btn-default  ">Cancel</a>
			
			

        </div>
	</form>
	</div>
	@endsection
	<!-- end content -->