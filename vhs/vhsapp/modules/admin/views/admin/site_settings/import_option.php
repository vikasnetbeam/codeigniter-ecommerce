<?php if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) : ?>
<div class="content-wrapper" style="min-height: 946px;">
	<section class="content-header">
		<h1>
			Import Options
			<small>Choose Options to import</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="#">Site Settings</a></li>
			<li class="active">Product Import</li>
		</ol>
	</section>
	<?php if($this->session->flashdata('error')) : ?>
	<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
	<?php endif; ?>
	<?php if ($this->session->flashdata('success') == TRUE): ?>
	<div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
	<?php endif; ?>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-body">
						<div>
							<a href="<?php echo base_url();?>admin/csv/products" class="btn btn-primary"> Product Import</a>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php else:?>

<?php $this->session->set_flashdata('admin_login_failed', 'You are not allowed, contact HOD'); ?>

<?php redirect('admin/auth/login');?>
<?php endif; ?>