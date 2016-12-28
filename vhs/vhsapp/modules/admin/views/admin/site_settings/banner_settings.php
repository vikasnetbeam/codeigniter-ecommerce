<?php if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) : ?>
<div class="content-wrapper" style="min-height: 946px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Slider Setting
			<small>Front End</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="#">Site Settings</a></li>
			<li class="active">General Settings</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<?php if($this->session->flashdata('slider_added')) : ?>
				<div class="alert alert-success">
					<?php echo $this->session->flashdata('slider_added'); ?>
				</div>
				<?php endif; ?>
				<!-- Main content -->
				<?php if($this->session->flashdata('errors')) : ?>
				<div class="alert alert-danger">
					<?php echo $this->session->flashdata('errors'); ?>
				</div>
				<?php endif; ?>
				<?php if($this->session->flashdata('upload_error')) : ?>
				<div class="alert alert-danger">
					<?php echo $this->session->flashdata('upload_error'); ?>
				</div>
				<?php endif; ?>

				<!-- Custom Tabs -->
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Slider Setting</a></li>
						<li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Home Page Banner</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Select Logo</h3>
								</div>

								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th style="width: 300px;">Place</th>
												<th style="width: 500px;">Logo</th>
												<th class="text-right">Options</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td>Home Page Slider</td>
												<td>
												<?php $banners = json_decode($this->global_data['slider_images']); ?>
													<div class="inner-div tr-bg img-fixed">
														<?php foreach($banners->name as $image):?>
														<?php echo $image;?><img class="img-responsive" src="<?php echo base_url();?>assets/images/slider/<?php echo $image;?>" id="<?php echo $image;?>" width="100"><br>
														<?php endforeach; ?>
													</div>
												</td>
												<td class="text-right">
													<button type="button" class="btn btn-info btn-labeled fa fa-plus-circle" data-toggle="modal" data-target="#sliderImageModel">Change</button>	
												</td>
											</tr>
											<tr>
												<td>Homepage Slider Side Banner</td>
												<td>
													<div class="inner-div tr-bg img-fixed">
														<img class="img-responsive img-sm" src="http://localhost/active/uploads/logo_image/logo_16.png" id="home_top_logo">
													</div>
												</td>
												<td class="text-right">
													<button type="button" class="btn btn-info btn-labeled fa fa-plus-circle" data-toggle="modal" data-target="#sliderBannerImage">Change</button>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="tab_2">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Select Logo</h3>
								</div>

								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th>Place</th>
												<th>Logo</th>
												<th class="text-right">Options</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td>Admin Logo</td>
												<td>
													<div class="inner-div tr-bg img-fixed">
														<img class="img-responsive img-sm" src="http://localhost/active/uploads/logo_image/logo_18.png" id="admin_login_logo">
													</div>
												</td>
												<td class="text-right">
													
													<span class="btn btn-info btn-labeled fa fa-plus-circle" onclick="ajax_modal('show_all/selectable','Select Logo','Successfully Selected!','logo_set','admin_login_logo')">Change</span>
												</td>
											</tr>
											<tr>
												<td>Homepage Header Logo</td>
												<td>
													<div class="inner-div tr-bg img-fixed">
														<img class="img-responsive img-sm" src="http://localhost/active/uploads/logo_image/logo_16.png" id="home_top_logo">
													</div>
												</td>
												<td class="text-right">
													<span class="btn btn-info btn-labeled fa fa-plus-circle" onclick="ajax_modal('show_all/selectable','Select Logo','Successfully Selected!','logo_set','home_top_logo')">
														Change                                                    </span>
												</td>
											</tr>
											<tr>
												<td>Homepage Footer Logo</td>
												<td>
													<div class="inner-div tr-bg img-fixed">
														<img class="img-responsive img-sm" src="http://localhost/active/uploads/logo_image/logo_2.png" id="home_bottom_logo" alt="User_Image">
													</div>
												</td>
												<td class="text-right">
													<span class="btn btn-info btn-labeled fa fa-plus-circle" onclick="ajax_modal('show_all/selectable','Select Logo','Successfully Selected!','logo_set','home_bottom_logo')">
														Change                                                    </span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- /.tab-pane -->
						<input type="submit" class="btn btn-success" name="submit">
					</div>
					<!-- /.tab-content -->
				</div>
				<!-- nav-tabs-custom -->
			</div>

		</div>

	</section>
</div>
<?php else:?>

<?php $this->session->set_flashdata('admin_login_failed', 'You are not allowed, contact HOD'); ?>

<?php redirect('admin/auth/login');?>
<?php endif; ?>