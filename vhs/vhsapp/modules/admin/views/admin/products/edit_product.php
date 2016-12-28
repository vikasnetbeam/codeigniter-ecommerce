<?php if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) : ?>
<div class="content-wrapper" style="min-height: 946px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Edit Product Detail
			<small>Preview</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Products</a></li>
			<li class="active">Edit</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-10 col-md-offset-1">
				<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header with-border">
						<!--						<h3 class="box-title">Product Form</h3>-->
						<?php if($this->session->flashdata('product_updated')) : ?>
						<div class="alert alert-success">
							<?php echo $this->session->flashdata('product_updated'); ?>
							<a href="<?php echo base_url().$product_details->slug.'?sid='.$product_details->id;?>" target="_blank"><strong>View Product</strong></a>
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
					<?php echo form_open_multipart('admin/products/edit/'.$product_details->id.'');?>
					<div class="box-body">
						<div class="form-group col-md-6">
							<label for="exampleInputEmail1">Product Title</label>
							<input type="text" class="form-control" name="product_name" value="<?php echo $product_details->title; ?>">
						</div>
						<div class="form-group col-md-6">
							<label for="exampleInputEmail1">Product URL Slug</label>
							<input type="text" class="form-control" name="" value="<?php echo $product_details->slug; ?>">
						</div>
						<div class="form-group col-md-12">
							<?php $feature = json_decode($product_details->features); ?>
							<div class="col-md-6">
								<label for="product feature" class="text-uppercase">Product Features 1</label>
								<input type="text" class="form-control" name="feature[]" value="<?php echo $feature[0];?>">
							</div>
							<div class="col-md-6">
								<label for="product feature" class="text-uppercase">Product Features 2</label>
								<input type="text" class="form-control" name="feature[]" value="<?php echo $feature[1];?>">
							</div>
							<div class="col-md-6">
								<label for="product feature" class="text-uppercase">Product Features 3</label>
								<input type="text" class="form-control" name="feature[]" value="<?php echo $feature[2];?>">
							</div>
							<div class="col-md-6">
								<label for="product feature" class="text-uppercase">Product Features 4</label>
								<input type="text" class="form-control" name="feature[]" value="<?php echo $feature[3];?>">
							</div>
							<div class="col-md-6">
								<label for="product feature" class="text-uppercase">Product Features 5</label>
								<input type="text" class="form-control" name="feature[]" value="<?php echo $feature[4];?>">
							</div>
							<div class="col-md-6">
								<label for="product feature" class="text-uppercase">Product Features 6</label>
								<input type="text" class="form-control" name="feature[]" value="<?php echo $feature[5];?>">
							</div>

						</div>

						<div class="form-group col-md-12">
							<label for="exampleInputPassword1">Product Description</label>
