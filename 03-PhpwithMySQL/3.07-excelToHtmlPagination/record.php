<?php
    require_once('new-connection.php');
    
    $file_name=$_GET['file_name'];
    $page = $_GET['page'];
    if (isset($file_name)) {
            $query = "SELECT * FROM test_pagination WHERE file_name='{$file_name}'";
            $result = fetch_record($query);
    
            if($result){
                //var_dump($result);
                $file = 'this.csv';
                $file_blob = base64_decode($result['file_blob']);
                file_put_contents($file, $file_blob);
    
                ini_set('auto_detect_line_endings', true);
                if (($open = fopen($file, "r")) !== FALSE) 
                {
                while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
                {        
                    $array[] = $data; 
                }
                //var_dump($array);
                }
            }

    $output = '  ';
    $numPerPage = 50;
 
    $start = (($page-1) * $numPerPage)+1;
    $end = ($page * $numPerPage)+1;
/*     $start = 1;
    $end = 51; */
    $next =  $page+1;
    $previous = $page-1;
    
    echo $end.' '.$start .''.$next .' '.$previous;
    
    if($start<2){
        $noPrev = 'd-none';
    } else if ($end > (count($array)-50)){
        $noNext = 'd-none';
    }
    //var_dump($array[1]['first_name']);
    fclose($open);
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>The Blog Post</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark main-nav fixed-top"><!-- fixed-top -->
        <div class="container-fluid bg-dark">
            <a href="index.php" class="text-decoration-none">
                <h1 class="navbar-brand pe-30"><span class="text-danger"> Excel to HTML </span> Pagination</h1>
            </a>
            <div class="d-flex">
                <form action="record.php" method="get" class="m-2 <?= $noPrev?>">
                    <input type="hidden" name="file_name" value="<?= $file_name ?>">
                    <input type="hidden" name="page" value="<?= $previous ?>">
                    <input type="submit" class="btn btn-outline-success ms-12" value="Previous">
                </form>
                <form action="record.php" method="get" class="m-2 <?= $noNext?>">
                    <input type="hidden" name="file_name" value="<?= $file_name ?>">
                    <input type="hidden" name="page" value="<?= $next ?>">
                    <input type="submit" class="btn btn-outline-success ms-12" value="Next">
                </form>
            </div>
        </div>
    </nav>
    <br>
    <table class="table mt-5">
        <thead>
            <tr>
<?php           foreach($array[0] as $value){
?>                 <th scope="col"> <?= $value; ?> </th>
<?php }
?>
            </tr>
        </thead>
<?php   for($row=$start;$row<=$end;$row++){ if($row<count($array)){
?>       
        <tr>
<?php            foreach($array[$row] as $value){ 
?>
            <td style="border-style: solid;"> <?=$value;?>
            </td>
<?php }
?>  
        </tr>
<?php }}
?>   
    </table>
</body>
</html>