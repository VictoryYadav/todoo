<?php
	$page = "login.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="assets_admin/img/favicon.png" type="image/x-icon" />
	<meta name="robots" content="noindex, nofollow">
    <title><?php echo $title; ?></title>
    <link href="assets_admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets_admin/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets_admin/css/animate.css" rel="stylesheet">
    <link href="assets_admin/css/style.css" rel="stylesheet">
</head>
<body style="background-image:url(assets_admin/img/bg.jpg); background-repeat:no-repeat; background-size: cover;">
    <div style="background: rgba(0, 0, 0, 0); padding-top:10%; min-height: 100%;">
		<div class="middle-box text-center loginscreen animated fadeInDown" style="background: rgba(14, 89, 136, 0.55); margin-top:0;">
			<div style="padding:20px;">
				<div style="margin-bottom: 30px;">
					<img src="assets_admin/img/logo.png" style="width: 120px; height: auto; border-radius: 7px;" alt="Title" />
				</div>
				<form class="m-t" role="form" action="<?=base_url() ?>member/checklogin" method="POST">
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Email" name="email" required="" autocomplete="off" />
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" name="password" required="" autocomplete="off" />
					</div>
					<?php if($this->session->flashdata('error')): ?>
						<div class="alert alert-danger" role="alert"><?= $this->session->flashdata('error') ?></div>
					<?php endif; ?>
					<button type="submit" name="login" class="btn btn-primary block full-width m-b">Login</button>
				</form>
			</div>
		</div>
    </div>
    <script src="assets_admin/js/jquery-3.1.1.min.js"></script>
    <script src="assets_admin/js/bootstrap.min.js"></script>
</body>
</html>