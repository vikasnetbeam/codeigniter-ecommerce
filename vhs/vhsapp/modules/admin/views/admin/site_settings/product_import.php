<?php if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) : ?>
<div class="content-wrapper" style="min-height: 946px;">
	<section class="content-header">
		<h1>
			General Setting
			<small>Front End</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="<?php echo base_url();?>admin/csv/">CSV Import</a></li>
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
						<br>
						<h2> Product Import</h2>
						<?php echo form_open_multipart('admin/csv/importcsv');?>
						<input type="file" name="userfile">
						<br>
						<br>
						<input type="submit" name="submit" value="UPLOAD" class="btn btn-primary">
						<?php form_close();?>

						<br>
						<br>
						<table class="table table-striped table-hover table-bordered">
							<caption>Address Book List</caption>
							<thead>
								<tr>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Phone</th>
									<th>Email</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="4">There are currently No Addresses</td>
								</tr>


								<tr>
									<td>Name ?></td>
									<td>LastName ?></td>
									<td>9999999 ?></td>
									<td>email></td>
								</tr>

							</tbody>
						</table>


						<hr>
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