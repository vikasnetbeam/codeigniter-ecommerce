<?php if($order):?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			User Profile
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Examples</a></li>
			<li class="active">User profile</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">

			<!-- /.col -->
			<div class="col-md-9">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
						<!--
<li><a href="#timeline" data-toggle="tab">Timeline</a></li>
-->
					</ul>
					<div class="tab-content">
						<div class="active tab-pane" id="activity">
							<!-- Post -->
							<div class="post">
								<div class="user-block">
									<div class="col-sm-4 invoice-col">
										From
										<address>
											<strong>Admin, Inc.</strong><br>
											795 Folsom Ave, Suite 600<br>
											San Francisco, CA 94107<br>
											Phone: (804) 123-5432<br>
											Email: info@almasaeedstudio.com
										</address>
									</div>
									<!-- /.col -->
									<div class="col-sm-4 invoice-col">
										To
										<address>
											<strong>Customer Id: <?php echo $order->customer_id;?></strong><br>

											<strong><?php echo ucwords($customer->first_name.' '.$customer->last_name) ;?></strong><br>
											<?php echo $customer->user_address1; ?><br>
											<?php echo $customer->user_address2; ?><br>
											<?php echo $customer->user_city.', '.$customer->user_state.' - '.$customer->user_zip; ?><br>
											Phone: <?php echo $customer->user_phone; ?><br>
											Email: <?php echo $customer->email; ?>
										</address>
									</div>
									<!-- /.col -->
									<div class="col-sm-4 invoice-col">
										<b>Order #<?php echo $order->id; ?></b><br>
										<br>
										<b>Payment Mode:</b> <?php echo $order->payment_mode; ?><br>
										<b>Payment Due:</b> 2/22/2014<br>
										<b>Order Status:</b> <?php echo $order->status; ?>
									</div>
									<!-- /.col -->
								</div>
							</div>

							<div class="post">
								<div class="user-block">
									<div class="col-xs-12 table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Image</th>
													<th>Product</th>
													<th>Price #</th>
													<th>Qty</th>
													<th>Subtotal</th>
												</tr>
											</thead>
											<tbody>
												<?php $products_datil = json_decode($order->products_detail); ?>
												<?php $sub_total = ''; ?>
												<?php foreach($products_datil as $product):?>
												<tr>
													<td><img src="<?php echo $product->image;?>" alt="" height="30"></td>
													<td><?php echo $product->name;?></td>
													<td><i class="fa fa-inr"></i><?php echo $product->price;?></td>
													<td><?php echo $product->qty;?></td>
													<td><i class="fa fa-inr"></i><?php echo $product->subtotal;?></td>
												</tr>
												<?php $sub_total += $product->subtotal;?>
												<?php endforeach;?>

											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="post">
								<div class="user-block">
									<!-- accepted payments column -->
									<div class="col-xs-6">
										<p class="lead">Payment Methods:</p>
									</div>
									<!-- /.col -->
									<div class="col-xs-6">
										<p class="lead">Amount Due 2/22/2014</p>

										<div class="table-responsive">
											<table class="table">
												<tr>
													<th style="width:50%">Subtotal:</th>
													<td><i class="fa fa-inr"></i> <?php echo $sub_total;?></td>
												</tr>
												<tr>
													<th>Tax (9.3%)</th>
													<td><i class="fa fa-inr"></i> <?php echo $order->tax_amount;?></td>
												</tr>
												<tr>
													<th>Shipping:</th>
													<td><i class="fa fa-inr"></i> <?php echo $order->shipping_amount;?></td>
												</tr>
												<tr>
													<th>Total:</th>
													<td><i class="fa fa-inr"></i> <?php echo $order->final_amount;?></td>
												</tr>
											</table>
										</div>
									</div>
									<!-- /.col -->

								</div>
							</div>
							<div class="post">
								<div class="user-block">
									<div class="col-xs-12">
										<a href="<?php echo base_url();?>admin/orders/view_order/<?php echo $order->id;?>?print=<?php echo $order->id;?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
										<button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
										</button>
										<button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
											<i class="fa fa-download"></i> Generate PDF
										</button>
									</div>
								</div>
							</div>
							<!-- /.post -->
						</div>
						<!-- /.tab-pane -->

					</div>
					<!-- /.tab-content -->
				</div>
				<!-- /.nav-tabs-custom -->
			</div>
			<!-- /.col -->




			<div class="col-md-3">

				<!-- Profile Image -->
				<div class="box box-primary">
					<div class="box-body box-profile">
						<?php echo form_open();?>
						<h3 class="profile-username text-center">Order Status</h3>
						<ul class="list-group list-group-unbordered">
							<select name="order_status" id="" class="form-control">
								<?php if($order->status == 'cancelled'):?>
								<option value="cancelled" <?php if($order->status == 'cancelled'){echo 'selected';} ?> >Cancelled</option>
								<?php else: ?>
								<option value="processing"<?php if($order->status == 'processing'){echo 'selected';}?>>Processing</option>
								<option value="shipped" <?php if($order->status == 'shipped'){echo 'selected';} ?> >Shipped</option>
								<option value="delivered" <?php if($order->status == 'delivered'){echo 'selected';} ?> >Delivered</option>
								<option value="cancelled" <?php if($order->status == 'cancelled'){echo 'selected';} ?> >Cancelled</option>
								<?php endif; ?>
							</select>

						</ul>
						<?php if($order->status == 'cancelled'):?>
						<?php else: ?>
						<input type="submit" class="btn btn-primary btn-block" value="Change">
						<?php endif; ?>
						<?php echo form_close();?>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>


		</div>
		<!-- /.row -->

	</section>
	<div class="clearfix"></div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php else:?>
<?php redirect('admin/orders/view_orders');?>
<?php endif;?>