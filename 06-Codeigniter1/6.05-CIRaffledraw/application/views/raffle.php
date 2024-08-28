<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>There are <?= $count ?> lucky winners selected</p>
    <div class="box">
        <?= $rand ?>
    </div>
    <form action="http://localhost/6-Codeigniter1/6.5-CIRaffledraw/raffle/submit" method="post">
        <input type="submit">
    </form>
</body>
</html>