<!--							<textarea class="form-control myTextEditor" name="description">-->
							<textarea id="editor1" name="editor1" rows="10" cols="80">
								<?php echo $product_details->description; ?>
							</textarea>
						</div>

						<div class="col-md-12 no-padding">
							<div class="form-group col-md-3">
								<label for="exampleInputPassword1">Category</label>
								<select id="productc_cat" name="product_category" class="form-control category" onchange="showsubcat(this.value);">
									<?php foreach($this->Product_model->get_categories() as $cat):?>
									<option value="<?php echo $cat->id?>" <?php if($cat->id == $product_details->category_id) echo 'selected = "selected"'; ?> >
										<?php echo $cat->name?>
									</option>
									<?php endforeach;?>
								</select>
							</div>
							<div class="form-group col-md-3 col-sm-4">
								<label for="exampleInputPassword1">Sub Category</label>
								<select name="product_subcategory" id="product_subcategory" class="form-control category">
									<option value="<?php echo $product_details->subcategory_id;?>">
										<?php
										if(isset($this->Product_model->get_sub_category_by_id($product_details->subcategory_id)[0]->subcategory_name)) {
											echo $this->Product_model->get_sub_category_by_id($product_details->subcategory_id)[0]->subcategory_name;
										} else {
											echo 'Not Assigned';
										}
										?>
									</option>
								</select>
							</div>
							<div class="form-group col-md-3">
								<label for="brand">Brand</label>
								<select name="product_brand" class="form-control category">
									<option value="">Select Brand</option>
									<?php foreach($this->Product_model->get_brand() as $brand):?>
									<option value="<?php echo $brand->brand_id; ?>" <?php if($brand->brand_id == $product_details->brand) echo 'selected = "selected"'; ?> >
										<?php echo $brand->name?>
									</option>
									<?php endforeach;?>
								</select>
							</div>
							<div class="form-group col-md-3">
								<label for="brand">Product Atribute</label>
								<div class="checkbox">
									<label>
										<input type="hidden" name="products_variant" value="0">
										<input type="checkbox" name="products_variant" value="1" <?php if($product_details->product_variant == 1) {echo 'checked';} ?> >
										Enable Products Variation
									</label>
								</div>
							</div>

							<div class="form-group col-md-3">
								<label for="exampleInputPassword1">Last Updated</label>
								<input type="text" disabled class="form-control" name="product_price" value="<?php echo $product_details->updated_on; ?>">
							</div>
						</div>


						<div class="col-md-12">
							<!-- Custom Tabs -->
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_1" data-toggle="tab" class="text-uppercase" aria-expanded="true"><strong>General Setting</strong></a></li>
									<li class=""><a href="#tab_2" data-toggle="tab" class="text-uppercase" aria-expanded="false"><strong>Product Images</strong></a></li>
									<li class=""><a href="#tab_3" data-toggle="tab" class="text-uppercase" aria-expanded="false"><strong>Product Visibility</strong></a></li>
									<li class=""><a href="#tab_4" data-toggle="tab" class="text-uppercase" aria-expanded="false"><strong>Product SEO</strong></a></li>
									<?php if($product_details->category_id && $product_details->product_variant): ?>
									<?php if($this->Product_model->get_variant_group_by_id($product_details->category_id)):?>
									<li class=""><a href="#tab_5" data-toggle="tab" class="text-uppercase" aria-expanded="false"><strong>Create Product Variant</strong></a></li>
									<?php endif;?>
									<?php endif;?>
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
																<input type="text" class="form-control" name="product_sku" value="<?php echo $product_details->sku; ?>">
															</td>
														</tr>
														<tr>
															<td>Product Type</td>
															<td class="text-right">
																<select name="product_type" class="form-control" id="productType">
																	<option value="simple" <?php if($product_details->product_type == 'simple') {echo 'selected = "selected"';} ?> >Simple Product</option>
																	<option value="external" <?php if($product_details->product_type == 'external') {echo 'selected = "selected"';} ?>>External / Affiliate Product</option>
																</select>
															</td>
														</tr>
														<tr id="externalOption">
															<td>Details</td>
															<td class="text-right">
																<label for="externalurl" style="float:left;">Product URL</label>
																<input type="text" class="form-control" name="external_url" value="<?php echo $product_details->external_url; ?>">
																<label for="externalbutton" style="float:left;">Button Text</label>
																<input type="text" class="form-control" name="external_button_text" value="<?php echo $product_details->external_btn_text; ?>">
															</td>
														</tr>
														<tr>
															<td>Product Regular Pricing</td>
															<td class="text-right">
																<input type="text" class="form-control" name="product_mrpprice" value="<?php echo $product_details->mrp_price; ?>">
															</td>
														</tr>
														<tr>
															<td>Product Sale Pricing</td>
															<td class="text-right">
																<input type="text" class="form-control" name="product_price" value="<?php echo $product_details->price; ?>">
															</td>
														</tr>
														<tr>
															<td>Stock Status</td>
															<td class="text-right">
																<select name="stock_status" class="form-control">
																	<option value="instock" <?php if($product_details->stock_status == 'instock') {echo 'selected = "selected"';} ?> >In Stock</option>
																	<option value="outofstock" <?php if($product_details->stock_status == 'outofstock') {echo 'selected = "selected"';} ?> >Out of Stock</option>
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
													<img src="<?php echo base_url();?>assets/images/products/<?php echo $product_details->image; ?>" width="30" />
													<input type="file" name="image[]">
													<p class="help-block">.jpg or .PNG file only.</p>
												</div>
												<div class="form-group col-md-3">
													<label for="exampleInputFile">Optional Product Image 1</label>
													<img src="<?php echo base_url();?>assets/images/products/<?php echo $product_details->image1; ?>" width="30" />
													<input type="file" name="image[]">
													<p class="help-block">.jpg or .PNG file only.</p>
												</div>
												<div class="form-group col-md-3">
													<label for="exampleInputFile">Optional Product Image 2</label>
													<img src="<?php echo base_url();?>assets/images/products/<?php echo $product_details->image2; ?>" width="30" />
													<input type="file" name="image[]">
													<p class="help-block">.jpg or .PNG file only.</p>
												</div>
												<div class="form-group col-md-3">
													<label for="exampleInputFile">Optional Product Image 3</label>
													<img src="<?php echo base_url();?>assets/images/products/<?php echo $product_details->image3; ?>" width="30" />
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
																		<input type="checkbox" name="featured_products" value="featured" <?php if($product_details->visibility == 'featured') {echo 'checked';} ?> >
																		Featured Products
																	</label>
																</div>
															</td>
														</tr>
														<tr>
															<td>PRODUCT STATUS</td>
															<td class="text-right">
																<select name="product_status" class="form-control" id="productType">
																	<option value="draft" <?php if($product_details->status == 'draft') {echo 'selected = "selected"';} ?> >Draft</option>
																	<option value="pendingreview" <?php if($product_details->status == 'pendingreview') {echo 'selected = "selected"';} ?> >Pending Review</option>
																	<option value="publish" <?php if($product_details->status == 'publish') {echo 'selected = "selected"';} ?> >Publish</option>
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
																<?php 
																$product_meta = json_decode($product_details->product_seo);
																if($product_meta){
																	$meta_title = $product_meta[0]->title;
																	$meta_des = $product_meta[1]->content;
																	$met_keyword = $product_meta[2]->content;
																}else{
																	$meta_title = '';
																	$meta_des = '';
																	$met_keyword ='';
																}
																?>
																<input type="text" class="form-control" name="product_title" value="<?php echo $meta_title; ?>" placeholder="Unique Title">
															</td>
														</tr>
														<tr>
															<td>Meta Description</td>
															<td class="text-right">
																<textarea name="product_meta_des" class="form-control" id="" cols="60" rows="5"><?php echo $meta_des; ?></textarea>

															</td>
														</tr>
														<tr>
															<td>Meta Keywords</td>
															<td class="text-right">
																<input type="text" class="form-control" name="product_meta_keyword" value="<?php echo $met_keyword; ?>" placeholder="Meta Keyword">
															</td>
														</tr>

													</tbody>
												</table>
											</div>
										</div>
									</div>
									<?php if($product_details->category_id && $product_details->product_variant): ?>
									<?php if($this->Product_model->get_variant_group_by_id($product_details->category_id)):?>
									<div class="tab-pane" id="tab_5">
										<div class="panel">
											<div class="panel-body">
												<table class="table">
													<thead>
														<tr>
															<th>Product Variant Group</th>
															<th>Product Variant Value</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($this->Product_model->get_variant_group_by_id($product_details->category_id) as $variant_group): ?>
														<tr>
															<td>
																<select name="product_variant_group[]" class="category" style="width:90%;">
																	<option value="<?php echo $variant_group->name?>">
																		<?php echo $variant_group->id.' - '.$variant_group->name?>
																	</option>
																</select>
															</td>

															<td class="">
																<select name="product_variant[<?php echo $variant_group->name;?>][]" class="category" multiple="multiple" data-placeholder="Select Categorires" style="width: 90%;">
																	<?php foreach ($this->Product_model->get_variant_by_groupid($variant_group->id) as $variant_value): ?>					
																	<option value="<?php echo $variant_value->value?>" <?php if($variant_details){ foreach($variant_details as $product_variant){ if(in_array($variant_value->value, explode('-', ($product_variant->variant_value_id)))) { echo 'selected="selected"';}}}?> > <?php echo $variant_value->id.' - '.$variant_value->value;?> </option>
																	<?php endforeach;?>
																</select>
															</td>
														</tr>
														<?php endforeach;?>
													</tbody>
												</table>
												<?php if($variant_details):?>
												<div class="col-md-12 box-border margin" style="padding:10px;">
													<div class="col-md-3">
														<a href="<?php echo base_url();?>admin/products/bulkedit_product_varaints/<?php echo $product_details->id;?>" class="btn btn-success btn-xs-large" data-toggle="tooltip" title="" data-original-title="Bulk Edit/Update Product Variants!" target="_blank"><strong>Configure Product Variants</strong></a>
													</div>
													<div class="col-md-3">
														<?php if($product_variant->default_variant == 1): ?>
														<small class="label label-warning"><i class="fa fa-clock-o"></i> <strong>DEFAULT VARIANT</strong></small>
														<?php else:?>
														<small class="label label-danger"><i class="fa fa-clock-o"></i> <strong>NO DEFAULT VARIANT</strong></small>
														<?php endif;?>
													</div>

												</div>
												<?php foreach($variant_details as $product_variant): ?>
												<div class="col-md-12 box-border margin" style="padding:10px;">
													<div class="col-md-2">
														<div class="col-md-12">
															<?php if($product_variant->variant_image):?>
															<img src="<?php echo base_url().$product_variant->variant_image;?>" alt="">
															<?php else: ?>
															<img src="<?php echo base_url();?>assets/images/products/<?php echo $product_details->image; ?>" width="100" />
															<?php endif;?>
														</div>
													</div>
													<div class="col-md-8">
														<div class="col-md-12">
															<div class="col-md-10">
																<div><strong>Title:</strong> <?php echo $product_variant->product_variant_title;?></div>
																<?php echo $this->Product_model->get_all_variant_value($product_variant->product_variant_id);?>
																<?php if($product_variant->default_variant == 1): ?>
																<small class="label label-success"><i class="fa fa-clock-o"></i> <strong>DEFAULT VARIANT</strong></small>
																<?php endif;?>
																<div><strong>EAN:</strong> <?php echo $product_variant->variant_ean;?></div>
															</div>																
														</div>
														<div class="col-md-12">
															<div class="col-md-5">
																<label for="mrp">MRP or List Price</label>
																<input type="hidden" name="variant_id" value="<?php echo $product_variant->product_variant_id;?>">
																<input type="text" name="variant_mrpprice[]" value="<?php echo $product_variant->variant_mrp_price;?>">
															</div>
															<div class="col-md-5">
																<label for="mrp">Selling Price</label>
																<input type="text" name="variant_price[]" value="<?php echo $product_variant->variant_price;?>">
															</div>
														</div>
													</div>
													<div class="col-md-2">
														<div class="col md-12">
															<a href="<?php echo base_url();?>admin/products/edit_product_variant/<?php echo $product_variant->product_variant_id;?>" class="btn btn-success" data-toggle="tooltip" title="" data-original-title="EDIT"><i class="fa fa-pencil-square-o"></i></a>
															<a href="<?php echo base_url();?>admin/products/delete_product_variant/<?php echo $product_variant->product_variant_id;?>" class="btn btn-danger" data-toggle="tooltip" title="" data-original-title="DELETE"><i class="fa fa-trash"></i></a>
														</div>
													</div>
												</div>
												<?php endforeach; ?>
												<?php endif;?>
											</div>
										</div>
									</div>

									<?php endif;?>
									<?php endif;?>
									<!-- /.tab-pane -->
								</div>
								<!-- /.tab-content -->
							</div>
							<!-- nav-tabs-custom -->
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<?php echo form_submit('submit', 'Upload', 'class="btn bg-olive btn-lg btn-labeled fa fa-upload pull-right"');?>
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
