<?php if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) : ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Data Tables
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
											<?php echo form_open('admin/products/view_all');?>
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
												<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 10px;">ID</th>
												<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 61px;">Image</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Name</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 97px;">SKU/ID(s)</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 54px;">Price</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 100px;">Stock</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 112px;">Category</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 112px;">Sub Category</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 112px;">Vendor</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 40px;">Satus</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($products_variants as $product): ?>
											<tr role="row" class="odd">
												<td class="sorting_1">
													<?php echo $product->id; ?>
												</td>
												<td class="sorting_1 text-center">
													<img src="<?php echo base_url(); ?>assets/images/products/<?php echo $product->image; ?>" alt="" height="40px">
												</td>
												<td>
													<?php echo $product->product_variant_title; ?>
													<div>
														<p>
															<a data-toggle="tooltip" title="" data-original-title="View" class="btn btn-warning btn-xs" href="<?php echo base_url(); ?><?php echo $product->id.'/'.$product->slug; ?>" target="_blank"><span class="glyphicon glyphicon-eye-open"></span></a>
															<a data-toggle="tooltip" title="" data-original-title="Edit" class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>admin/products/edit/<?php echo $product->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
															<a data-toggle="tooltip" title="" data-original-title="Delete" class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>admin/products/delete/<?php echo $product->id; ?>"><span class="glyphicon glyphicon-trash"></span></a>
														</p>
													</div>
												</td>
												<td>
													<?php echo $product->ean; ?>
												</td>
												<td>
													<?php echo '<i class="fa fa-inr"></i> '.$product->price; ?>
												</td>
												<td>
													<?php echo $product->stock_status; ?>
												</td>
												<td>
													<?php echo $this->Product_model->get_category_by_id($product->category_id)[0]->name; ?>
												</td>
												<td>
													
												</td>
												<td>
													
												</td>
												<td>
													<?php echo $product->status; ?>
												</td>
											</tr>
											<?php endforeach;?>
										</tbody>
										<tfoot>
											<tr>
												<th rowspan="1" colspan="1">Image</th>
												<th rowspan="1" colspan="1">Name</th>
												<th rowspan="1" colspan="1">SKU/Id</th>
												<th rowspan="1" colspan="1">Price</th>
												<th rowspan="1" colspan="1">Stock</th>
												<th rowspan="1" colspan="1">Category</th>
												<th rowspan="1" colspan="1">Vendor</th>
												<th rowspan="1" colspan="1">Status</th>
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
										$total = $this->Product_model->record_count();
										echo "Showing ".($start)." - "."of $total total results";
										?>

									</div>
								</div>
								<div class="col-sm-7">
									<div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
										<ul class="pagination">
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