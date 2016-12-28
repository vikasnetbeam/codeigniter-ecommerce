<?php if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) : ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Sub Categories
			<small>view All</small>
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
						<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#subcategory">
							<strong>Add Sub Category</strong>
						</button>
					</div>
					<?php if($this->session->flashdata('subcategory_created')) : ?>
					<div class="col-md-12">
						<div class=" col-md-4 alert alert-success">
							<?php echo $this->session->flashdata('subcategory_created'); ?>
						</div>
					</div>
					<?php endif; ?>
					<?php if($this->session->flashdata('record_updated')) : ?>
					<div class="col-md-12">
						<div class="col-md-6 alert alert-danger">
							<?php echo $this->session->flashdata('record_updated'); ?>
						</div>
					</div>
					<?php endif; ?>
					<?php if($this->session->flashdata('errors')) : ?>
					<div class="col-md-12">
						<div class="col-md-6 alert alert-danger">
							<?php echo $this->session->flashdata('errors'); ?>
						</div>
					</div>
					<?php endif; ?>
					<!-- /.box-header -->
					<div class="box-body">
						<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
							<div class="row">
								<div class="col-sm-6">
									<div class="dataTables_length" id="example1_length">
										<label>Show
											<?php echo form_open('admin/products/sub_category');?>
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
												<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 181px;">Name</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Parent Category</th>
												<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Slug</th>

											</tr>
										</thead>
										<tbody>
											<?php foreach($subcategories as $category): ?>
											<tr role="row" class="odd">

												<td>
													<?php echo $category->subcategory_name; ?>
													<div>
														<a href="<?php echo base_url(); ?>admin/products/edit_subcategory/<?php echo $category->subcategory_id ?>">Edit</a> |
														<a href="<?php echo base_url(); ?>admin/products/delete_subcategory/<?php echo $category->subcategory_id ?>">Delete</a>
														<!--														<a href="">View</a>-->
													</div>
												</td>
												<td>
													<?php echo $this->Product_model->get_category_by_id($category->parent_category)[0]->name; ?>
												</td>
												<td>
													<?php echo $category->subcategory_slug; ?>
												</td>

											</tr>
											<?php endforeach;?>
										</tbody>
										<tfoot>
											<tr>
												<th rowspan="1" colspan="1">Name</th>
												<th rowspan="1" colspan="1">Parent Category</th>
												<th rowspan="1" colspan="1">Slug</th>

											</tr>
										</tfoot>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-5">
									<div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
										<?php 
										//										$start =  $this->pagination->cur_page * $this->pagination->per_page;
										//										$end = $start * $this->pagination->cur_page;
										$total = $this->Product_model->category_count();
										echo "Total $total Categories";
										?>
									</div>
								</div>
								<div class="col-sm-7">
									<div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
										<ul class="pagination">
											<!--											<?php echo $links;?>-->
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