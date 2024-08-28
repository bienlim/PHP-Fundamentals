<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .form{
            width: 400px;
            margin: 50px auto;
            padding: 1.5rem;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
        tr{
            height: 40px;
        }
    </style>
</head>
<body>
    <form action="index.html" class="container-md form">
        <h1>Submitted Entry</h1>
        <table>
            <tr>
                <td>Yourname</td>
                <td><?= $_POST['name']?></td>
            </tr>
            <tr>
                <td>Ccourse Title:</td>
                <td><?= $_POST['course']?></td>
            </tr>
            <tr>
                <td>Given Score(1-10):</td>
                <td><?= $_POST['score']?></td>
            </tr>
        <table>
        <p>Reason:</p>
        <p><?= $_POST['reason']?></p>
        <input type="submit" class="btn btn-primary" value="Return">

    </form>
</body>
</html>