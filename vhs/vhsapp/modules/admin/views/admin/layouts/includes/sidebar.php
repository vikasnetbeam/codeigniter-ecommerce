<section class="sidebar">
	<!-- Sidebar user panel -->
	<div class="user-panel">
		<div class="pull-left image">
			<img src="<?php echo base_url(); ?>assets/admin/framework/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
		</div>
		<div class="pull-left info">
			<p><?php echo ucwords($this->session->userdata('firstname').' '.$this->session->userdata('lastname'));?></p>
<!--			<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
		</div>
	</div>
	<!-- search form -->
	<form action="#" method="get" class="sidebar-form">
		<div class="input-group">
			<input type="text" name="q" class="form-control" placeholder="Search...">
			<span class="input-group-btn">
				<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
				</button>
			</span>
		</div>
	</form>
	<!-- /.search form -->
	<!-- sidebar menu: : style can be found in sidebar.less -->
	<ul class="sidebar-menu">
		<li class="header">DASHBOARD NAVIGATION</li>
		<li><a href="<?php echo base_url();?>admin/dashboard/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
		<li class="header">PRODUCTS NAVIGATION</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-table"></i> <span>Products</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo base_url();?>admin/products/view_all"><i class="fa fa-arrow-circle-o-right"></i>All Products</a></li>
				<li><a href="<?php echo base_url();?>admin/products/add"><i class="fa fa-arrow-circle-o-right"></i> Add Products</a></li>
				<li class="header" style="border-bottom:1px solid #dd4b39;">PRODUCTS CATEGORIES</li>
				<li><a href="<?php echo base_url();?>admin/products/view_all_categories"><i class="fa fa-arrow-circle-o-right"></i> Cateogry</a></li>
				<li><a href="<?php echo base_url();?>admin/products/sub_category"><i class="fa fa-arrow-circle-o-right"></i> Sub Cateogry</a></li>
				<li class="header" style="border-bottom:1px solid #dd4b39;">PRODUCTS VARIANT GROUP</li>
				<li><a href="<?php echo base_url();?>admin/products/view_variant_group"><i class="fa fa-arrow-circle-o-right"></i> Variant Group</a></li>
				<li><a href="<?php echo base_url();?>admin/products/view_variant"><i class="fa fa-arrow-circle-o-right"></i> Variant Value</a></li>
			</ul>
		</li>
		<!--        order menu-->
		<li class="treeview">
			<a href="#">
				<i class="fa fa-money"></i> <span>Order Management</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo base_url();?>admin/orders/view_orders"><i class="fa fa-circle-o"></i> View All Orders</a></li>
			</ul>
		</li>
		<!--        Coupon menu-->
		<li class="treeview">
			<a href="#">
				<i class="fa fa-calendar"></i> <span>Coupon Management</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo base_url();?>admin/orders/view_orders"><i class="fa fa-circle-o"></i> View All Coupons</a></li>
				<li><a href="<?php echo base_url();?>admin/orders/view_orders"><i class="fa fa-circle-o"></i> Add Coupons</a></li>
			</ul>
		</li>
		<!-- User Menu-->
		<li class="treeview">
			<a href="#">
				<i class="fa fa-user"></i> <span>Users</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo base_url();?>admin/customers/view_all_customers"><i class="fa fa-circle-o"></i> View Users</a></li>
				<li><a href="<?php echo base_url();?>admin/customers/add"><i class="fa fa-circle-o"></i> Add User</a></li>
			</ul>
		</li>
		
		<!--		Store Setting-->
		<li class="header">STORE SETTING</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-gear"></i> <span>Store Setting</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo base_url();?>admin/site_settings/"><i class="fa fa-circle-o"></i> Site Setting</a></li>
				<li><a href="<?php echo base_url();?>admin/site_settings/banner/"><i class="fa fa-circle-o"></i> Banner Setting</a></li>
				<li><a href="<?php echo base_url();?>admin/site_settings/menu/"><i class="fa fa-circle-o"></i> Menu</a></li>
				<li><a href="<?php echo base_url();?>admin/csv/"><i class="fa fa-circle-o"></i> CSV Import</a></li>
				<li><a href="<?php echo base_url();?>admin/site_settings/email_templates"><i class="fa fa-circle-o"></i> Email Templates</a></li>
			</ul>
		</li>
		<!--		admin menu-->
		<li class="header">ADMINSTRATION</li>
		<li class="treeview">
			<a href="#">
				<i class="fa fa-gear"></i> <span>Admin Setting</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>
			</a>
			<ul class="treeview-menu">
				<li><a href="<?php echo base_url();?>admin/site_settings/admin_users"><i class="fa fa-circle-o"></i> View Admin Users</a></li>
				<li><a href="<?php echo base_url();?>admin/site_settings/add_admin"><i class="fa fa-circle-o"></i> Add Admin Users</a></li>
			</ul>
		</li>		
	</ul>
</section>