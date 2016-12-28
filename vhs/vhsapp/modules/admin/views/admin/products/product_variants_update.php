<?php if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) : ?>
<style>
	.main-sidebar, .main-footer{
		display: none;
	}
</style>
<div class="content" style="margin-top:30px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Edit Product Detail<?php echo $this->uri->segment(4);?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url();?>admin/products/edit/<?php echo $product_details->id;?>">Products</a></li>
			<li class="active">Edit</li>
		</ol>
	</section>
	<?php echo form_open_multipart('admin/products/bulkedit_product_varaints/'.$product_details->id.'');?>
	<?php if($variant_details):?>
	<?php foreach($variant_details as $prodcut_variant): ?>
	<div class="col-md-12 box-border margin" style="padding:10px;">
		<div class="col-md-2">
			<div class="col-md-12">
				<?php if($prodcut_variant->variant_image):?>
				<img src="<?php echo base_url().$prodcut_variant->variant_image;?>" alt="">
				<?php else: ?>
				<img src="<?php echo base_url();?>assets/images/products/<?php echo $product_details->image; ?>" width="100" />
				<?php endif;?>
			</div>
		</div>
		<div class="col-md-8">
			<div class="col-md-12">
				<div class="col-md-12">
					<div class="col-md-12">
						<strong>Title:</strong> <?php echo $prodcut_variant->product_variant_title;?>
						<?php if($prodcut_variant->default_variant	==1): ?>
						<small class="label label-success"><i class="fa fa-clock-o"></i> <strong>DEFAULT VARIANT</strong></small>
						<?php else:?>
						<a href="<?php echo base_url();?>admin/products/set_default_variant/<?php echo $prodcut_variant->product_variant_id;?>?pid=<?php echo $prodcut_variant->product_id;?>" class="btn btn-primary btn-xs">SET DEFAULT</a>
						<?php endif; ?>
						<input type="hidden" name="variant_id[]" value="<?php echo $prodcut_variant->product_variant_id;?>">
						<input type="hidden" name="product_category_id" value="<?php echo $prodcut_variant->product_category_id;?>">
					</div>
					<?php echo $this->Product_model->get_all_variant_value($prodcut_variant->product_variant_id);?>

					<div class="col-md-8 no-padding">
						<strong>EAN:</strong> <input class="" type="text" name="variant_ean[]" value="<?php echo $prodcut_variant->variant_ean;?>">
					</div>

				</div>																
			</div>
			<div class="col-md-12">
				<div class="col-md-5">
					<label for="mrp">MRP or List Price</label>
					<input type="text" class="" name="variant_mrpprice[]" value="<?php echo $prodcut_variant->variant_mrp_price;?>">
				</div>
				<div class="col-md-5">
					<label for="mrp">Selling Price</label>
					<input type="text" class="" name="variant_price[]" value="<?php echo $prodcut_variant->variant_price;?>">
				</div>
				<div class="col-md-5">
					<label for="mrp">Stock Status</label>
					<select name="variant_stock_status[]" id="variant_stock_status">
						<option value="instock">In-Stock</option>
						<option value="outofstock">Outof-Stock</option>
					</select>
				</div>
				<div class="col-md-5">
					<label for="mrp">Stock Status</label>
					<select name="variant_status[]" id="variant_stock_status">
						<option value="publish">Publish</option>
						<option value="draft">Draft</option>
					</select>
				</div>
				<div class="col-md-5">



				</div>
			</div>
		</div>
		<div class="col-md-2">
			<div class="col md-12">

				<a href="<?php echo base_url();?>admin/products/delete_product_variant/<?php echo $prodcut_variant->product_variant_id;?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
	<?php endif;?>
	<div class="col-md-12 action-area">
		<button name="submit" class="btn btn-success"> Save Changes</button>
		<small><a class="btn btn-danger pull-right" href="<?php echo base_url();?>admin/products/edit/<?php echo $product_details->id;?>">Back to Product</a></small>
	</div>
	<?php echo form_close();?>
	
</div>
<?php else:?>
<?php redirect('admin/products/view_all');?>
<?php endif;?>