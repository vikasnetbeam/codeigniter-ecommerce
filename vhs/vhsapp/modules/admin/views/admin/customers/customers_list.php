<?php if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) : ?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
			Customer List
			<small>advanced tables</small>
		</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">Tables</a></li>
				<li class="active">Data tables</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">

					<div class="box">
						<div class="box-header">
							<!--						<h3 class="box-title">Data Table With Full Features</h3>-->
							<?php if($this->session->flashdata('customer_deleted')) : ?>
								<div class="alert alert-danger">
									<?php echo $this->session->flashdata('customer_deleted'); ?>
								</div>
								<?php endif; ?>
									<?php if($this->session->flashdata('customer_deleted_erro')) : ?>
										<div class="alert alert-danger">
											<?php echo $this->session->flashdata('customer_deleted_erro'); ?>
										</div>
										<?php endif; ?>
											<?php if($this->session->flashdata('customer_updated')) : ?>
												<div class="alert alert-success">
													<?php echo $this->session->flashdata('customer_updated'); ?>
												</div>
												<?php endif; ?>


						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div class="row">
									<div class="col-sm-6">
										<div class="dataTables_length" id="example1_length">
											<label>Show
												<?php echo form_open('admin/customers/view_all_customers');?>
													<select name="limit" onchange="form.submit()" aria-controls="example1" class="form-control input-sm">
														<option value="10" <?php if ($this->input->post('limit') == 10){ echo "selected='selected'";} ?>>10</option>
														<option value="25" <?php if ($this->input->post('limit') == 25){ echo "selected='selected'";} ?>>25</option>
														<option value="50" <?php if ($this->input->post('limit') == 50){ echo "selected='selected'";} ?>>50</option>
														<option value="100" <?php if ($this->input->post('limit') == 100){ echo "selected='selected'";} ?>>100</option>
													</select>
													<?php echo form_close();?>

														entries</label>
										</div>
									</div>
									<div class="col-sm-6">
										<div id="example1_filter" class="dataTables_filter">
											<label>Search:
												<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
											</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
											<thead>
												<tr role="row">
													<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 10px;">Username</th>
													<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 190px;"><i class="fa fa-bar-chart "></i> Name</th>
													<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 40px;"><i class="fa fa-check-square "></i> Email</th>
													<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 224px;"><i class="fa fa-phone "></i> Phone</th>
													<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 40px;"><i class="fa fa-money "></i> Status</th>
													<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 10px;"><i class="fa fa-pencil "></i> Edit</th>
													<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 10px;"><i class="fa fa-trash-o "></i> Delete</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($customers as $customer): ?>
													<tr role="row" class="odd">
														<td class="sorting_1">
															#
															<a href="<?php echo base_url(); ?>admin/customers/profile/<?php echo $customer->id; ?>"><?php echo $customer->username; ?></a>
														</td>
														<td>
															<?php echo $this->User_model->get_user($customer->id)->first_name.' '.$this->User_model->get_user($customer->id)->last_name; ?>
														</td>
														<td>
															<?php echo $this->User_model->get_user($customer->id)->email; ?>
														</td>
														<td>
															<?php echo $customer->user_phone; ?>
														</td>
														<td>
															<?php if($customer->user_status == 1): ?>
																<span class="label label-success">Active</span>
																<?php else:?>
																	<span class="label label-warning">Inactive</span>
																	<?php endif;?>
														</td>
														<td>
															<p data-placement="top" data-toggle="tooltip" title="Edit">
																<a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>admin/customers/profile/<?php echo $customer->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
															</p>
														</td>
														<td>
															<p data-placement="top" data-toggle="tooltip" title="Delete">
																<a class="tn btn-danger btn-xs" href="<?php echo base_url(); ?>admin/customers/delete/<?php echo $customer->id; ?>"><span class="glyphicon glyphicon-trash"></span></a>
															</p>
														</td>
													</tr>
													<?php endforeach;?>
											</tbody>
											<tfoot>
												<tr>
													<th rowspan="1" colspan="1">Username</th>
													<th rowspan="1" colspan="1">Name</th>
													<th rowspan="1" colspan="1">Email</th>
													<th rowspan="1" colspan="1">Phone</th>
													<th rowspan="1" colspan="1">Status</th>
													<th rowspan="1" colspan="1">Edit</th>
													<th rowspan="1" colspan="1">Delete</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-5">
										<div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
											<?php 
										$start =  $this->pagination->cur_page * $this->pagination->per_page;
										$end = $start * $this->pagination->cur_page;
										$total = $this->Orders_model->record_count();
										echo "Showing ".($start)." - "."of $total total results";
										?>

										</div>
									</div>
									<div class="col-sm-7">
										<div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
											<ul class="pagination">
												<!--
<li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li>

<li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $links;?></a></li>

<li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li>-->

												<?php echo $links;?>


											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /.box-body -->
					</div>





				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<?php else:?>

		<?php $this->session->set_flashdata('admin_login_failed', 'You are not allowed, contact HOD'); ?>

			<?php redirect('admin/auth/login');?>
				<?php endif; ?>