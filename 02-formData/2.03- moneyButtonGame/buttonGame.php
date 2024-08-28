<?php
    session_start();
    //var_dump($_SESSION);
    
    //echo session_id().'>'.$_SESSION['counter'];
    if(isset($_POST['reset'])){
        session_destroy();
        $randNum = 0;
    }
    if(!isset($_SESSION['counter'])){
        $_SESSION['money'] = 500;
        $_SESSION['chance'] = 10;
        $randNum = 0;
        $_SESSION['logs'] = array(
            '<p>['.date("m/d/Y h:i:s a", time()).'] Welcome to Money Button Game, risk taker! All you need to do is to push the buttons to try your luck. You have free 10 chances with initial money 500. Choos wisely and good luck!</p>'
        );
    } else {

        if(isset($_POST['low'])){
                $randNum = rand(-25,100);
        } else 
        if(isset($_POST['mid'])){
                $randNum = rand(-25,100);
        } else 
        if(isset($_POST['high'])){
                $randNum = rand(-500,2500);
        } else 
        if(isset($_POST['severe'])){
                $randNum = rand(-3000,5000);
        }

        $_SESSION['money'] = $_SESSION['money'] + $randNum;
        $_SESSION['chance'] = $_SESSION['chance'] -1;
        $color = $randNum>=0?'green':'red';
        if($_SESSION['money'] > 1){
            array_push($_SESSION['logs'],' <p class="'.$color.'"> ['.date("m/d/Y h:i:s a", time()).'] You rolled '.$randNum.'. You now have '.$_SESSION['money'].' and you only have '.$_SESSION['chance'].' chances left. Goodluck!</p>');
        } else{
            array_push($_SESSION['logs'],'<p class="red">Game over!</p>');
        }
    }
    $_SESSION['counter'] = !isset($_SESSION['counter'])?1:$_SESSION['counter']+1;
?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Money Button Game</title>
    <style>
        body{
            width: 1000px;
            padding: 40px;
            margin: auto;
        }

        input#reset{
            display: block;
            margin-left: auto;
        }
        .bet{
            display: Inline-block;
            width: 190px;
            outline: 1px solid black;
            text-align: center;
            margin: 15px 15px;
        }
        div#logs{
            width:900px;
            outline: 1px solid black;
            text-align: top;
            padding: 10px;
        }
        .green{
            color: green;
        }
        .red{
            color: red;
        }

    </style>

</head>
<body>
    <form id="submit" action="buttonGame.php" method="post" >
        <input id="reset" type="submit" value="Reset Game" name="reset" class="btn btn-primary">
        <h1>Your money: <?= $mone?></h1>
        <h2>Chances left: <?= $chance?></h2>
        <section>
            <div class="bet">
                <h3>Low Risk</h3>
                <input id="low" type="submit" value="Bet" name="low" class="btn btn-primary">
                <p>by -25 up to 100</p>
            </div>
            <div class="bet">
                <h3>Moderate Risk</h3>
                <input id="mod" type="submit" value="Bet" name="mid" class="btn btn-primary">
                <p>by -100 up to 1000</p>
            </div>
            <div class="bet">
                <h3>High Risk</h3>
                <input id="high" type="submit" value="Bet" name="high" class="btn btn-primary">
                <p>by -500 up to 2500</p>
            </div>
            <div class="bet">
                <h3>Severe Risk</h3>
                <input id="severe" type="submit" value="Bet" name="severe" class="btn btn-primary">
                <p>by -3000 up to 5000</p>
            </div>
        </section>
        <h4>
            Game Host:
        </h4>
        <div id="logs">
<?php   foreach($logs as $log){ ?>
        <p class="<?=$log[1] ?>"><?= $log[0]; ?><p>
          <?php }
?>      
        </div>
    </form>
</body>
</html>