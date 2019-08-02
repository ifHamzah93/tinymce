<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Teka | <?=isset($title) ? $title : ""; ?></title>
	<link href="<?=base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?=base_url();?>assets/plugins/font-awesome/font-awesome.css" rel="stylesheet" />
	<link href="<?=base_url();?>assets/plugins/css/login.css" rel="stylesheet">
</head>
<body style="background:#F7F7F7;">
	<div id="wrapper">
		<div id="login" class="animate form">
			<section class="login_content">
				<form name="myForm" id="myForm" action="<?=base_url();?>welcome/login" method="POST" onsubmit="return validation();">
					<h1>Login Form</h1>
					<div>
		  				<input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off" autocorrect="off" spellcheck="false"/>
					</div>
					<div>
		  				<input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" autocorrect="off" spellcheck="false"/>
					</div>
					<div>
						<?=$this->session->flashdata('login') != "" ? get_alert('warning',$this->session->flashdata('login')) : ""; ?>
					</div>
					<div>
						<button type="submit" class="btn btn-default">Log in</button>
					</div>
					<div class="clearfix"></div>
					<div class="separator">
						<div class="clearfix"></div>
						<br />
					  	<div>
							<p>&copy;<?=date('Y');?></span> TEKA | All rights reserved</p>
					  	</div>
					</div>
				</form>
			</section>
	  	</div>
	</div>
	<script src="<?=base_url();?>assets/plugins/js/jQuery-2.1.4.min.js"></script>
	<script type="text/javascript">
	function validation() {
		if ($('[name="username"]').val()=="" || $('[name="username"]').val()==null) {
			alert('username masih kosong');
			$('[name="username"]').focus();
			return false;
		} else if ($('[name="password"]').val()=="" || $('[name="password"]').val()== null) {
			alert('password masih kosong');
			$('[name="password"]').focus();
			return false;
		} else {
			return true;
		}
	}
	</script>
</body>
</html>