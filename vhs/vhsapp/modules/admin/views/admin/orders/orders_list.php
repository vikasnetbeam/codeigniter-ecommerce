<?php if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) : ?>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Order List
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
						<h3 class="box-title">Data Table With Full Features</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
							<div class="row">
								<div class="col-sm-6">
									<div class="dataTables_length" id="example1_length">
										<label>Show
											<?php echo form_open('admin/orders/view_orders');?>
											<select name="limit" onchange="form.submit()" aria-controls="example1" class="form-control input-sm">
												<option value="10" <?php if ($this->input->post('limit') == 10){ echo "selected='selected'";} ?>>10</option>
												<option value="25" <?php if ($this->input->post('limit') == 25){ echo "selected='selected'";} ?>>25</option>
												<option value="50" <?php if ($this->input->post('limit') == 50){ echo "selected='selected'";} ?>>50</option>
												<option value="100" <?php if ($this->input->post('limit') == 100){ echo "selected='selected'";} ?>>100</option>
											</select>
											<?php echo form_close(); ?>
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
									<?php if($orders): ?>
									<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
										<thead>
											<tr role="row">
												<th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 5px;"><input id="selectAllBoxes" type="checkbox"></th>
												<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 5px;">OrderId</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 190px;"><i class="fa fa-bar-chart "></i> Detail</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 40px;"><i class="fa fa-check-square "></i> Purchased</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 224px;"><i class="fa fa-send "></i> Ship To</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 40px;"><i class="fa fa-money "></i> Total</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 10px;"><i class="fa fa-wrench "></i>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($orders as $order): ?>
											<tr role="row" class="odd">
												<td>
													<input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="<?php echo $order->id; ?>">
												</td>
												<td class="sorting_1">
													#<?php echo $order->id; ?>
												</td>
												<td>
													<?php 
													echo '<strong>First Name:</strong> '.$this->Orders_model->get_customer($order->customer_id)->first_name.' /<br> '.
														'<strong>User Name:</strong> '.$this->Orders_model->get_customer($order->customer_id)->username.' /<br> '.
														'<strong>User Email:</strong> '.$this->Orders_model->get_customer($order->customer_id)->email;
													?>
													<div>
														<a href="">Edit</a> |
														<a href="">Delete</a> |
														<a href="<?php echo base_url();?>admin/orders/view_order/<?php echo $order->id;?>">View</a>
													</div>
												</td>
												<td>
													<?php echo $order->order_date; ?>
												</td>
												<td>
													<?php echo $order->address.' '.$order->address2.' '.$order->city.' '.$order->state.' '.$order->address.' '.$order->zipcode; ?>
												</td>
												<td>
													<?php echo '<i class="fa fa-inr"></i> '.$order->final_amount; ?>
												</td>

												<td>
													<?php echo $order->status; ?>
												</td>
											</tr>
											<?php endforeach; ?>
										</tbody>
										<tfoot>
											<tr>
												<th rowspan="1" colspan="1">Order#id</th>
												<th rowspan="1" colspan="1">Details</th>
												<th rowspan="1" colspan="1">Purchased</th>
												<th rowspan="1" colspan="1">Ship To</th>
												<th rowspan="1" colspan="1">Total</th>
												<th rowspan="1" colspan="1">Action</th>
											</tr>
										</tfoot>
									</table>
									<?php else: ?>
									<div class="col-md-12 bg-success text-center"><h2>There is no Order!</h2></div>
									<?php endif; ?>
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