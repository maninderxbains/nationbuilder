<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Edit Tracking Code</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="assets/css/media.css" />
		<link href="assets/custom/common.css" rel="stylesheet" />
		<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<?php	include("includes/header.php");	?>
		<?php
			include("includes/sidebar.php");
		/*	include("includes/account_sidebar.php");	*/
		?>
		<!--main-container-part-->
		<div id="content">
			<div id="content-header">
				<!--<ul class="top-nav">
					<li style="width:50%"><a href="receipts-sent.php">Receipts</a></li>
					<li class="active" style="width:50%"><a href="index.php">Account</a></li>
				</ul>-->
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="widget-content tab-content">
						<div class="span12">
							<?php	include("center_view/tracking_code/edit.php");	?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php	include("includes/footer.php");	?>
		
		<script src="assets/js/jquery.min.js"></script> 
		<script src="assets/js/bootstrap.min.js"></script> 
		<script src="assets/js/jquery.ui.custom.js"></script> 
		<script src="assets/js/theme.js"></script>
		<script src="assets/custom/common.js"></script>
	</body>
</html>
