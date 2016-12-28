<?php if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) : ?>
<div class="content-wrapper" style="min-height: 946px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Add New Customer 
			<small>Preview</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Forms</a></li>
			<li class="active">General Elements</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-10 col-md-offset-1">
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<!--						<h3 class="box-title">Product Form</h3>-->
						<?php if($this->session->flashdata('customer_added')) : ?>
						<div class="alert alert-success">
							<?php echo $this->session->flashdata('customer_added'); ?>
						</div>
						<?php endif; ?>
						<?php if($this->session->flashdata('errors')) : ?>
						<div class="alert alert-danger">
							<?php echo $this->session->flashdata('errors'); ?>
						</div>
						<?php endif; ?>

						<a href="<?php echo base_url();?>admin/customers/view_all_customers/" class="btn btn-danger btn-xs pull-right">Back to Customer List</a>

					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<?php echo form_open_multipart('admin/customers/add/');?>
					<div class="box-body">
						<div class="form-group col-md-2">
							<label for="image">Profile Image</label>
							<input type="file" name="image">
							<p class="help-block">.jpg or .PNG file only.</p>
						</div>
						<div class="col-md-10">
							<div class="col-md-12">
								<div class="form-group col-md-3">
									<label for="customername">First Name*</label>
									<input type="text" class="form-control" name="first_name" placeholder="First Name">
								</div>
								<div class="form-group col-md-3">
									<label for="customername">last Name*</label>
									<input type="text" class="form-control" name="last_name" placeholder="Last Name">
								</div>
								<div class="form-group col-md-5">
									<label for="customername">Email*</label>
									<input type="text" class="form-control" name="email" placeholder="Email">
								</div>

								<div class="form-group col-md-5">
									<label for="image">Mobile No.*</label>
									<input type="text" class="form-control" name="username" placeholder="Username">
								</div>
								<div class="form-group col-md-5">
									<label for="password">Password</label>
									<input type="password" class="form-control" name="password" placeholder="Password">
								</div>
							</div>
							<div class="col-md-12" style="border-top:1px solid #f4f4f4;">
								<div class="form-group col-md-5">
									<label for="company">Company/Business Name</label>
									<input type="text" class="form-control" name="company" placeholder="Company">
								</div>
							</div>
							<div class="col-md-12" style="border-top:1px solid #f4f4f4;">

								<div class="col-md-6" style="border-right:1px solid #f4f4f4;border-left:1px solid #f4f4f4;">
									<p>BILLING ADDRES</p>
									<div class="form-group">
										<label for="customername">Address*</label>
										<input type="text" class="form-control" name="billing_address1" placeholder="Billing Address">
									</div>
									<div class="form-group">
										<label for="customername">Address Line 2</label>
										<input type="text" class="form-control" name="billing_address2" placeholder="Billing Address Line 2">
									</div>
									<div class="form-group col-sm-6 no-padding">
										<label for="customername">City</label>
										<input type="text" class="form-control" name="billing_city" placeholder="Billing City">
									</div>
									<div class="form-group col-sm-6">
										<label for="customername">ZIP CODE</label>
										<input type="text" class="form-control" name="billing_zip" placeholder="Zip Code">
									</div>
									<div class="form-group col-sm-12 no-padding">
										<label for="customername">State</label>
										<select class="form-control select2" name="billing_state">
											<option selected="selected" value="">Select</option>
											<option value="Andaman and Nicobar Islands">Andaman and Nicobar</option>
											<option value="Andhra Pradesh">Andhra Pradesh</option>
											<option value="Arunachal Pradesh">Arunachal Pradesh</option>
											<option value="Assam">Assam</option>
											<option value="Bihar">Bihar</option>
											<option value="Chandigarh">Chandigarh</option>
											<option value="Chhattisgarh">Chhattisgarh</option>
											<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
											<option value="Daman and Diu">Daman and Diu</option>
											<option value="Delhi">Delhi</option>
											<option value="Goa">Goa</option>
											<option value="Gujarat">Gujarat</option>
											<option value="Haryana">Haryana</option>
											<option value="Himachal Pradesh">Himachal Pradesh</option>
											<option value="Jammu and Kashmir">Jammu and Kashmir</option>
											<option value="Jharkhand">Jharkhand</option>
											<option value="Karnataka">Karnataka</option>
											<option value="Kerala">Kerala</option>
											<option value="Lakshadweep">Lakshadweep</option>
											<option value="Madhya Pradesh">Madhya Pradesh</option>
											<option value="Maharashtra">Maharashtra</option>
											<option value="Manipur">Manipur</option>
											<option value="Meghalaya">Meghalaya</option>
											<option value="Mizoram">Mizoram</option>
											<option value="Nagaland">Nagaland</option>
											<option value="Odisha">Odisha</option>
											<option value="Pondicherry">Pondicherry</option>
											<option value="Punjab">Punjab</option>
											<option value="Rajasthan">Rajasthan</option>
											<option value="Sikkim">Sikkim</option>
											<option value="Tamil Nadu">Tamil Nadu</option>
											<option value="Telangana">Telangana</option>
											<option value="Tripura">Tripura</option>
											<option value="Uttar Pradesh">Uttar Pradesh</option>
											<option value="Uttrakhand">Uttarakhand</option>
											<option value="West Bengal">West Bengal</option>
											<option value="Army Post Office">Army Post Office</option>
										</select>
									</div>
									<div class="form-group col-sm-6 no-padding">
										<label for="customername">Country</label>
										<input type="text" class="form-control" name="billing_country" value="India" readonly="readonly" /><small>Operations only in India</small>
									</div>
								</div>


								<div class="col-md-6">
									<p>SHIPPING ADDRES</p>
									<div class="form-group">
										<label for="customername">Address*</label>
										<input type="text" class="form-control" name="shipping_address1" placeholder="Shipping Address">
									</div>
									<div class="form-group">
										<label for="customername">Address Line 2</label>
										<input type="text" class="form-control" name="shipping_address2" placeholder="Shipping Address Line 2">
									</div>
									<div class="form-group col-sm-6 no-padding">
										<label for="customername">City</label>
										<input type="text" class="form-control" name="shipping_city" placeholder="Shipping City">
									</div>
									<div class="form-group col-sm-6">
										<label for="customername">ZIP CODE</label>
										<input type="text" class="form-control" name="shipping_zip" placeholder="Zip Code">
									</div>
								</div>
								<div class="form-group col-sm-6">
									<label for="customername">State</label>
									<select class="form-control select2" name="shipping_state">
										<option selected="selected" value="">Select</option>
										<option value="Andaman and Nicobar Islands">Andaman and Nicobar</option>
										<option value="Andhra Pradesh">Andhra Pradesh</option>
										<option value="Arunachal Pradesh">Arunachal Pradesh</option>
										<option value="Assam">Assam</option>
										<option value="Bihar">Bihar</option>
										<option value="Chandigarh">Chandigarh</option>
										<option value="Chhattisgarh">Chhattisgarh</option>
										<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
										<option value="Daman and Diu">Daman and Diu</option>
										<option value="Delhi">Delhi</option>
										<option value="Goa">Goa</option>
										<option value="Gujarat">Gujarat</option>
										<option value="Haryana">Haryana</option>
										<option value="Himachal Pradesh">Himachal Pradesh</option>
										<option value="Jammu and Kashmir">Jammu and Kashmir</option>
										<option value="Jharkhand">Jharkhand</option>
										<option value="Karnataka">Karnataka</option>
										<option value="Kerala">Kerala</option>
										<option value="Lakshadweep">Lakshadweep</option>
										<option value="Madhya Pradesh">Madhya Pradesh</option>
										<option value="Maharashtra">Maharashtra</option>
										<option value="Manipur">Manipur</option>
										<option value="Meghalaya">Meghalaya</option>
										<option value="Mizoram">Mizoram</option>
										<option value="Nagaland">Nagaland</option>
										<option value="Odisha">Odisha</option>
										<option value="Pondicherry">Pondicherry</option>
										<option value="Punjab">Punjab</option>
										<option value="Rajasthan">Rajasthan</option>
										<option value="Sikkim">Sikkim</option>
										<option value="Tamil Nadu">Tamil Nadu</option>
										<option value="Telangana">Telangana</option>
										<option value="Tripura">Tripura</option>
										<option value="Uttar Pradesh">Uttar Pradesh</option>
										<option value="Uttrakhand">Uttarakhand</option>
										<option value="West Bengal">West Bengal</option>
										<option value="Army Post Office">Army Post Office</option>
									</select>
								</div>
								<div class="form-group col-sm-6">
									<label for="customername">Country</label>
									<input type="text" class="form-control" name="shipping_country" value="India" readonly="readonly" /><small>Operations only in India</small>
								</div>

							</div>
						</div>

					</div>


					<!-- /.box-body -->

					<div class="box-footer">
						<?php echo form_submit('submit', 'Upload', 'class="btn bg-olive btn-lg btn-labeled fa fa-upload pull-right"');?>

						<!--								<button type="submit" class="btn bg-olive btn-lg btn-labeled fa fa-upload pull-right">Upload</button>-->
					</div>
					<?php echo form_close();?>


				</div>

				<!-- /.box -->
			</div>
			<!--/.col (left) -->
			<!-- right column -->

			<!--/.col (right) -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<?php else:?>

<?php $this->session->set_flashdata('admin_login_failed', 'You are not allowed, contact HOD'); ?>

<?php redirect('admin/auth/login');?>
<?php endif; ?>