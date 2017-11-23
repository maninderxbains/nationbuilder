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
			<form action="#" method="post" class="form-horizontal" id="organization_info_form">
				<div class="span12" style="background:#F9F9F9;border-bottom: 1px solid #cdcdcd; margin-bottom: 20px;">
				<input type="hidden" id="user_id" value="<?php	echo $user_id;	?>" />
				<div class="span4">
					<div class="widget-box" style="margin-top:0px;border:none;">
						<div class="widget-content" style="padding-right:0px;border-bottom:none;">
							<p>
								<input type="text" class="span11" name="orgnaization_name" id="orgnaization_name" placeholder="Organization Name" value="<?php	echo $organization_name;	?>" />
								<br>
								<span id="orgnaization_name_error"></span>
							</p>
							<p>
								<input type="text" class="span11" name="tax_id_number" id="tax_id_number" placeholder="Tax ID Number" value="<?php	echo $organization_tax_id_number;	?>" />
								<br>
								<span id="tax_id_number_error"></span>
							</p>
							<p>
								<input type="text" class="span11" name="phone_number" id="phone_number" placeholder="Phone" value="<?php	echo $organization_phone;	?>" />
								<br>
								<span id="phone_number_error"></span>
							</p>
						</div>
					</div>
				</div>
				
				<div class="span4" style="margin-left:0px;">
					<div class="widget-box" style="margin-top:0px;border:none;margin-bottom: 0px;">
						<div class="widget-content" style="padding-right:0px;border-bottom:none;">
							<p>
								<input type="text" class="span11" name="address_street" id="address_street" placeholder="Street Address" value="<?php	echo $organization_street_address;	?>" />
								<br>
								<span id="address_street_error"></span>
							</p>
							<p>
								<input type="text" class="span11" name="address_city" id="address_city" placeholder="City" value="<?php	echo $organization_city;	?>" />
								<br>
								<span id="address_city_error"></span>
							</p>
							<p>
								<input type="text" class="span11" name="address_country" id="address_country" placeholder="Country" value="<?php	echo $organization_country;	?>" />
								<br>
								<span id="address_country_error"></span>
							</p>
							<p>
								<input type="text" class="span11" name="address_state" id="address_state" placeholder="State/Province" value="<?php	echo $organization_state;	?>" />
								<br>
								<span id="address_state_error"></span>
							</p>
						</div>
					</div>
				</div>
				
				<div class="span4" style="margin-left:0px;">
					<div class="widget-box" style="margin-top:0px;border:none;">
						<div class="widget-content" style="padding-right:0px;border-bottom:none;">
							<p>
								<input type="text" class="span11 tip-bottom" name="organization_contact_name" id="organization_contact_name" placeholder="Contact Name" title="This should be the full name of the person that signs your receipts." value="<?php	echo $organization_contact_name;	?>" />
								<br>
								<span id="organization_contact_name_error"></span>
							</p>
						</div>
					</div>
				</div>
				
				</div>
				<div class="form-actions">
					<p>
						<span id="organization_info_success"></span>
					</p>
					<?php
						if (empty($organization_info)) {
					?>
							<button type="submit" class="btn btn-success">Save</button>
					<?php
						} else {
					?>
							<button type="submit" class="btn btn-success">Update</button>
					<?php
						}
					?>
					
				</div>
			</form>
		</div>
	</div>	
	
	
</div>