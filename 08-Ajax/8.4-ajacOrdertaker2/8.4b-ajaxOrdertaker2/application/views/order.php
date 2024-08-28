<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Taker</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script>
		$(document).ready(function(){
			$.get( 
				"Orders/index_html" , 
				function(res) {
          			$('#order').html(res);
        		}
			);	
		});

 		$(document).on('submit','form', function()
			
			{
				//alert('tesst');

				var card=$(this);
				$.post(card.attr("action"),card.serialize(),function(res) {
					$('#order').html(res);}
				);
				return false;
			}
		)

 		$(document).on('change','form.note', function()
			{
				var card=$(this);
				$.post(card.attr("action"),card.serialize(),function(res) {
					$('#order').html(res);}
				);
				return false;
			}
		) 
		
    </script>
</head>
<body>
	<div id="order">
	</div>
<!-- ----------------------------------------------------FOOTER ---------------------------------- -->
	<nav class="navbar bg-body-tertiary fixed-bottom" style="bottom:0px">
		<div class="container-fluid">
			<form id="new" action="Orders/create" class="d-flex" role="search" method="post">
				<input class="form-control me-2" style="width:600px" type="text" placeholder="Order" name="content">
				<input class="btn btn-outline-success " type="submit" value="Take order">
			</form>
		</div>
	</nav>
</body>
</html>