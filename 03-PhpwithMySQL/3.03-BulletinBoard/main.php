<?php
session_start();
require("new-connection.php");

//$today = date("Y-m-d", time());
//(!isset($_SESSION['result'])||!isset($_SESSION['errors']))?header('location: process.php'):'';
//a session object is to be defined prior a call; like wise a session object is by default an element, should be defined if it is used as an array
$query_fetch = "SELECT  test_bulletin_board.title AS subject, test_bulletin_board.detail AS detail, test_bulletin_board.created_at AS date
FROM  test_bulletin_board
ORDER BY date DESC";
$result = fetch_all($query_fetch);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Raffle Entry</title>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark main-nav">
        <div class="container-fluid bg-dark fixed-top">
            <h1 class="navbar-brand pe-30"><span class="text-danger"> Raffle </span> Entry</h1>
            <div class="d-flex">
                <a class="btn btn-outline-success ms-12" href="index.php">Add post</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-10 mt-4 offset-1">
                <h2 class="text-center p-1 bg-danger "> Entries </h2>
<?php            foreach($result as $values){ ;
 ?>                             <!-- this is wrongfully indented for a sourcepage-->
                        
                        <p><?= $values['date'];?> - <span class = "h3"><?= $values['subject'];?></span></p>
                        <p class="border-bottom border-danger"> <?= $values['detail'];?></p>
                        </tr>
<?php                    }
?>

                </table>
            </div>
        </div>
    </div>

</body>
</html>
