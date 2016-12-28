<?php if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) : ?>
<div class="content-wrapper" style="min-height: 946px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Edit New Admin
			<small>Preview</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Admin Setting</a></li>
			<li class="active">Edit Admin</li>
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
						<?php if($this->session->flashdata('seller_added')) : ?>
						<div class="alert alert-success">
							<?php echo $this->session->flashdata('seller_added'); ?>
						</div>
						<?php endif; ?>
						<?php if($this->session->flashdata('errors')) : ?>
						<div class="alert alert-danger">
							<?php echo $this->session->flashdata('errors'); ?>
						</div>
						<?php endif; ?>

						<a href="<?php echo base_url();?>admin/customers/view_all_customers/" class="btn btn-danger btn-xs pull-right">Back to Seller List</a>

					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<?php echo form_open_multipart('admin/site_settings/edit_admin/'.$admin_details->admin_username.'');?>
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
									<input type="text" class="form-control" name="first_name" value="<?php echo $admin_details->first_name?>">
								</div>
								<div class="form-group col-md-3">
									<label for="customername">last Name*</label>
									<input type="text" class="form-control" name="last_name" value="<?php echo $admin_details->last_name?>">
								</div>
								<div class="form-group col-md-5">
									<label for="customername">Email*</label>
									<input type="text" class="form-control" name="email" value="<?php echo $admin_details->admin_email?>" disabled>
								</div>

								<div class="form-group col-md-5">
									<label for="image">Mobile No.*</label>
									<input type="text" class="form-control" name="username" value="<?php echo $admin_details->admin_username?>" disabled>
								</div>
								<div class="form-group col-md-5">
									<label for="password">Password</label>
									<input type="password" class="form-control" name="password" value="<?php echo $admin_details->admin_password?>">
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