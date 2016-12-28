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
						<?php if($this->session->flashdata('group_updated')) : ?>
						<div class="alert alert-success">
							<?php echo $this->session->flashdata('group_updated'); ?>
						</div>
						<?php endif; ?>
						<?php if($this->session->flashdata('errors')) : ?>
						<div class="alert alert-danger">
							<?php echo $this->session->flashdata('errors'); ?>
						</div>
						<?php endif; ?>
						<a href="<?php echo base_url();?>admin/products/view_variant/" class="btn btn-danger btn-xs pull-right">Back to Group List</a>

					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<?php echo form_open_multipart('admin/products/edit_variant_value/'.$variant_values[0]->id.'');?>
					<div class="box-body">
						<div class="form-group col-xs-12">
							<label>Variant Parent Category</label>
							<select name="parent_category" id="variant_parent_category" class="category form-control" style="width:100%;" onchange="showvariantgroup(this.value);">
								<option value="">Select Parent Category</option>
								<?php foreach($this->Product_model->get_variant_group_by() as $value): ?>
								<option value="<?php echo $value->category_id; ?>" <?php if($value->category_id == $variant_values[0]->category_id) echo 'selected = "selected"'; ?>><?php echo $this->Product_model->get_category_detail_by_id($value->category_id)->name; ?></option>
								<?php endforeach; ?>
							</select>

						</div>
						<div class="form-group col-xs-12">
							<label>Variant Group Name</label>
							<select name="variant_group_name" id="product_variantgroup" class="category form-control" style="width:100%;">
								<option value="">Select Parent Menu</option>
								<?php foreach($this->Product_model->get_all_variant_group() as $group): ?>
								<option value="<?php echo $group->id; ?>" <?php if($group->id == $variant_values[0]->group_id) echo 'selected = "selected"'; ?>><?php echo $group->id.' - '.$group->name; ?></option>
								<?php endforeach; ?>
							</select>

						</div>
						<div class=" form-group col-md-12">
							<label>Variant Value*</label>
							<input type="text" class="form-control" name="variant_value" value="<?php echo $variant_values[0]->value; ?>">
						</div>
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