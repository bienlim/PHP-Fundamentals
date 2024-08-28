<?php 
    session_start(); 
    echo session_id(); 
    //if(count($_POST['listCustomer'])){
    //$_SESSION['customer'] = array($_POST['listCustomer']);
    //}
 
    $status = isset($_POST['submit'])?$_POST['submit']:NULL;
    echo    $status;
    $claim = isset($status)? ($status=='Submit'? 
                                'noCoupon':
                                ($status=='Claim again'?
                                    'dontCoupon': 
                                    'dontCoupon') )
            :'dontCoupon';
    
    //RESET
    if(isset($_POST['reset'])){
        $listCustomerStr = '';
        echo $_POST['reset'];
    }

    if(isset($_POST['name'])) {             //Condition 
        $newCustomer = $_POST['name'];
    }
    //echo $newCustomer;
    if(isset($newCustomer)||$status=='Claim again'){
        $listCustomerStr = $_POST['listCustomerStr'];
        //echo $listCustomerStr;
        $listCustomerArr = explode(",",$listCustomerStr);
        $status=='Claim again'?$newCustomer=$listCustomerArr[0]:'';
        if(!in_array($newCustomer,$listCustomerArr)){
            array_push($listCustomerArr,$newCustomer);
            //var_dump();

            count($listCustomerArr)<=1?'':$listCustomerStr=implode(",",$listCustomerArr);
            
            
        }
        $customerCount = 11 - count($listCustomerArr);
        echo $listCustomerStr;
    } else {
        $listCustomerStr = '';
        $customerCount = 10;
    }
    $form = $customerCount<1? 'Coupon': 'moreCoupon' ;
    //$claim = isset($_POST['submit'])?  'noCoupon':'dontCoupon';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .form{
            width: 500px;
            margin: 50px auto;
            padding: 1.5rem;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            text-align: center;
        }
        form#unavailable.moreCoupon, form#submit.noCoupon, form#coupon.dontCoupon, form#unavailable.noCoupon, form#submit.Coupon{
            display:none;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <form id="submit" action="index.php" method="post" class="form <?= $form.' '.$claim ?> ">
        <h1>Welcome Customer</h1>
        <p>
            We're giving away free coupons as token of appreciation 
        </p>
        <p>
            for the first <?=$customerCount?> customer(s)
        </p>
        <p>
            Kindly type your name:
        </p>
        <input type="hidden" name="listCustomerStr" value="<?=$listCustomerStr ?>">
        <input type="text" name="name"><br><br>
        <input type="submit" class="btn btn-primary" name="submit">
    </form>
    <form id="coupon" action="index.php" method="post" class="form <?=$claim?>"  >
        <h1>Welcome Customer</h1>
        <p>
            We're giving away free coupons as token of appreciation 
        </p>
        <div>
            <p>50% Discount</p>
            <h2><?= rand(1000000,9999999)?></h2>
            <form>
            <input type="hidden" name="listCustomerStr" value="<?=$listCustomerStr ?>">
            <input type="submit" class="btn btn-primary" value="Reset Count" name="reset">
            <input type="submit" class="btn btn-primary" value="Claim again" name="submit">  
        </div>
    </form>
    <form id="unavailable" action="index.php" method="post" class="form <?= $form.' '.$claim ?>">
        <h1>Welcome Customer</h1>
        <p>
            We're giving away free coupons as token of appreciation 
        </p>
        <div>
            
            <input type="hidden" name="listCustomerStr" value="<?=$listCustomerStr ?>">
            <p>Sorry</p>
            <h2>Unavailable<h2>
            <input type="submit" class="btn btn-primary" value="Reset Count" name="reset">
            <input type="submit" class="btn btn-primary" value="Claim again" name="submit">  
        </div>
    </form>
</body>
</html>

<!--
    1. Logging the name of of coupon entry.
        1.1. elements are strong in $listCustomerStr posted on a input hidden tag. On page load $listCustomerStr is exploded to an array and $newCustomer is push in.
        1.2. Array is then imploded to a string and passed on the the posted input hidden tag.
    
    Assusmptions
        1. $_POST variable cannot store an array

-->