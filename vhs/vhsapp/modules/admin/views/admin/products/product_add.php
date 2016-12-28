<?php if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) : ?>

<div class="content-wrapper" style="min-height: 946px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Add New Product 
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
				<div class="box box-danger">
					<div class="box-header with-border">
						<!--						<h3 class="box-title">Product Form</h3>-->
						<?php if($this->session->flashdata('product_added')) : ?>
						<div class="alert alert-success">
							<?php echo $this->session->flashdata('product_added'); ?>
						</div>
						<?php endif; ?>
						<?php if($this->session->flashdata('errors')) : ?>
						<div class="alert alert-danger">
							<?php echo $this->session->flashdata('errors'); ?>
						</div>
						<?php endif; ?>
						<?php if($this->session->flashdata('uploadError')) : ?>
						<div class="alert alert-danger">
							<?php echo $this->session->flashdata('uploadError'); ?>
						</div>
						<?php endif; ?>
						<a href="<?php echo base_url();?>admin/products/view_all/" class="btn btn-danger btn-xs pull-right">Back to Product List</a>

					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<?php echo form_open_multipart('admin/products/add/');?>
					<div class="box-body">
						<div class="form-group col-md-6">
							<label for="exampleInputEmail1" class="text-uppercase">Product Title</label>
							<input type="text" class="form-control" name="product_name" placeholder="Product Name">
						</div>
						<div class="form-group col-md-12">
							<div class="col-md-6">
								<label for="product feature" class="text-uppercase">Product Features 1</label>
								<input type="text" class="form-control" name="feature[]" placeholder="Feature Line 1">
							</div>
							<div class="col-md-6">
								<label for="product feature" class="text-uppercase">Product Features 2</label>
								<input type="text" class="form-control" name="feature[]" placeholder="Feature Line 2">
							</div>
							<div class="col-md-6">
								<label for="product feature" class="text-uppercase">Product Features 3</label>
								<input type="text" class="form-control" name="feature[]" placeholder="Feature Line 3">
							</div>
							<div class="col-md-6">
								<label for="product feature" class="text-uppercase">Product Features 4</label>
								<input type="text" class="form-control" name="feature[]" placeholder="Feature Line 4">
							</div>
							<div class="col-md-6">
								<label for="product feature" class="text-uppercase">Product Features 5</label>
								<input type="text" class="form-control" name="feature[]" placeholder="Feature Line 5">
							</div>
							<div class="col-md-6">
								<label for="product feature" class="text-uppercase">Product Features 6</label>
								<input type="text" class="form-control" name="feature[]" placeholder="Feature Line 6">
							</div>

						</div>
						<div class="form-group col-md-12">
							<label for="description" class="text-uppercase">Product Description</label>
							<textarea class="form-control myTextEditor" name="description"></textarea>

						</div>
						<div class="form-group col-md-3">
							<label for="category" class="text-uppercase">Category</label>
							<select name="product_category" id="product_p_category" class="form-control category" onchange="showsubcat(this.value);">
								<option value="">Select Option</option>
								<?php foreach($this->Product_model->get_categories() as $cat):?>
								<option value="<?php echo $cat->id?>"><?php echo $cat->name?></option>
								<?php endforeach;?>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label for="exampleInputPassword1" class="text-uppercase">Sub Category</label>
							<select name="product_subcategory" id="product_subcategory" class="form-control category">
								<option value="">Select Options</option>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label for="brand" class="text-uppercase">Brand</label>
							<select name="product_brand" id="product_brand" class="form-control category">
								<option value="">Select Brand</option>
								<?php foreach($this->Product_model->get_brand() as $brand): ?>
								<option value="<?php echo $brand->brand_id; ?>"><?php echo $brand->name; ?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="col-md-12">
							<!-- Custom Tabs -->
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs">
									<li class="active">
										<a href="#tab_1" data-toggle="tab" class="text-uppercase" aria-expanded="true">
											<strong>General Setting</strong>
										</a>
									</li>
									<li class="">
										<a href="#tab_2" data-toggle="tab" class="text-uppercase" aria-expanded="false"><strong>Product Images</strong></a>
									</li>
									<li class="">
										<a href="#tab_3" data-toggle="tab" class="text-uppercase" aria-expanded="false"><strong>Product Visibility</strong></a>
									</li>
									<li class="">
										<a href="#tab_4" data-toggle="tab" class="text-uppercase" aria-expanded="false"><strong>Product SEO:</strong></a>
									</li>


								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1">
										<div class="panel">
											<div class="panel-body">
												<table class="table">
													<thead>
														<tr>
															<th>Product Data</th>
															<th>Options</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>SKU</td>
															<td class="text-right">
																<input type="text" class="form-control" name="product_sku" placeholder="SKU">
															</td>
														</tr>
														<tr>
															<td>Product Type</td>
															<td class="text-right">
																<select name="product_type" class="form-control" id="productType">
																	<option value="simple">Simple Product</option>
																	<option value="external">External / Affiliate Product</option>
																</select>
															</td>
														</tr>
														<tr id="externalOption" style="display: none;">
															<td>Details</td>
															<td class="text-right">
																<label for="externalurl" style="float:left;">Product URL</label>
																<input type="text" class="form-control" name="external_url" placeholder="http://">
																<label for="externalbutton" style="float:left;">Button Text</label>
																<input type="text" class="form-control" name="external_button_text" placeholder="Buy Now">
															</td>
														</tr>
														<tr>
															<td>Product Regular Pricing</td>
															<td class="text-right">
																<input type="text" class="form-control" name="product_mrpprice" placeholder="ex:">
															</td>
														</tr>
														<tr>
															<td>Product Sale Pricing</td>
															<td class="text-right">
																<input type="text" class="form-control" name="product_price" placeholder="ex:">
															</td>
														</tr>
														<tr>
															<td>Stock Status</td>
															<td class="text-right">
																<select name="stock_status" class="form-control">
																	<option value="instock">In Stock</option>
																	<option value="outofstock">Out of Stock</option>
																</select>
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
												<h3 class="panel-title">Select Product Images</h3>
											</div>
											<div class="panel-body">
												<div class="form-group col-md-3">
													<label for="exampleInputFile">Main Product Image*</label>
													<input type="file" name="image[]">
													<p class="help-block">.jpg or .PNG file only.</p>
												</div>
												<div class="form-group col-md-3">
													<label for="exampleInputFile">Optional Product Image 1</label>
													<input type="file" name="image[]">
													<p class="help-block">.jpg or .PNG file only.</p>
												</div>
												<div class="form-group col-md-3">
													<label for="exampleInputFile">Optional Product Image 2</label>
													<input type="file" name="image[]">
													<p class="help-block">.jpg or .PNG file only.</p>
												</div>
												<div class="form-group col-md-3">
													<label for="exampleInputFile">Optional Product Image 3</label>
													<input type="file" name="image[]">
													<p class="help-block">.jpg or .PNG file only.</p>
												</div>
											</div>
										</div>
									</div>
									<!-- /.tab-pane -->
									<!-- /.tab-pane -->
									<div class="tab-pane" id="tab_3">
										<div class="panel">
											<div class="panel-heading">
												<h3 class="panel-title">VISIBILITY OPYION</h3>
											</div>
											<div class="panel-body">
												<table class="table">
													<thead>
														<tr>
															<th>Product Data</th>
															<th>Options</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>FEATURED PRODUCTS</td>
															<td class="">
																<div class="checkbox">
																	<label>
																		<input type="hidden" name="featured_products" value="general">
																		<input type="checkbox" class="iCheck-helper" name="featured_products" value="featured">
																		Featured Products
																	</label>
																</div>
															</td>
														</tr>
														<tr>
															<td>PRODUCT STATUS</td>
															<td class="text-right">
																<select name="product_status" class="form-control" id="productType">
																	<option value="draft">Draft</option>
																	<option value="pendingreview">Pending Review</option>
																	<option value="publish">Publish</option>
																</select>
															</td>
														</tr>

													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab_4">
										<div class="panel">
											<div class="panel-body">
												<table class="table">
													<thead>
														<tr>
															<th>Product Data</th>
															<th>Options</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Title</td>
															<td class="text-right">
																<input type="text" class="form-control" name="product_title" placeholder="Unique Title">
															</td>
														</tr>
														<tr>
															<td>Meta Description</td>
															<td class="text-right">
																<textarea name="product_meta_des" class="form-control" id="" cols="60" rows="5"></textarea>
																
															</td>
														</tr>
														<tr>
															<td>Meta Keywords</td>
															<td class="text-right">
																<input type="text" class="form-control" name="product_meta_keyword" placeholder="Meta Keyword">
															</td>
														</tr>

													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!--									TAB Panel-->


								</div>
								<!-- /.tab-content -->
							</div>
							<!-- nav-tabs-custom -->
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<?php echo form_submit('submit', 'Upload', 'class="btn bg-olive btn-lg btn-labeled fa fa-upload pull-right"');?>
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