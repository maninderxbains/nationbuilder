<div>
						
	<div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Tracking Code</h5>
        </div>
		<div class="widget-content nopadding">
			<form action="javascript:;" method="post" id="add_tracking_code_form" class="form-horizontal">
				<div class="control-group">
					<label class="control-label">Tracking Code :</label>
					<div class="controls">
						<input type="text" class="span11" id="new_tracking_code" placeholder="Tracking Code" />
						<input type="hidden" id="user_id" value="<?php	echo $user_id;	?>" />
						<br>
						<span id="new_tracking_code_error"></span>
					</div>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-success">Save</button>
				</div>
			</form>
		</div>
	</div>	
	
	
</div>