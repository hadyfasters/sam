<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<title>SAM </title>

		<!-- Bootstrap -->
        <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- <link href="assets/vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet"> -->
		<!-- Font Awesome -->
		<link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- Custom Theme Style -->
		<link href="assets/build/css/custom.min.css" rel="stylesheet">
		<link href="assets/build/css/mycustom.css" rel="stylesheet">
		<!-- <link href="https://fonts.googleapis.com/css?family=Libre+Franklin:400,700&display=swap" rel="stylesheet"> -->
	</head>
	<body>
	<div class="mt-4 position-fixed">
		<img src="assets/img/ornament.png" class="bg-front"/>
	</div>
	<div class="mt-3 ml-3 position-fixed">
	<img src="assets/img/logo-bnis.png" class="logo"/>
	</div>
	<div class="container body position-absolute">
		<div class="main_container">
			<div class="min-vh-100 text-center m-0 d-flex flex-column justify-content-center">
				<div class="row mt-4">
					<div class="offset-sm-3 col-sm-4">
                        <div class="card mb-3" style="border-radius: 20px; box-shadow: 0px 5px 3px #c7d0d9; width: 680px;" >
                            <div class="row no-gutters p-5">
                                <div class="col-md-5">
                                    <img src="assets/img/presentation.png" class="card-img" alt="..." style="width: 50%">
                                    <h1 class="font-front card-title-left mt-4">SAM</h1>
                                    <h2 class="font-front card-subtitle-left mt-3">Sales Activity Monitoring</h2>
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title-right mb-4">Login</h5>
                                        <?php if ($error_message): ?>
                                            <p class="text-center" style="color: red;"><?php echo $error_message; ?></p>
                                        <?php endif; ?>
                                        <?php echo form_open($login, $attributes); ?>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="npp" name="npp" aria-describedby="emailHelp" placeholder="NPP" style="border-radius: 6px;" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" style="border-radius: 6px;" required>
                                            </div>
                                            <div class="form-group">
                                            	<label for="captcha">Submit the code you see below : 
                                            		<?php echo $captcha_img; ?></label>
                                                <input type="text" class="form-control input-sm" name="captcha" id="captcha" style="border-radius: 6px;" placeholder="Enter the Code" required>
                                            </div>

                                            <button class="btn btn-primary btn-block" style="border-radius: 6px;">Submit</button>
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>	
		</div>	
	</div>
    </body>
</html>