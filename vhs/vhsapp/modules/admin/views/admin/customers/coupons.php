<?php if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) : ?>
	<div class="content-wrapper" style="min-height: 946px;">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
			General Setting
			<small>Front End</small>
		</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="#">Site Settings</a></li>
				<li class="active">General Settings</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					
					
				</div>
			</div>
		</section>
	</div>
	<?php else:?>

		<?php $this->session->set_flashdata('admin_login_failed', 'You are not allowed, contact HOD'); ?>

			<?php redirect('admin/auth/login');?>
				<?php endif; ?>