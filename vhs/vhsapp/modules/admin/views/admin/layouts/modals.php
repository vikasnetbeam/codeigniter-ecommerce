<div class="modal fade" id="subcategory" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×</button>
				<h4 class="modal-title" id="myModalLabel">
					Login/Registration </h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<!-- Tab panes -->
						<?php echo form_open_multipart('admin/products/sub_category/add');?>
						<div class=" form-group col-md-12">
							<label>Sub Category Name*</label>
							<input type="text" class="form-control" name="subcategory_name" placeholder="Enter Name">
						</div>
						<div class="form-group col-md-12">
							<label for="category">Category*</label>
							<select name="subcategory_parent" class="form-control category" style="width:100%;">
								<?php foreach($this->Product_model->get_categories() as $cat):?>
								<option value="<?php echo $cat->id?>">
									<?php echo $cat->name?>
								</option>
								<?php endforeach;?>
							</select>

						</div>
						<div class="col-md-12">
							<button name="submit" type="submit" class="btn btn-primary">Create</button>
						</div>
						<?php echo form_close();?>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!--Category Model-->
<div class="modal fade" id="category" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×</button>
				<h4 class="modal-title" id="myModalLabel">
					Create Category </h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<!-- Tab panes -->
						<?php echo form_open_multipart('admin/products/add_category/');?>
						<div class=" form-group col-md-12">
							<label for="cat_name">Category Name*</label>
							<input type="text" class="form-control" name="cat_name" placeholder="Enter Name">
						</div>
						<label for="cat_description">Category Description (Optional)</label>
						<div class="form-group col-md-12">
							<textarea name="cat_description" id="" cols="100" rows="5"></textarea>
						</div>
						<div class="col-md-12">
							<button name="submit" type="submit" class="btn btn-primary">Create</button>
						</div>
						<?php echo form_close();?>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!--Banner Image Model-->
<div class="modal fade" id="sliderImageModel" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×</button>
				<h4 class="modal-title" id="myModalLabel">
					Home Pager Slider Images </h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<!-- Tab panes -->
						<?php echo form_open_multipart('admin/site_settings/add_slider_images/');?>
						<div class=" form-group col-md-12">
							<label>Select Images*</label>
							<input type="file" class="form-control" name="sliderimages[]" multiple>
						</div>
						<div class="col-md-12">
							<button name="submit" type="submit" class="btn btn-primary">Create</button>
						</div>
						<?php echo form_close();?>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!--Manu Manager Model-->
<div class="modal fade" id="menuparent" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×</button>
				<h4 class="modal-title" id="myModalLabel">
					Home Pager Slider Images </h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<!-- Tab panes -->
						<?php echo form_open_multipart('admin/site_settings/savemenu/');?>
						<div class=" form-group col-xs-12">
							<div class="col-xs-8">
								<label>Menu Name</label>
								<input type="text" class="form-control" name="menuname" placeholder="Menu Item Name" required>
							</div>
						</div>
						<div class="form-group col-xs-12">
							<div class="col-xs-8">
								<label>Menu Link</label>
								<input type="text" class="form-control" name="menulink" placeholder="Menu Item Link#" required>
							</div>
						</div>
						<div class="form-group col-xs-12">
							<div class="col-xs-4">
								<label>Menu order</label>
								<input type="text" class="form-control" name="menuorder" placeholder="Menu Item Order">
							</div>
							<div class="col-xs-4">
								<label>Menu Class</label>
								<input type="text" class="form-control" name="menuclass" placeholder="Menu Item Class">
							</div>
						</div>
						<div class="form-group col-xs-12">
							<div class="col-xs-8">
								<label>Menu Parent</label>
								<select name="menuparent" id="menuparent" class="category form-control" style="width:100%;">
									<option value="">Select Parent Menu</option>
									<?php foreach($this->Menus_model->get_menus() as $menu): ?>
									<option value="<?php echo $menu->menuid; ?>"><?php echo $menu->menulabel; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="col-md-12">
							<button name="submit" type="submit" class="btn btn-primary">Create</button>
						</div>
						<?php echo form_close();?>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!--Variant Group Model-->
