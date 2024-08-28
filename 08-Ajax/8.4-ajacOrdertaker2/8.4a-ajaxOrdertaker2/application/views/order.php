<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Taker</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
	<div class="col-12 mt-4 p-1">
<?php foreach($orders as $order){
?>
					<div class="card d-inline-block m-3 align-top p-0 text-center bg-light" style="width: 15rem; height: 15rem">
							<form action="orders/update" method="post">
							<div class="text-end pb-3" style="position: relative; ">
								<button type="submit" class="btn btn-light text-decoration-none text-resetS" formaction="orders/remove/<?=$order['id_order']?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
									<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
									<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
								</svg>
								</button>
							</div>	
								<textarea name="content" class="form-control bg-light h-50"><?=$order['content']?></textarea>
							<input type="hidden" name="id_order" value="<?=$order['id_order']?>">
							<input class="btn btn-light btn-outline-success mt-2" type="submit" value="Update">
						</form>
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