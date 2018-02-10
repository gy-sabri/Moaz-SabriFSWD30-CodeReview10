<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facebook</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="home_main.css">
    <link rel="stylesheet" href="main.css">

</head>
<body>

<?php require 'script/register.php'; // login ?>

<div id="navwrapper">
      <div id="navbar"> 
      <?php // require_once 'script/loginout.php'; ?>
      <li><a href="script/logout.php?logout">Sign Out</a></li>
        <table class="tablewrapper">

        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <?php

            if ( isset($errMSG) ) {
              echo $errMSG; ?>

            <?php
                }
            ?>

            <tr>
                <td class="row1">Email or Phone</td>
                <td class="row1">Password</td>
            </tr>
            <tr>
                <td><input type="email" name="email" class="inputbody" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
                    <span class="text-danger"><?php echo $emailError; ?></span></td>
                <td><input type="password" name="password" class="inputbody" placeholder="Your Password" maxlength="15" />
                    <span class="text-danger"><?php echo $passError; ?></span></td>
                <td><button type="submit" name="btn-login">Sign In</button></td>
            </tr>
            <tr>
                <td><div class="row2"><input type="checkbox" checked>Keep me logged in</div></td>
                <td class="row2 h">Forgot your password?</td>
            </tr>
            <!-- <a href="register.php">Sign Up Here...</a> -->
        </form>
        </table>
        <h1 class="logowrapper"><img src="Logo_Border3.png" alt="" width="25%" id="img"></h1>
      </div>
    </div>

<?php ob_end_flush(); // ====================== End Login ========================== ?>

 <?php // require 'script/register.php'; // register ?>

<div id="contentwrapper">
    <div id="content">
      
      <div id="leftbod">
        
        <div class="connect bolder">
          Connect with friends and the
          world around you on Facebook.</div>
        
        <div class="leftbar">
          <i class="far fa-images fa-3x"></i>
          <div class="fb1">
            <span class="rowtext">See photos and updates</span>
            <span class="rowtext2 fb1">from friends in News Feed</span>
          </div>
        </div> 
          
          <div class="leftbar">
          <i class="fas fa-calendar-alt fa-3x"></i>
          <div class="fb1">
            <span class="rowtext">Share what's new</span>
            <span class="rowtext2 fb1">in your life on your timeline</span>
            </div>
          </div>
             
            <div class="leftbar">
          <i class="fas fa-users fa-3x"></i>
          <div class="fb1">
            <span class="rowtext">Find more</span>
            <span class="rowtext2 fb1">of what you're looking for with graph search</span>
        </div> 
        </div> 
       
            
      </div>
       
      <div id="rightbod">
        <div class="signup bolder">Sign Up</div>
        <div class="free bolder">It's free and always will be</div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

            <?php
   if ( isset($errMSG) ) {

    ?>
             <div class="alert">
 <?php echo $errMSG; ?>
             </div>
 <?php
   }
   ?>

            <div class="formbox">
            <input type="text" name="user_name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
                <span class="text-danger"><?php echo $nameError; ?></span> 
            </div>

            <div class="formbox">
                <input type="text" class="inputbody in1" placeholder="First name" name="first_name">
                <input type="text" class="inputbody in1 fr" placeholder="Last name" name="last_name">
            </div>
            <div class="formbox">
            <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            <div class="formbox">
            <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            <div class="formbox">
                <input type="text" class="inputbody in2" placeholder="Address" name="address">
            <div class="formbox">
                <input type="text" class="inputbody in1" placeholder="City" name="city">
                <input type="text" class="inputbody in1 fr" placeholder="Zip Code" name="zip_code">
            </div>
            </div>
            <div class="formbox">
            <div class="bday">Birthday</div>
            </div>
            <div class="formbox">
                <input type="date" class="selectbody" id="validationCustom03" name="birthdate">
            <div class="fb1 why h">Why do I need to provide my birthday?</div></div>
            <div class="formbox mt1">
                <span data-type="radio" class="spanpad">
                <input type="radio" id="fem" class="m0" name="gander" value="female">
                <label for="fem" class="gender">Female
                </label>
                <input type="radio" id="male" class="m0" name="gander" value="male">
                <label for="male" class="gender">Male
                </label>
                </span>
            </div>


            <div class="formbox">
                <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            </div>
    </form>

    <div class="formbox">
              <div class="agree">
              <a href="index.php">Sign in Here...</a>
                By clicking Sign Up, you agree to our <div class="link">Terms</div> and that you have read our <div class="link">Data Use Policy</div>, including our <div class="link">Cookie Use</div>.
              </div>  
            </div>
            
          <div class="formbox">
            <div class="createe"><div class="link h">Create a Page</div> for a celebrity, band or business.</div>
          </div>
      </div>
     </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="home_main.js"></script>
    <?php ob_end_flush(); ?>
</body>
</html>
