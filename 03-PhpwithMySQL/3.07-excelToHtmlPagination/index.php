<?php
require_once('new-connection.php');
$query_fetch = "SELECT file_name FROM test_pagination";
$files = fetch_all($query_fetch);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>The Blog Post</title>
</head>
<body class="">

    <nav class="navbar navbar-dark bg-dark main-nav">
        <div class="container-fluid bg-dark">
            <h1 class="navbar-brand pe-30"><span class="text-danger"> Excel to HTML </span> Pagination</h1>

        </div>
    </nav>
    <div class="container bg-light">
        <div class="row">
            <div class="col-4 mt-4 offset-4">
                <h3 class="text-center p-1">The files</h3>
                <form action="process.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="hidden" name="action" value="upload">
                        <input class="form-control" type="file" id="formFile" name="file_upload">
                    </div>
                    <div class="d-flex justify-content-md-end">
                        <input type="submit" value="Upload" class="btn btn-dark">
                    </div>
                </form>
                <div class="">
<?php               foreach($files as $file){
?>                  <form action="record.php" method="get">
                        
                        <!-- <input type="hidden" name="action" value="record"> -->
                        <input type="submit" class="btn btn-link" name="file_name" value="<?= ($file['file_name'])?>">
                        <input type="hidden" name="page" value="1">
                    </form>
<?php               }
?>

                </div>
            </div>
        </div>
    </div>
</body>
</html>