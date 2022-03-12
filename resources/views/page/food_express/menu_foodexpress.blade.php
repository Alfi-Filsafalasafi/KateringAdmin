<!-- theme -->
@extends('master.theme.theme')
<!-- navigation -->
@section('tambah_makanan_food_express','active')
<!-- title -->
@section('title','Menu Food Express')
<!-- content -->
@section('content')
<!-- /.row -->
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<button type="button" class="box-title btn btn-primary" data-toggle="modal"data-target="#modal-menu">
				Tambah Menu
				</button>
				<div class="box-tools">
						<form method="GET" action="{{route('menu_foodexpress')}}">
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
						<th>ID Menu</th>
						<th>Nama Menu</th>
						<th>Rating Menu</th>
						<th>Harga Menu</th>
						<th>Deskripsi Menu</th>
						<th>Foto Menu</th>
						<th>Min Beli</th>
						<th>Promo </th>
						<th>Stok</th>
						<th>Nama Mitra</th>
					</tr>						
					@foreach ($data as $menu)
					<tr>
						<td>{{$menu->id_menu}}</td>
						<td>{{$menu->nama_menu}}</td>
						<td>{{$menu->rating_menu}}</td>
						<td>{{$menu->harga_menu}}</td>
						<td>{{$menu->desk_menu}}</td>
						<td>
							@if($menu->foto_menu == "")
								<img class="img-thumbnail" width="100" height="100" src="{{asset('images/default.png')}}" alt="">
							@else
								<a href="{{asset('ximgnasboxyz/xmenu/foodexpress/'. $menu->foto_menu)}}">
								<img class="img-thumbnail" width="100" height="100" src="{{asset('ximgnasboxyz/xmenu/foodexpress/'. $menu->foto_menu)}}" alt="">
								</a>
							@endif
						</td>
						<td>{{$menu->min_pembelian_menu}}</td>
						<td>{{$menu->promo_menu}}</td>
						<!-- <td>
							@if($menu->foto_mitra == "")
								<img class="img-thumbnail" width="100" height="100" src="{{asset('/imgmitra/default/default.png')}}" alt="">
							@else
								<img class="img-thumbnail" width="100" height="100" src="{{asset('/imgmitra/'. $mitra->foto_mitra)}}" alt="">
							@endif
						</td> -->
						<td>{{$menu->stok_menu}}</td>
						
						<td>{{$menu->nama_mitra}}</td>
						
						<td>
							<a href="{{route('edit_food_menu', ['id_menu' => $menu->id_menu])}}" class="btn btn-block btn-info btn-xs">edit</a>
                            <a href="{{route('hapus_food_menu', ['id_menu' => $menu->id_menu])}}" class="btn btn-block btn-danger btn-xs">Hapus</a>
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
<div class="modal fade" id="modal-menu">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Menu Food Express</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{route('tambah_menu_food')}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="box-body">
						<div class="form-group">
                			<label class="col-sm-2 control-label">Mitra</label>
							<div class="col-sm-10">
								<select name="id_mitra" id="" class="form-control">
								@foreach($mitra as $mitras )
									<option value="{{ $mitras->id_mitra}} "> {{ $mitras->nama_mitra}}</option>
								@endforeach
								</select>
							</div>
            			</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Menu</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nama_menu" id="nama_menu" placeholder="Nama Menu" required="true">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Rating Menu</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="rating_menu" id="rating_menu" placeholder="Rating Menu">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Harga Menu</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="harga_menu" id="harga_menu" placeholder="Harga Menu">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Deskripsi Menu</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="desk_menu" id="desk_menu" placeholder="Deskripsi Menu">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Foto Menu</label>
							<div class="col-sm-10">
								<input type="file" name="foto_menu" id="foto_menu">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Min pembelian menu</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="min_pembelian_menu" id="min_pembelian_menu" placeholder="Min Pembelian Menu">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Promo Menu</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="promo_menu" id="promo_menu" placeholder="Promo Menu">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Stok Menu</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="stok_menu" id="stok_menu" placeholder="Promo Menu">
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