<?php if($this->session->userdata('admin_logged_in') && $this->session->userdata('role',1) ) : ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Menu Manager
			<small>Create Menu</small>
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
						<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#menuparent">Create Menu</button>
					</div>
					<?php if($this->session->flashdata('menu_added')) : ?>
					<div class="col-md-12">
						<div class="col-md-6 alert alert-success">
							<?php echo $this->session->flashdata('menu_added'); ?>
						</div>
					</div>
					<?php endif; ?>
					<?php if($this->session->flashdata('menu_updated')) : ?>
					<div class="col-md-12">
						<div class="col-md-6 alert alert-success">
							<?php echo $this->session->flashdata('menu_updated'); ?>
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
							<div class="col-xs-12">
								<?php foreach($this->Menus_model->get_menus() as $menu):?>
								<?php if(!$menu->menuparent > 0): ?>
								<div class="col-xs-12 parent_menu bg-success" onclick="edit_menu('<?php echo $menu->menuid;?>')">
									<div class="col-xs-5">
										
										<?php echo $menu->menulabel;?>
									</div>
									
									<div class="col-xs-1 pull-right" id="dd3" data-id="<?php echo $menu->menuid;?>">
<a href="javascript:void(0)" class="menu-lb btn btn-xs btn-success" onclick="edit_menu('<?php echo $menu->menuid;?>')"><i class="fa fa-pencil"></i> <strong>EDIT</strong></a>
									</div>|
									<div class="col-xs-3 pull-right">
										<?php echo $menu->menulink; ?>
									</div>
								</div>				
								<?php if($this->Menus_model->get_child_menu($menu->menuid)):?>
								<?php foreach($this->Menus_model->get_child_menu($menu->menuid) as $submenu): ?>
								<div class="col-xs-12 parent_menu sub_menu bg-danger" onclick="edit_menu('<?php echo $submenu->menuid;?>')">
									<div class="col-xs-5">
										<?php echo $submenu->menulabel; ?>
									</div>
									<div class="col-xs-1 pull-right">
	<a href="javascript:void(0)" class="menu-lb btn btn-xs btn-success" onclick="edit_menu('<?php echo $submenu->menuid;?>')"><i class="fa fa-pencil"></i> <strong>EDIT</strong></a>
									</div>|
									<div class="col-xs-3 pull-right">
										<?php echo $submenu->menulink; ?>
									</div>
								</div>
								<?php if($this->Menus_model->get_subchild_menu($submenu->menuid)):?>
								<?php foreach($this->Menus_model->get_subchild_menu($submenu->menuid) as $subchildmenu): ?>
								<div class="col-xs-12 parent_menu sub_menu subchild_menu bg-danger" onclick="edit_menu('<?php echo $subchildmenu->menuid;?>')">
									<div class="col-xs-5">
										<?php echo $subchildmenu->menulabel; ?>
									</div>
									<div class="col-xs-1 pull-right">
<a href="javascript:void(0)" class="menu-lb btn btn-xs btn-success" onclick="edit_menu('<?php echo $subchildmenu->menuid;?>')"><i class="fa fa-pencil"></i> <strong>EDIT</strong></a>
									</div>|
									<div class="col-xs-3 pull-right">
										<?php echo $subchildmenu->menulink; ?>
									</div>
								</div>
								<?php endforeach;?>
								<?php endif;?>
								<?php endforeach;?>
								<?php endif;?>
								<?php endif; ?>
								<?php endforeach; ?>

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
