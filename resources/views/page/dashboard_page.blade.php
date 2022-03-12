<!-- theme -->
@extends('master.theme.theme')
<!-- navigation -->
@section('dashboard','active')
<!-- title -->
@section('title','dahsboard')
<!-- content -->
@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>12</h3>
				<p>New Orders</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a href="#" class="small-box-footer">Info selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3>4
				<!-- <sup style="font-size: 20px">%</sup> -->
				</h3>
				<p>Jumlah Mitra</p>
			</div>
			<div class="icon">
				<i class="ion ion-person"></i>
			</div>
			<a href="#" class="small-box-footer">Info selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>44364</h3>
				<p>Jumlah User</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-stalker"></i>
			</div>
			<a href="#" class="small-box-footer">Info selengkapnya<i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>2</h3>
				<p>Jumlah admin</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-contact"></i>
			</div>
			<a href="#" class="small-box-footer">Info selengkapnya<i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-orange">
			<div class="inner">
				<h4> <br>,-</h4>
				<p>Pemasukan Bulan ini</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a href="#" class="small-box-footer">Info selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-maroon">
			<div class="inner">
				<h4> Rp. 8.750.500 <br>,-
				</h4>
				<p>Pemasukan Bulan lalu</p>
			</div>
			<div class="icon">
				<i class="ion ion-person"></i>
			</div>
			<a href="#" class="small-box-footer">Info selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6 ">
		<!-- small box -->
		<div class="small-box bg-purple">
			<div class="inner">
				<h4>44 <br>,-</h4>
				<p>Jumlah Menu</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-stalker"></i>
			</div>
			<a href="#" class="small-box-footer">Info selengkapnya<i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-navy">
			<div class="inner">
				<h4>Rp. 65.000.200 <br>,-</h4>
				<p>Saldo</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-contact"></i>
			</div>
			<a href="#" class="small-box-footer">Info selengkapnya<i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>
	<!-- ./col -->


	
@endsection
<!-- end content -->