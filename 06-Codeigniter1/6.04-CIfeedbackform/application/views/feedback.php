<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .form{
            width: 400px;
            margin: 50px auto;
            padding: 1.5rem;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
        select, input{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
        <form action="submit" method="post" class="container-md form">
            <h1>Feedback Form</h1>
            <p>Your Name (optional):</p>
            <input type="text" name="name" class="form-control">
            <p>Course Title</p>
            <select name="course">
                <option>Web fundamentals</option>
                <option>PHP Track</option>
            </select>
            <p>Given Score(1-10):</p>
            <select name="score">
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            <p>Reason</p>
            <textarea name="reason" class="form-control"></textarea><br>
            <input type="submit" class="btn btn-primary">
        </form>
</body>
</html>