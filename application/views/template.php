<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>SAM</title>

		<!-- Bootstrap -->
		<link href="<?php echo base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">	

		<!-- Font Awesome -->
		<link href="<?php echo base_url()?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">	
		<!-- <link href="https://fonts.googleapis.com/css?family=Libre+Franklin:400,700&display=swap" rel="stylesheet"> -->
		
        <!-- NProgress -->
		<link href="<?php echo base_url()?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
		
		<!-- iCheck -->
		<link href="<?php echo base_url()?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
		<!-- bootstrap-progressbar -->
		<link href="<?php echo base_url()?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
		<!-- JQVMap -->
		<link href="<?php echo base_url()?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

		<!-- bootstrap-daterangepicker -->
		<link href="<?php echo base_url()?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

		<!-- datepicker -->
        <link href="<?php echo base_url()?>assets/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

		<!--datatables -->
		<link href="<?php echo base_url()?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url()?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url()?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url()?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url()?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

		<!-- Custom Theme Style -->
		<link href="<?php echo base_url()?>assets/build/css/custom.min.css" rel="stylesheet">
		<link href="<?php echo base_url()?>assets/build/css/mycustom.css" rel="stylesheet">
	</head>
    <body class="nav-md">
		<div class="container body">
			<div class="main_container">
				
				<!-- sidebar menu -->
				<?php $this->load->view('base/sidemenu'); ?>
				<!-- /sidebar menu -->
				
				<!-- top navigation -->
				<?php $this->load->view('base/top-nav'); ?>
                <!-- /top navigation -->

				<!-- page content -->
				<?php $this->load->view($content); ?>
					<!-- /top tiles -->
					<br />
				</div>
				<!-- /page content-->
				
				<!-- footer content -->
				<?php $this->load->view('base/copyright'); ?>
				<!-- /footer content -->
			</div>
        </div>
    
        <script>
            const base_url = location.pathname.split('/');
            const site_url = '<?php echo site_url()?>';
        </script>
            
        <!-- jQuery -->
        <script src="<?php echo base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Chart.js -->
        <!-- <script src="<?php echo base_url()?>assets/vendors/Chart.js/dist/Chart.min.js"></script> -->
        <!-- morris.js -->
        <!-- <script src="<?php echo base_url()?>assets/vendors/raphael/raphael.min.js"></script> -->
        <!-- <script src="<?php echo base_url()?>assets/vendors/morris.js/morris.min.js"></script> -->
        <!-- gauge.js -->
        <!-- <script src="<?php echo base_url()?>assets/vendors/gauge.js/dist/gauge.min.js"></script> -->
        <!-- bootstrap-progressbar -->
        <!-- <script src="<?php echo base_url()?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> -->

        <!-- DateJS -->
        <!-- <script src="<?php echo base_url()?>assets/vendors/DateJS/build/date.js"></script> -->

        <!-- bootstrap-daterangepicker -->
        <!-- <script src="<?php echo base_url()?>assets/vendors/moment/min/moment.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>  -->

        <!-- data tables -->
        <!-- <script src="<?php echo base_url()?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script> -->

        <!-- Custom Theme Scripts -->
        <script src="<?php echo base_url()?>assets/build/js/custom.js"></script>
        <!-- <script src="<?php echo base_url()?>assets/build/js/charts.js"></script> -->
        <!-- <script src="<?php echo base_url()?>assets/build/js/table.js"></script> -->

        <?php if (isset($javascriptLoad)):?>
            <?php foreach ($javascriptLoad as $row):?>
                <script src="<?php echo base_url($row); ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>
    </body>
</html>