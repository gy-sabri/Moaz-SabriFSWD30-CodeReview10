<?php
 ob_start();
 session_start();
 require 'dbconnect.php';

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

   if( $count == 1 && $row['password_user']==$password ) {
    $_SESSION['user'] = $row['id_user'];
    header("Location: pages/home.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }

  }

 }

?>