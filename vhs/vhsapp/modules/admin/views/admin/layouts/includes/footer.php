<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Version</b> 2.3.5
	</div>
	<strong>Copyright &copy; 2014-2016 <a href="http://www.vshopy.in">Vshopy Studio</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Create the tabs -->
	<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
		<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
		<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content">
		<!-- Home tab content -->
		<div class="tab-pane" id="control-sidebar-home-tab">
			<h3 class="control-sidebar-heading">Recent Activity</h3>
			<ul class="control-sidebar-menu">
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-birthday-cake bg-red"></i>

						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

							<p>Will be 23 on April 24th</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-user bg-yellow"></i>

						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

							<p>New phone +1(800)555-1234</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

							<p>nora@example.com</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-file-code-o bg-green"></i>

						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

							<p>Execution time 5 seconds</p>
						</div>
					</a>
				</li>
			</ul>
			<!-- /.control-sidebar-menu -->

			<h3 class="control-sidebar-heading">Tasks Progress</h3>
			<ul class="control-sidebar-menu">
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Custom Template Design
							<span class="label label-danger pull-right">70%</span>
						</h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Update Resume
							<span class="label label-success pull-right">95%</span>
						</h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-success" style="width: 95%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Laravel Integration
							<span class="label label-warning pull-right">50%</span>
						</h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-warning" style="width: 50%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
							Back End Framework
							<span class="label label-primary pull-right">68%</span>
						</h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-primary" style="width: 68%"></div>
						</div>
					</a>
				</li>
			</ul>
			<!-- /.control-sidebar-menu -->

		</div>
		<!-- /.tab-pane -->

		<!-- Settings tab content -->
		<div class="tab-pane" id="control-sidebar-settings-tab">
			<form method="post">
				<h3 class="control-sidebar-heading">General Settings</h3>

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Report panel usage
						<input type="checkbox" class="pull-right" checked>
					</label>

					<p>
						Some information about this general settings option
					</p>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Allow mail redirect
						<input type="checkbox" class="pull-right" checked>
					</label>

					<p>
						Other sets of options are available
					</p>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Expose author name in posts
						<input type="checkbox" class="pull-right" checked>
					</label>

					<p>
						Allow the user to show his name in blog posts
					</p>
				</div>
				<!-- /.form-group -->

				<h3 class="control-sidebar-heading">Chat Settings</h3>

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Show me as online
						<input type="checkbox" class="pull-right" checked>
					</label>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Turn off notifications
						<input type="checkbox" class="pull-right">
					</label>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Delete chat history
						<a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
					</label>
				</div>
				<!-- /.form-group -->
			</form>
		</div>
		<!-- /.tab-pane -->
	</div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
<?php $this->load->view('admin/layouts/modals'); ?>
</div>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/framework/bootstrap/js/bootstrap.min.js"></script>
<script>
	$.fn.modal.Constructor.prototype.enforceFocus = function () {};
</script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/admin/framework/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<?php if($this->uri->segment(2)=='dashboard'): ?>
<script src="<?php echo base_url(); ?>assets/admin/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/admin/framework/dist/js/pages/dashboard2.js"></script>
<?php endif; ?>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/admin/framework/dist/js/demo.js"></script>
<!--datatable-->
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/script.js"></script>

