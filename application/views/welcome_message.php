<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<title>Sales Activity Monitoring</title>

		<!-- Bootstrap -->
		<link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- Custom Theme Style -->
		<link href="assets/build/css/custom.min.css" rel="stylesheet">
		<link href="assets/build/css/mycustom.css" rel="stylesheet">
		<!-- <link href="https://fonts.googleapis.com/css?family=Libre+Franklin:400,700&display=swap" rel="stylesheet"> -->
	</head>
	<body>
	<div class="mt-4 position-fixed" >
		<img src="assets/img/ornament.png" class="bg-front"/>
	</div>
	<div class="mt-3 ml-3 position-fixed ">
	<img src="assets/img/logo-bnis.png" class="logo"/>
	</div>
	<div class="container body position-absolute">
		<div class="main_container">
			<div class="min-vh-100 text-center m-0 d-flex flex-column justify-content-center">
				<div class="row">
					<div class="offset-sm-4 col-sm-4">
						<h1 class="font-front title">SAM</h1>
						<h5 class="font-front subtitle  mt-4">Sales Activity Monitoring</h5>
					</div>
				</div>
				<div class="row mt-5">
					<div class="offset-sm-3 col-sm-3">
						<div class="card" style="float: right; width: 15rem; border-radius: 20px; box-shadow: 0px 5px 3px #c7d0d9;">
							<img src="assets/img/bar-charts.png" alt="" class="img-responsive center-margin mt-3" style="height: 8.5rem; width: 8.5rem;">
							<div class="card-body" style="margin:-16px;">
								<p class="card-title"> <h4>Presales</h4></p>
							</div>
							<a href="<?php echo base_url('login');?>" class="stretched-link"></a>
						</div>
					</div>
					<div class="col-sm-3"> 
						<div class="card" style="float:left; width: 15rem; border-radius: 20px; box-shadow: 0px 5px 3px #c7d0d9;">
							<img src="assets/img/money-refresh.png" alt="" class="img-responsive center-margin mt-3" style="height: 8.5rem; width: 8.5rem;">
							<div class="card-body" style="margin:-16px;">
								<p class="card-title"> <h4>Postsales</h4></p>
							</div>
							<a href="<?php echo base_url('login');?>" class="stretched-link"></a>
						</div>
					</div>
				</div>
			</div>	
		</div>	
	</div>
	</body>
</html>