<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Created by Hamzah</title>
	<script type="text/javascript">var base_url = "<?=base_url(); ?>";</script>
	<link href="<?=base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<script src="<?=base_url(); ?>assets/plugins/js/jQuery-2.1.4.min.js"></script>
	<script type="text/javascript" src="<?=base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url(); ?>assets/plugins/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?=base_url(); ?>assets/plugins/tinymce/setup_tinymce.js"></script>
</head>
<body style="background:#F7F7F7;">
<div class="container" style="margin-top: 15px;">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label class="control-label">LARGE</label>
				<textarea rows="10" id="post_content" name="post_content" class="form-control tinymce-lg"></textarea>
			</div>
		</div>
		
		<div class="col-md-12">
			<div class="form-group">
				<label class="control-label">SMALL</label>
				<textarea rows="5" id="post_content2" name="post_content2" class="form-control tinymce-sm"></textarea>
			</div>
		</div>
	</div>
</div>
</body>
</html>
