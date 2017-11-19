<div>
	<p><a href="<?php echo site_url("trackingcode/add");?>" class="btn tip-bottom" title="Tracking codes are created in NationBuilder and identify which transactions are tied to specific receipt templates in Facturly and campaigns or events in NationBuilder. ">Add Tracking Code</a></p>		
	<p><h4 style="color:green"><?php echo $this->session->flashdata('action_message'); ?></h4></p>
	<p><h4 style="color:red"><?php echo $this->session->flashdata('error_message'); ?></h4>	</p>
	<div class="widget-box">
		<div class="widget-title">
			<span class="icon"><i class="icon-th"></i></span>
			<h5>Tracking Codes</h5>
		</div>
		<!--<div class="dataTables_filter" style="display:block !important;"><label>Search: <input type="text" id="master_transaction"></label></div>-->
		<div class="widget-content nopadding">
			<table class="table table-bordered master_transaction">
				<thead>
					<tr>
						<th style="text-align:left;">Tracking Code</th>
						<th style="text-align:left;">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if(isset($tracking_codes_arr) && !empty($tracking_codes_arr)){?>
					<?php foreach($tracking_codes_arr as $tracking_code){ ?>
					<tr>
						<td><?php echo $tracking_code->code;?></td>
						<td>
							<a href="<?php echo site_url("trackingcode/edit/".$tracking_code->id);?>" title="Edit">
								<i class="icon icon-edit"></i>
							</a>&nbsp;
							<a href="#" title="Delete" class="delete_record" table="tracking_codes" column="id" column_value="<?php	echo $tracking_code->id;	?>">
								<i class="icon icon-trash"></i>
							</a>&nbsp;
						</td>
					<?php } } else { ?>
					<tr>
						<td colspan="2">No Record Found</td>
						
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
		</div>
	</div>
	
</div>