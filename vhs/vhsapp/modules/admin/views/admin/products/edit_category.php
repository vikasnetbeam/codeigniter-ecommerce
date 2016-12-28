<?php if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) : ?>
<div class="content-wrapper" style="min-height: 946px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Edit Product Category 
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
						<?php if($this->session->flashdata('category_updated')) : ?>
						<div class="alert alert-success">
							<?php echo $this->session->flashdata('category_updated'); ?>
						</div>
						<?php endif; ?>
						<?php if($this->session->flashdata('errors')) : ?>
						<div class="alert alert-danger">
							<?php echo $this->session->flashdata('errors'); ?>
						</div>
						<?php endif; ?>
						<a href="<?php echo base_url();?>admin/products/view_all_categories/" class="btn btn-danger btn-xs pull-right">Back to Category List</a>

					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<?php echo form_open_multipart('admin/products/edit_category/'.$products_category->id.'');?>
					<div class="box-body">
						<div class="form-group col-md-6">
							<label for="exampleInputEmail1">Category Title</label>
							<input type="text" class="form-control" name="cat_name" value="<?php echo $products_category->name; ?>">
						</div>

						<div class="form-group col-md-12">
							<label for="exampleInputPassword1">Category Description</label>
							<textarea class="form-control" name="cat_description">
								<?php echo $products_category->description; ?>
							</textarea>
						</div>

						<!--
<div class="form-group col-md-3">
<label for="exampleInputFile">Category Image</label>
<input type="file" name="cat_image">
<p class="help-block">.jpg or .PNG file only.</p>
</div>
-->

					</div>

					<!-- /.box-body -->

					<div class="box-footer">
						<?php echo form_submit('submit', 'Save', 'class="btn bg-olive btn-lg btn-labeled fa fa-upload pull-right"');?>

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