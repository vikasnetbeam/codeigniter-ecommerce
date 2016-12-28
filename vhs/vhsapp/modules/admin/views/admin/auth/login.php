<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>VSHOPY ADMIN</title>
	<!--[if IE 8]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="google" content="notranslate">
	<meta name="robots" content="noindex, nofollow">
	<link rel="icon" href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAqElEQVRYR+2WYQ6AIAiF8W7cq7oXd6v5I2eYAw2nbfivYq+vtwcUgB1EPPNbRBR4Tby2qivErYRvaEnPAdyB5AAi7gCwvSUeAA4iis/TkcKl1csBHu3HQXg7KgBUegVA7UW9AJKeA6znQKULoDcDkt46bahdHtZ1Por/54B2xmuz0uwA3wFfd0Y3gDTjhzvgANMdkGb8yAyY/ro1d4H2y7R1DuAOTHfgAn2CtjCe07uwAAAAAElFTkSuQmCC">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,700italic">

	<link rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/frameworks/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/frameworks/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/frameworks/adminlte/css/adminlte.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/plugins/icheck/css/blue.css">
	<!--[if lt IE 9]><script src="<?php echo base_url();?>assets/admin/plugins/html5shiv/html5shiv.min.js"></script><script src="<?php echo base_url();?>assets/admin/plugins/respond/respond.min.js"></script><![endif]-->
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo"><a href="#"><b>Admin</b>LTE</a></div>

		<?php if($this->session->flashdata('errors')) : ?>
			<div class="alert alert-danger">
				<?php echo $this->session->flashdata('errors'); ?>
			</div>
			<?php endif; ?>

				<div class="login-box-body">
					<p class="login-box-msg">Sign in to start your session</p>
					<form action="<?php echo base_url(); ?>admin/auth/login" method="post" accept-charset="utf-8">
						<div class="form-group has-feedback">
							<input type="text" name="identity" id="identity" class="form-control" placeholder="Your email" /><span class="glyphicon glyphicon-envelope form-control-feedback"></span></div>
						<div class="form-group has-feedback">
							<input type="password" name="password" id="password" class="form-control" placeholder="Your password" /><span class="glyphicon glyphicon-lock form-control-feedback"></span></div>
						<div class="row">
							<div class="col-xs-8">
								<div class="checkbox icheck">
									<label>
										<input type="checkbox" name="remember" value="1" id="remember" />Remember me </label>
								</div>
							</div>
							<div class="col-xs-4">
								<input type="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-flat" />
							</div>
						</div>
					</form>
				</div>
	</div>

	<script src="<?php echo base_url();?>assets/dashboard/frameworks/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/dashboard/frameworks/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/dashboard/plugins/icheck/js/icheck.min.js"></script>
	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%'
			});
		});
	</script>
</body>

</html>