<!-- theme -->
@extends('master.theme.theme')
<!-- navigation -->
@section('dashboard','active')
<!-- title -->
@section('title','Dashboard')
<!-- content -->
@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>{{$new_order}}</h3>
				<p>New Orders</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a href="{{route('list_pemesanan')}}" class="small-box-footer">Info selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3>{{$jumlah_mitra}}
				<!-- <sup style="font-size: 20px">%</sup> -->
				</h3>
				<p>Jumlah Mitra</p>
			</div>
			<div class="icon">
				<i class="ion ion-person"></i>
			</div>
			<a href="{{route('mitra')}}" class="small-box-footer">Info selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>{{$jumlah_customer}}</h3>
				<p>Jumlah User</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-stalker"></i>
			</div>
			<a href="{{route('customer')}}" class="small-box-footer">Info selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>{{$jumlah_admin}}</h3>
				<p>Jumlah admin</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-contact"></i>
			</div>
			<a href="{{route('akun')}}" class="small-box-footer">Info selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-orange">
			<div class="inner">
				<h4>Rp. {{$jumlah_bulanini}}   <br>,-</h4>
				<p>Pemasukan Bulan ini</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a href="#chartjml" class="small-box-footer">Info selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-maroon">
			<div class="inner">
				<h4> Rp. {{$jumlah_pemasukanlalu}} <br>,-
				</h4>
				<p>Pemasukan Bulan lalu</p>
			</div>
			<div class="icon">
				<i class="ion ion-person"></i>
			</div>
			<a href="#chartjml" class="small-box-footer">Info selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6 ">
		<!-- small box -->
		<div class="small-box bg-purple">
			<div class="inner">
				<h4><b> {{$jumlah_menu}} </b> <br>...</h4>
				<p>Jumlah Menu</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-stalker"></i>
			</div>

			<a href="" data-toggle="modal"data-target="#modal-menu" class="small-box-footer">Info selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-navy">
			<div class="inner">
				<h4>Rp. {{$saldo}} <br>,-</h4>
				<p>Saldo</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-contact"></i>
			</div>
			<a href="#chartbdg" class="small-box-footer">Info selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-12 ">

		<div id="chartjml"></div>
	</div>
	<div class="col-lg-12 ">
		<div class="panel"></div>
	</div>

	<div class="col-lg-6 ">
			<div id="chartbdg"></div>
	</div>

	<div class="col-lg-6 " >
		<div class="box">
			<div class="box-header">
				Top 8 Pendapatan Mitra
			</div>
			<div class="border" style="padding: 10px; background:white">
				<div class="table-responsive">
					<table class="mb-0 table text-center table-bordered">
						<thead class="bg-info text-center text-white">
						<tr>
							<th>No</th>
							<th>Id</th>
							<th>Mitra</th>
							<th>Alamat Mitra</th>
							<th>Jumlah</th>
						</tr>
						</thead>
					<tbody>
						@foreach ($menu as $menu1)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$menu1->id_mitra}}</td>
							<td>{{$menu1->nama_mitra}}</td>
							<td>{{$menu1->alamat_mitra}}</td>
							<td>{{$menu1->jumlah}}</td>
						</tr>
						@endforeach
						</tbody>
					</table><br>
				</div>
				
			</div>
		</div>	
	</div>
</div>
	<!-- ./col -->

	<div class="modal fade" id="modal-menu">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-center">Menu Nasbox</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-4 ">
						<div class="card text-center bg-green ">
							<div class="card-header">
								---------------------------------
							</div>
							<div class="card-body">
								<h1 class="card-title"><b>{{$jumlah_menu_cat}}</b></h1>
								<p class="card-text">Menu Catering</p>
								<a href="{{route('menu_catering')}}" class="btn btn-default">Lihat Selengkapnya</a>
							</div>
							<div class="card-footer text-muted">
								-
							</div>
						</div>
					</div>

					<div class="col-lg-4 ">
						<div class="card text-center bg-green ">
							<div class="card-header">
								---------------------------------
							</div>
							<div class="card-body">
								<h1 class="card-title"><b>{{$jumlah_menu_food}}</b></h1>
								<p class="card-text">Menu Food Express</p>
								<a href="{{route('menu_foodexpress')}}" class="btn btn-default">Lihat Selengkapnya</a>
							</div>
							<div class="card-footer text-muted">
								-
							</div>
						</div>
					</div>

					<div class="col-lg-4 ">
						<div class="card text-center bg-green ">
							<div class="card-header">
								---------------------------------
							</div>
							<div class="card-body">
								<h1 class="card-title"><b>{{$jumlah_menu_groc}}</b></h1>
								<p class="card-text">Menu Grocery</p>
								<a href="{{route('menu_grocery')}}" class="btn btn-default">Lihat Selengkapnya</a>
							</div>
							<div class="card-footer text-muted">
								-
							</div>
						</div>
					</div>
				</div>	
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
			</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
	
@endsection
<!-- end content -->

@section('chartku')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
	Highcharts.chart('chartjml', {
		chart: {
			type: 'line'
		},
		title: {
			text: 'Data Penghasilan Tahun Ini'
		},
		subtitle: {
			text: 'Catering - Food Express - Grocery'
		},
		xAxis: {
			categories: {!!json_encode($bulan)!!}
		},
		yAxis: {
			title: {
				text: 'Penghasilan (Rp.)'
			}
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
				enableMouseTracking: false
			}
		},
		series: [{
			name: 'Catering',
			data: {!!json_encode($Rpcat)!!}
		}, {
			name: 'Food Express',
			data: {!!json_encode($Rpfood)!!}

		}, {
			name: 'Grocery',
			data: {!!json_encode($Rpgroc)!!}

		}, {
			name: 'All',
			data: {!!json_encode($Rp)!!}
		}]
	});
</script>

<script>
// Create the chart
Highcharts.chart('chartbdg', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Perbandingan Pendapatan Setiap Menu'
    },
    subtitle: {
        text: ' Catering , Food Express , Grocery'
    },

    accessibility: {
        announceNewData: {
            enabled: true
        },
        point: {
            valueSuffix: '%'
        }
    },

    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: "Pendapatan",
            colorByPoint: true,
            data: [
                {
                    name: "Catering",
                    y: {{$graf_cat}},
                    drilldown: "Chrome"
                },
                {
                    name: "FoodExpress",
                    y: {{$graf_food}},
                    drilldown: "Firefox"
				},
				{
                    name: "Grocery",
                    y: {{$graf_groc}},
                    drilldown: "Firefox"
                }
            ]
        }
    ]
});

</script>
@endsection