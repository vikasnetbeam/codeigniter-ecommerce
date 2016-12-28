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
	<section class="content">
		<div class="row">
			<?php echo form_open_multipart('admin/site_settings/save_setting');?>
			<div class="col-md-12">
				<?php if($this->session->flashdata('setting_save')) : ?>
				<div class="alert alert-success">
					<?php echo $this->session->flashdata('setting_save'); ?>
				</div>
				<?php endif; ?>
				<?php if($this->session->flashdata('logo_save')) : ?>
				<div class="alert alert-success">
					<?php echo $this->session->flashdata('logo_save'); ?>
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
						<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">General Setting</a></li>
						<li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Logo</a></li>
						<li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Email Setup</a>
						<li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Home Products</a>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1">
							<div class="panel">
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th>Place</th>
												<th>Options</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td>Site Meta Title</td>
												<td class="text-right">
													<input type="text" class="form-control" name="site_title" placeholder="Site Title" value="<?php echo $this->global_data['site_title'];?>" maxlength="60">
												</td>
											</tr>
											<tr>
												<td>Site Meta Description</td>
												<td class="text-right">
													<input type="text" class="form-control" name="" placeholder="Site Title" value="">
												</td>
											</tr>
											<tr>
												<td>Site Meta Keyword</td>
												<td class="text-right">
													<input type="text" class="form-control" name="" placeholder="Site Title" value="">
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
												<th>Alt Text</th>
												<th class="text-right">Options</th>
											</tr>
										</thead>

										<tbody>
											<?php 
											$logo_data = json_decode($this->global_data['home_top_logo']);

											?>
											<tr>
												<td>Homepage Header Logo</td>
												<td>
													<div class="inner-div tr-bg img-fixed">
														<img class="" src="<?php echo base_url().'assets/images/gen/'.$logo_data->upload_data->file_name;?>" id="home_top_logo" height="50">
													</div>
												</td>
												<td>
													<input type="text" name="logoalt" class="form-control" value="<?php echo $logo_data->alt;?>">
												</td>
												<td class="">
													<input type="file" name="homelogo" id="file" class="inputfile form-control">
													<label for="file"><svg width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a logo&hellip;</span></label>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab_3">
							<div class="panel">
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th>Place</th>
												<th>Options</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td>Email Sender</td>
												<td class="text-right">
													<input type="text" class="form-control" name="email_sender" placeholder="Email Sender Name" value="<?php echo $this->global_data['email_sender'];?>">
												</td>
											</tr>
											<tr>
												<td>Email Address</td>
												<td class="text-right">
													<input type="email" class="form-control" name="system_email" placeholder="System Email" value="<?php echo $this->global_data['system_email'];?>">
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane" id="tab_4">
							<div class="panel">
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th>Place</th>
												<th>Options</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td>Home Page Category</td>
												<td>
													<div>
														<?php 
														$categorires = json_decode($this->global_data['home_category']);
														?>
														<select name="home_category[]" class="form-control category" multiple="multiple" data-placeholder="Select Categorires" style="width: 100%;">
															<?php foreach($this->Product_model->get_categories() as $cat):?>						
															<option value="<?php echo $cat->id?>" <?php if( in_array($cat->id, $categorires) ){echo 'selected';}?> > <?php echo $cat->id.' - '.$cat->name?> </option>
															<?php endforeach;?>
														</select>
													</div>
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
			<?php echo form_close();?>

		</div>

	</section>
</div>
<?php else:?>

<?php $this->session->set_flashdata('admin_login_failed', 'You are not allowed, contact HOD'); ?>

<?php redirect('admin/auth/login');?>
<?php endif; ?>