<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script>
		$(document).ready(function(){
			$.get( 
				"Messages/show_messages" , 
				function(res) {
          			$('#messages').html(res);
        		}
			);	
		}); 
 		$(document).on('submit','form', function()

			{
				//alert('tesst');

				var card=$(this);
				$.post(card.attr("action"),card.serialize(),function(res) {
					$('#messages').html(res);}
				);
                this.reset();
				return false;
			}
		)	
    </script>

</head>
<body class="container">
    <div id="messages" class="mb-5">
    </div>
    <nav class="navbar bg-body-tertiary fixed-bottom" style="bottom:0px">
		<div class="container justify-content-center">
			<form id="new" action="Messages/search" class="d-flex w-100" method="post">
				<input class="form-control me-2" style="w-100" type="text" placeholder="Order" name="message">
				<input class="btn btn-outline-success " type="submit" value="Send">
			</form>
		</div>
	</nav>
</body>
</html>