<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Authentication 2</title>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark main-nav">
        <div class="container-fluid bg-dark  justify-content-center">
            <h1 class="navbar-brand ">Autenticación</h1>
            <div class="d-flex justify-content-end">
            <form action="<?=base_url('users/logout')?>" method="post">
                <input type="submit" class="btn btn-danger me-3" value="Logout">
            </form>
        </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">

            <div class="p-3 col-6 bg-light mt-4 offset-3">
                <h1> Basic information <h2>
                <table>
                    <tr>
                        <td>First name:</td>
                        <td><?= $name_first?></td>
                    </tr>
                    <tr>
                        <td>Last name:</td>
                        <td><?= $name_last?></td>
                    </tr>
                    <tr>
                        <td>Contact number:</td>
                        <td><?= $contact_number?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>