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
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="p-3 col-6 bg-light mt-4">
                <form action="<?=base_url('users/register')?>" method="post">
                    <h2 class="text-center">Register</h2>
                    <ul class="list-unstyled">
<?php                   foreach($msg_register as $values){ 
?>                      <li class="h6 text-danger text-center alert-warning "> <?= $values; ?>
                        </l1>
<?php                   } ;
?>                  </ul>
                    <div class="form-floating mb-3">
                        <input type="text" name="name_first" class="form-control" id="floatingInput">
                        <label for="floatingInput">First Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="name_last" class="form-control" id="floatingInput">
                        <label for="floatingInput">Last Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="contact_number" class="form-control" id="floatingInput" maxlength="11">
                        <label for="floatingInput">Contact Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingInput">
                        <label for="floatingInput">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="confirm_password" class="form-control" id="floatingInput">
                        <label for="floatingInput">Confirm Password</label>
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <input type="hidden" name="action" value="register">
                        <input type="submit" class="btn btn-danger me-3" value="Register">
                    </div>
                </form>
            </div>
            <div class="p-3 col-6 bg-light mt-4">
                <form action="<?=base_url('users/login')?>" method="post">
                    <h2 class="text-center">Login</h2>
                    <ul class="list-unstyled">
<?php                   foreach($msg_login as $values){ 
?>                      <li class="h6 text-danger text-center alert-warning "> <?= $values; ?>
                        </l1>
<?php                   } ;
?>                  </ul>

                    <div class="form-floating mb-3">
                        <input type="text" name="contact_number" class="form-control" id="floatingInput" maxlength="11">
                        <label for="floatingInput">Contact Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingInput">
                        <label for="floatingInput">Password</label>
                    </div>         
                    <div class="d-flex justify-content-end">
                        <input type="hidden" name="action" value="login">
                        <input type="submit" class="btn btn-danger me-3" value="Login">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>