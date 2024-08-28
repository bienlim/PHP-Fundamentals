<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order</title>
    </style>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script>
		$(document).ready(function(){
			console.log("get1");
			$.get( 
				"<?= base_url('/Orders/index_html') ?>" , 
				function(res) {
          			$('#order').html(res);
				  	console.log("get");
        		}
			);

			$('form').submit(function(){
				$.post("<?= base_url('/Orders/create') ?>", $(this).serialize(), function(res) {
					$('#order').html(res);
				});
				return false;
			});
		});
    </script>

</head>
<body>
	<div id="order">
    </div>
<!-- ----------------------------------------------------FOOTER ---------------------------------- -->
	<nav class="navbar bg-body-tertiary fixed-bottom" style="bottom:0px">
		<div class="container-fluid">
			<form action="" class="d-flex" role="search" method="post">
				<input class="form-control me-2" type="text" placeholder="Order" name="content">
				<input class="btn btn-outline-success" type="submit" value="Take order">
			</form>
		</div>
	</nav>
</body>
</html>