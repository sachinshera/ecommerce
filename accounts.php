<?php require_once("db.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap , Fontawesome and animate.css included in this file . -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" integrity="sha256-PHcOkPmOshsMBC+vtJdVr5Mwb7r0LkSVJPlPrp/IMpU=" crossorigin="anonymous" />
    <!-- Bootstrap , Fontawesome and animate.css included in this file . -->

    <link rel="stylesheet" href="css/index.css">
    <title>
        <?php $response = $db->query("SELECT * FROM branding");
        if ($response) {
            $data = $response->fetch_assoc();
            echo $data["brand_name"] . "  |  ";
        }
        ?> Your account
    </title>
</head>

<body>
    <header>
        <?php include("php/nav.php"); ?>
        </nav>
    </header>
    <section class="container mt-4">
        <h2 class="text-center mb-4">Accounts</h2>
        <div class="row">
            <div class="col-md-5 p-3" style=" box-shadow: 0px 0px 5px 0px #ccc;">
                <h5>Login Your Account</h5>
                <form id="login_form">
                    <div class="form-group">
                        <label for="username">Your email</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="example@mail.com">
                    </div>
                    <div class="form-group">
                        <label for="login_password">Password</label>
                        <input type="password" class="form-control" id="login_passowrd" placeholder="***********">
                    </div>
                    <button type="submit" class="btn btn-dark text-light">Login</button>
                </form>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 p-3" style=" box-shadow: 0px 0px 5px 0px #ccc;">
                <h5>Create New Account</h5>
                <form>
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" id="fullname" placeholder="sachin kumar ">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mbile</label>
                        <input type="text" class="form-control" id="mobile" placeholder="9977455544" minlength="10" maxlength="12">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@mail.com">
                    </div>
                    <div class="form-group">
                        <label for="signup_password">Password</label>
                        <input type="password" class="form-control" id="signup_password" placeholder="*************">
                    </div>
                    <button type="submit" class="btn btn-dark text-light">Signup</button>
                </form>
            </div>
        </div>
    </section>
    <footer class="mt-4">
        <?php include("php/footer.php"); ?>
    </footer>
    <!-- ext js page  -->
    <script src="js/index.js"> </script>
    <!-- ext js page -->

</body>

</html>