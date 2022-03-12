<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>@yield('title')</title>
		@include('master.link.linkcss')
		
	</head>
	<body class="hold-transition skin-green-light sidebar-mini">
		<div class="wrapper">
			<!-- Content Wrapper. Contains page content -->
			@include('master.topbar.topbar')
			@include('master.sidebar.sidebar')
			<div class="content-wrapper">
			
				<section class="content container-fluid">
				@include('layouts.partials._alerts')
					@yield('content')
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			@include('master.footer.footer')
		</div>
		@include('master.link.linkjs')
	</body>
</html>