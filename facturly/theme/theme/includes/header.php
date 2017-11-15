<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php	echo $page_title;	?></title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="assets/css/style.css" />
	<link rel="stylesheet" href="assets/css/media.css" />
	<link rel="stylesheet" href="assets/css/uniform.css" />
	<link rel="stylesheet" href="assets/css/select2.css" />
	<link rel="stylesheet" href="assets/css/datepicker.css" />
	<link rel="stylesheet" href="assets/css/jquery.dataTables.css" />
	<link href="assets/custom/common.css" rel="stylesheet" />
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
    <body>
	
			<!--Header-part-->
		<div id="header">
		<h1><a href="#">Facturly</a></h1>
		</div>
		<!--close-Header-part--> 
		
		<!--top-Header-menu-->
		<div id="user-nav" class="navbar navbar-inverse" style="width:84%">
		<ul class="nav" style="width:97%;border:none;">
			<!--<li class=""><a title="" href="#"><i class="icon icon-user"></i> <span class="text">Welcome User</span></a></li>-->
			<li class="" style="float:right;border:none;"><a title="" href="<?php	echo base_url("logout");	?>"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
		</ul>
		</div>
        
    </body>
</html>
