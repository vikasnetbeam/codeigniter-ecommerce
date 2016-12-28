<?php if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) : ?>
<?php if($customer_detail->id): ?>
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
						<?php if($this->session->flashdata('customer_updated')) : ?>
						<div class="alert alert-success">
							<?php echo $this->session->flashdata('customer_updated'); ?>
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
					<?php echo form_open_multipart('admin/customers/profile/'.$customer_detail->id.'');?>
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
									<input type="text" class="form-control" name="first_name" value="<?php echo $customer_detail->first_name;?>">
								</div>
								<div class="form-group col-md-3">
									<label for="customername">last Name*</label>
									<input type="text" class="form-control" name="last_name" value="<?php echo $customer_detail->last_name;?>">
								</div>
								<div class="form-group col-md-5">
									<label for="customername">Email*</label>
									<input type="text" class="form-control" name="email" value="<?php echo $customer_detail->email;?>">
								</div>

								<div class="form-group col-md-5">
									<label for="image">Mobile No.*</label>
									<input type="text" class="form-control" name="username" value="<?php echo $customer_detail->username;?>">
								</div>
								<div class="form-group col-md-5">
									<label for="password">Password</label>
									<input type="password" class="form-control" name="password" value="<?php echo $customer_detail->password;?>">
								</div>
							</div>
							<div class="col-md-12" style="border-top:1px solid #f4f4f4;">
								<div class="form-group col-md-5">
									<label for="company">Company/Business Name</label>
									<input type="text" class="form-control" name="company" value="<?php echo $customer_detail->user_company;?>">
								</div>
							</div>
							<div class="col-md-12" style="border-top:1px solid #f4f4f4;">
								<div class="col-md-6" style="border-right:1px solid #f4f4f4;border-left:1px solid #f4f4f4;">
									<p>BILLING ADDRES</p>
									<div class="form-group">
										<label for="customername">Address*</label>
										<input type="text" class="form-control" name="billing_address1" value="<?php echo $customer_detail->user_address1;?>">
									</div>
									<div class="form-group">
										<label for="customername">Address Line 2</label>
										<input type="text" class="form-control" name="billing_address2" value="<?php echo $customer_detail->user_address2;?>">
									</div>
									<div class="form-group col-sm-4 no-padding">
										<label for="customername">City</label>
										<input type="text" class="form-control" name="billing_city" value="<?php echo $customer_detail->user_city;?>">
									</div>
									<div class="form-group col-sm-4">
										<label for="customername">ZIP CODE</label>
										<input type="text" class="form-control" name="billing_zip" value="<?php echo $customer_detail->user_zip;?>">
									</div>

									<div class="form-group col-sm-12 no-padding">
										<label for="customername">State</label>
										<select class="form-control select2" name="billing_state">
											<option selected="selected" value="">Select</option>
											<option value="Andaman and Nicobar Islands" <?php if ($customer_detail->user_state == "Andaman and Nicobar Islands") echo 'selected = "selected"'; ?> >Andaman and Nicobar</option>
											<option value="Andhra Pradesh" <?php if ($customer_detail->user_state == "Andhra Pradesh") echo 'selected = "selected"'; ?> >Andhra Pradesh</option>
											<option value="Arunachal Pradesh" <?php if ($customer_detail->user_state == "Arunachal Pradesh") echo 'selected = "selected"'; ?> >Arunachal Pradesh</option>
											<option value="Assam" <?php if ($customer_detail->user_state == "Assam") echo 'selected = "selected"'; ?> >Assam</option>
											<option value="Bihar" <?php if ($customer_detail->user_state == "Bihar") echo 'selected = "selected"'; ?> >Bihar</option>
											<option value="Chandigarh" <?php if ($customer_detail->user_state == "Chandigarh") echo 'selected = "selected"'; ?> >Chandigarh</option>
											<option value="Chhattisgarh" <?php if ($customer_detail->user_state == "Chhattisgarh") echo 'selected = "selected"'; ?> >Chhattisgarh</option>
											<option value="Dadra and Nagar Haveli" <?php if ($customer_detail->user_state == "Dadra and Nagar Haveli") echo 'selected = "selected"'; ?> >Dadra and Nagar Haveli</option>
											<option value="Daman and Diu" <?php if ($customer_detail->user_state == "Daman and Diu") echo 'selected = "selected"'; ?> >Daman and Diu</option>
											<option value="Delhi" <?php if ($customer_detail->user_state == "Delhi") echo 'selected = "selected"'; ?> >Delhi</option>
											<option value="Goa" <?php if ($customer_detail->user_state == "Goa") echo 'selected = "selected"'; ?> >Goa</option>
											<option value="Gujarat" <?php if ($customer_detail->user_state == "Gujarat") echo 'selected = "selected"'; ?> >Gujarat</option>
											<option value="Haryana" <?php if ($customer_detail->user_state == "Haryana") echo 'selected = "selected"'; ?> >Haryana</option>
											<option value="Himachal Pradesh" <?php if ($customer_detail->user_state == "Himachal Pradesh") echo 'selected = "selected"'; ?> >Himachal Pradesh</option>
											<option value="Jammu and Kashmir" <?php if ($customer_detail->user_state == "Jammu and Kashmir") echo 'selected = "selected"'; ?> >Jammu and Kashmir</option>
											<option value="Jharkhand" <?php if ($customer_detail->user_state == "Jharkhand") echo 'selected = "selected"'; ?> >Jharkhand</option>
											<option value="Karnataka" <?php if ($customer_detail->user_state == "Karnataka") echo 'selected = "selected"'; ?> >Karnataka</option>
											<option value="Kerala" <?php if ($customer_detail->user_state == "Kerala") echo 'selected = "selected"'; ?> >Kerala</option>
											<option value="Lakshadweep" <?php if ($customer_detail->user_state == "Lakshadweep") echo 'selected = "selected"'; ?> >Lakshadweep</option>
											<option value="Madhya Pradesh" <?php if ($customer_detail->user_state == "Madhya Pradesh") echo 'selected = "selected"'; ?> >Madhya Pradesh</option>
											<option value="Maharashtra" <?php if ($customer_detail->user_state == "Maharashtra") echo 'selected = "selected"'; ?> >Maharashtra</option>
											<option value="Manipur" <?php if ($customer_detail->user_state == "Manipur") echo 'selected = "selected"'; ?> >Manipur</option>
											<option value="Meghalaya" <?php if ($customer_detail->user_state == "Meghalaya") echo 'selected = "selected"'; ?> >Meghalaya</option>
											<option value="Mizoram" <?php if ($customer_detail->user_state == "Mizoram") echo 'selected = "selected"'; ?> >Mizoram</option>
											<option value="Nagaland" <?php if ($customer_detail->user_state == "Nagaland") echo 'selected = "selected"'; ?> >Nagaland</option>
											<option value="Odisha" <?php if ($customer_detail->user_state == "Odisha") echo 'selected = "selected"'; ?> >Odisha</option>
											<option value="Pondicherry" <?php if ($customer_detail->user_state == "Pondicherry") echo 'selected = "selected"'; ?> >Pondicherry</option>
											<option value="Punjab" <?php if ($customer_detail->user_state == "Punjab") echo 'selected = "selected"'; ?> >Punjab</option>
											<option value="Rajasthan" <?php if ($customer_detail->user_state == "Rajasthan") echo 'selected = "selected"'; ?> >Rajasthan</option>
											<option value="Sikkim" <?php if ($customer_detail->user_state == "Sikkim") echo 'selected = "selected"'; ?> >Sikkim</option>
											<option value="Tamil Nadu" <?php if ($customer_detail->user_state == "Tamil Nadu") echo 'selected = "selected"'; ?> >Tamil Nadu</option>
											<option value="Telangana" <?php if ($customer_detail->user_state == "Telangana") echo 'selected = "selected"'; ?> >Telangana</option>
											<option value="Tripura" <?php if ($customer_detail->user_state == "Tripura") echo 'selected = "selected"'; ?> >Tripura</option>
											<option value="Uttar Pradesh" <?php if ($customer_detail->user_state == "Uttar Pradesh") echo 'selected = "selected"'; ?> >Uttar Pradesh</option>
											<option value="Uttrakhand" <?php if ($customer_detail->user_state == "Uttrakhand") echo 'selected = "selected"'; ?> >Uttarakhand</option>
											<option value="West Bengal" <?php if ($customer_detail->user_state == "West Bengal") echo 'selected = "selected"'; ?> >West Bengal</option>
											<option value="Army Post Office" <?php if ($customer_detail->user_state == "Army Post Office") echo 'selected = "selected"'; ?> >Army Post Office</option>
										</select>
									</div>
									<div class="form-group col-sm-4 no-padding">
										<label for="customername">Country</label>
										<input type="text" disabled class="form-control" name="billing_country" value="India"><small>Operations only in India</small>
									</div>
								</div>
								<div class="col-md-6">
									<p>SHIPPING ADDRES</p>
									<div class="form-group">
										<label for="customername">Address*</label>
										<input type="text" class="form-control" name="shipping_address1" value="<?php echo $customer_detail->shipping_address1;?>">
									</div>
									<div class="form-group">
										<label for="customername">Address Line 2</label>
										<input type="text" class="form-control" name="shipping_address2" value="<?php echo $customer_detail->shipping_address2;?>">
									</div>
									<div class="form-group col-sm-4 no-padding">
										<label for="customername">City</label>
										<input type="text" class="form-control" name="shipping_city" value="<?php echo $customer_detail->shipping_city;?>">
									</div>
									<div class="form-group col-sm-4">
										<label for="customername">ZIP CODE</label>
										<input type="text" class="form-control" name="shipping_zip" value="<?php echo $customer_detail->shipping_zip;?>">
									</div>
									<div class="form-group col-sm-12 no-padding">
										<label for="customername">State</label>
										<select class="form-control select2" name="shipping_state">
											<option selected="selected" value="">Select</option>
											<option value="Andaman and Nicobar Islands" <?php if ($customer_detail->shipping_state == "Andaman and Nicobar Islands") echo 'selected = "selected"'; ?> >Andaman and Nicobar</option>
											<option value="Andhra Pradesh" <?php if ($customer_detail->shipping_state == "Andhra Pradesh") echo 'selected = "selected"'; ?> >Andhra Pradesh</option>
											<option value="Arunachal Pradesh" <?php if ($customer_detail->shipping_state == "Arunachal Pradesh") echo 'selected = "selected"'; ?> >Arunachal Pradesh</option>
											<option value="Assam" <?php if ($customer_detail->shipping_state == "Assam") echo 'selected = "selected"'; ?> >Assam</option>
											<option value="Bihar" <?php if ($customer_detail->shipping_state == "Bihar") echo 'selected = "selected"'; ?> >Bihar</option>
											<option value="Chandigarh" <?php if ($customer_detail->shipping_state == "Chandigarh") echo 'selected = "selected"'; ?> >Chandigarh</option>
											<option value="Chhattisgarh" <?php if ($customer_detail->shipping_state == "Chhattisgarh") echo 'selected = "selected"'; ?> >Chhattisgarh</option>
											<option value="Dadra and Nagar Haveli" <?php if ($customer_detail->shipping_state == "Dadra and Nagar Haveli") echo 'selected = "selected"'; ?> >Dadra and Nagar Haveli</option>
											<option value="Daman and Diu" <?php if ($customer_detail->shipping_state == "Daman and Diu") echo 'selected = "selected"'; ?> >Daman and Diu</option>
											<option value="Delhi" <?php if ($customer_detail->shipping_state == "Delhi") echo 'selected = "selected"'; ?> >Delhi</option>
											<option value="Goa" <?php if ($customer_detail->shipping_state == "Goa") echo 'selected = "selected"'; ?> >Goa</option>
											<option value="Gujarat" <?php if ($customer_detail->shipping_state == "Gujarat") echo 'selected = "selected"'; ?> >Gujarat</option>
											<option value="Haryana" <?php if ($customer_detail->shipping_state == "Haryana") echo 'selected = "selected"'; ?> >Haryana</option>
											<option value="Himachal Pradesh" <?php if ($customer_detail->shipping_state == "Himachal Pradesh") echo 'selected = "selected"'; ?> >Himachal Pradesh</option>
											<option value="Jammu and Kashmir" <?php if ($customer_detail->shipping_state == "Jammu and Kashmir") echo 'selected = "selected"'; ?> >Jammu and Kashmir</option>
											<option value="Jharkhand" <?php if ($customer_detail->shipping_state == "Jharkhand") echo 'selected = "selected"'; ?> >Jharkhand</option>
											<option value="Karnataka" <?php if ($customer_detail->shipping_state == "Karnataka") echo 'selected = "selected"'; ?> >Karnataka</option>
											<option value="Kerala" <?php if ($customer_detail->shipping_state == "Kerala") echo 'selected = "selected"'; ?> >Kerala</option>
											<option value="Lakshadweep" <?php if ($customer_detail->shipping_state == "Lakshadweep") echo 'selected = "selected"'; ?> >Lakshadweep</option>
											<option value="Madhya Pradesh" <?php if ($customer_detail->shipping_state == "Madhya Pradesh") echo 'selected = "selected"'; ?> >Madhya Pradesh</option>
											<option value="Maharashtra" <?php if ($customer_detail->shipping_state == "Maharashtra") echo 'selected = "selected"'; ?> >Maharashtra</option>
											<option value="Manipur" <?php if ($customer_detail->shipping_state == "Manipur") echo 'selected = "selected"'; ?> >Manipur</option>
											<option value="Meghalaya" <?php if ($customer_detail->shipping_state == "Meghalaya") echo 'selected = "selected"'; ?> >Meghalaya</option>
											<option value="Mizoram" <?php if ($customer_detail->shipping_state == "Mizoram") echo 'selected = "selected"'; ?> >Mizoram</option>
											<option value="Nagaland" <?php if ($customer_detail->shipping_state == "Nagaland") echo 'selected = "selected"'; ?> >Nagaland</option>
											<option value="Odisha" <?php if ($customer_detail->shipping_state == "Odisha") echo 'selected = "selected"'; ?> >Odisha</option>
											<option value="Pondicherry" <?php if ($customer_detail->shipping_state == "Pondicherry") echo 'selected = "selected"'; ?> >Pondicherry</option>
											<option value="Punjab" <?php if ($customer_detail->shipping_state == "Punjab") echo 'selected = "selected"'; ?> >Punjab</option>
											<option value="Rajasthan" <?php if ($customer_detail->shipping_state == "Rajasthan") echo 'selected = "selected"'; ?> >Rajasthan</option>
											<option value="Sikkim" <?php if ($customer_detail->shipping_state == "Sikkim") echo 'selected = "selected"'; ?> >Sikkim</option>
											<option value="Tamil Nadu" <?php if ($customer_detail->shipping_state == "Tamil Nadu") echo 'selected = "selected"'; ?> >Tamil Nadu</option>
											<option value="Telangana" <?php if ($customer_detail->shipping_state == "Telangana") echo 'selected = "selected"'; ?> >Telangana</option>
											<option value="Tripura" <?php if ($customer_detail->shipping_state == "Tripura") echo 'selected = "selected"'; ?> >Tripura</option>
											<option value="Uttar Pradesh" <?php if ($customer_detail->shipping_state == "Uttar Pradesh") echo 'selected = "selected"'; ?> >Uttar Pradesh</option>
											<option value="Uttrakhand" <?php if ($customer_detail->shipping_state == "Uttrakhand") echo 'selected = "selected"'; ?> >Uttarakhand</option>
											<option value="West Bengal" <?php if ($customer_detail->shipping_state == "West Bengal") echo 'selected = "selected"'; ?> >West Bengal</option>
											<option value="Army Post Office" <?php if ($customer_detail->shipping_state == "Army Post Office") echo 'selected = "selected"'; ?> >Army Post Office</option>
										</select>
									</div>
									<div class="form-group col-sm-4 no-padding">
										<label for="customername">Country</label>
										<input type="text" class="form-control" name="shipping_country" value="India" disabled><small>Operations only in India</small>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="form-group col-sm-4 no-padding">
										<div class="payment-content" aria-hidden="false" style="display: block;">
											<p>Activate / Deactivate User</p>
											<div class="radio">
												<label class="radio-inline">
													<input type="radio" name="userstatus" value="1" <?php echo ($customer_detail->user_status == 1) ? 'checked' : ''; ?> /> Activated
												</label>
												<label class="radio-inline">
													<input type="radio" name="userstatus" value="0" <?php echo ($customer_detail->user_status == 0) ? 'checked' : ''; ?> />Deactivated
												</label>
											</div>


										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- /.box-body -->

					<div class="box-footer">
						<?php echo form_submit('submit', 'Save & Update', 'class="btn bg-olive btn-lg btn-labeled fa fa-upload pull-right"');?>

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
<?php else: ?>
<?php redirect('admin/customers/view_all_customers')?>
<?php endif; ?>
<?php else:?>

<?php $this->session->set_flashdata('admin_login_failed', 'You are not allowed, contact HOD'); ?>

<?php redirect('admin/auth/login');?>
<?php endif; ?>