<!-- theme -->
@extends('master.theme.theme')
<!-- navigation -->
@section('akun','active')
<!-- title -->
@section('title','Admin')
<!-- content -->
@section('content')
<!-- /.row -->
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <button type="button" class="box-title btn btn-primary" data-toggle="modal"data-target="#exampleModal">
				  Tambah Akun
				</button>
        <div class="box-tools">
						<form method="GET" action="{{route('akun')}}">
					    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
						    <input type="text" name="cari" value="{{$cari}}" class="form-control pull-right" placeholder="Search" value="{{old('cari')}}">
						    <div class="input-group-btn">
							    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
						    </div>
              </div>
						</form>
				</div>
      </div>
      <div class="border" style="padding: 10px;">
        <div class="table-responsive">
          <table class="mb-0 table text-center table-bordered">
            <thead class="bg-info text-center text-white">
              <tr>
                <th>Id</th>
                <th>Nama Akun</th>
                <th>Email</th>
                <th>Foto</th>
                <th>Level</th>
                <th>Tanggal Registrasi</th>
                <th>Tanggal Update</th>
                <th>Aksi</th>
              </tr>
            </thead>
          <tbody>
            @foreach ($data as $getakun)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$getakun->name}}</td>
              <td>{{$getakun->email}}</td>
              <td>
                @if($getakun->foto == "")
                <img src="{{asset('images/default.png')}}" width="50px">
                @else
                <a href="{{asset('/ximgnasboxyz/xakun/'.$getakun->foto)}}"><img  class="img-thumbnail" width="70" height="70"  src="{{asset('/ximgnasboxyz/xakun/' .$getakun->foto)}}"></a>
              </a>
              @endif
            </td>
            <td>{{$getakun->level}}
            </td>
            <td>{{$getakun->created_at}}</td>
            <td>{{$getakun->updated_at}}</td>
            <td>
              @if ($getakun->name == Auth::user()->name)
              <a href = "" class="btn btn-block btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Anda Tidak Bisa Menghapus Akun Yang Sedang Aktif"> hapus</a>
              </button>
              @else
              <a href="{{ route('hapus_akun',['id' => $getakun->id]) }}" class="btn btn-block btn-danger btn-xs"> Hapus</a>
              
              @endif
              <a href="{{ route('edit_akun',['id' => $getakun->id]) }}" class="btn btn-block btn-info btn-xs"> Edit</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table><br>
      {{ $data->links() }}
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah </h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{route('tambah_akun')}}" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="box-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Admin</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="name" id="name" placeholder="Nama Admin" required="true">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="email" id="email" placeholder="Email">
							</div>
						</div>
            <div class="form-group">
							<label class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="password" id="password" placeholder="password">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Foto Admin</label>
							<div class="col-sm-10">
								<input type="file" name="foto" id="foto">
							</div>
						</div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Mitra</label>
							<div class="col-sm-10">
								<select name="id_level" id="" class="form-control">
                  @foreach($level as $levels )
                		<option value="{{ $levels->id_level}} "> {{ $levels->level}}</option>
            			@endforeach
          			</select>
							</div>
                			
            	</div>
            

            <!-- <div class="form-group">
              <label for="nama" class="col-sm-2 control-label">Level</label>
              <div class="col-sm-10">
                  <select class="custom-select "  id="inputGroupSelect01" required="true" name="is_admin">
                    <option disabled="true" selected="true">---pilih level---</option>
                    <option value="super_admin" name="super_admin"> Super Admin</option>
                    <option value="admin" name="admin">Admin</option>
                  </select>
              </div>
            </div> -->
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
@endsection