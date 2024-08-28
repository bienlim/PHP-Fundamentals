<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<script>
window.onload = function () {

//Better to construct options first and then pass it as a parameter
var options = {
	title: {
		text: "All Clients Billings for year <?=$data[0]['year']?>"              
	},
	data: [              
	{
		// Change type to "doughnut", "line", "splineArea", etc.
		type: "column",
		dataPoints: [
<?php        foreach($data AS $record){
?>             { label:  "<?=$record['month']?>", y: <?=$record['total']?> },
<?php }
?>    
		]
	}
	]
};

$("#chartContainer").CanvasJSChart(options);
}
</script>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark main-nav">
        <div class="container-fluid bg-dark">
            <h1 class="navbar-brand pe-30"><span class="text-danger"> Client </span> Billing</h1>
            <div class="d-flex">
                <!-- <a class="btn btn-outline-success ms-12 " href="login.php">Login</a>
                <form action="process.php" method="post" class="">
                    <input type="hidden" name="action" value="logout">
                    <input type="submit" class="btn btn-outline-success ms-12" href="login.php" value="Log out">
                </form> -->
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class=" col-12 bg-light mt-2 ">
                    <div class="d-flex flex-row-reverse m-3">
                        <form action="<?=base_url('clients/lookup')?>" method="post">
                        <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Start Date</span>
                            <input type="date" name="startdate" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                            <span class="input-group-text" id="addon-wrapping">to End Date</span>
                            <input type="date" name="enddate" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                        
                        <input type="submit" class="btn btn-dark" href="" value="Lookup">
                        </div>
                        </form>
                    </form>
                </div>
            </div>
            <div class=" col-4 bg-light mt-2 ">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Total</th>
                    </tr>   
                </thead>
<?php        foreach($data AS $record){
?>             <tr>
                <td> <?= $record['month']?> </td>
                <td> <?= $record['year']?> </td>
                <td> <?= $record['total']?> </td>
</tr>
<?php }
?>           
                </table>
            </div>
            <div class=" col-8 bg-light mt-2 ">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
                <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
            </div>
        </div>
    </div>
</body>
</html>
</body>
</html>