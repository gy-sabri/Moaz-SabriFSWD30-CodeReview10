<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>BigList</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="main.css">
        <style>
            .button_login {
                position: absolute;
                z-index: 1;
                bottom: 30%;
                width: 100%;
            }
            .button_login h1 {
                color: rgba(255, 255, 255, 0.8);
                margin-bottom: 10%;
                font-weight: bolder
            }
            .button_login button {
                padding: 15px 30px;
                box-shadow: 0px 1px 3px 5px #3333;
                background-color: rgba(0, 0, 0, 0.456);
                color: #eee;
                font-size: 24px;
                transition: all .3s ease-in-out;
            }.button_login button:hover {
                box-shadow: 0px 0px 0px 0px #fff;
            }.button_login button:visited{
                box-shadow: 5px 1px 2px 5px #fff;
            }
        </style>
    </head>
    <body>

        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-light">
            <a class="navbar-brand" href="#">Moaz-Sabri-FSWD30-CodeReview10</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <button type="button" class="btn btn-light m-1" onclick="on_login()">Login</button>
                </div>
            </div>
        </nav>

        <center id="login_box">
        <div id="layout" class="login_box">
            <?php require_once 'login.php'; ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                    <?php if ( isset($errMSG) ) { echo $errMSG; ?> <?php } ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Your Email" aria-describedby="emailHelp" value="<?php echo $email; ?>" maxlength="40" required />
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
                            <span class="text-danger"><?php echo $emailError; ?></span>
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" required/>
                        <span class="text-danger"><?php echo $passError; ?></span>
                    </div>
                    <div class="form-check row2">
                        <input type="checkbox" class="form-check-input" checked>Keep me logged in
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-light" name="btn-login">Sign In</button>
                    <button type="submit" class="btn btn-danger"  onclick="off_login()">Close</button>
                </form>
            <?php ob_end_flush(); // ====================== End Login ========================== ?>
        </div>
        </center>

        
        

        <center id="reg_box">
        <div id="layout" class="reg_box">
            <?php require_once 'register.php'; ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                    <?php if ( isset($errMSG) ) { ?>
                        <div class="alert"> <?php echo $errMSG; ?> </div> 
                    <?php } ?>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">First Name:</label>
                            <input type="text" class="form-control" placeholder="First name" name="first_name" required>
                            <!--  -->
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Last Name:</label>
                            <input type="text" class="form-control" placeholder="Last name" name="last_name" required>
                            <!--  -->
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">User Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" required />
                            <span class="text-danger"><?php echo $nameError; ?></span> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Email:</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" required/>
                            <span class="text-danger"><?php echo $emailError; ?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Password:</label>
                            <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" required/>
                            <span class="text-danger"><?php echo $passError; ?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputZip">Birth Date:</label>
                            <input type="date" class="form-control" placeholder="Address" name="birth_date">
                            <!--  -->
                        </div>
                    </div>
                    <button type="submit" class="btn btn-light" name="btn-signup">Sign Up</button>
                    <button type="submit" class="btn btn-danger"  onclick="off()">Close</button>
                </form>
            <?php ob_end_flush(); ?>
            </div>
        </center>

        <center class="button_login">
            <h1 class="display-4">Hallow Word!!</h1>
            <button type="button" class="btn btn-light m-1" onclick="on()">Sign Up</button>
        </center>

        <div class="slider">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100" src="img/first.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="img/se.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="img/last.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center">
            <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
            <span class="glyphicon glyphicon-chevron-up"></span>
            </a><br><br>
            <p>Moaz-Sabri-FSWD30-CodeReview10</p> 
        </footer>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            function on() {
                document.getElementById("reg_box").style.display = "block";
                document.getElementById("login_box").style.display = "none";
            }
            function off() {
                document.getElementById("reg_box").style.display = "none";
            }

            function on_login() {
                document.getElementById("login_box").style.display = "block";
                document.getElementById("reg_box").style.display = "none";
            }
            function off_login() {
                document.getElementById("login_box").style.display = "none";
            }

        </script>
    </body>
</html>
