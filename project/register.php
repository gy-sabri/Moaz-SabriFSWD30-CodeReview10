<?php
 ob_start();
 session_start(); // start a new session or continues the previous
 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php"); // redirects to home.php
 }
 include_once 'dbconnect.php';

 $error = false;
 if ( isset($_POST['btn-signup']) ) {

  // sanitize user input to prevent sql injection
  $name = trim($_POST['name']);
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
  $_SESSION["UserName"] = $name;

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
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
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
   $query = "INSERT INTO users(userName,first_name,last_name,userEmail,userPass,birth_date) VALUES('$name','$first_name','$last_name','$email','$password','$birth_date')";
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
    // echo "<script> window.location.assign('home.php'); </script>";
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later...";
   }

   
  }
 }

?>