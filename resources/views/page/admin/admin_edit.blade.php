<!-- theme -->
@extends('master.theme.theme')
<!-- navigation -->
@section('akun','active')
<!-- title -->
@section('title','Admin Edit')
<!-- content -->
@section('content')
<!-- /.row -->
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Edit Admin</h3>
	</div>
    <form class="form-horizontal" action="{{route('simpan_foto', ['id' => $data->id])}}" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="box-body">
                <div class="form-group">
                    
                <label class="col-sm-2 control-label">Id Bank</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="name" value="{{ $data->name }}" required>
                        <div class="invalid-feedback">
                            Nama Akun Tidak Boleh Kosong.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="email">Email</label>
                    <div class="col-sm-8">
                        @if (Auth::user()->name == $data->name)
                        <input readonly class="form-control" autocomplete="off" type="text" name="email" value="{{ $data->email }}" required>
                        @else
                        <input class="form-control" type="text" name="email" value="{{ $data->email }}" required>
                        @endif
                        <div class="valid-feedback">
                        Mohon Untuk Mengganti Email Jika Tersedia.
                        </div>  
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="password">password </label>
                    <div class="col-sm-8">
                        <input class="form-control" type="password" name="password">
                        <div class="valid-feedback">
                            Mohon Untuk Mengganti Password Jika Tersedia.
                        </div>
                    </div>
                    
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Upload Foto</label>
                    <div class="col-sm-8">
                        <input type="file" class="" id="image" name="foto" >
                        <div class="valid-feedback">
                            Mohon Untuk Mengganti Foto Jika Tersedia.
                        </div>
                    </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 control-label" for="">Mitra</label>
                <div class="col-sm-9">            
                     <select name="id_level" id="" class="form-control">
                        @foreach($level as $levels )
                	       <option 
                             value="{{ $levels->id_level }} "
                                @if ($levels->id_level === $data->id_level)
                                      selected
                                @endif
                           > 
                              {{ $levels->level}}
                            </option>
                        @endforeach
                     </select>
                </div>  
            <div class="form-group">
                <label class="col-sm-2 control-label " for=""></label>
                <div class="col-sm-9">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Data Yang Dimasukkan Telah Benar.
                        </label>
                        <div class="invalid-feedback">
                            Anda Harus Memasukkan Data Dengan Lengkap..!
                        </div>
                    </div>
                </div>
                
            </div>
            </div>
            <a href="{{route('akun')}}" type="button" class="btn btn-default pull-left">Cancel</a>
			<button type="submit" class="btn btn-primary pull-right">Save changes</button>
         
    </form>
</div>
@endsection