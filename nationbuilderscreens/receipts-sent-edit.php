<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Facturly Dashboard</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="assets/css/media.css" />
		<link rel="stylesheet" href="assets/css/uniform.css" />
		<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href="assets/custom/common.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
		
		<link rel="stylesheet" href="assets/css/datepicker.css" />
		<link rel="stylesheet" href="assets/css/select2.css" />
		<link rel="stylesheet" href="assets/css/jquery.dataTables.css" />
	</head>
	<body>
		<?php	include("includes/header.php");	?>
		<?php	
			/*include("includes/receipt_edit_sidebar.php");*/
			include("includes/sidebar.php");
		?>
		
		<!--main-container-part-->
		<div id="content">
			<div id="content-header">
				<!--<ul class="top-nav">
					<li class="active" style="width:50%"><a href="receipts-sent.php">Receipts</a></li>
					<li style="width:50%"><a href="index.php">Account</a></li>
				</ul>-->
				
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="widget-content">
						<div class="span12">
							<?php	include("center_view/receipt/sent_edit.php");	?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php	include("includes/footer.php");	?>
		
		<style>
			#uniform-undefined {
				height:22px;
			}
		</style>
		
		<div id="saveModal" class="modal hide" style="width:400px;left:55%">
			<div class="modal-header">
				<button data-dismiss="modal" class="close" type="button">×</button>
				<h3 style="text-align:center;">Hold On !</h3>
			</div>
			<div class="modal-body">
				<p>This receipt was sent to donor.Any changes you've made will overwrite the orignal receipt</p>
			</div>
			
			<div class="modal-footer"> 
				<p style="text-align:center;">
					<a data-dismiss="modal" class="btn btn-primary" href="#">Revert to Orignal</a>
					<a data-dismiss="modal" class="btn" href="#">Send & Save</a> 
				</p>
			</div>
		</div>
		
		<div id="emailModal" class="modal hide" style="width:400px;left:55%">
			<div class="modal-header">
				<button data-dismiss="modal" class="close" type="button">×</button>
				<h3 style="text-align:center;">Hold On !</h3>
			</div>
			<div class="modal-body">
				<p>This receipt was sent to donor.Are you sure that you want to send another copy? Any changes you've made will overwrite the orignal receipt </p>
			</div>
			
			<div class="modal-footer"> 
				<p style="text-align:center;">
					<a data-dismiss="modal" class="btn btn-primary" href="#">Revert to Orignal</a>
					<a data-dismiss="modal" class="btn" href="#">Send & Save</a> 
				</p>
			</div>
		</div>
		
		<script src="assets/js/jquery.min.js"></script> 
		<script src="assets/js/bootstrap.min.js"></script> 
		<script src="assets/js/jquery.ui.custom.js"></script> 
		<script src="assets/js/theme.js"></script>
		
		<script src="assets/js/bootstrap-datepicker.js"></script> 
		<script src="assets/js/select2.min.js"></script> 
		<script src="assets/js/jquery.uniform.js"></script> 
		<script src="assets/js/jquery.dataTables.min.js"></script> 
		
		<script src="assets/custom/common.js"></script> 
		<script>
			$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
			$('.template-list').on('change', function() {
				$('.template-list').not(this).prop('checked', false);  
			});
		/*	$('select').select2();
			$("#donation_start_date").datepicker({
				showOtherMonths:true,
				format: "yyyy-mm-dd",
				autoclose: true,
				readonly:true
			}).on('changeDate', function(ev){                 
				$('#donation_start_date').datepicker('hide');
			});
			
			$("#donation_end_date").datepicker({
				showOtherMonths:true,
				format: "yyyy-mm-dd",
				autoclose: true,
				readonly:true
			}).on('changeDate', function(ev){                 
				$('#donation_end_date').datepicker('hide');
			});
			
			var dataTable = $('.receipts_sent').dataTable({
				"bJQueryUI": true,
				"sPaginationType": "full_numbers",
				"sDom": '<""l>t<"F"fp>',
				"bInfo": false
			});
			
			$("#receipts_sent").keyup(function() {
				dataTable.fnFilter(this.value);
			});    */
		</script>
		<script>
  
</script>
	</body>
</html>
