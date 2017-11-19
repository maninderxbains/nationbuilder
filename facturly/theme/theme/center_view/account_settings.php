<div>
	<div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>NationBuilder Information</h5>
        </div>
		<div class="widget-content nopadding">
			<form action="#" method="post" class="form-horizontal" id="nation_slug_form">
				<div class="control-group">
					<label class="control-label">NationBuilder Slug :</label>
					<div class="controls">
						<?php
						if (empty($nation_slug)) {
						?>
								<input type="text" class="span11 tip-top" name="nation_slug" id="nation_slug" placeholder="NationBuilder Slug" title="Find your slug in your nation’s URL at the “myorganization” portion of 'myorganization.nationbuilder.com'." />
						<?php
							} else {
						?>
								<input type="text" class="span11 tip-top" name="nation_slug" id="nation_slug" placeholder="NationBuilder Slug" title="Find your slug in your nation’s URL at the “myorganization” portion of 'myorganization.nationbuilder.com'." value="<?php	echo $nation_slug[0]->slug;	?>" />
						<?php
							}
						?>
						<input type="hidden" id="user_id" value="<?php	echo $user_id;	?>" />
						<br>
						<span id="nation_slug_error"></span>
					</div>
				</div>
				<div class="form-actions">
					<?php
						if (empty($nation_slug)) {
					?>
							<span class="pull-left"><button type="submit" class="btn btn-success">Save</button></span>
					<?php
						} else {
					?>
							<span class="pull-left"><button type="submit" class="btn btn-success">Update</button></span>
					<?php
						}
					?>
					<span class="pull-right"><button type="submit" class="btn btn-success">Connect</button></span>
				</div>
			</form>
		</div>
	</div>	
	
	<div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Organization Information</h5>
        </div>
		<div class="widget-content nopadding">
			<form action="#" method="post" class="form-horizontal">
				<div class="span12" style="background:#F9F9F9;border-bottom: 1px solid #cdcdcd; margin-bottom: 20px;">
				
				<div class="span4">
					<div class="widget-box" style="margin-top:0px;border:none;">
						<div class="widget-content" style="padding-right:0px;border-bottom:none;">
							<p><input type="text" class="span11" name="nation_slug" id="nation_slug" placeholder="Organization Name" /></p>
							<p><input type="text" class="span11" name="nation_slug" id="nation_slug" placeholder="Tax ID Number" /></p>
							<p><input type="text" class="span11" name="nation_slug" id="nation_slug" placeholder="Phone" /></p>
						</div>
					</div>
				</div>
				
				<div class="span4" style="margin-left:0px;">
					<div class="widget-box" style="margin-top:0px;border:none;margin-bottom: 0px;">
						<div class="widget-content" style="padding-right:0px;border-bottom:none;">
							<p><input type="text" class="span11" name="nation_slug" id="nation_slug" placeholder="Street Address" /></p>
							<p><input type="text" class="span11" name="nation_slug" id="nation_slug" placeholder="City" /></p>
							<p><input type="text" class="span11" name="nation_slug" id="nation_slug" placeholder="Country" /></p>
							<p><input type="text" class="span11" name="nation_slug" id="nation_slug" placeholder="State/Province" /></p>
						</div>
					</div>
				</div>
				
				<div class="span4" style="margin-left:0px;">
					<div class="widget-box" style="margin-top:0px;border:none;">
						<div class="widget-content" style="padding-right:0px;border-bottom:none;">
							<p><input type="text" class="span11 tip-bottom" name="nation_slug" id="nation_slug" placeholder="Contact Name" title="This should be the full name of the person that signs your receipts." /></p>
						</div>
					</div>
				</div>
				
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-success">Save</button>
				</div>
			</form>
		</div>
	</div>	
	
	
</div>