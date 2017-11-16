<?php 
	$this->load->view("theme/includes/header_css_js");
	$this->load->view("theme/includes/header");
	$this->load->view("theme/includes/sidebar");
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
							<?php	$this->load->view("theme/center_view/".$page);	?>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php 
	$this->load->view("theme/includes/footer");
	$this->load->view("theme/includes/footer_css_js");
?>