<div class="modal fade" id="variant_group" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×</button>
				<h4 class="modal-title" id="myModalLabel">
					Create Variant Group </h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<!-- Tab panes -->
						<?php echo form_open_multipart('admin/products/add_variant_group/');?>
						<div class="form-group col-xs-12">
							<label>Parent Category</label>
							<select name="category_id" id="menuparent" class="category form-control" style="width:100%;">
								<option value="">Select Parent Category</option>
								<?php foreach($this->Product_model->get_all_categories() as $category): ?>
								<option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
								<?php endforeach; ?>
							</select>

						</div>
						<div class=" form-group col-md-12">
							<label>Group Name*</label>
							<input type="text" class="form-control" name="variant_group_name" placeholder="Enter Name">
						</div>
						<div class="col-md-12">
							<button name="submit" type="submit" class="btn btn-primary">Create</button>
						</div>
						<?php echo form_close();?>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!--Variant Value Model-->
<div class="modal fade" id="variant_value" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×</button>
				<h4 class="modal-title" id="myModalLabel">
					Add Variant Value </h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<!-- Tab panes -->
						<?php echo form_open_multipart('admin/products/add_variant_value/');?>
						<div class="form-group col-xs-12">
							<label>Variant Parent Category</label>
							<select name="variant_parent_category" id="parent_category" class="category form-control" style="width:100%;" onchange="showvariantgroup(this.value);">
								<option value="">Select Parent Category</option>
								<?php foreach($this->Product_model->get_variant_group_by() as $value): ?>
								<option value="<?php echo $value->category_id; ?>" ><?php echo $this->Product_model->get_category_detail_by_id($value->category_id)->name; ?></option>
								<?php endforeach; ?>
							</select>

						</div>
						<div class="form-group col-xs-12">
							<label>Variant Group Name Parent</label>
							<select name="variant_group_name" id="product_variantgroup" class="category form-control" style="width:100%;">
								<option value="">Select Parent Menu</option>
								<?php foreach($this->Product_model->get_all_variant_group() as $menu): ?>
								<option value="<?php echo $menu->id; ?>"><?php echo $menu->name; ?></option>
								<?php endforeach; ?>
							</select>

						</div>
						<div class=" form-group col-md-12">
							<label>Variant Value*</label>
							<input type="text" class="form-control" name="variant_value" placeholder="Enter Name">
						</div>
						<div class="col-md-12">
							<button name="submit" type="submit" class="btn btn-primary">Create</button>
						</div>
						<?php echo form_close();?>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!--Banner Image Model-->
<div class="modal fade" id="menuchild" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×</button>
				<h4 class="modal-title" id="myModalLabel">
					Home Pager Slider Images </h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<!-- Tab panes -->
						<?php echo form_open_multipart('admin/site_settings/add_slider_images/');?>
						<div class=" form-group col-md-12">
							<label>Select Images*</label>
							<input type="file" class="form-control" name="sliderimages[]" multiple>
						</div>
						<div class="col-md-12">
							<button name="submit" type="submit" class="btn btn-primary">Create</button>
						</div>
						<?php echo form_close();?>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<!--edit menu Model-->
<div class="modal fade" id="menuedit" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×</button>
				<h4 class="modal-title" id="myModalLabel">
					Edit Menu Item </h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<!-- Tab panes -->
						<?php echo form_open_multipart('admin/site_settings/updatemenu/', array('id' => 'form'));?>
						<input type="hidden" value="" name="id" />
						<div class=" form-group col-xs-12">
							<div class="col-xs-8">
								<label>Menu Name</label>
								<input type="text" class="form-control" name="menuname" required>
							</div>
						</div>
						<div class="form-group col-xs-12">
							<div class="col-xs-8">
								<label>Menu Link</label>
								<input type="text" class="form-control" name="menulink" required>
							</div>
						</div>
						<div class="form-group col-xs-12">
							<div class="col-xs-4">
								<label>Menu order</label>
								<input type="text" class="form-control" name="menuorder">
							</div>
							<div class="col-xs-4">
								<label>Menu Class</label>
								<input type="text" class="form-control" name="menuclass">
							</div>
						</div>
						<div class="form-group col-xs-12">
							<div class="col-xs-8">
								<label>Menu Parent</label>
								<select name="menuparent" id="menuparent" class="form-control" style="width:100%;">
									<option value="">Select Parent Menu</option>
									<?php foreach($this->Menus_model->get_menus() as $menu): ?>
									<option value="<?php echo $menu->menuid; ?>"><?php echo $menu->menulabel; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="col-md-12">
							<button name="submit" type="submit" class="btn btn-success">Update Menu</button>
						</div>
						<?php echo form_close();?>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

