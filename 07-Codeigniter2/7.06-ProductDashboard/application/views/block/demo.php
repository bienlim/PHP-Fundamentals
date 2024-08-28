<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Product Dashboard</title>
</head>
<body>

    <nav class="navbar navbar-light border-bottom border-dark main-nav">
        <div class="container-fluid"> 
            <div> 
                <h1 class="display-3">PRODUCT DASHI</h1>
                <figcaption class="blockquote-footer">
                    Your one stop shop <cite title="Source Title">to a stockful shop</cite>
                </figcaption>
            </div>
            <div class="d-flex">
                <a class="btn btn-outline-success ms-12" href="login.php">Login</a>
                <form action="" method="POST" class="">
                    <input type="hidden" name="action" value="logout">
                    <input type="submit" class="btn btn-outline-success ms-12" href="login.php" value="Sign up">
                </form>
            </div>
        </div>
    </nav>

<!----------------------------------------------CUT HEADER BLOCK FOR DYNAMIC CONTENT  --------------------------------------->
    <div class="container">
        <div class="row">
            <div class="col-8 mt-4 p-1">
                <div class="row">
                    <div class="col-6 p-1">
                        <img
                            src="http://localhost/7-Codeigniter2/7.6-ProductDashboard/assets/img/img_sale60.png"
                            class="w-100 shadow-1-strong mb-4"
                            alt="outfit"
                        />
                        <img
                        src="http://localhost/7-Codeigniter2/7.6-ProductDashboard/assets/img/img_rock_01.jpg"
                        class="w-100 shadow-1-strong mb-4"
                        alt="outfit"
                        />
                    </div>
                    <div class="col-6 p-1">
                        <img
                        src="http://localhost/7-Codeigniter2/7.6-ProductDashboard/assets/img/img_outfit_01.jpg"
                        class="w-100 shadow-1-strong mb-4"
                            alt="outfit"
                        />
                        <img
                            src="http://localhost/7-Codeigniter2/7.6-ProductDashboard/assets/img/img_shoes_01.jpg"
                            class="w-100 shadow-1-strong mb-4"
                            alt="outfit"
                        />
                    </div>
                </div>
            </div>
            <div class="col-4 mt-4 p-2">
                <div class="card">
                    <div class="card-body py-3 px-5">
                        <h3 class="fw-bold ls-tight text-center my-2">
                            The best offer
                            starts here
                        </h3>
                            <figcaption class="blockquote-footer mt-1 text-end">
                                <cite title="Source Title">Register here</cite>
                            </figcaption>
                        <form>
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <input type="text" class="form-control" />
                            <label class="form-label" for="name_first">First name</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <input type="text" class="form-control" />
                            <label class="form-label" for="name_last">Last name</label>
                            </div>
                        </div>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                        <input type="email" class="form-control" />
                        <label class="form-label" for="email">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                        <input type="password" class="form-control" />
                        <label class="form-label" for="password">Password</label>
                        </div>

                        <div class="form-outline mb-4">
                        <input type="password" class="form-control" />
                        <label class="form-label" for="password_confirm">Confirm Password</label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">
                            Sign up
                        </button>
                    </form>
                </div>
            </div>

                <div class="card">
                    <div class="card-body py-3 px-5">
                        <h3 class="fw-bold ls-tight text-center ">
                            Seize the day
                        </h3>
                            <figcaption class="blockquote-footer mt-1 text-end">
                            <cite title="Source Title">Login here</cite>
                            </figcaption>
                        <form>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" class="form-control" />
                                <label class="form-label" for="email">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" class="form-control" />
                                <label class="form-label" for="password">Password</label>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">
                                Login
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
