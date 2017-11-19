<div>
						
	<div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Tracking Code</h5>
        </div>
		<div class="widget-content nopadding">
			<form action="javascript:;" method="post" id="edit_tracking_code_form" class="form-horizontal">
				<input type="hidden" id="tracking_code_id" value="<?php echo $tracking_code_data[0]->id;?>">
				<input type="hidden" id="user_id" value="<?php echo $user_id;?>">
				<div class="control-group">
					<label class="control-label">Tracking Code :</label>
					<div class="controls">
						<input type="text" class="span11" id="edit_tracking_code" placeholder="Tracking Code" value="<?php echo $tracking_code_data[0]->code;?>" />
						<br>
						<span id="edit_tracking_code_error"></span>
					</div>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-success">Update</button>
				</div>
			</form>
		</div>
	</div>	
	
	
</div>