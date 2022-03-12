<!-- theme -->
@extends('master.theme.theme')
<!-- navigation -->
@section('tambah_makanan_food_express','active')
<!-- title -->
@section('title','Edit Menu Grocery')
<!-- content -->
@section('content')
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Edit Menu Foodexpress</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form class="form-horizontal" action="{{route('update_food', ['id_menu' => $data->id_menu])}}" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="box-body">
			<div class="form-group">
				<label class="col-sm-2 control-label">Id Menu</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" readonly="true" name="id_menu" id="id_menu" value="{{$data->id_menu}}">
				</div>
			</div>
            <div class="form-group">
				<label class="col-sm-2 control-label">Nama Menu</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama_menu" id="nama_menu" value="{{$data->nama_menu}}">
				</div>
			</div>
            <div class="form-group">
				<label class="col-sm-2 control-label">Rating Menu</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="rating_menu" id="rating_menu" value="{{$data->rating_menu}}">
				</div>
			</div>
            <div class="form-group">
				<label class="col-sm-2 control-label">Deskripsi Menu</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="desk_menu" id="desk_menu" value="{{$data->desk_menu}}">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Foto Menu</label>
				<div class="col-sm-10">
					<input type="file" name="foto_menu" value="{{$data->foto_menu}}" id="foto_menu" >
					@if($data->foto_menu == "")
					<img class="img-thumbnail" width="100" height="100" src="{{asset('images/default.png')}}" alt="">
					@else
					<a href="{{asset('ximgnasboxyz/xmenu/foodexpress/'. $data->foto_menu)}}">
					<img class="img-thumbnail" width="100" height="100" src="{{asset('ximgnasboxyz/xmenu/foodexpress/'. $data->foto_menu)}}" alt="">
					</a>
					@endif
				</div>
			</div>
            <div class="form-group">
				<label class="col-sm-2 control-label">Min Pembelian Menu</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="min_pembelian_menu" id="min_pembelian_menu" value="{{$data->rating_menu}}">
				</div>
			</div>
            <div class="form-group">
				<label class="col-sm-2 control-label">Promo Menu</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="promo_menu" id="promo_menu" value="{{$data->rating_menu}}">
				</div>
			</div>
            <div class="form-group">
				<label class="col-sm-2 control-label">Stok Menu</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="stok_menu" id="stok_menu" value="{{$data->rating_menu}}">
				</div>
			</div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="">Mitra</label>
                <div class="col-sm-10">            
                                    <select name="id_mitra" id="" class="form-control">
                                        @foreach($mitra as $mitras )
                                            <option 
                                                value="{{ $mitras->id_mitra }} "
                                                @if ($mitras->id_mitra === $data->id_mitra)
                                                    selected
                                                @endif
                                                >
                                                {{ $mitras->nama_mitra}}
                                            </option>
                                        @endforeach
                                    </select>
                </div>  
            </div>
			<a href="{{route('menu_foodexpress')}}" type="button" class="btn btn-default pull-left">Cancel</a>
			<button type="submit" class="btn btn-primary pull-right">Save changes</button>
		</form>
	</div>
	@endsection
	<!-- end content -->