<?php
 ob_start();
 session_start(); // start a new session or continues the previous
 if( isset($_SESSION['user'])!="" ){
//   header("Location: home.php"); // redirects to home.php
 }
 include 'dbconnect.php';
 $error = false;
 if ( isset($_POST['btn-signup']) ) {

  // sanitize user input to prevent sql injection
  $name = trim($_POST['user_name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $first_name = trim($_POST['first_name']);
  $first_name = strip_tags($first_name);
  $first_name = htmlspecialchars($first_name);

  $last_name = trim($_POST['last_name']);
  $last_name = strip_tags($last_name);
  $last_name = htmlspecialchars($last_name);
 
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  $birth_date = trim($_POST['birth_date']);
  $birth_date = strip_tags($birth_date);
  $birth_date = htmlspecialchars($birth_date);


// Start the session
session_start();
  $_SESSION["user_name"] = $name;

  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }

// basic first_name validation
if (empty($first_name)) {
    $error = true;
    $first_nameError = "Please enter your full name.";
    } else if (strlen($first_name) < 3) {
    $error = true;
    $first_nameError = "Name must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$first_name)) {
    $error = true;
    $first_nameError = "Name must contain alphabets and space.";
    }

// basic last_name validation
if (empty($last_name)) {
    $error = true;
    $last_nameError = "Please enter your full name.";
    } else if (strlen($last_name) < 3) {
    $error = true;
    $last_nameError = "Name must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$last_name)) {
    $error = true;
    $last_nameError = "Name must contain alphabets and space.";
    }

  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check whether the email exist or not
   $query = "SELECT email_user FROM users WHERE email_user='$email'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }

  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;

   $passError = "Password must have atleast 6 characters.";
  }

  // password encrypt using SHA256();
  $password = hash('sha256', $pass);

  // if there's no error, continue to signup
  if( !$error ) {
   $query = "INSERT INTO users(user_name,first_name,last_name,email_user,password_user,birth_date) VALUES('$name','$first_name','$last_name','$email','$password','$birth_date')";
   $res = mysqli_query($conn, $query);

   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($name);
    unset($first_name);
    unset($last_name);
    unset($email);
    unset($pass);
    unset($birth_date);

    header("Location: pages/home.php");
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later...";
   }

  }

 }

  // it will never let you open index(login) page if session is set
  if ( isset($_SESSION['user'])!="" ) {
    //   header("Location: home.php");
    //   exit;
     }
    
     $error = false;
    
     if( isset($_POST['btn-login']) ) {
    
      // prevent sql injections/ clear user invalid inputs
      $email = trim($_POST['email']);
      $email = strip_tags($email);
      $email = htmlspecialchars($email);
     
      $pass = trim($_POST['password']);
      $pass = strip_tags($pass);
      $pass = htmlspecialchars($pass);
    
      // prevent sql injections / clear user invalid inputs
      if(empty($email)){
       $error = true;
       $emailError = "Please enter your email address.";
      } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
       $error = true;
       $emailError = "Please enter valid email address.";
      }
    
      if(empty($pass)){
       $error = true;
       $passError = "Please enter your password.";
      }
    
      // if there's no error, continue to login
      if (!$error) {
        $password = hash('sha256', $pass); // password hashing using SHA256 
        $res = mysqli_query($conn, "SELECT id_user, user_name, password_user FROM users WHERE email_user ='$email'");
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
    
       if( $count == 1 && $row['password_user']==$pass ) {
        $_SESSION['user'] = $row['id_user'];
        header("Location: pages/home.php");
       } 
       else {
        $errMSG = "Incorrect Credentials, Try again...";
        echo $row['password_user'] . "<br>";
        echo $password ;
       }
    
      }
    
     }
 
?>