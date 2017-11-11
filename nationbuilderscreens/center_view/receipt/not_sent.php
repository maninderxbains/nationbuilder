<div>
	<div class="span12">
		<div class="span6">
			<div class="widget-box" style="background:#EEEEEE;border: none;">
				<select id="receipt_status">
					<option value="receipts-sent.php">Receipts Sent</option>
					<option value="receipts-not-sent.php" selected>Receipts Not Sent</option>
				</select>
			</div>
		</div>
	</div>
	
	<div class="span12" style="margin-left: 0px;">
		<div class="widget-box collapsible">
			
			<div class="widget-title"> 
				<a href="#collapseTwo" data-toggle="collapse" class=""> 
					<span class="icon"><i class="icon-filter"></i></span>
					<h5>Filters</h5>
				</a> 
			</div>
			<div class="in collapse" id="collapseTwo" style="height: auto;">
				<div class="widget-content" style="padding-top:0px;">
					<div class="row-fluid" style="margin-top:0px;">
						
						<form action="#" method="post" class="form-horizontal">
							<div class="span12">
								<div class="span6">
									<p style="margin: 10px 0px;text-align: center;font-size: 14px;"><b>Donated Between</b></p>
										<div class="input-append date datepicker">
											<input type="text" class="span10" id="donation_start_date" style="background:#fff;" readonly />
											<span class="add-on"><i class="icon-calendar"></i></span>
										</div>
									<b>And</b>
										<div class="input-append date datepicker">
											<input type="text" class="span10" id="donation_end_date" style="background:#fff;" readonly />
											<span class="add-on"><i class="icon-calendar"></i></span>
										</div>
								</div>
								<div class="span2" style="margin-left: 0px;text-align: center;margin-top: 50px;">
									<p><b>OR</b></p>
								</div>
								<div class="span4" style="margin-left: 0px;text-align: center;margin-top: 50px;">
									<input type="text" class="span11" placeholder="Last Name" />
								</div>
							</div>
							<!--<p style="text-align: center;margin: 5px;"><b>OR</b></p>
							<input type="text" class="span11" placeholder="Last Name" />-->
							<div class="span12" style="text-align: center;margin-top: 15px;">
								<button type="submit" class="btn btn-success">Search</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="widget-box">
		<div class="widget-title">
			<span class="icon"><i class="icon-th"></i></span>
			<h5>Receipts Sent</h5>
		</div>
		<!--<div class="dataTables_filter" style="display:block !important;"><label>Search: <input type="text" id="receipts_sent"></label></div>-->
		<div class="widget-content nopadding">
			<table class="table table-bordered receipts_sent">
				<thead>
					<tr>
						<th class="sorting" style="text-align:left;">First Name</th>
						<th class="sorting" style="text-align:left;">Last Name</th>
						<th class="sorting" style="text-align:left;">Date</th>
						<th class="sorting" style="text-align:left;">Amount</th>
						<th class="sorting" style="text-align:left;">Tracking Code</th>
						<th style="text-align:left;">Template</th>
						<th style="text-align:left;">Edit</th>
						<th style="text-align:left;">Email</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Giacomo</td>
						<td>Guilizzani</td>
						<td>09/31/2017</td>
						<td>$100</td>
						<td>online_test</td>
						<td>Template 1</td>
						<td>
							<a href="receipts-not-sent-edit.php" title="Edit">
								<i class="icon icon-external-link"></i>
							</a>&nbsp;
						</td>
						<td>
							<a href="#" title="Email">
								<i class="icon icon-envelope"></i>
							</a>&nbsp;
						</td>
					</tr>
					<tr>
						<td>Smith</td>
						<td>Mike</td>
						<td>08/31/2017</td>
						<td>$200</td>
						<td>cambodia_kids</td>
						<td>Template 2</td>
						<td>
							<a href="receipts-not-sent-edit.php" title="Edit">
								<i class="icon icon-external-link"></i>
							</a>&nbsp;
						</td>
						<td>
							<a href="#" title="Email">
								<i class="icon icon-envelope"></i>
							</a>&nbsp;
						</td>
					</tr>
					<tr>
						<td>Garcia</td>
						<td>Jose</td>
						<td>07/25/2017</td>
						<td>$250</td>
						<td>ticket_event1</td>
						<td>Template 3</td>
						<td>
							<a href="receipts-not-sent-edit.php" title="Edit">
								<i class="icon icon-external-link"></i>
							</a>&nbsp;
						</td>
						<td>
							<a href="#" title="Email">
								<i class="icon icon-envelope"></i>
							</a>&nbsp;
						</td>
					</tr>
					<tr>
						<td>Hodgen</td>
						<td>Mary</td>
						<td>08/08/2017</td>
						<td>$300</td>
						<td>ticket_event1</td>
						<td>Template 3</td>
						<td>
							<a href="receipts-not-sent-edit.php" title="Edit">
								<i class="icon icon-external-link"></i>
							</a>&nbsp;
						</td>
						<td>
							<a href="#" title="Email">
								<i class="icon icon-envelope"></i>
							</a>&nbsp;
						</td>
					</tr>
					<tr>
						<td>Garcia</td>
						<td>jose</td>
						<td>08/08/2017</td>
						<td>$150</td>
						<td>online_test</td>
						<td>Template 1</td>
						<td>
							<a href="receipts-not-sent-edit.php" title="Edit">
								<i class="icon icon-external-link"></i>
							</a>&nbsp;
						</td>
						<td>
							<a href="#" title="Email">
								<i class="icon icon-envelope"></i>
							</a>&nbsp;
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	
</div>