<!-- Page script -->
<script type="text/javascript">
	$(function () {
		//Initialize Select2 Elements
		$(".category").select2();
	});
	function showsubcat(str)
	{
		$.ajax({
			url: '<?php echo base_url(); ?>admin/products/ajax_subcategory',
			type: 'POST',
			data: 'category_id='+str,
			dataType: 'html',
			success: function(data, textStatus, xhr) {
				var data = JSON.parse(data);
				$('#product_subcategory').html('');
				$("#product_subcategory").append("<option value=''>Select Options</option>");
				for (var i = 0; i < data.length; i++) {	
					$("#product_subcategory").append("<option value='" + data[i].subcategory_id + "'>" + data[i].subcategory_name + "</option>");
				}				
			},
			error: function(xhr, textStatus, errorThrown) {
				$('option','#product_subcategory').html(textStatus);
			}
		});

	}
	//varian group by ajax to drop down
	function showvariantgroup(str)
	{
		$.ajax({
			url: '<?php echo base_url(); ?>admin/products/ajax_variant_group',
			type: 'POST',
			data: 'parent_category='+str,
			dataType: 'html',
			success: function(data, textStatus, xhr) {
				var data = JSON.parse(data);	
				$('#product_variantgroup').html('');
				$("#product_variantgroup").append("<option value=''>Select Option</option>");
				for (var i = 0; i < data.length; i++) {	
					$("#product_variantgroup").append("<option value='" + data[i].id + "'>" + data[i].name + "</option>");
				}				
			},
			error: function(xhr, textStatus, errorThrown) {
				$('option','#product_variantgroup').html(textStatus);
			}
		});
	}

	//Product Variant For Category Selected
	$('#product_p_category').change(function(){
		var str = $('#product_p_category').val();
		$.ajax({
			url: '<?php echo base_url(); ?>admin/products/ajax_product_variant_groups',
			type: 'POST',
			data: 'parent_category='+str,
			dataType: 'html',
			success: function(data, textStatus, xhr) {
				var data = JSON.parse(data);
				$('#product_variant').html('');
				$("#product_variant").append("<option value=''>Select Option</option>");
				for (var i = 0; i < data.length; i++) {	
					$("#product_variant").append("<select name='product_variant_group' id='product_v_group' class='form-control category' style='width:100%'> <option value='" + data[i].id + "'>" + data[i].name + "</option></select>");	
					//Ajax For VAriant
					//	
				}				
			},
			error: function(xhr, textStatus, errorThrown) {
				$('option','#product_variant').html(textStatus);
			}
		});
	});

	$(document).ready(function(){
		/*product type option jquery*/
		if( $('#productType').find("option:selected").val() == 'simple') {
			$('#externalOption').hide();
		}
		else{
			$('#externalOption').show();
		}         
		$('#productType').on('change', function() {
			if ( this.value == 'external')
			{
				$("#externalOption").show();
			}
			else
			{
				$("#externalOption").hide();
			}
		});


		$('.add_attribute').click(function(){
			console.log($('#product_variantgroup').val());
			$('.attribute_body').append('<div>'+$('#product_variantgroup').val()+'</div>');
			$('#product_variantgroup option:selected').attr('disabled', 'disabled');

		});

	});
	//	edit menu
	function edit_menu(id) {
		//			save_method = 'update';
		$('#form')[0].reset(); // reset form on modals
		//			$('.form-group').removeClass('has-error'); // clear error class
		//			$('.help-block').empty(); // clear error string

		//Ajax Load data from ajax

		$.ajax({
			url: "<?php echo base_url(); ?>admin/site_settings/ajax_edit/" + id,
			type: "GET",
			dataType: "JSON",
			success: function (data) {
				$.each(data, function (key, val) {

					$("#form").attr("action", "<?php echo base_url(); ?>admin/site_settings/updatemenu/" + id);
					console.log(val.menuid);
					$('[name="id"]').val(val.menuid);
					$('[name="menuname"]').val(val.menulabel);
					$('[name="menulink"]').val(val.menulink);
					$('[name="menuorder"]').val(val.menuorder);
					$('[name="menuclass"]').val(val.menuclass);
					$('select[name="menuparent"] option').each(function() {
						if($(this).val() == val.menuparent) {
							$(this).prop("selected", true);
						}
					});
					$('#menuedit').modal('show'); // show bootstrap modal when complete loaded

				});
			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax'+id);
			}
		});
	}

</script>
<script>

	$(document).ready(function(){
		//		$(".default_variant").click(function(){
		//			$(".default_variant").val('general');
		//			$(this).val('default');
		//		});

		//		$(".default_variant").click(function() {
		//			$(".default_variant").attr("checked", false); //uncheck all checkboxes
		//			$(".default_variant").val('general'); //uncheck all checkboxes
		//			$(this).prop('checked', true);  //check the clicked one
		//			$(this).val('default');
		//		});

	});

	//	function setupDeselectEvent() {
	//		var selected = {};
	//		$('input[type="radio"]').on('click', function() {
	//			if (this.name in selected && this != selected[this.name])
	//				$(selected[this.name]).trigger("deselect");
	//			selected[this.name] = this;
	//		}).filter(':checked').each(function() {
	//			selected[this.name] = this;
	//		});
	//	}
	//
	//	$(document).ready(function() {
	//		setupDeselectEvent(true);
	//		$('input[type=radio]').on('deselect', function() {
	//			$(this).val("general");
	//		}).on('change', function() {
	//			$(this).val("default");
	//		});
	//
	//	});
	$(document).ready(function(){

		$('#selectAllBoxes').click(function(event){
			if(this.checked) {
				$('.checkBoxes').each(function(){

					this.checked = true;
				});    
			}else {
				$('.checkBoxes').each(function(){

					this.checked = false;
				});
			}

		});    


	});

</script>
<script>
	window.onload = function(){
		showsubcat(document.getElementById('productc_cat').value);
	}
</script>
</body>
</html>