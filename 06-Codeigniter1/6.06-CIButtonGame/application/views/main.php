<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <form action="http://localhost/6-Codeigniter1/6.6-CIButtonGame/buttongame/submit" method="post" >
        <input id="reset" type="submit" value="Reset Game" name="reset" class="btn btn-primary">
        <h1>Your money: <?= $money?></h1>
        <h2>Chances left: <?= $chance ?></h2>
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
<?php   foreach($logs as $log){ 
?>          <p class="<?=$log[1] ?>"><?= $log[0]; ?><p>
<?php }
?>      
        </div>
    </form>
</body>
</html>