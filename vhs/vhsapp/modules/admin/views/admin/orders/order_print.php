<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>VSHOPY | Invoice</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/framework/bootstrap/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/framework/dist/css/AdminLTE.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
		<style type="text/css">
			@media print{
				body{ background-color:#FFFFFF; background-image:none; color:#000000 }
				#ad{ display:none;}
				#leftbar{ display:none;}
				#contentarea{ width:100%;}
			}
		</style>

	</head>
	<body onload="window.print();">
		<div class="wrapper">
			<!-- Main content -->
			<section class="invoice">
				<!-- title row -->
				<div class="row">
					<div class="col-xs-12">
						<h2 class="page-header">
							<i class="fa fa-globe"></i> AdminLTE, Inc.
							<small class="pull-right">Date: <?php echo $order->order_date;?></small>
						</h2>
					</div>
					<!-- /.col -->
				</div>
				<!-- info row -->
				<div class="row invoice-info">
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
				<!-- /.row -->
				<!-- Table row -->
				<div class="row">
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
					<!-- /.col -->
				</div>
				<!-- /.row -->

				<div class="row">
					<!-- accepted payments column -->
					<div class="col-xs-6">
						<p class="lead">Payment Methods:</p>
						<img src="../../dist/img/credit/visa.png" alt="Visa">
						<img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
						<img src="../../dist/img/credit/american-express.png" alt="American Express">
						<img src="../../dist/img/credit/paypal2.png" alt="Paypal">

						<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
							Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
							dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
						</p>
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
				<!-- /.row -->
			</section>
			<!-- /.content -->
		</div>
		<!-- ./wrapper -->
	</body>
</html>
