<?php
session_start();
require("new-connection.php");
if(!isset($_SESSION['user'])){
    $logged_in = 'd-none';
    $logged_out = '';
} else {
    $logged_out = 'd-none';
    $logged_in = '';
}
//$today = date("Y-m-d", time());
//(!isset($_SESSION['result'])||!isset($_SESSION['errors']))?header('location: process.php'):'';
//a session object is to be defined prior a call; like wise a session object is by default an element, should be defined if it is used as an array
$query_fetch = ("SELECT  *
                FROM  test_tbp_reviews 
                LEFT JOIN  test_tbp_user ON test_tbp_reviews.id_user=test_tbp_user.id_user 
                ORDER BY test_tbp_reviews.created_at DESC");
//echo $query_fetch;
$reviews = fetch_all($query_fetch);
$query_fetch = "SELECT  *
               FROM  test_tbp_replies 
               LEFT JOIN test_tbp_user ON test_tbp_replies.id_user=test_tbp_user.id_user
               ORDER BY test_tbp_replies.created_at DESC";
//echo $query_fetch;
$replies = fetch_all($query_fetch);
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
<body class="bg-dark">

    <nav class="navbar navbar-dark bg-dark main-nav">
        <div class="container-fluid bg-dark">
            <h1 class="navbar-brand pe-30"><span class="text-danger"> THE BLOG </span> POST</h1>
            <div class="d-flex">
                <a class="btn btn-outline-success ms-12 <?=$logged_out ?>" href="login.php">Login</a>
                <form action="process.php" method="post" class="<?=$logged_in ?>">
                    <input type="hidden" name="action" value="logout">
                    <input type="submit" class="btn btn-outline-success ms-12" href="login.php" value="Log out">
                </form>
            </div>
        </div>
    </nav>
    <div class="container bg-light">
        <div class="row">
            <div class="col-10 mt-4 offset-1">
                <h3 class="text-center p-1">Cat Excavator 312 1997 Hydraulic Hose Diagram</h3>
                <p class="border-bottom border-danger">The 312 is one of the few models that was only ever built for the Japanese market and that has no equivalent model outside Japan. That did not come until the B Series excavators. Best advice I can give you for the long-term is to get hold of a Parts Manual, because if you go into a Cat dealer for parts and quote the machine Serial Number to them all you will get is a blank look. Parts Manual are available online for download from Cat for $115.
                <img class="text-center m-3 p-1 bg-dark" src="https://youfixthis.com/wp-content/uploads/2018/03/Caterpillar-312-Manual-2018-03-01_14-12-26.jpg" alt="312 Manual" style="height:150px">
                <img class="text-center m-3 p-1 bg-dark" src="https://img.autorepairmanuals.ws/images/2019/06/17/CAT_375375L_6NK156-UP_Excavator_HydraulicElectrical_System_-_Attachment_2.jpg" alt="312 Manual" style="height:150px">
                </p>
                <form class="<?=$logged_in ?>" action="process.php" method="post">
                    <div class="form-floating mb-3">
                        <textarea name="context" class="form-control" id="floatingTextarea2" style="height:70px"></textarea>
                        <label for="floatingTextarea2">Add a review..</label>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="hidden" name="action" value="review">
                        <input type="submit" class="btn btn-danger me-3" value="Submit">
                    </div>
                </form>
                    <div class="ps-5">
<?php               foreach($reviews as $values){ ;
 ?>                                 <!-- this is wrongfully indented for a sourcepage-->
                            <p><strong><?= $values['name_first'].' '.$values['name_last'] ;?> on <?= $values['created_at'];?></strong></p>
                            <p class="border-bottom border-danger"> <?= $values['context'];?></p>
                        <div class="ps-5">
<?php                       foreach($replies as $reply){ 
                                if($values['id_review']==$reply['id_review']){
?>                                  <p class="px-6 "><strong><?= $reply['name_first'].' '.$reply['name_last'] ;?> on <?= date($reply['created_at']);?></strong></p>
                                    <p class="px-6 border-bottom border-danger"> <?= $reply['context'];?></p>
<?php                           }
                            }
?>                         <form class="<?=$logged_in ?>" action="process.php" method="post">
                                <div class="form-floating mb-3">
                                    <textarea name="context" class="form-control" id="floatingTextarea2" style="height:70px"></textarea>
                                    <label for="floatingTextarea2">Add a comment..</label>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input type="hidden" name="review" value="<?=$values['id_review']?>">
                                    <input type="hidden" name="action" value="reply">

                                    <input type="submit" class="btn btn-danger me-3" name="submit" value="Submit">
                                </div>
                            </form>
                        </div>
<?php               }
?>                  </div>
            </div>
        </div>
    </div>

</body>
</html>
