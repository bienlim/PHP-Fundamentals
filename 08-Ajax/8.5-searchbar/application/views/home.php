<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Order Taker</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script>
		$(document).ready(function(){
			$.get( 
				"searches/index_html" , 
				function(res) {
          			$('#searchOutput').html(res);
        		}
			);
            return false;	
		});
        $(document).on('change','form', function()
			{
				var card=$(this);
				$.post(card.attr("action"),card.serialize(),function(res) {
					$('#searchOutput').html(res);}
				);
				return false;
			}
		)  
		
    </script>
</head>
<body>
    <header class="container">
        <div class ="row">
            <form class="col-12" action="searches/index_html" method="post">
                
                <input type="text" name="name_product" value="" placeholder="name">
                <input type="decimal" name="min_price" value="" >
                <input type="decimal" name="max_price" value="" >
                <select name="orderby">
                    <option value='0' selected>Low to High Price</option>
                    <option value='1' >High to Low Price</option>
                    <option value='2'>Low to High Stock</option>
                    <option value='3'>High to Low Stock</option>
                    <option value='4'>Oldest to Newest</option>
                    <option value='5'>Newest to Oldest</option>
                </select>
        </form>
        </div>
    </header>
    <section id="searchOutput" class="container">
    </section>
</body>
</html>
