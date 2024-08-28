<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quotes</title>
    <style>
      form {
        margin-bottom: 30px;
      }
    </style>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
	<div class="col-12 mt-4 p-1">
<?php foreach($orders as $order){
?>
                    <div class="card d-inline-block m-2 align-top p-3 text-center bg-light" style="width: 15rem; height: 15rem">
						<p><?=$order['content']?></p>
                    </div>
<?php }
?>       
    </div>
<!-- ----------------------------------------------------FOOTER ---------------------------------- -->
	<nav class="navbar bg-body-tertiary fixed-bottom" style="bottom:0px">
		<div class="container-fluid">
			<form action="orders/create" class="d-flex" role="search" method="post">
				<input class="form-control me-2" type="text" placeholder="Order" name="content">
				<input class="btn btn-outline-success" type="submit" value="Take order">
			</form>
		</div>
	</nav>
</body>
</html>