<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
	 	$(document).ready(function() {
		$('form').submit(function() {
			$.post($(this).attr('action'), $(this).serialize(), function(res) {
				$('#display').html(res);
			});
			return false;
		});
	}); 
	</script>

</head>
<body class="container">
<div class="row text-center m-3">
	<form action="Websites/get_page" method="post">
		<input name="url" type="text">
		<input type="submit">
	</form>
</div>
<div id="display" class="row">

</div>
</body>
</html>
